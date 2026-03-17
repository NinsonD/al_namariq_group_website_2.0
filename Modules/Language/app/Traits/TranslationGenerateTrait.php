<?php

namespace Modules\Language\Traits;

use Exception;
use Illuminate\Support\Facades\Log;
use Modules\Language\Models\Language;
use Modules\Language\Enums\translatableModels;

trait TranslationGenerateTrait
{
    /**
     * Generate translations for a model.
     *
     * @param TranslatableModels $translatableModel
     * @param object $model
     * @param string $forignKey
     * @param object $request
     * @param array $customFields
     * @param string|null $translatableModelCustom
     * @return void
     */
    protected function generateTranslations(
        TranslatableModels $translatableModel,
        object $model,
        string $forignKey,
        object $request,
        array $customFields = [],
        ?string $translatableModelCustom = null,
    ): void {
        $translationClass = $translatableModelCustom ?? $translatableModel->value;

        $languages = Language::all();

        try {
            $validatedData = $request->validated();
        } catch (Exception $e) {
            Log::error("Translation validation failed: " . $e->getMessage());
            $validatedData = $request->all();
        }

        $activeLangCode = $request->code ?? $request->locale ?? '';

        foreach ($languages as $language) {
            $translationInstance = new $translationClass();
            $translationInstance->locale = $language->code;
            $translationInstance->$forignKey = $model->id;
            $translationInstance->fill($validatedData);

            foreach ($customFields as $fieldKey => $fieldValue) {
                $translationInstance->$fieldKey = $language->code === $activeLangCode
                    ? $fieldValue
                    : ($this->tryTranslate($fieldValue) ?? $fieldValue);
            }

            $translationInstance->save();
        }
    }

    /**
     * Update translation for a model.
     *
     * @param object $model
     * @param object $request
     * @param array $validatedData
     * @param array $customFields
     * @return void
     */
    protected function updateTranslations(
        object $model,
        object $request,
        array $validatedData,
        array $customFields = []
    ): void {
        $langCode = $request->code ?? 'en';

        foreach ($customFields as $fieldKey => $fieldValue) {
            $validatedData[$fieldKey] = $fieldValue;
        }

        $translation = $model->translations()->where('locale', $langCode)->first();

        if ($translation) {
            $translation->update($validatedData);
        } else {
            $model->translations()->create(array_merge(['locale' => $langCode], $validatedData));
        }
    }

    /**
     * Dummy translator logic (to be replaced with real translation if needed).
     *
     * @param string $text
     * @return string|null
     */
    private function tryTranslate(string $text): ?string
    {
        return null;
    }
}
