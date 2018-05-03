<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('backend.users');
    }

    public function allUsers()
    {


        $users=User::select(['id','name','user_type','email','created_at']);
//        $users=User::all();
        //working
        return Datatables::of($users)
//            ->select(['name','email','user_type','created_at','id'])
            ->editColumn('user_type',function ($users){

                if ($users->user_type==0){
                    return '<span class="label label-primary">Super Admin</span>';

                }elseif ($users->user_type==1){
                    return '<span class="label label-success">Class Repp</span>';

                }else{
                    return '<span class="label label-alert">Student</span>';

                }

            })
            ->editColumn('created_at',function ($users){
                return $users->created_at->toDayDateTimeString();
            })
            ->rawColumns(['user_type'])
            ->make(true);

    }
}
