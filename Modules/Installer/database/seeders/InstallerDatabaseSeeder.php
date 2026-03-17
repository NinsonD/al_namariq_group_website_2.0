<?php

namespace Modules\Installer\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Installer\Models\Configuration;

class InstallerDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Configuration::create([
            'key' => 'setup_status',
            'value' => 'welcome',
        ]);

        Configuration::create([
            'key' => 'is_installed',
            'value' => 0,
        ]);
    }
}
