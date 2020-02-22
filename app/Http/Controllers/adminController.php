<?php

namespace App\Http\Controllers;

use App\Motor;
use App\Quarter;
use App\Road;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function updatePassword(Request $request){
        $this->validate($request,[
          'current_password'=>'required',
          'new_password'=>'required|min:6',
          'retype_new_password'=>'required|same:new_password'
        ]);
        $user=User::whereId(Auth::id())->firstOrFail();
        $oldPassword=$user->password;
        if(!Hash::check($request['current_password'],$oldPassword)){
           return redirect()->back()->with('error','invalid current password');
        }else{
            $user->password=bcrypt($request['current_password']);
            $user->update();
            return redirect()->back()->with('info','Your password have been changed');
        }


    }
    public function getDashboard(){
        $qtrs=Quarter::get();
        $roads=Road::get();
        $drivers=Motor::get();
        return view('admin.dashboard')->with(['qtrs'=>$qtrs,'roads'=>$roads,'drivers'=>$drivers]);
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function getSetting(){
        return view('admin.setting');
    }
}
