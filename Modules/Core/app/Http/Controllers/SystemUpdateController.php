<?php

namespace Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use ZipArchive;

class SystemUpdateController extends Controller
{
    public function index()
    {
        $currentVersion = File::exists(base_path('version.txt'))
            ? trim(File::get(base_path('version.txt')))
            : '1.0.0';

        return view("core::system-update", compact('currentVersion'));
    }

    // Handle each chunk upload
    public function uploadChunk(Request $request)
    {
        $tempPath = storage_path('app/updates/chunks');
        if (!File::exists($tempPath)) {
            File::makeDirectory($tempPath, 0755, true);
        }

        $chunkNumber = $request->input('resumableChunkNumber');
        $identifier  = preg_replace('/[^A-Za-z0-9_\-]/', '', $request->input('resumableIdentifier'));
        $filename    = $request->input('resumableFilename');

        $chunkFile = $tempPath . "/{$identifier}_{$chunkNumber}.part";
        $request->file('file')->move($tempPath, basename($chunkFile));

        return response()->json(['uploaded' => true]);
    }

    // Merge chunks & extract the update
    public function apply(Request $request)
    {
        $identifier = preg_replace('/[^A-Za-z0-9_\-]/', '', $request->input('identifier'));
        $filename   = $request->input('filename');

        $chunkPath  = storage_path('app/updates/chunks');
        $finalPath  = storage_path("app/updates/{$filename}");

        // Merge chunks
        $out = fopen($finalPath, 'wb');
        $chunk = 1;

        while (true) {
            $chunkFile = "{$chunkPath}/{$identifier}_{$chunk}.part";
            if (!File::exists($chunkFile)) break;

            $in = fopen($chunkFile, 'rb');
            stream_copy_to_stream($in, $out);
            fclose($in);
            $chunk++;
        }

        fclose($out);

        // Cleanup chunk files
        File::delete(glob("{$chunkPath}/{$identifier}_*.part"));

        // Extract the zip
        try {
            $zip = new ZipArchive();
            if ($zip->open($finalPath) === TRUE) {
                $zip->extractTo(base_path());
                $zip->close();
            } else {
                return response()->json(['error' => __('version_1_1.failed_to_extract_zip')], 500);
            }

            $this->mergeUpdatedLanguages();

            $updateInfoPath = base_path('update.json');
            if (File::exists($updateInfoPath)) {
                $info = json_decode(File::get($updateInfoPath), true);

                if (!empty($info['migrations'])) {
                    Artisan::call('migrate', ['--force' => true]);
                }

                if(!empty($info['seeders'])) {
                    foreach ($info['seeders'] as $seeder) {
                        Artisan::call('db:seed', ['--class' => $seeder, '--force' => true]);
                    }
                }

                if (!empty($info['commands']) && is_array($info['commands'])) {
                    foreach ($info['commands'] as $cmd) {
                        try {

                            \Log::info("Running artisan command: {$cmd}");

                            Artisan::call($cmd);

                            $output = Artisan::output();
                            \Log::info("Output for {$cmd}:\n" . $output);
                        } catch (\Throwable $e) {
                            \Log::error("Failed artisan command: {$cmd} — " . $e->getMessage());
                        }
                    }
                }

                Artisan::call('optimize:clear'); // Clear caches after update

                if (!empty($info['version'])) {
                    File::put(base_path('version.txt'), $info['version']);
                }
            }

            return response()->json(['success' => true, 'message' => __('version_1_1.app_updated', ['version' => $info['version'] ?? 'unknown'])]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    protected function mergeUpdatedLanguages()
    {
        $updateLangPath = base_path('updated_languages');
        $existingLangPath = base_path('resources/lang');

        if (!File::isDirectory($updateLangPath)) {
            return;
        }

        try {

            $locales = File::directories($updateLangPath);

            foreach ($locales as $localePath) {
                $locale = basename($localePath);
                $existingLocalePath = "{$existingLangPath}/{$locale}";

                if (!File::isDirectory($existingLocalePath)) {
                    File::makeDirectory($existingLocalePath, 0755, true);
                }

                $files = File::files($localePath);

                foreach ($files as $file) {
                    $filename = $file->getFilename();
                    $newFilePath = $file->getRealPath();


                    $newData = include $newFilePath;
                    if (!is_array($newData)) $newData = [];


                    $existingFile = "{$existingLocalePath}/{$filename}";
                    $existingData = File::exists($existingFile)
                        ? include $existingFile
                        : [];


                    $merged = array_replace_recursive($newData, $existingData);


                    $export = var_export($merged, true);
                    File::put($existingFile, "<?php\n\nreturn {$export};\n");
                }
            }

            File::deleteDirectory($updateLangPath);

            \Log::info('Language update completed and updated_languages folder removed.');

        } catch (\Throwable $e) {
            \Log::error('Language merge failed: ' . $e->getMessage());
        }
    }

}
