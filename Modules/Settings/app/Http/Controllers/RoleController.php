<?php

namespace Modules\Settings\Http\Controllers;


use App\Traits\RedirectTrait;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Modules\Settings\Http\Requests\RoleRequest;
use Illuminate\Routing\Controllers\HasMiddleware;

class RoleController extends Controller implements HasMiddleware
{
    use RedirectTrait;

    public static function middleware(){
        return [
            new Middleware('permission:role-show', ['index']),
            new Middleware('permission:role-create', ['create', 'store']),
            new Middleware('permission:role-edit', ['update','edit']),
            new Middleware('permission:role-delete', ['destroy']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderByDesc("id")->paginate(15); 
        return view('settings::roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings::roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {

        // check if role is super_admin
        if ($request->name === 'super_admin') {
            return redirect()->back()->with('error', __('notification.super_admin_role_cant_create'));
        }
        
        $role = Role::create(['name' => $request->name]);

        if ($request->permissions) {
            $role->syncPermissions($request->permissions);
        }


        return redirect()->route('admin.roles.index')->with('success', __('notification.created', ['field' => __('admin.role')]));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);

        // check if role is super_admin
        if ($role->name === 'super_admin') {
            return redirect()->back()->with('error', __('notification.super_admin_role_cant_update'));
        }

        return view('settings::roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, $id) 
    {
        $role = Role::findOrFail($id);


        // check if role is super_admin
        if ($role->name === 'super_admin') {
            return redirect()->back()->with('error', __('notification.super_admin_role_cant_update'));
        }

        
        $role->update(['name' => $request->name]);

        $role->syncPermissions($request->permissions);

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.role')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) 
    {
        $role = Role::findOrFail($id);

        // check if role is super_admin
        if ($role->name === 'super_admin') {
            return redirect()->back()->with('error', __('notification.super_admin_role_cant_delete'));
        }

        $role->permissions()->detach();
        $role->delete();
        
        return redirect()->route('admin.roles.index')->with('success', __('notification.deleted', ['field' => __('admin.role')]));
    }
}
