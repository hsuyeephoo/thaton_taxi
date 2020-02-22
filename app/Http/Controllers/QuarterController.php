<?php

namespace App\Http\Controllers;

use App\Quarter;
use Illuminate\Http\Request;

class QuarterController extends Controller
{
    public function deleteQuarter($id){
        $qts=Quarter::where('id',$id)->first();
        $qts->delete($qts);
        return redirect()->back()->with('info','The selected quarter have been deleted');
    }
    public function postEditQuarter(Request $request){
        $id=$request['id'];
        $qrs=Quarter::whereId($id)->firstOrFail();
        $qrs->quarter_name=$request['quarter_name'];
        $qrs->update();
        return redirect()->back()->with("info","The selected quarter have been updated");
    }

    public function getAllQuarter(){
        $qtrs=Quarter::OrderBy('id','desc')->paginate('4');
        return view('quarters.all-quarter')->with(['qtrs'=>$qtrs]);
    }

    public function getNewQuarter(){
        return view('quarters.new');
    }
    public function postNewQuarter(Request $request){
        $this->validate($request,[
            'quarter_name'=>'required|unique:quarters'
        ]);
        $q=new Quarter();
       $q->quarter_name=$request['quarter_name'];
       $q->save();
       return redirect()->back()->with('info','The new quarter have been created');
    }
}
