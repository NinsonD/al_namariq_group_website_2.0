<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Traits\MailTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerifyUserController extends Controller
{
    use MailTrait;
    public function verify($token)
    {
        $user = User::where('verification_token', $token)->first();
        if ($user) {

            if ($user->email_verified_at != null) {
                $notification = __('frontend.email_already_verified');

                return redirect()->route('user.login')->with('error', $notification);
            }

            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->verification_token = null;
            $user->save();

            return redirect()->route('user.login')->with('success', __('frontend.email_verification_success'));
        } else {

            return redirect()->route('home')->with('error', __('frontend.invalid_token'));
        }
    }

    public function resendVerificationEmail()
    {
        $user = auth()->user();
        if ($user) {
            $user->email_verified_at = null;
            $user->verification_token = \Illuminate\Support\Str::random(100);
            $user->save();

            $this->sendVerifyMailSingleUser($user);

            return redirect()->back()->with('success', __('frontend.verification_email_sent'));
        } else {
            return redirect()->back()->with('error', __('frontend.user_not_found'));
        }
    }
}
