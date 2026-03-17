<?php

namespace Modules\Translation\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Modules\Language\Models\Language;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Modules\Translation\Http\Requests\TranslationRequest;

class TranslationController extends Controller implements HasMiddleware
{

    public static function middleware(){
        return [
            new Middleware('permission:translation-show', ['index', 'show']),
            new Middleware('permission:translation-edit', ['update','edit']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index($code)
    {

        $language = Language::select('name')->where('code', $code)->first();
        $files = File::glob(resource_path("lang/{$code}/*.php"));
   
        // retrieve the file name without the extension
        $files = array_map(fn($file) => pathinfo($file, PATHINFO_FILENAME), $files);

        $files = core_paginate($files, 20);


        return view('translation::index', compact('files', 'code', 'language'));
    }


    public function show(Request $request, $lang, $file)
    {
        $filePath = resource_path("lang/{$lang}/{$file}.php");

        // Load translations from the file
        if (File::exists($filePath)) {
            $translations = include $filePath;
        } else {
            $translations = [];
        }

        // Get the search query
        $searchQuery = Str::of($request->search)->trim()->lower();

        // Filter translations if search query exists
        if ($searchQuery) {
            $translations = array_filter($translations, function ($value, $key) use ($searchQuery) {

                $value = Str::of($value)->trim()->lower();
                $key = Str::of($key)->trim()->lower();

                return str_contains($key, $searchQuery) || str_contains($value, $searchQuery);
            }, ARRAY_FILTER_USE_BOTH);
        }

        // Paginate the filtered translations
        $translations = core_paginate($translations, 20);

        return view('translation::show', compact('translations', 'lang', 'file', 'searchQuery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $file)
    {
        $filePath = resource_path("lang/en/{$file}.php");

        // Load translations from the file
        if (File::exists($filePath)) {
            $translations = include $filePath;
        } else {
            $translations = [];
        }

        // Get the search query
        $searchQuery = Str::of($request->search)->trim()->lower();

        // Filter translations if search query exists
        if ($searchQuery) {
            $translations = array_filter($translations, function ($value, $key) use ($searchQuery) {

                $value = Str::of($value)->trim()->lower();
                $key = Str::of($key)->trim()->lower();

                return str_contains($key, $searchQuery) || str_contains($value, $searchQuery);
            }, ARRAY_FILTER_USE_BOTH);
        }

        // Paginate the filtered translations
        $translations = core_paginate($translations, 20);

        return view('translation::show', compact('translations', 'file', 'searchQuery'));
    }


    public function update(TranslationRequest $request)
    {
        
        $filePath = resource_path("lang/{$request->lang}/{$request->file}.php");


        if (!File::exists($filePath)) {
            return response()->json(['error' => __('notification.file_not_found')], 404);
        }

        $translations = include $filePath;

        if (array_key_exists($request->key, $translations)) {
            $translations[$request->key] = $request->value;
            
            $content = "<?php\n\nreturn ".var_export($translations, true).";\n";
            
            $path = resource_path("lang/$request->lang/$request->file.php");

            File::put($path, $content);

            if(File::exists($path)){
                return response()->json(['success' => __('notification.translation_updated_successfully')], 200);
            }
        }

        return response()->json(['error' => __('notification.key_not_found')], 400);
    }

}
