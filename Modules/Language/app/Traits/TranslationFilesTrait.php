<?php

namespace Modules\Language\Traits;

use Illuminate\Support\Facades\File;

trait TranslationFilesTrait 
{
    protected function getTranslationFilePath(string $lang, string $file): string
    {
        return resource_path("lang/{$lang}/{$file}.php");
    }

    protected function loadTranslations(string $lang, string $file): array
    {
        $filePath = $this->getTranslationFilePath($lang, $file);
        return File::exists($filePath) ? include $filePath : [];
    }

    protected function saveTranslations(string $lang, string $file, array $translations): bool
    {
        $filePath = $this->getTranslationFilePath($lang, $file);
        $content = "<?php\n\nreturn " . var_export($translations, true) . ";\n";
        File::put($filePath, $content);
        return File::exists($filePath);
    }

    protected function getLanguageFiles(string $lang): array
    {
        $files = File::glob(resource_path("lang/{$lang}/*.php"));

        return array_map(fn($file) => pathinfo($file, PATHINFO_FILENAME), $files);
    }

    protected function copyLanguageFiles(string $sourceLang, string $destLang): void
    {
        $source = resource_path("lang/en");
        $destination = resource_path("lang/{$destLang}");

        if (!File::exists($destination)) {
            File::makeDirectory($destination, 0755, true);
        }

        foreach (File::allFiles($source) as $file) {
            File::copy($file, $destination . '/' . $file->getFilename());
        }
    }

    protected function renameLanguageFolder(string $oldCode, string $newCode): void
    {
        $oldPath = resource_path("lang/{$oldCode}");
        $newPath = resource_path("lang/{$newCode}");

        if (File::exists($oldPath)) {
            File::copyDirectory($oldPath, $newPath);
            File::deleteDirectory($oldPath);
        }
    }

    protected function deleteLanguageFolder(string $code): void
    {

        if ($code === 'en') return;

        $path = resource_path("lang/{$code}");
        if (File::exists($path)) {
            File::deleteDirectory($path);
        }
    }
}
