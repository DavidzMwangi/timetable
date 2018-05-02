<?php

namespace App\Http\Controllers\Backend;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\Datatables\Facades\Datatables;

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

    public function saveRoleChanges(Request $request)
    {
        $this->validate($request,[
            'display_name'=>'required',
            'description'=>'required',
        ]);

        if ($request->has('row_id') && $request->input('row_id')!=null){
            $role=Role::find($request->input('row_id'));

        }else{
            $role=new Role();
        }

            $role->display_name=$request->input('display_name');
            $role->name=str_replace(' ','_',strtolower($request->input('display_name')));
            $role->description=$request->input('description');
            $role->save();


            return response()->json([
                'success'=>true,
            ]);
                //        $permission->name=str_replace(' ','_',strtolower($request->input('display_name')));

    }

    public function savePermissionChanges(Request $request)
    {
        $this->validate($request,[
            'display_name'=>'required',
            'description'=>'required',
        ]);

        if ($request->has('row_id') && $request->input('row_id')!=null){
            $permission=Permission::find($request->input('row_id'));

        }else{
            $permission=new Permission();
        }

        $permission->display_name=$request->input('display_name');
        $permission->name=str_replace(' ','_',strtolower($request->input('display_name')));
        $permission->description=$request->input('description');
        $permission->save();


        return response()->json([
            'success'=>true,
        ]);
    }


}
