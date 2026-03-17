<?php

namespace Modules\Language\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DeleteTranslationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        protected string $langCode,
        protected string $modelClass
    ) {}

    public function handle(): void
    {
        $deletedCount = $this->modelClass::where('locale', $this->langCode)->delete();

        Log::info("Deleted {$deletedCount} translation records for {$this->modelClass} in language {$this->langCode} via queue.");
    }
}
