<?php

namespace App\Http\Controllers\Backend;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessController extends Controller
{
    //
    public function viewRoles()
    {
        $roles=Role::all();
        return view('backend.roles_permission.roles')->withRoles($roles);
    }

    public function viewPermissions()
    {
        $permissions=Permission::all();
        return view('backend.roles_permission.permission')->withPermissions($permissions);
    }
}
