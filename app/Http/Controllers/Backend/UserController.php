<?php

namespace App\Http\Controllers\Backend;

use App\Plugins\OneSignal;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
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
                    return '<span class="label label-success">Class Rep</span>';

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

    public function newUser(Request $request)
    {

        Validator::make($request->all(),[
            'reg_no'=>'required',
            'name'=>'required',
            'password'=>'required|confirmed'
        ])->validate();

        //new user email
        $email=strtolower($request->input('reg_no').'@student.com');

        if (count(User::where('email',$email)->get())>0){
            //record found
            return redirect()->back()->withErrors(new MessageBag(['error_found'=>'The reg no already exixt']))->withInput();
        }

        $newUser=new User();
        $newUser->name=$request->input('name');
        $newUser->email=$email;
        $newUser->user_type=1;
        $newUser->password=bcrypt($request->input('password'));
        $newUser->save();


        return redirect()->back();


    }

    public function oneSignal()
    {
        $one=new OneSignal();
        $one->sendMessage('hello',1,"tr");
    }
}
