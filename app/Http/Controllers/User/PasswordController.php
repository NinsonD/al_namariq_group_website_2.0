<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PasswordUpdateRequest;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function create()
    {
        return view("frontend.dashboard.password");
    }

    public function update(PasswordUpdateRequest $request)
    {
        $user = auth()->user();
        if (!password_verify($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => __('frontend.current_password_is_incorrect')]);
        }

        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('user.password')->with('success', __('frontend.password_updated_successfully'));
    }
}
