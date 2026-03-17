<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function create()
    {

        if(Auth::check()) {
            if (Auth::user()->type === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        return view('auth.login');
    }


    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->type === 'admin') {
            session()->forget('cart');
        }


        if ($user->type === 'admin') {
            return redirect()->intended(route('admin.dashboard'));
        } else {
            if($request->filled('redirect')) {
                return redirect()->to($request->redirect);
            }
            return redirect()->intended(route('user.dashboard'));
        }
    }

    public function logout(Request $request)
    {
        $user_type = Auth::user()->type;
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($user_type === 'admin') {
            return redirect()->route('login');
        } else {
            return redirect()->route('user.login');
        }
    }
}
