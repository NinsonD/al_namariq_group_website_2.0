<?php

namespace Modules\Installer\Http\Controllers;

use Cache;
use App\Traits\FileTrait;
use App\Http\Controllers\Controller;
use Modules\Installer\Enums\DatabaseResponseEnum;
use Modules\Installer\Http\Requests\AdminCreateRequest;
use Modules\Installer\Http\Requests\ConfigurationRequest;
use Modules\Installer\Http\Requests\DatabaseRequest;
use Modules\Installer\Http\Requests\SmtpRequest;
use Modules\Installer\Models\Configuration;
use Modules\Installer\Traits\InstallerTrait;

class InstallerController extends Controller
{
    use InstallerTrait;
    use FileTrait;

    public function welcome()
    {

        if(!$this->licenseExists()){
            session()->invalidate();
            session()->regenerateToken();
        }

        return view('installer::welcome');
    }


    public function requirements()
    {
        [$checks, $success, $failedChecks] = $this->checkSystemRequirements();

        return view('installer::requirements', compact('checks', 'success', 'failedChecks'));
    }

    public function database()
    {
        return view('installer::database');
    }

    public function databaseSetup(DatabaseRequest $request)
    {

        $validated = $request->validated();
        $validated['reset_database'] = $request->has('reset_database') ? true : false;


        $response = $this->establishDatabaseConnection($validated);

        if($response == DatabaseResponseEnum::DATABASE_CONNECTION_SUCCESS->value || $response == DatabaseResponseEnum::RESET_DATABASE->value) {
            $seedStatus = $this->setupDatabase($validated);

            if($seedStatus === true){
                session()->put('database_migrated', true);

                Configuration::updateSetupStatus(3);

                return response()->json([
                    'status' => true,
                    'type' => DatabaseResponseEnum::DATABASE_MIGRATION_SUCCESS->value,
                    'redirect_url' => route('installer.account'),
                    'message' => __('notification.successfully_migrated'),
                ], 200);
            }else{
                return response()->json([
                'status' => false,
                'type' => DatabaseResponseEnum::DATABASE_MIGRATION_FAILED->value,
                'message' => __('notification.migration_failed'),
            ], 500);
            }
        }
        elseif($response == DatabaseResponseEnum::DATABASE_NOT_FOUND->value){
            return response()->json([
                'status' => false,
                'type' => DatabaseResponseEnum::DATABASE_NOT_FOUND->value,
                'message' => __('notification.database_connection_failed'),
            ], 500);
        }
        elseif($response == DatabaseResponseEnum::TABLE_EXISTS->value){
            return response()->json([
                'status' => false,
                'type' => DatabaseResponseEnum::TABLE_EXISTS->value,
                'message' => __('notification.database_table_exists'),
            ], 500);
        }
        elseif($response == DatabaseResponseEnum::CONNECTION_FAILED->value){
            return response()->json([
                'status' => false,
                'type' => DatabaseResponseEnum::CONNECTION_FAILED->value,
                'message' => __('notification.database_connection_failed'),
            ], 500);
        }

        return response()->json([
                    'status' => false,
                    'type' => 'unknown_error',
                    'message' => __('notification.unknown_error'),
                ], 500);
    }

    public function account()
    {

        if(Configuration::getSetupStatus() < 3) {
            return redirect()->route('installer.database');
        }

        return view('installer::account');
    }

    public function accountSetup(AdminCreateRequest $request)
    {
        $admin = $this->createAdmin($request->validated());

        if (!$admin) {
            session()->forget('account');
            return redirect()->back()->with('error', __('notification.failed_to_create_admin'));
        }

        Configuration::updateSetupStatus(4);
        session()->put('account', true);

        return redirect()->route('installer.configuration');
    }

    public function configuration()
    {
        if(Configuration::getSetupStatus() < 4) {
            return redirect()->route('installer.account');
        }

        return view('installer::configuration');
    }

    public function configurationSetup(ConfigurationRequest $request)
    {

        updateMultiEnv([
            'APP_NAME' => $request->app_name,
            'APP_TIMEZONE' => $request->timezone,
        ]);

        updateSettings('app_name', $request->app_name);
        updateSettings('timezone', $request->timezone);

        Configuration::updateSetupStatus(5);

        Cache::forget('setting');

        session()->flush();
        session()->flash('configuration', true);
        session()->flash('database', true);
        session()->flash('account', true);
        session()->flash('license', true);

        return redirect()->route('installer.smtp');
    }

    public function smtp()
    {
        if(Configuration::getSetupStatus() < 5) {
            return redirect()->route('installer.configuration');
        }

        return view('installer::smtp');
    }

    public function smtpSkip()
    {
        session()->flush();
        session()->flash('requirements', true);
        session()->flash('configuration', true);
        session()->flash('database', true);
        session()->flash('account', true);
        session()->flash('license', true);

        session()->flash('smtp', true);
        Configuration::updateSetupStatus(6);
        return redirect()->route('installer.complete');
    }

    public function smtpSetup(SmtpRequest $request)
    {
        $data = $request->validated();

        updateMultiEnv([
            'MAIL_HOST' => $data['mail_host'],
            'MAIL_PORT' => $data['mail_port'],
            'MAIL_USERNAME' => $data['smtp_username'],
            'MAIL_PASSWORD' => $data['smtp_password'],
            'MAIL_ENCRYPTION' => $data['mail_encryption'],
            'MAIL_FROM_ADDRESS' => $data['mail_sender_email'],
            'MAIL_FROM_NAME' => $data['mail_sender_name'],
        ]);

        updateSettings('mail_host', $request->mail_host);
        updateSettings('mail_username', $request->smtp_username);
        updateSettings('mail_password', $request->smtp_password);
        updateSettings('mail_port', $request->mail_port);
        updateSettings('mail_encryption', $request->mail_encryption);
        updateSettings('mail_sender_email', $request->mail_sender_email);
        updateSettings('mail_sender_name', $request->mail_sender_name);

        session()->flush();
        session()->flash('requirements', true);
        session()->flash('configuration', true);
        session()->flash('database', true);
        session()->flash('account', true);
        session()->flash('license', true);
        session()->flash('smtp', true);

        Configuration::updateSetupStatus(6);

        return redirect()->route('installer.complete');
    }

    public function complete()
    {
        session()->flush();
        session()->flash('requirements', true);
        session()->flash('configuration', true);
        session()->flash('database', true);
        session()->flash('account', true);
        session()->flash('license', true);
        session()->flash('smtp', true);
        session()->put('complete', true);

        if(Configuration::checkSetupStatus(6)){

            Configuration::updateInstallationStatus(1);
            Configuration::updateSetupStatus(7);

            updateMultiEnv([
                'APP_ENV' => 'production',
                'APP_DEBUG' => 'false',
            ]);

            return view('installer::complete');
        }

        if(Configuration::checkSetupStatus(7)) {
            return redirect()->route('home');
        }

        if(Configuration::getSetupStatus() < 6) {
            return redirect()->route('installer.smtp');
        }

        return redirect()->back()->with('error', __('notification.something_went_wrong'));

    }
}
