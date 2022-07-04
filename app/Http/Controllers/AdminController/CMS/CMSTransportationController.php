<?php

namespace App\Http\Controllers\AdminController\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CMS\CMSTransportation;
use Validator;

class CMSTransportationController extends Controller
{
     public function index(){
        return view("admin.page.cms-transportation.add");
    }

    public function create(Request $request){
     try{
         $check=CMSTransportation::where("name",$request->name)->get()->count();
        if($check>0){
           $message="<div class='alert alert-warning p-font' ><b>  Name is Already Created</b><i class='la la-close close' data-dismiss='alert'></i></div>";
            return redirect()->back()->with("message",$message);

        }
        else{
            $validator=Validator::make($request->all(),[
                "name"=>"required",
                "image"=>"required|max:2080",
                "status"=>"required|in:1,0",



            ],[
                "name.required"=>"Name can`t be empty",
                "image.required"=>"Choose Thumbnail Photo",
                "image.max"=>"Thumbnail Photo size should be less than 2 MB",
                 "status.in"=>"Select Status",


            ]);

            if($validator->fails()){
                return redirect()->back()->withInput($request->all())->withErrors($validator->getMessageBag());

            }
            else{
                $file=$request->file("image");
                $filename=rand(1,99).time().".png";
                $data=$request->all();
                $data['image']=$filename;
                if(CMSTransportation::create($data)){
                    $file->move("transportation-image/images/",$filename);
                     $message="<div class='alert alert-success p-font' ><b>  CMSTransportation Created Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                    return redirect()->back()->with("message",$message);
                }
                else{
                     $message="<div class='alert alert-warning p-font' ><b> Whoops! something went wrong</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                     return redirect()->back()->with("message",$message);
                }

            }

        }
     }
     catch(\Exception $e){
         $message="<div class='alert alert-warning p-font' ><b> ".$e->getMessage()."</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                     return redirect()->back()->with("message",$message);
     }
    }

    public function show(){
        $data=CMSTransportation::latest()->paginate(20);
        return view("admin.page.cms-transportation.list",['data'=>$data]);
    }

     public function status_change(Request $request,$id){
        $data=CMSTransportation::where("id",base64_decode($id))->first();
        if($data->status==1){
            $update=CMSTransportation::where("id",base64_decode($id))->update(['status'=>0]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }
           

        }
        else{
              $update=CMSTransportation::where("id",base64_decode($id))->update(['status'=>1]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }

        }
    }

    public function edit(Request $request,$id){
        try{
        $data=CMSTransportation::where("id",base64_decode($id))->first()->toArray();
           return view("admin.page.cms-transportation.edit",['data'=>$data]);
        }
        catch(\Exception $e){
          $message="<div class='alert alert-warning p-font' ><b> ".$e->getMessage()."</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                     return redirect()->back()->with("message",$message);
        }
    }

    public function edit_data(Request $request){
        try{
            if($request->hasFile("image")){
                $pre_data=CMSTransportation::where("id",$request->id)->first()->toArray();
                 $validator=Validator::make($request->all(),[
                "name"=>"required",
                "image"=>"required|max:2080",
                "status"=>"required|in:1,0",



            ],[
                "name.required"=>"Name can`t be empty",
                "image.required"=>"Choose Thumbnail Photo",
                "image.max"=>"Thumbnail Photo size should be less than 2 MB",
                 "status.in"=>"Select Status",


            ]);

                 if($validator->fails()){
                    return redirect()->back()->withInput($request->all())->withErrors($validator);


                 }
                 else{
                    $file=$request->file("image");
                    $filename=rand(1,999).time().".png";
                    $data=$request->all();
                    unset($data['_token']);
                    $data['image']=$filename;
                    if(CMSTransportation::where("id",$request->id)->update($data)){
                        @unlink("transportation-image/images/".$pre_data['image']);
                        $file->move("transportation-image/images/",$filename);
                    $message="<div class='alert alert-success '><i class='la la-close close' data-dismiss='alert'></i><b>Successfully Updated</b></div>";
                  return redirect()->back()->with("message",$message);
                 }
                 else{
                    $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

                 }

                 }

            }
            else{
                 $validator=Validator::make($request->all(),[
                "name"=>"required",
                "status"=>"required|in:1,0",



            ],[
                "name.required"=>"Name can`t be empty",
                "status.in"=>"Select Status",


            ]);

                $data=$request->all();
                unset($data['_token']);
                 if(CMSTransportation::where("id",$request->id)->update($data)){
                    $message="<div class='alert alert-success '><i class='la la-close close' data-dismiss='alert'></i><b>Successfully Updated</b></div>";
                  return redirect()->back()->with("message",$message);
                 }
                 else{
                    $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

                 }

            }

        }
        catch(\Exception $e){
          $message="<div class='alert alert-warning p-font' ><b> ".$e->getMessage()."</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                     return redirect()->back()->with("message",$message);  
        }
    }


    public function delete(Request $request,$id){
        $id=base64_decode($id);
        

        try{
            $pre_data=CMSTransportation::where("id",$id)->first();
            @unlink("transportation-image/images/".$pre_data['image']);
            if(CMSTransportation::where("id",$id)->delete()){
                 $message="<div class='alert alert-success '><i class='la la-close close' data-dismiss='alert'></i><b>Successfully Deleted</b></div>";
                  return redirect()->back()->with("message",$message);
            }
              else{
                    $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

                 }

        }
        catch(\Exception $e){
             $message="<div class='alert alert-warning p-font' ><b> ".$e->getMessage()."</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                     return redirect()->back()->with("message",$message);  
        }

    }
}
