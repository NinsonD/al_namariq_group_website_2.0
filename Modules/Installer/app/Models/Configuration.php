<?php

namespace Modules\Installer\Models;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Configuration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['key', 'value'];


    public static function getSetupStatus()
    {
        return self::where('key', 'setup_status')->first()->value ?? null;
    }

    public static function checkSetupStatus($status)
    {

        return self::where('key', 'setup_status')->where('value', $status)->exists();
    }


    public static function updateSetupStatus($status)
    {
        try {
            return self::where('key', 'setup_status')->firstOrFail()->update(['value' => $status]) ? true : false;
        } catch (\Exception $e) {
            Log::error('Error updating setup status: ' . $e->getMessage());
            return false;
        }
    }

    public static function updateInstallationStatus($status)
    {
        try {
            return self::where('key', 'is_installed')->firstOrFail()->update(['value' => $status]) ? true : false;
        } catch (\Exception $e) {
            Log::error('Error updating installation status: ' . $e->getMessage());
            return false;
        }
    }
}
