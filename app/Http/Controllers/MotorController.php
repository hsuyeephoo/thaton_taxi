<?php

namespace App\Http\Controllers;

use App\Motor;
use Illuminate\Http\Request;
use App\Road;
use App\Quarter;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MotorController extends Controller
{
    public function postEditMotor(Request $request){
    $id=$request['id'];
    $m=Motor::whereId($id)->firstOrFail();
    if($request->file('photo')){
        $img_name=$m->photo;
        Storage::disk('motors')->delete($img_name);

        $img_file=$request->file('photo');
        $img_name=date('dmyhis')."-".$img_file->getClientOriginalName();
        Storage::disk("motors")->put($img_name,File::get($img_file));
       $m->photo=$img_name;
    }
    $m->driver_name=$request['driver_name'];
    $m->phone=$request['phone'];
    $m->quarter_id=$request['quarter'];
    $m->road_id=$request['road'];
    $m->update();
    return redirect()->route('motor.all')->with('info','The selected motor have been updated');
}
    public function getEditMotor($id){
        $motor=Motor::whereId($id)->firstOrFail();
        $roads=Road::get();
        $qtrs=Quarter::get();
        return view('motors.edit')->with(['motor'=>$motor,'roads'=>$roads,'qtrs'=>$qtrs]);
    }
    public function getDropMotor($id){
        $m=Motor::whereId($id)->firstOrFail();
        $img_name=$m->photo;
        Storage::disk('motors')->delete($img_name);
        $m->delete();
        return redirect()->back()->with('info','The selected motor have been deleted');

    }
    public function getSearchDriver(Request $request){
        $quarter_id=$request['quarter_id'];
        $road_id=$request['road_id'];
        $driver_name=$request['driver_name'];
        $motors=Motor::where('quarter_id',$quarter_id)
                ->where('road_id',$road_id)
                ->where('driver_name','LIKE',"%$driver_name%")
                ->paginate('5');
        $qtrs=Quarter::get();
        $roads=Road::get();
        return view('motors.all-motor')
            ->with(['motors'=>$motors,'qtrs'=>$qtrs,'roads'=>$roads]);

    }
    public function getDriverPhoto($p_name){
        $file=Storage::disk('motors')->get($p_name);
        return response($file,200)->header("Content-Type","*/*");
    }
    public function getAllMotors(){
    $motors=Motor::paginate('5');
    $qtrs=Quarter::get();
    $roads=Road::get();
    return view('motors.all-motor')
        ->with(['motors'=>$motors,'qtrs'=>$qtrs,'roads'=>$roads]);
}
    public function getNewMotor(){
        $qtrs=Quarter::get();
        $roads=Road::get();
        return view('motors.new')
            ->with(['qtrs'=>$qtrs,'roads'=>$roads]);
    }
    public function postNewMotor(Request $request){
        $this->validate($request,[
            'photo'=>'required|mimes:jpg,jpeg,png,gif',
            'phone'=>'required',
            'driver_name'=>'required',
            'road'=>'required',
            'quarter'=>'required'
        ]);
        $photo_file=$request->file('photo');
        $photo_name=date("dmyhis").$photo_file->getClientOriginalName();
        $m=new Motor();
        $m->photo=$photo_name;
        $m->driver_name=$request['driver_name'];
        $m->phone=$request['phone'];
        $m->road_id=$request['road'];
        $m->quarter_id=$request['quarter'];
        $m->save();
        $myFile=File::get($photo_file);
        Storage::disk("motors")->put($photo_name, $myFile);
        return redirect()->back()->with('info','The motor name have been created');

    }
}
