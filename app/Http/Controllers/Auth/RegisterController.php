<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterStoreRequest;
use App\Models\User;
use App\Traits\MailTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Str;

class RegisterController extends Controller
{
    use MailTrait;
    public function create()
    {
        return view("auth.register");
    }

    public function store(RegisterStoreRequest $request)
    {
        $data = $request->validated();
        $data['verification_token'] = Str::random(100);
        $user = User::create($data);

        event(new Registered($user));

        // Send verification email
        $this->sendVerifyMailSingleUser($user);

        Auth::login($user);

        return redirect()->route('user.dashboard')->with('success', __('frontend.registration_successful'));
    }
}
