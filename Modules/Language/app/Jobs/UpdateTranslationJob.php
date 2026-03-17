<?php

namespace Modules\Language\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateTranslationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        protected string $oldLangCode,
        protected string $newLangCode,
        protected string $modelClass
    ) {}

    public function handle(): void
    {
        $updatedCount = $this->modelClass::where('locale', $this->oldLangCode)
            ->update(['locale' => $this->newLangCode]);

        Log::info("Updated {$updatedCount} translation records for {$this->modelClass} from {$this->oldLangCode} to {$this->newLangCode} via queue.");
    }
}
