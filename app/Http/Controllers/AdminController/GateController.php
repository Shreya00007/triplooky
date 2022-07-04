<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gates;

class GateController extends Controller
{
   public function index(){
    return view("admin.page.gates.add_gates");
   }

   public function store(Request $request){
     $check=Gates::where("type",$request->type)->where("room_type",$request->room_type)->get()->count();
     if($check==0){
        $create=Gates::create($request->all());
   if($create){
    return response()->json(['message'=>"success"]);
   }
   else{
    return response()->json(['message'=>"Failed"]);

   }
     }
     else{
        return response()->json(['message'=>"Gate Already exist"]);
     }
   
   }


   public function show(){
    $data=Gates::orderBy("id","desc")->paginate(10);
    return view("admin.page.gates.gate_list",compact('data'));
   }

   public function status_change(Request $request,$id){
    $id=base64_decode($id);

     $data=Gates::where("id",$id)->first();

         
        if($data->status==0){
            $update=Gates::where("id",$id)->update(['status'=>1]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Gates Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }
        }
        else{

            $update=Gates::where("id",$id)->update(['status'=>0]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Gates Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }

        }
   }


   public function edit(Request $request,$id){
    $data=Gates::where("id",base64_decode($id))->first();
    return view("admin.page.gates.edit_gate",compact('data'));

   }


   public function edit_data(Request $request){
    $data=array(
        "type"=>$request->type,
        "room_type"=>$request->room_type,
        "budget"=>$request->budget,
        "status"=>$request->status,
        "rating"=>$request->rating,
        "location"=>$request->location,
        "facility"=>$request->facility,


    );

    $update=Gates::where("id",$request->id)->update($data);
    if($update){
        return response()->json(['message'=>"success"]);
    }
    else{
        return response()->json(['message'=>"Failed"]);
    }
   }

   public function delete(Request $request,$id){
    $id=base64_decode($id);
     $delete=Gates::where("id",$id)->delete();
     if($delete){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Gates Deleted Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
     }
     else{
         return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
     }
   }
}
