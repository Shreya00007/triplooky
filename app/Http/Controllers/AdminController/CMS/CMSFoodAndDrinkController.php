<?php

namespace App\Http\Controllers\AdminController\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CMS\CMSFoodAndDrink;
use Validator;

class CMSFoodAndDrinkController extends Controller
{
    public function index(){
        return view("admin.page.cms-food-and-drink.add");
    }

    public function create(Request $request){

     try{
         $check=CMSFoodAndDrink::where("name",$request->name)->get()->count();
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
                if(CMSFoodAndDrink::create($data)){
                    $file->move("food-and-drink-image/images/",$filename);
                     $message="<div class='alert alert-success p-font' ><b>  CMSFoodAndDrink Created Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";
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
        $data=CMSFoodAndDrink::latest()->paginate(20);
        return view("admin.page.cms-food-and-drink.list",['data'=>$data]);
    }

     public function status_change(Request $request,$id){
        $data=CMSFoodAndDrink::where("id",base64_decode($id))->first();
        if($data->status==1){
            $update=CMSFoodAndDrink::where("id",base64_decode($id))->update(['status'=>0]);
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
              $update=CMSFoodAndDrink::where("id",base64_decode($id))->update(['status'=>1]);
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
        $data=CMSFoodAndDrink::where("id",base64_decode($id))->first()->toArray();
           return view("admin.page.cms-food-and-drink.edit",['data'=>$data]);
        }
        catch(\Exception $e){
          $message="<div class='alert alert-warning p-font' ><b> ".$e->getMessage()."</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                     return redirect()->back()->with("message",$message);
        }
    }

    public function edit_data(Request $request){
        try{
            if($request->hasFile("image")){
                $pre_data=CMSFoodAndDrink::where("id",$request->id)->first()->toArray();
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
                    if(CMSFoodAndDrink::where("id",$request->id)->update($data)){
                        @unlink("food-and-drink-image/images/".$pre_data['image']);
                        $file->move("food-and-drink-image/images/",$filename);
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
                 if(CMSFoodAndDrink::where("id",$request->id)->update($data)){
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
            $pre_data=CMSFoodAndDrink::where("id",$id)->first();
            @unlink("food-and-drink-image/images/".$pre_data['image']);
            if(CMSFoodAndDrink::where("id",$id)->delete()){
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
