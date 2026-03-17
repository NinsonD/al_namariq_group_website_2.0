<?php

namespace Modules\Core\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Modules\Core\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {

        if(Auth::check()) {
            if (Auth::user()->type === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        return view('core::auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->type === 'admin') {
            session()->forget('cart');
        }

        if ($user->type === 'admin') {
            return redirect()->intended(route('admin.dashboard'));
        }else{
            if($request->filled('redirect')) {
                return redirect()->to($request->redirect);
            }
            return redirect()->intended(route('user.dashboard'));
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        $user_type = Auth::user()->type;
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if($user_type === 'admin') {
            return redirect()->route('login');
        }else{

            return redirect()->route('user.login');
        }
    }
}
