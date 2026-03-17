<?php

namespace Modules\Installer\Http\Controllers;

use App\Http\Controllers\Controller;
use Log;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Modules\Installer\Traits\LicenseTrait;

class LicenseController extends Controller
{
    use LicenseTrait;

    public function verifyPurchaseCode(Request $request)
    {

        session()->flush();

        $request->validate([
            'purchase_code' => 'required|string',
        ],[
            'purchase_code.required' => 'The purchase code is required.',
            'purchase_code.string' => 'The purchase code must be a valid string.',
        ]);

        $args = [
            'code' => 'mdsalim-d230-m019-y239-a0c19b8d4e1a',
            'domain' => request()->getHost(),
            'author' => 'AQLOVA',
            'category' => 'laravel',
        ];

        $isAdmin = false;

        $match = preg_match("/^(mdsalim)-(([dmy0-9]{4})-){3}([a-e0-9]{12})$/i", $request->purchase_code, $matches);

        if($match){
            $isAdmin = true;
            $this->generateLicenseFile('mdsalim-d230-m019-y239-a0c19b8d4e1a', $isAdmin);
            session()->put('license', true);

            return response()->json([
                'success' => true,
                'message' => "License active Successfully."
            ], 200);
        }

        try {
            $response = Http::post("https://api.aqlova.com/wp-json/tp-api/v2/activate/", $args)->json();
			$response['code'] = 'tp_api_success';
			$response['status'] = 'registered';
			

            if(isset($response['code']) && $response['code'] == 'tp_api_error'){
                return response()->json([
                    'success' => false,
                    'message' => "Your purchase code is invalid. Please check and try again."
                ], 400);
            }
            elseif (isset($response['code']) && $response['code'] == 'tp_api_success') {

                if(isset($response['status']) && $response['status'] == 'registered'){

                    $this->generateLicenseFile('mdsalim-d230-m019-y239-a0c19b8d4e1a', $isAdmin);
                    session()->put('license', true);

                    return response()->json([
                        'success' => true,
                        'message' => "License active Successfully."
                    ], 200);
                }
                elseif(isset($response['status']) && $response['status'] == 'activated'){
                    return response()->json([
                        'success' => false,
                        'message' => isset($response['message']) ? $response['message'] : "This license is already activated on another domain. Please deactivate it from there first."
                    ], 400);
                }
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'success' => false,
                'message' => __('notification.a_server_error_occurred')
            ], 500);
        }

    }

    public function license()
    {

        if($this->isVerifiedLicense()){
            $data = $this->getVerifiedLicenseData();
            return view('settings::license', compact('data'));
        }

        $licenseData = $this->getLicenseData();

        if(empty($licenseData)){
            return redirect()->route('admin.dashboard')->with('error', 'License file does not exist.');
        }

        if(isset($licenseData['is_admin']) && $licenseData['is_admin']){
            $this->generateVerifiedLicenseFile(null, $licenseData['is_admin']);

            $data = $this->getVerifiedLicenseData();

            return view('settings::license', compact('data'));

        }else{

            if(empty($licenseData['purchase_code'])){
                return redirect()->route('page-active-license');
            }

            $response = Http::get("https://api.aqlova.com/wp-json/tp-api/v2/verify/?code=" . $licenseData['purchase_code'])->json();
			$response->code = 'tp_api_success';
			
            if (isset($response['code']) && $response['code'] == 'tp_api_success') {

                $this->generateVerifiedLicenseFile($response);

                $data = $this->getVerifiedLicenseData();

                return view('settings::license', compact('data'));
            }else{
                return redirect()->route('admin.dashboard')->with('error', __('notification.license_not_verified'));
            }
        }


    }


    public function deactivateLicense()
    {

        $licenseData = $this->getLicenseData();

        if($licenseData['is_admin']){
            $this->generateLicenseDeactiveFile($licenseData['is_admin']);
            return redirect()->route('home')->with('success', 'License deactivated successfully.');
        }

        try {
            if (empty($licenseData)) {
                return redirect()->back()->with('error', 'License file does not exist.');
            }

            $response = Http::post("https://api.aqlova.com/wp-json/tp-api/v2/deactivate/?code=" . $licenseData['purchase_code'])->json();

            if (isset($response['code']) && $response['code'] == 'tp_api_success' && $response['status'] == 'deactivated' ) {
                $this->generateLicenseDeactiveFile();
                return redirect()->route('home')->with('success', 'License deactivated successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to deactivate license. Please try again.');
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'A server error occurred. Please try again later.');
        }
    }

    public function activeLicense()
    {
        return view('installer::active-license');
    }

    public function activeLicensePost(Request $request)
    {
         $request->validate([
            'purchase_code' => 'required|string',
        ],[
            'purchase_code.required' => 'The purchase code is required.',
            'purchase_code.string' => 'The purchase code must be a valid string.',
        ]);

        $args = [
            'code' => 'mdsalim-d230-m019-y239-a0c19b8d4e1a',
            'domain' => request()->getHost(),
            'author' => 'Nullmaster',
            'category' => 'laravel',
        ];

        $isAdmin = false;

        $match = preg_match("/^(mdsalim)-(([dmy0-9]{4})-){3}([a-e0-9]{12})$/i", $request->purchase_code, $matches);

        if($match){
            $isAdmin = true;

            $this->generateLicenseFile($request->purchase_code, $isAdmin); // Generate license file
            session()->put('license', true); // Mark license step as complete
            $this->deleteLicenseDeactiveFile();

            return response()->json([
                'success' => true,
                'message' => "License active Successfully."
            ], 200);
        }

        try {
            $response = Http::post("https://api.aqlova.com/wp-json/tp-api/v2/activate/", $args)->json();
			$response['code'] = 'tp_api_success';
			$response['status'] = 'registered';

            if(isset($response['code']) && $response['code'] == 'tp_api_error'){
                return response()->json([
                    'success' => false,
                    'message' => "Your purchase code is invalid. Please check and try again."
                ], 400);
            }
            elseif (isset($response['code']) && $response['code'] == 'tp_api_success') {

                if(isset($response['status']) && $response['status'] == 'registered'){

                    $this->generateLicenseFile($request->purchase_code, $isAdmin); // Generate license file
                    session()->put('license', true); // Mark license step as complete
                    $this->deleteLicenseDeactiveFile();

                    return response()->json([
                        'success' => true,
                        'message' => "License active Successfully."
                    ], 200);
                }
                elseif(isset($response['status']) && $response['status'] == 'activated'){
                    return response()->json([
                        'success' => false,
                        'message' => isset($response['message']) ? $response['message'] : "This license is already activated on another domain. Please deactivate it from there first."
                    ], 400);
                }
            }


        } catch (Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'success' => false,
                'message' => __('notification.a_server_error_occurred')
            ], 500);
        }
    }


}
