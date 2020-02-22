<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function getLogin(){
        return view("auth.login");
    }
    public function getRegister(){
        return view("auth.register");
    }
    public function postRegister(Request $request){

           $this->validate($request,[
                   'name'=>'required|unique:users',
                   'email'=>'required|email|unique:users',
                   'password'=>'required|min:6',
                   'confirm_password'=>'required|same:password'
           ]);
           $user=new User();
           $user->name=$request['name'];
           $user->email=$request['email'];
           $user->password=bcrypt($request['password']);
           $user->save();
           return redirect()->back()->with('info','The user account have been signUp');
    }
    public function postLogin(Request $request){
        $this->validate($request,[
            'name'=>'required|exists:users',
            'password'=>'required'
        ]);
        $name=$request['name'];
        $password=$request['password'];
        if(Auth::attempt(['name'=>$name,'password'=>$password])){
             return redirect()->route('dashboard');
        }else{
            return redirect()->back()->with('error','Authentication Failed');
        }
    }
}
