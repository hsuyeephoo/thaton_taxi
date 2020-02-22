<?php

namespace App\Http\Controllers;

use App\Motor;
use App\Quarter;
use App\Road;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MyController extends Controller
{
    public function getWelcome(){
        $qtrs=Quarter::paginate('4');
        return view('welcome')->with(['qtrs'=>$qtrs]);
    }
    public function getSearchQuarter(Request $request){
        $q=$request['search_quarter'];
        $qtrs=Quarter::where('quarter_name','LIKE',"%$q%")->paginate('3');
        return view('welcome')->with(['qtrs'=>$qtrs]);

    }
    public function getQuarterRoad($quarter_id){
        $qtr=Quarter::whereId($quarter_id)->firstOrFail();
        $roads=Road::where('quarter_id',$quarter_id)->paginate("3");
        return view('road')->with(['roads'=>$roads,'qtr'=>$qtr]);
    }
    public function getRoadDriver($road_id){
        $road=Road::where('id',$road_id)->firstOrFail();
        $qtr=Quarter::where('id', $road->quarter_id)->firstOrFail();
        $drivers=Motor::where('road_id',$road_id)->paginate('3');
        return view('drivers')->with(['drivers'=>$drivers,'road'=>$road,'qtr'=>$qtr]);
    }
    public function getDriverImage($img_name){
       $file=Storage::disk('motors')->get($img_name);
       return response($file,'200');
    }
}
