<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function get(){
        return view("auth.login");
    }
    public function attempt(Request $req){
        $data = $req->only("email","password");
        $validator = Validator::make($data, [
            "email"=>["required","email","max:255"],
            "password"=>["required","string","max:255","min:8"]
        ]);
        if(!$validator->fails()){
            if(Auth::attempt($data)){
                return redirect(route("home"));
            }
        }
        return back()->withErrors($validator)->withInput();
    }
    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }

        return redirect(route("login.get"));
    }
}
