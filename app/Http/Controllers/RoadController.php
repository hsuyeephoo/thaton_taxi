<?php

namespace App\Http\Controllers;
use App\Quarter;
use App\Road;
use Illuminate\Http\Request;

class RoadController extends Controller
{   public function postEditRoad(Request $request){
    $id=$request['id'];
    $qtrs=Road::whereId($id)->firstOrFail();
    $qtrs->road_name=$request['road_name'];
    $qtrs->update();
    return redirect()->back()->with('info','The selected road haved been updated');
    }

    public function dropRoad($id){
        $qtrs=Road::where('id',$id)->first();
        $qtrs->delete($qtrs);
        return redirect()->back()->with('info','The selected road have been deleted');
    }
    public function getSearchRoad(Request $request){
        $road_name=$request['search_name'];
        $qtrs=Quarter::get();
        $roads=Road::where('quarter_id',$request['quarter_id'])
            ->where('road_name','LIKE',"%$road_name%")
            ->paginate('4');
        return view('roads.all-roads')->with(['roads'=>$roads,'qtrs'=>$qtrs]);
    }
    public function getAllRoad(){
        $qtrs=Quarter::get();
        $roads=Road::paginate('4');
        return view('roads.all-roads')->with(['roads'=>$roads,'qtrs'=>$qtrs]);
    }
    public function postNewRoad(Request $request){
        $this->validate($request,[
            'quarter'=>'required',
            'road_name'=>'required'
        ]);
       $r=new Road();
        $r->quarter_id=$request['quarter'];
        $r->road_name=$request['road_name'];
        $r->save();
        return redirect()->back()->with('info','The new road have been created');
    }
    public function getNewRoad(){
    $qtrs=Quarter::get();
    return view('roads.new')->with(['qtrs'=>$qtrs]);
}
}
