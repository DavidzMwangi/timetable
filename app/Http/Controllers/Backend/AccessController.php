<?php

namespace App\Http\Controllers\Backend;

use App\Models\Permission;
use App\Models\PermRole;
use App\Models\Role;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\DataTables\Facades\DataTables;

class AccessController extends Controller
{

    public function __construct()
    {

    }
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


    public function getRolesPermission( $role_id)
    {

        //get all the permissions with the role id
        try {
            $permissions=Permission::select(['id','display_name','description']);

            $allocated_permissions=PermRole::where('role_id',$role_id)->pluck('permission_id')->toArray();

            return Datatables::eloquent($permissions)
//                ->editColumn('permission_id', function ($permission) {
//                    return $permission->permission->display_name;
//                })
                    ->addColumn('checkbox',function ($permissions) use ($allocated_permissions) {
                        if (in_array($permissions->id,$allocated_permissions)){

                            return ' <div class="switch">
                                                    <label><input type="checkbox" name="'.$permissions->id.'" value="'.$permissions->id.'" checked ><span class="lever switch-col-blue"></span></label>
                                                </div>';

                        }else{

//                            return "<span class=\"input-group-addon\">
//                                            <input type=\"checkbox\"  name=\"$permissions->id\" class=\"filled-in\" id=\"ig_checkbox\" disabled>
//                                            <label for=\"ig_checkbox\"></label>
//                                        </span>".

                            return ' <div class="switch">
                                                    <label><input type="checkbox" name="'.$permissions->id.'" value="'.$permissions->id.'" ><span class="lever switch-col-blue"></span></label>
                                                </div>';
//                             return   '<span class="label label-danger">Permission Not Attached</span>';

                        }
                })
//                ->setRowId(function ($permissions){
//                    return $permissions->id;
//                })
                ->rawColumns(['checkbox'])
                ->make(true);
        } catch (\Exception $e) {
        }
    }



    public function deleteRolePerm($role_id)
    {
        PermRole::where('role_id',$role_id)->delete();


        return response()->json();
    }

//    public function saveNewRolePerm($permission_id,$role_id)
//    {
//        $role=Role::find($role_id);
//        $role->attachPermission($permission_id);
//        return response()->json();
//    }

    public function saveNewRolePerm(Request $request)
    {
//        PermRole::where('role_id',$request->input('role_id'))->delete();

        $permissions=$request->input('permission_array');
        $role=Role::find($request->input('role_id'));
        $role->attachPermissions($permissions);

        return response()->json();
    }
}
