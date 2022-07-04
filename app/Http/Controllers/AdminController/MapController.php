<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Map;

class MapController extends Controller
{
    public function index(){
        return view("admin.page.map.add_map");
    }

    public function create(Request $request){
       


      
      
      $check=Map::count();
      if($check>0){
        return response()->json(['message'=>"Map Already Created"]);
      }
      else{
        $data=array(
            "map"=>$request->map,
            "status"=>0,
         );
        if(Map::create($data)){
            return response()->json(['message'=>"success"]);
        }
        else{
            return response()->json(['message'=>"Failed try again"]);
        }
      }
    }

    public function view_map(){
        $data=Map::get();
        return view("admin.page.map.view_map",['data'=>$data]);
    }

    public function status(Request $request,$id)
    {
        $check=Map::find($id);
        if($check->status==1){
            $check=Map::where("id",$id)->update(['status'=>0]);
            if($check){
                return redirect()->back()->with("message","<div  class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i> Map Staus successfully updated</div>");
            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning'><i class='la la-close close' data-dismiss='alert'></i> Map Staus successfully updated</div>");
            }
        }
        else{
             $check=Map::where("id",$id)->update(['status'=>1]);
            if($check){
                return redirect()->back()->with("message","<div  class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i> Map Status successfully updated</div>");
            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning'><i class='la la-close close' data-dismiss='alert'></i> Map Status successfully updated</div>");
            }
        }
    }

    public function delete(Request $request,$id){
         $check=Map::where("id",$id)->delete();
            if($check){
                return redirect()->back()->with("message","<div  class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i> Map Delete successfully updated</div>");
            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning'><i class='la la-close close' data-dismiss='alert'></i> Map Delete successfully updated</div>");
            }
    }
}
