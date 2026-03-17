<?php

namespace Modules\Language\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Language\Traits\TranslationSyncTrait;

class CreateTranslationJob implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels,  TranslationSyncTrait;

    public function __construct(
        protected string $baseLang,
        protected string $targetLang,
        protected string $modelClass
    ) {}

    public function handle(): void
    {
        $excludedFields = $this->fetchIgnoredFields();
        $sourceRecords = $this->modelClass::where('locale', $this->baseLang)->get();
        $createdCount = 0;

        foreach ($sourceRecords as $record) {
            if (!$this->modelClass::where(['id' => $record->id, 'locale' => $this->targetLang])->exists()) {
                $newRecord = new $this->modelClass();

                foreach ($record->getAttributes() as $field => $value) {
                    if (!in_array($field, $excludedFields)) {
                        $newRecord->$field = $value;
                    }
                }

                $newRecord->locale = $this->targetLang;
                $newRecord->save();
                $createdCount++;
            }
        }

        Log::info("Created {$createdCount} translation records for {$this->modelClass} in language {$this->targetLang} via queue.");
    }
}
