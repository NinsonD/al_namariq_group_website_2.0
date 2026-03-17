<?php

namespace Modules\Core\Http\Controllers;

use App\Models\User;
use App\Traits\MailTrait;
use App\Traits\RedirectTrait;
use App\Traits\GlobalInfoTrait;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Modules\Blog\Models\Blog;
use Modules\Blog\Models\BlogComment;
use Modules\Core\Http\Requests\UserRequest;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Core\Http\Requests\UserBulkMailRequest;
use Modules\Core\Http\Requests\UserPasswordRequest;

class UserController extends Controller implements HasMiddleware
{
    use MailTrait, GlobalInfoTrait, RedirectTrait;

    public static function middleware(): array
    {
        return [
            new Middleware('permission:user-show', ['index']),
            new Middleware('permission:user-create', ['create', 'store']),
            new Middleware('permission:user-edit', ['edit', 'update']),
            new Middleware('permission:user-delete', ['destroy']),
            new Middleware('permission:user-password_update', ['updatePassword']),
            new Middleware('permission:user-send_bulk_mail_show', ['sendBulkEmailCreate']),
            new Middleware('permission:user-send_bulk_mail_update', ['sendBulkEmailStore']),
        ];
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = request()->get('status');
        $orderBy = request()->get('order_by', 'created_at');
        $perPage = in_array(request()->get('per_page'), [10, 15, 25, 50, 100, 'all']) ? request()->get('per_page') : 15;
        $search = request()->get('search');
        $verified = request()->get('verified');

        $query = User::user();

        if (in_array($status, ['active', 'inactive', 'suspended'])) {
            $query->where('status', $status);
        }

        if ($verified == 'verified') {
            $query->verified();
        }

        if($verified == 'unverified') {
            $query->unverified();
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if($orderBy == 'desc'){
            $query->orderBy('created_at', 'desc');
        }

        if($orderBy == 'asc'){
            $query->latest();
        }

        if($perPage == 'all'){
            $users = $query->get();
        }else{
            $users = $query->latest()->paginate($perPage)->appends(request()->query());
        }

        return view("core::users.index", compact("users"));

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['type'] = 'user';
        $data['status'] = 'active';
        $data['password'] = bcrypt("password");

        User::create($data);

        return redirect()->route('admin.user.index')->with('success',  __('notification.created', ['field' => __('admin.user')]));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        if($user->hasRole('super_admin')) {
            return redirect()->route('admin.user.index')->with('error',  __('notification.super_admin_cant_edit'));
        }

        return view('core::users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

         if($user->hasRole('super_admin')) {
            return redirect()->route('admin.user.index')->with('error',  __('notification.super_admin_cant_edit'));
        }

       $user->update($request->validated());

        return redirect()->back()->with('success',  __('notification.updated', ['field' => __('admin.user')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // check if user is admin

        if($user->hasRole('super_admin')) {
            return redirect()->back()->with('error',  __('rules.super_admin_cant_delete'));
        }

        if($user->avatar)
        {
            deleteMedia($user->avatar);
        }

        // delete user blogs
        if(Blog::where('user_id', $user->id)->exists())
        {
            Blog::where('user_id', $user->id)->delete();
        }

        // delete user comments from blog
        if(BlogComment::where('user_id', $user->id)->exists())
        {
            BlogComment::where('user_id', $user->id)->delete();
        }

        // delete user
        $user->delete();
        return redirect()->back()->with('success', __('notification.deleted', ['field' => __('admin.user')]));
    }


    public function updatePassword(UserPasswordRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if($user->hasRole('super_admin')) {
            return redirect()->route('admin.user.index')->with('error',  __('notification.super_admin_cant_edit'));
        }
        $user->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.password')]));
    }

    public function sendBulkEmailCreate()
    {
        return view('core::users.send_mail');
    }

    public function sendBulkEmailStore(UserBulkMailRequest $request)
    {

        $usersCount = User::active()->count();

        if ($usersCount > 0) {
           $email_list = User::select('email')->where('status', 'active')->where('email_verified_at', '!=', null)->latest()->get();


            if ($email_list->isEmpty()) {
                return redirect()->back()->with('error', __('notification.no_active_users_found'));
            }

            // Send bulk email
           $this->SendBulkEmail($email_list, $request->subject, $request->message);

            return redirect()->back()->with('success', __('notification.email_sent_to_all_users'));

        }

        return redirect()->back()->with('error', __('notification.no_active_users_found'));

    }
}
