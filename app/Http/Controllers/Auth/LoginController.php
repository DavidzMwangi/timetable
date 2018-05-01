<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //override the existing credential checker to accomodate both email and reg no
    protected function credentials(Request $request)
    {
        if(filter_var($request->get('email'), FILTER_VALIDATE_EMAIL))
        {
            return $request->only($this->username(), 'password');

//            echo 'This is a valid email address.';
//            echo filter_var($email, FILTER_VALIDATE_EMAIL);
            //exit("E-mail is not valid");
        }
        else
        {
            //the input is not an email
            return [
                $this->username()=>$request->get('email').'@student.com',
                'password'=>$request->get('password')
            ];
//            echo 'Invalid email address.';
        }

    }
}
