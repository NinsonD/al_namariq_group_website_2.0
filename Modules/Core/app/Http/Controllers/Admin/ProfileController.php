<?php

namespace Modules\Core\Http\Controllers\Admin;

use Illuminate\View\View;
use App\Enums\RedirectType;
use Illuminate\Http\Request;
use App\Traits\RedirectTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Modules\Core\Http\Requests\ProfileUpdateRequest;


class ProfileController extends Controller
{
    use RedirectTrait;
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('core::profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $user = Auth::user();

        $data = $request->validated();

        // Handle avatar update
        if ($request->hasFile('avatar')) {
            $data['avatar'] = updateMedia($request->file('avatar'), $user->avatar, 'avatar');
        }

        // Reset email verification if email has changed
        if (isset($data['email']) && $data['email'] !== $user->email) {
            $data['email_verified_at'] = null;
        }

        // Update user with new data
        $user->update($data);

        return redirect()->back()->with('success', __('notification.profile_update_success'));
    }
}
