<?php

namespace Modules\Settings\Http\Controllers;

use App\Models\User;
use App\Enums\RedirectType;
use Illuminate\Http\Request;
use App\Traits\RedirectTrait;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Settings\Http\Requests\AdminRequest;

class AdminController extends Controller implements HasMiddleware
{
    use RedirectTrait;

    public static function middleware(){
        return [
            new Middleware('permission:admin-show', ['index']),
            new Middleware('permission:admin-create', ['create', 'store']),
            new Middleware('permission:admin-edit', ['update','edit']),
            new Middleware('permission:admin-delete', ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('type', 'admin')->orderByDesc("id")->paginate(15); 
        return view('settings::manage-admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings::manage-admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request) 
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'type' => 'admin',
            'password' => bcrypt("password"),
        ]);

        // check if role has
        if($request->roles){
            $user->assignRole($request->roles);
        }

        if($user){
            return redirect()->route('admin.manage-admin.index')->with('success', __('notification.created', ['field' => __('admin.user')]));
        }

        return redirect()->route('admin.manage-admin.index')->with('error', __('notification.failed'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        // check if user has super_admin role
        if($user->hasRole('super_admin')){
            return redirect()->route('admin.manage-admin.index')->with('error', __('notification.super_admin_cant_edit'));
        }

        return view('settings::manage-admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, $id) 
    {
        $user = User::findOrFail($id);

        // check if user has super_admin role
        if($user->hasRole('super_admin')){
            return redirect()->route('admin.manage-admin.index')->with('error', __('notification.super_admin_cant_update'));
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
        ];

        if($request->password){
            $data['password'] = bcrypt($request->password);
        }

        // check if role has
        if($request->roles){
            $user->syncRoles($request->roles);
        }

        $user->update($data);

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.user')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) 
    {
        $user = User::findOrFail($id);

        // check if user has super_admin role
        if($user->hasRole('super_admin')){
            return redirect()->back()->with('error', __('notification.super_admin_cant_delete'));
        }

        // delete user avatar
        if($user->avatar){
            deleteMedia($user->avatar);
        }

        // delete roles and permissions
        $user->roles()->detach();
        $user->permissions()->detach();
        
        $user->delete();

        return redirect()->route('admin.manage-admin.index')->with('success', __('notification.deleted', ['field' => __('admin.user')]));
    }
}
