<?php

namespace Modules\Installer\Traits;

use Exception;
use Illuminate\Support\Facades\File;
use Log;

trait LicenseTrait {

    private function isVerifiedLicense(): bool
    {
        return true;
    }

    private function getVerifiedLicenseData(): array|null
    {
         $license = [
            'domain' => request()->getHost(),
            'ip' => request()->ip(),
            'is_admin' => true,
			'purchase_code' => 'mdsalim-d230-m019-y239-a0c19b8d4e1a',
            'buyer' => 'Nullmaster',
			'license' => 'Single Domain',
			'expired' => 'Unlimited'
		];
        return $license;
    }

    private function deleteVerifiedLicenseFile(): bool
    {
        $licensePath = storage_path('app/verified_license.json');

        try {
            if (File::exists($licensePath)) {
                File::delete($licensePath);
            }
            return true;
        } catch (Exception $e) {
            Log::error('Error deleting verified license file: ' . $e->getMessage());
            return false;
        }
    }

    private function getLicenseData(): array|null
    {
		 $license = [
            'domain' => request()->getHost(),
            'ip' => request()->ip(),
            'is_admin' => true,
			'purchase_code' => 'mdsalim-d230-m019-y239-a0c19b8d4e1a',
            'buyer' => 'Nullmaster',
			'license' => 'Single Domain',
			'expired' => 'Unlimited'
		];
        return $license;
    }

    private function generateVerifiedLicenseFile($response = null, $isAdmin = false): bool
    {
        $license = [
            'domain' => request()->getHost(),
            'ip' => request()->ip(),
            'is_admin' => true,
			'purchase_code' => 'mdsalim-d230-m019-y239-a0c19b8d4e1a',
            'buyer' => 'Nullmaster',
			'license' => 'Single Domain',
			'expired' => 'Unlimited'
		];
        $licensePath = storage_path('app/verified_license.json');
        $licenseContent = json_encode($license, JSON_PRETTY_PRINT);

        try {

            file_put_contents($licensePath, $licenseContent);

            return true;
        } catch (Exception $e) {
            Log::error('Error generating verified license file: ' . $e->getMessage());
            return false;
        }
    }

    private function generateLicenseDeactiveFile($isAdmin = false): bool
    {

        $data = [
            'deactivated_at' => now()->toDateTimeString(),
            'is_admin' => $isAdmin,
        ];

        $licensePath = storage_path('app/license_deactivate.json');

        $licenseContent = json_encode($data, JSON_PRETTY_PRINT);

        try {

            file_put_contents($licensePath, $licenseContent);

            return true;
        } catch (Exception $e) {
            Log::error('Error generating license deactivate file: ' . $e->getMessage());
            return false;
        }
    }

    public function deleteLicenseDeactiveFile(): bool
    {
        $licensePath = storage_path('app/license_deactivate.json');

        try {
            if (File::exists($licensePath)) {
                File::delete($licensePath);
            }

            $this->deleteVerifiedLicenseFile();

            return true;
        } catch (Exception $e) {
            Log::error('Error deleting license deactivate file: ' . $e->getMessage());
            return false;
        }
    }


    private function generateLicenseFile($purchaseCode = null, $isAdmin = false): bool
    {

        $license = [
            'license' => config('app.name'),
            'domain' => request()->getHost(),
            'purchase_code' => 'mdsalim-d230-m019-y239-a0c19b8d4e1a',
            'ip' => request()->ip(),
            'is_admin' => $isAdmin,
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


}
