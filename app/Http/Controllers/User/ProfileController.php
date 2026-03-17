<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ProfileUpdateRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create()
    {
        return view("frontend.dashboard.profile");
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();

        $user->update($request->validated());

        if($request->hasFile('avatar'))
        {
            $avatar = updateMedia($request->file('avatar'),  $user->avatar, 'avatar');
            $user->avatar = $avatar;
            $user->save();
        }

        return redirect()->back()->with("success", __('frontend.profile_updated_successfully'));
    }
}
