<?php

namespace Modules\Installer\Traits;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Modules\Installer\Models\Configuration;
use Modules\Installer\Enums\DatabaseResponseEnum;

trait InstallerTrait
{

    public static function getSteps():array
    {
        return [
            'license' => [
                'title' => __('installer.welcome'),
            ],
            'requirements' => [
                'title' => __('installer.requirements'),

            ],
            'database' => [
                'title' => __('installer.database'),

            ],
            'account' => [
                'title' => __('installer.account'),

            ],
            'configuration' => [
                'title' => __('installer.configuration'),

            ],
            'smtp' => [
                'title' => __('installer.smtp'),

            ],
            'complete' => [
                'title' => __('installer.complete'),

            ],
        ];
    }

    private function isRequirementsPassed(): bool
    {
        [$checks, $success, $failedChecks] = $this->checkSystemRequirements();

        return $success;
    }

    private function checkSystemRequirements(): array
    {
        $checks = array_merge(
            $this->getBaseRequirementChecks(),
            $this->getExtensionRequirementChecks(),
            $this->getPermissionChecks()
        );

        $failedChecks = [];

        foreach ($checks as $key => $check) {
            if (!$check['check']) {
                $failedChecks[$key] = [
                    'message' => $check['message'],
                    'url'     => $check['url'] ?? null,
                ];
            }
        }

        $success = empty($failedChecks);

        return [$checks, $success, $failedChecks];
    }

    private function getBaseRequirementChecks(): array
    {
        return [
            'php_version' => [
                'check'   => PHP_VERSION_ID >= 80200,
                'message' => 'PHP version 8.2.0 or higher is required. Current version: ' . PHP_VERSION,
                'url'     => 'https://www.php.net/releases/8.2/en.php',
            ],
        ];
    }

    private function getExtensionRequirementChecks(): array
    {
        return [
            'extension_bcmath' => [
                'check'   => extension_loaded('bcmath'),
                'message' => 'The "bcmath" extension is required.',
                'url'     => 'https://www.php.net/manual/en/book.bc.php',
            ],
            'extension_ctype' => [
                'check'   => extension_loaded('ctype'),
                'message' => 'The "ctype" extension is required.',
                'url'     => 'https://www.php.net/manual/en/book.ctype.php',
            ],
            'extension_json' => [
                'check'   => extension_loaded('json'),
                'message' => 'The "json" extension is required.',
                'url'     => 'https://www.php.net/manual/en/book.json.php',
            ],
            'extension_mbstring' => [
                'check'   => extension_loaded('mbstring'),
                'message' => 'The "mbstring" extension is required.',
                'url'     => 'https://www.php.net/manual/en/book.mbstring.php',
            ],
            'extension_openssl' => [
                'check'   => extension_loaded('openssl'),
                'message' => 'The "openssl" extension is required.',
                'url'     => 'https://www.php.net/manual/en/book.openssl.php',
            ],
            'extension_pdo_mysql' => [
                'check'   => extension_loaded('pdo_mysql'),
                'message' => 'The "pdo_mysql" extension is required for MySQL database access.',
                'url'     => 'https://www.php.net/manual/en/ref.pdo-mysql.php',
            ],
            'extension_tokenizer' => [
                'check'   => extension_loaded('tokenizer'),
                'message' => 'The "tokenizer" extension is required.',
                'url'     => 'https://www.php.net/manual/en/book.tokenizer.php',
            ],
            'extension_xml' => [
                'check'   => extension_loaded('xml'),
                'message' => 'The "xml" extension is required.',
                'url'     => 'https://www.php.net/manual/en/book.simplexml.php',
            ],
            'extension_zip' => [
                'check'   => extension_loaded('zip'),
                'message' => 'The "zip" extension is required.',
                'url'     => 'https://www.php.net/manual/en/book.zip.php',
            ],
            'extension_php_intl' => [
                'check'   => extension_loaded('intl'),
                'message' => 'The "intl" extension is recommended for localization features.',
                'url'     => 'https://www.php.net/manual/en/book.intl.php',
            ],
        ];
    }


    private function getPermissionChecks(): array
    {
        return [
            'env_writable' => [
                'check'   => \File::isWritable(base_path('.env')),
                'message' => 'The ".env" file must be writable.',
            ],
            'storage_writable' => [
                'check'   => \File::isWritable(storage_path()) && \File::isWritable(storage_path('logs')),
                'message' => 'The "storage" and "storage/logs" directories must be writable.',
            ],
        ];
    }


    public function isAppInstalled(): bool
    {
        try {

            if(Schema::hasTable('configurations')){
                return Configuration::where('key', 'is_installed')->first()?->value == 0 ? false : true;
            }
            return false;

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return false;
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }


    private function licenseExists()
    {
        $licensePath = 'app/license.json';

        return File::exists(storage_path($licensePath)) ? true : false;
    }

    private function isLicenseDeactivated()
    {
        $licensePath = 'app/license_deactivate.json';

        return File::exists(storage_path($licensePath)) ? true : false;
    }

    private function generateLicenseFile($purchaseCode = null): bool
    {

        $license = [
            'license' => config('app.name'),
            'domain' => request()->getHost(),
            'purchase_code' => $purchaseCode,
            'ip' => request()->ip(),
        ];

        $licensePath = storage_path('app/license.json');
        $licenseContent = json_encode($license, JSON_PRETTY_PRINT);

        try {

            file_put_contents($licensePath, $licenseContent);

            return true;
        } catch (Exception $e) {
            Log::error('Error generating license file: ' . $e->getMessage());
            return false;
        }
    }


    private function clearConfigCache(): void
    {
        Artisan::call('config:clear');
    }


    private function setDatabaseCredentials(string $connection, array $details, ?string $database): void
    {
        Config::set("database.connections.$connection.host", $details['db_host']);
        Config::set("database.connections.$connection.port", $details['db_port']);
        Config::set("database.connections.$connection.database", $database);
        Config::set("database.connections.$connection.username", $details['db_username']);
        Config::set("database.connections.$connection.password", $details['db_password']);
        DB::reconnect($connection);
        DB::purge($connection);

    }

    private function databaseExists(string $database): bool
    {
        $result = DB::connection()->select('SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?', [$database]);
        return !empty($result);
    }

    private function databaseHasTables(): bool
    {
        return count(DB::select('SHOW TABLES')) > 0;
    }

    private function establishDatabaseConnection(array $details): string|bool
    {

        try {
            Artisan::call('config:clear');

            $connection = config('database.default');
            $this->setDatabaseCredentials($connection, $details, null);

            if (!$this->databaseExists($details['db_name'])) {
                $this->setDatabaseCredentials($connection, $details, $details['db_name']);
                return DatabaseResponseEnum::DATABASE_NOT_FOUND->value;
            }

            $this->setDatabaseCredentials($connection, $details, $details['db_name']);

            if ($this->databaseHasTables()) {
                return !empty($details['reset_database']) && $details['reset_database'] === true ? DatabaseResponseEnum::RESET_DATABASE->value : DatabaseResponseEnum::TABLE_EXISTS->value;
            }

            return true;
        } catch (Exception $e) {
            info($e->getMessage());
            return DatabaseResponseEnum::CONNECTION_FAILED->value;
        }

    }

    private function startDatabaseMigration(): bool
    {
        try {
            Artisan::call('migrate:fresh', [
                '--force'          => 'true',
                '--no-interaction' => true,
                '--seed'           => true,
            ]);

            return true;
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }


    private function setupDatabase($data)
    {

        try {
            $deleteDemoData = false;
            if(isset($data['database_seed']) && $data['database_seed'] == 'fresh') {
                $deleteDemoData = true;
                session()->put('fresh_install', true);
            }

            $migrateDatabase = $this->startDatabaseMigration();

            if(!$migrateDatabase) {
                return response()->json([
                    'status' => false,
                    'message' => __('notification.migration_failed'),
                ], 500);
            }

            updateMultiEnv([
                'DB_HOST' => $data['db_host'],
                'DB_PORT' => $data['db_port'],
                'DB_DATABASE' => $data['db_name'],
                'DB_USERNAME' => $data['db_username'],
                'DB_PASSWORD' => $data['db_password']
            ]);

            if($migrateDatabase && $deleteDemoData){
                $this->deleteDemoFiles();
            }

            session()->forget('fresh_install');

            session()->put('database', true);
            return true;
        } catch (Exception $e) {
            info($e->getMessage());
            return false;
        }
    }

    private function createAdmin(array $data): bool
    {
        try {
            $admin = User::where('type', 'admin')->where('username', 'super_admin')->first() ?? new User();
            $admin->name = $data['name'];
            $admin->email = $data['email'];
            $admin->username = 'super_admin';
            $admin->password = bcrypt($data['password']);
            $admin->type = 'admin';
            $admin->status = 1;
            $admin->designation = 'Super Admin';
            $admin->phone = '123 456 789';
            $admin->save();

            // get super admin role
            $superAdminRole = Role::where('name', 'super_admin')->first();

            $permissions = Permission::all();
            $superAdminRole->syncPermissions($permissions);

            $admin->assignRole($superAdminRole);

            return true;
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }

}
