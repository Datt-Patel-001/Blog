<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {   
        abort_if(Gate::denies('admin_access_role'),403);
        $roles = Role::all();
        return view('admin.role.index',compact('roles'));
    }
     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        abort_if(Gate::denies('admin_create_role'),403);
        $permissions = Permission::all();
        return view('admin.role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        // return view('admin.role.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {   
        abort_if(Gate::denies('admin_update_role'),403);
        $permissions = Permission::all();
        return view('admin.role.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {   
        $role->update($request->all());
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {   
        abort_if(Gate::denies('admin_delete_role'),403);
        $role->delete();
        return redirect()->route('admin.roles.index');

    }
}
