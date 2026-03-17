<?php

namespace Modules\Language\Traits;


use Illuminate\Support\Facades\Schema;
use Modules\Language\Models\Language;
use Modules\Language\Enums\ModelSyncType;
use Modules\Language\Enums\TranslatableModels;
use Modules\Language\Jobs\CreateTranslationJob;
use Modules\Language\Jobs\DeleteTranslationJob;
use Modules\Language\Jobs\UpdateTranslationJob;
use Str;

trait TranslationSyncTrait
{

    public function fetchTranslatableModels(): array
    {
        return TranslatableModels::all();
    }

    public function fetchIgnoredFields(): array
    {
        return TranslatableModels::retriveIgnoreCols();
    }

    public function isSyncQuable(): bool
    {
        return getSettingStatus('is_queueable') ?? false;
    }

    public function handleLanguageSync(string $actionType, string $languageCode, ?string $previousCode = null, bool $dispatchQueue = false): bool
    {
        return match($actionType) {
            ModelSyncType::CREATE->value => $dispatchQueue
                ? $this->enqueueCreationJobs($languageCode)
                : $this->synchronizeNewLanguage($languageCode),

            ModelSyncType::UPDATE->value => $previousCode && $dispatchQueue
                ? $this->enqueueUpdateJobs($previousCode, $languageCode)
                : $this->synchronizeUpdatedLanguage($previousCode, $languageCode),

            ModelSyncType::DELETE->value => $dispatchQueue
                ? $this->enqueueDeletionJobs($languageCode)
                : $this->removeLanguageTranslations($languageCode),

            default => false,
        };
    }

    private function synchronizeNewLanguageOld(string $targetCode): bool
    {
        $defaultLangCode = Language::where('is_default', true)->value('code') ?? 'en';
        $models = $this->fetchTranslatableModels();
        $excludedFields = $this->fetchIgnoredFields();

        foreach ($models as $modelClass) {
            $baseRecords = $modelClass::where('locale', $defaultLangCode)->get();

            foreach ($baseRecords as $record) {

                $foreignKey = null;

                if (method_exists($record, 'section')) {
                    $foreignKey = $record->section()->getForeignKeyName();
                } elseif (property_exists($record, 'blog')) {
                    $foreignKey = $record->blog()->getForeignKeyName();
                }

                if (!$foreignKey || !$record->$foreignKey) continue;

                $foreignKeyValue = $record->$foreignKey;

                $exists = $modelClass::where($foreignKey, $foreignKeyValue)
                    ->where('locale', $targetCode)
                    ->exists();

                if ($exists) continue;

                $newRecord = new $modelClass();

                foreach ($record->getAttributes() as $field => $value) {
                    if (
                        !in_array($field, $excludedFields) &&
                        $field !== 'id'
                    ) {
                        $newRecord->$field = $value;
                    }
                }

                $newRecord->$foreignKey = $foreignKeyValue;
                $newRecord->locale = $targetCode;
                $newRecord->save();
            }

        }

        return true;
    }

    private function synchronizeNewLanguage(string $targetCode): bool
    {
        $defaultLangCode = Language::where('is_default', true)->value('code') ?? 'en';
        $models = $this->fetchTranslatableModels();
        $excludedFields = $this->fetchIgnoredFields();

        foreach ($models as $modelClass) {
            if (!Schema::hasColumn((new $modelClass)->getTable(), 'locale')) {
                continue;
            }

            $baseRecords = $modelClass::where('locale', $defaultLangCode)->get();

            if ($baseRecords->isEmpty()) {
                continue;
            }

            foreach ($baseRecords as $record) {
                $foreignKey = null;

                // Try known relationships
                if (method_exists($record, 'section')) {
                    $foreignKey = $record->section()->getForeignKeyName();
                } elseif (method_exists($record, 'blog')) {
                    $foreignKey = $record->blog()->getForeignKeyName();
                }

                if (!$foreignKey) {
                    $foreignKey = Str::snake(str_replace('Translation', '', class_basename($modelClass))) . '_id';
                }

                if (!isset($record->$foreignKey) || !$record->$foreignKey) {
                    continue;
                }

                $foreignKeyValue = $record->$foreignKey;

                $exists = $modelClass::where($foreignKey, $foreignKeyValue)
                    ->where('locale', $targetCode)
                    ->exists();

                if ($exists) continue;

                $newRecord = new $modelClass();

                foreach ($record->getAttributes() as $field => $value) {
                    if (!in_array($field, $excludedFields)) {
                        $newRecord->$field = $value;
                    }
                }

                $newRecord->$foreignKey = $foreignKeyValue;
                $newRecord->locale = $targetCode;
                $newRecord->save();

            }
        }

        return true;
    }




    private function enqueueCreationJobs(string $targetCode): bool
    {
        $defaultLangCode = Language::where('is_default', true)->value('code') ?? 'en';
        foreach ($this->fetchTranslatableModels() as $modelClass) {
            dispatch(new CreateTranslationJob($defaultLangCode, $targetCode, $modelClass));
        }
        return true;
    }

    private function synchronizeUpdatedLanguage(string $oldCode, string $newCode): bool
    {
        $models = $this->fetchTranslatableModels();

        foreach ($models as $modelClass) {
            $modelClass::where('locale', $oldCode)->update(['locale' => $newCode]);
        }

        return true;
    }

    private function enqueueUpdateJobs(string $oldCode, string $newCode): bool
    {
        foreach ($this->fetchTranslatableModels() as $modelClass) {
            dispatch(new UpdateTranslationJob($oldCode, $newCode, $modelClass));
        }
        return true;
    }

    private function removeLanguageTranslations(string $code): bool
    {
        foreach ($this->fetchTranslatableModels() as $modelClass) {
            $modelClass::where('locale', $code)->delete();
        }
        return true;
    }

    private function enqueueDeletionJobs(string $code): bool
    {
        foreach ($this->fetchTranslatableModels() as $modelClass) {
            dispatch(new DeleteTranslationJob($code, $modelClass));
        }
        return true;
    }
}
