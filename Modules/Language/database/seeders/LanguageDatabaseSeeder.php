<?php

namespace Modules\Language\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Modules\Language\Models\Language;

class LanguageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        $languages = [
            [
                'name' => 'English',
                'code' => 'en',
                'direction' => 'ltr',
                'flag' => null,
                'status' => true,
                'is_default' => true,
            ],
            [
                'name' => 'Hindi',
                'code' => 'hi',
                'direction' => 'ltr',
                'flag' => null,
                'status' => true,
                'is_default' => false,
            ],
            [
                'name' => 'Arabic',
                'code' => 'ar',
                'direction' => 'rtl',
                'flag' => null,
                'status' => true,
                'is_default' => false,
            ],
        ];

        foreach ($languages as $language) {
            Language::create($language);

            if ($language['code'] !== 'en') {
                $source = resource_path("lang/en");
                $destination = resource_path("lang/{$language['code']}");

                // Only copy if destination doesn't already exist
                if (!File::exists($destination)) {
                    File::copyDirectory($source, $destination);
                }
            }
        }
    }
}
