<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublicTransportation as Transport;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class PublicTransportationController extends Controller
{
    public function index(){
        return view("admin.page.public-transport.add_public_transportation");
    }


    public function store(Request $request){
   $file=$request->file("image");
   $filename=rand(1,9999999999999).session_id().time().uniqid().".".$file->getClientOriginalExtension();
       $data=array(
        "charge_of_person"=>$request->charge_of_person,
        "image"=>$filename,
        "charge"=>(int)$request->charge,
        "details"=>$request->desc,
        "status"=>0,


       );

       if(Transport::create($data)){
        $file->move("Transportation/images/",$filename);
        return response()->json(['message'=>"success"]);
       }
       else{
        return response()->json(['message'=>"Failed"]);
       }
    }


    public function show(){
        $data=Transport::orderBy("id","desc")->paginate(10);
        return view("admin.page.public-transport.public_transport_list",compact('data'));
    }

    public function status_change(Request $request,$id){
        $id=base64_decode($id);

          $data=Transport::where("id",$id)->first();

         
        if($data->status==0){
            $update=Transport::where("id",$id)->update(['status'=>1]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Public Transportation Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }
        }
        else{

            $update=Transport::where("id",$id)->update(['status'=>0]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Public Transportation Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }

        }
    }


    public function edit(Request $request,$id){
        $id=base64_decode($id);
        $data=Transport::where("id",$id)->first();
        return view("admin.page.public-transport.edit_public_transport",compact('data'));
    }


    public function edit_data(Request $request){
        if($request->hasfile("image")){
            $pre_data=Transport::where("id",$request->id)->first();
            $file=$request->file("image");
            $filename=rand(1,999999999999).session_id().time().uniqid().".".$file->getClientOriginalExtension();
         
            $data=array(
             "charge_of_person"=>$request->charge_of_person,
             "charge"=>$request->charge,
             "details"=>$request->desc,
             "image"=>$filename,

            );

            $update=Transport::where("id",$request->id)->update($data);
            if($update){
                File::delete("Transportation/images/".$pre_data->image);
                $file->move("Transportation/images/",$filename);
                return response()->json(['message'=>"success"]);
            }
            else{
                return response()->json(['message'=>"Failed"]);
            }

        }
        else{
            $data=array(
             "charge_of_person"=>$request->charge_of_person,
             "charge"=>$request->charge,
             "details"=>$request->desc,

            );

            $update=Transport::where("id",$request->id)->update($data);
            if($update){
                return response()->json(['message'=>"success"]);
            }
            else{
                return response()->json(['message'=>"Failed"]);
            }
        }
    }


    public function delete(Request $request,$id){
       $pre_data=Transport::where("id",base64_decode($id))->first();
       File::delete("Transportation/images/".$pre_data->image);
       $delete=Transport::where("id",base64_decode($id))->delete();
       if($delete){
         return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Public Transportation Deleted Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
       }
       else{
        return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
       }
    }
}
