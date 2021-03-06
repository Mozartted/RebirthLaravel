<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSessionRequest;
use Illuminate\Support\Facades\Auth;

class AuthLoginController extends Controller
{

    //
    private $service=1;
    public function login(){
        return view('auth.login')->with('service_sec',$this->service);
    }

    public function BeginSession(CreateSessionRequest $request){
        $credentials=$request->only('email','password');

        if(Auth::attempt($credentials,$request->has('remember'))){
            if(Auth::user()->usergroup->name=='ForumMember'){
                Auth::logout();
                return redirect('/');
            }else{
                return redirect()->route('administrator');
            }

        }
        else
            return redirect()->route('login_pathh')->with('error_login','could not log you in');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
