<?php

namespace Modules\Language\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Language\Models\Language;
use Modules\Language\Enums\ModelSyncType;
use Modules\Language\Enums\CountriesDataEnum;
use Modules\Language\Traits\TranslationFilesTrait;
use Modules\Language\Traits\TranslationSyncTrait;
use Modules\Language\Http\Requests\LanguageRequest;

class LanguageController extends Controller
{
    use TranslationFilesTrait, TranslationSyncTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::latest()->paginate(15);
        return view('language::index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingLanguages = Language::pluck('code')->toArray();

        $languages = CountriesDataEnum::loadLanguages();

        $languages = $languages->reject(fn($language) => in_array($language->code, $existingLanguages));

        return view('language::create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LanguageRequest $request)
    {
        $languageDir = CountriesDataEnum::getLanguageDir($request->code);

        $data = $request->validated();
        $data['direction'] = $languageDir;

        $language = Language::create($data);
        if ($language) {

            $defaultCode = Language::getDefaultLanguage()->code ?? 'en';
            $newCode = $language->code;
            $this->copyLanguageFiles($defaultCode, $newCode);

            // sync modals for new language
            $this->handleLanguageSync(
                ModelSyncType::CREATE->value,
                $newCode,
                null,
                false,
            );

            resetLanguagesCache();

            return redirect()->route('admin.languages.index')->with('success', __('notification.created', ['field' => __('admin.language')]));
        }

        return redirect()->back()->with('error', __('notification.failed', ['field' => __('admin.language')]));

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        $existingLanguages = Language::whereNot('code', $language->code)->pluck('code')->toArray();

        $languages = CountriesDataEnum::loadLanguages();

        $languages = $languages->reject(fn($language) => in_array($language->code, $existingLanguages));

        return view('language::edit', compact('language', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LanguageRequest $request ,Language $language)
    {

        $oldCode = $language->code;
        $newCode = $request->code;

        $direction = CountriesDataEnum::getLanguageDir($newCode);
        $language->update(array_merge(['direction' => $direction], $request->validated()));


        if ($language && ($oldCode !== $newCode) && ($newCode !== 'en')) {
            $this->renameLanguageFolder($oldCode, $newCode);
        }

        $this->handleLanguageSync(
            ModelSyncType::UPDATE->value,
            $newCode,
            $oldCode,
            $this->isSyncQuable()
        );

        return redirect()->route('admin.languages.index')->with('success', __('notification.updated', ['field' => __('admin.language')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        if ($language->is_default) {
            return redirect()->back()->with('error', __('notification.cannot_delete_default_language'));
        }

        if ($language->code === 'en') {
            return redirect()->back()->with('error', __('notification.cant_delete_default_english_language'));
        }

        $this->deleteLanguageFolder($language->code);

        $language->delete();

        $this->handleLanguageSync(
            ModelSyncType::DELETE->value,
            $language->code
        );

        resetLanguagesCache();

        return redirect()->route('admin.languages.index')->with('success', __('notification.deleted', ['field' => __('admin.language')]));
    }

    public function updateStatus(Language $language)
    {
        $column = request('column');

        if ($column === 'default') {
            if (!$language->status) {
                return response()->json([
                    'status' => false,
                    'message' => __('notification.cant_set_default_inactive_language'),
                ]);
            }

            // Unset previous default
            Language::where('is_default', true)->update(['is_default' => false]);

            // Set this language as default
            $language->is_default = true;
        }

        if ($column === 'status') {
            $newStatus = (bool) request('status');

            if ($language->is_default && !$newStatus) {
                return response()->json([
                    'status' => false,
                    'message' => __('notification.cant_set_default_inactive_language'),
                ]);
            }

            $language->status = !$language->status;
        }

        $language->save();

        return response()->json([
            'status' => true,
            'message' => __('notification.status_updated', ['field' => __('admin.language')]),
        ]);
    }
}
