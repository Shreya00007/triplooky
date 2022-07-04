<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\TourAndActivity;
use Validator;
use App\Models\TourAndActivityImage;
use App\Models\City;
use App\Models\CMS\CMSTourAndActivity;

class TourAndActivityController extends Controller
{
   public function index(){
    $tour_activity_type=CMSTourAndActivity::where("status",1)->get();
    $city=City::latest()->where("status",1)->get();
    $language=Language::latest()->where("status","active")->get();

    return view("admin.page.tour_and_activity.tour_and_activity",compact('city','language','tour_activity_type'));

   }

   public function create(Request $request){
     $rule=[
     "name"=>"required",
     "type"=>"required|exists:c_m_s_tour_and_activities,name",
     "duration"=>"required",
     "image"=>"required|mimes:jpeg,jpg,png|max:2048",
     "lang_name"=>"required|exists:languages,lang_name",
     "address"=>"required|max:500",
     "description"=>"required",
     "rating"=>"required",
     "status"=>"required|in:1,0",
     "price"=>"required|integer|not_in:0",
     "link"=>"required",
     "map"=>"required",
     "phone"=>"required",
     "multi_image"=>"required",


     ];
     $custom_rule=[
        'name.required'=>"Tour And Activity Name can`t be empty",
        "type.exists"=>"Select Tour and Activity Type",
        "duration.required"=>"Duration can`t be empty",
        "image.required"=>"Choose Photo",
        "image.mimes"=>"Photo Format is not valid",
        "lang_name.exists"=>"Selct Language",
        "address.required"=>"Address can`t be empty",
        "address.max"=>"Address size should not be greter than 500 word",
        "rating.required"=>"Rating can`t be empty",
        "status.in"=>"Select Status",
        "link.required"=>"Link can`t be empty",
        "price.required"=>"Price can`t be empty",
        "price.integer"=>"Price not Accept Any Character",
        "map.required"=>"Map can`t be empty",
        "description.required"=>"Description can`t be empty",
        "phone.required"=>"Phone No can`be empty",
        "multi_image.required"=>"Select At Least One Photo",


     ];

     $validate=Validator::make($request->all(),$rule,$custom_rule);
     if($validate->fails()){
        return redirect()->back()->withInput($request->all())->withErrors($validate);
     }
     else{
        $file=$request->file("image");
        $filename=rand(1,9999999999999999).time().session_id().uniqid().".".$file->getClientOriginalExtension();
        $data=$request->all();
        $data['image']=$filename;
        $data['language']=$request->lang_name;
        $check=TourAndActivity::where("name",$request->name)->get()->count();
        if($check){
             $message="<div class='alert alert-warning p-font' ><b>Toru and Activity Name is Already Created</b><i class='la la-close close' data-dismiss='alert'></i></div>";
             return redirect()->back()->with("message",$message);
        }
        else{
            if($create=TourAndActivity::create($data)){
                $file->move("tour-and-activit-image/images/",$filename);
                  $allMultiImage=$request->file("multi_image");
                 foreach($allMultiImage as $image){
                    $filename=rand(1,99).time().uniqid().".".$image->getClientOriginalExtension();
                    $data=['tour_and_activity_id'=>$create->id,'image'=>$filename,'status'=>1];
                    TourAndActivityImage::create($data);
                    $image->move("tour-and-activit-image/images",$filename);
                 }
                 $message="<div class='alert alert-success p-font' ><b>Tour and Activity Created Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                 return redirect()->back()->with("message",$message);
            }
            else{
                 $message="<div class='alert alert-warning p-font' ><b>Whoops! something went wrong</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                 return redirect()->back()->with("message",$message);

            }
        }
     }

   }

   //show list
   public function show_list(){
    $data=TourAndActivity::latest()->paginate(20);
    return view("admin.page.tour_and_activity.tour_and_activity_list",compact('data'));
   }
   //status change
    public function status_change(Request $request,$id){
        $data=TourAndActivity::where("id",base64_decode($id))->first();
        if($data->status==1){
            $update=TourAndActivity::where("id",base64_decode($id))->update(['status'=>0]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Tour and Activity Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }
           

        }
        else{
              $update=TourAndActivity::where("id",base64_decode($id))->update(['status'=>1]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Tour and Activity Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }

        }
    }


    //edit toru and activity

    public function edit(Request $request,$id){
        $tour_activity_type=CMSTourAndActivity::where("status",1)->get();
        $data=TourAndActivity::where("id",base64_decode($id))->first();
        $language=Language::all();
        $city=City::latest()->get();

        return view("admin.page.tour_and_activity.edit_tour_and_activity",compact('data','language','city','tour_activity_type'));
    }

    //update data store
    public function edit_data(Request $request){

        if($request->hasFile("image")){
            $rule=[
     "name"=>"required",
      "type"=>"required|exists:c_m_s_tour_and_activities,name",
     "duration"=>"required",
     "image"=>"required|mimes:jpeg,jpg,png|max:2048",
     "lang_name"=>"required|exists:languages,lang_name",
     "address"=>"required|max:500",
     "description"=>"required",
     "rating"=>"required",
     "status"=>"required|in:1,0",
     "price"=>"required|integer|not_in:0",
     "link"=>"required",
     "map"=>"required",
     "phone"=>"required",
   


     ];
     $custom_rule=[
        'name.required'=>"Tour And Activity Name can`t be empty",
        "type.exists"=>"Select Tour and Activity Type",
        "duration.required"=>"Duration can`t be empty",
        "image.required"=>"Choose Photo",
        "image.mimes"=>"Photo Format is not valid",
        "lang_name.exists"=>"Selct Language",
        "address.required"=>"Address can`t be empty",
        "address.max"=>"Address size should not be greter than 500 word",
        "rating.required"=>"Rating can`t be empty",
        "status.in"=>"Select Status",
        "link.required"=>"Link can`t be empty",
        "price.required"=>"Price can`t be empty",
        "price.integer"=>"Price not Accept Any Character",
        "map.required"=>"Map can`t be empty",
        "description.required"=>"Description can`t be empty",
        "phone.required"=>"Phone No can`be empty",


     ];
     $validate=Validator::make($request->all(),$rule,$custom_rule);
     if($validate->fails()){
        return redirect()->back()->withInput()->withErrors($validate);
     }
     else{
        $pre_data=TourAndActivity::where("id",$request->id)->first();
        $file=$request->file("image");
        $filename=rand(1,9999999999999999).session_id().time().uniqid().".".$file->getClientOriginalExtension();
        @unlink("tour-and-activit-image/images/".$pre_data->image);
        $data=$request->all();
        $data['language']=$request->lang_name;
        unset($data['_token']);
        unset($data['lang_name']);
        $data['image']=$filename;
        if(TourAndActivity::where("id",$request->id)->update($data)){
            $file->move("tour-and-activit-image/images/",$filename);
            $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Tour And Activity updated successfully</b></div>";
            return redirect("/admin/view-tour-and-activity")->with("message",$message);
        }
        else{
            $message="<div class='alert alert-warning'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
            return redirect("/admin/view-tour-and-activity")->with("message",$message);
        }

     }

        }
        else{
           $rule=[
     "name"=>"required",
      "type"=>"required|exists:c_m_s_tour_and_activities,name",
     "duration"=>"required",
     
     "lang_name"=>"required|exists:languages,lang_name",
     "address"=>"required|max:500",
     "description"=>"required",
     "rating"=>"required",
     "status"=>"required|in:1,0",
     "price"=>"required|integer|not_in:0",
     "link"=>"required",
     "map"=>"required",
     "phone"=>"required",


     ];
     $custom_rule=[
        'name.required'=>"Tour And Activity Name can`t be empty",
        "type.in"=>"Select Tour and Activity Type",
        "duration.required"=>"Duration can`t be empty",
        
       
        "lang_name.exists"=>"Selct Language",
        "address.required"=>"Address can`t be empty",
        "address.max"=>"Address size should not be greter than 500 word",
        "rating.required"=>"Rating can`t be empty",
        "status.in"=>"Select Status",
        "link.required"=>"Link can`t be empty",
        "price.required"=>"Price can`t be empty",
        "price.integer"=>"Price not Accept Any Character",
        "map.required"=>"Map can`t be empty",
        "description.required"=>"Description can`t be empty",
        "phone.required"=>"Phone No can`be empty",


     ];
     $validate=Validator::make($request->all(),$rule,$custom_rule);

     if($validate->fails()){
        return redirect()->back()->withInput()->withErrors($validate);
     }
     else{
        unset($request['_token']);
        $data=$request->all();
        $data['language']=$request->lang_name;
        unset($data['lang_name']);
        $update=TourAndActivity::where("id",$request->id)->update($data);
        if($update){
             $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Tour And Activity updated successfully</b></div>";
            return redirect("/admin/view-tour-and-activity")->with("message",$message);
        }
        else{
             $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect("/admin/view-tour-and-activity")->with("message",$message);
        }
     }

        }
    }


    public function delete(Request $request,$id){
        $data=TourAndActivity::where("id",base64_decode($id))->first();
        @unlink("tour-and-activit-image/images/".$data->image);
        if(TourAndActivity::where("id",base64_decode($id))->delete()){
            $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Tour And Activity Deleted Successfully</b></div>";
             return redirect()->back()->with("message",$message);

        }
        else{
            $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect()->back()->with("message",$message);
        }
    }

      public function showMultiImage(Request $request,$id){
        $data=TourAndActivity::where("id",base64_decode($id))->first();
        $imagedata=TourAndActivityImage::where("tour_and_activity_id",base64_decode($id))->latest()->get();
        return view("admin.page.tour_and_activity.view_tour_and_activity_image",['data'=>$data,'imagelist'=>$imagedata]);
    }

    public function addMoreImage(Request $request,$id){
            $data=TourAndActivity::where("id",base64_decode($id))->first();
        return view("admin.page.tour_and_activity.add_tour_and_activity_image",['data'=>$data]);
    }

    public function addMoreImageStore(Request $request){
        $image=$request->file("image");
      foreach($image as $image_list){
        $filename=rand(1,99).time().".".$image_list->getClientOriginalExtension();
        $data=array(
            "tour_and_activity_id"=>$request->id,
            "image"=>$filename,
            "status"=>1,
        );
       TourAndActivityImage::create($data);
        $image_list->move("tour-and-activit-image/images",$filename);

      }
       $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Tour And Activity Image Added Successfully</b></div>";
             return redirect()->back()->with("message",$message);
    }

    public function More_image_status_change(Request $request,$id){
         $data=TourAndActivityImage::where("id",base64_decode($id))->first();
        if($data->status==1){
            $update=TourAndActivityImage::where("id",base64_decode($id))->update(['status'=>0]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Tour And Activity Image Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }
           

        }
        else{
              $update=TourAndActivityImage::where("id",base64_decode($id))->update(['status'=>1]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Tour And Activity Image Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }

        }
    }

    public function deleteMoreImage(Request $request,$id){
         $data=TourAndActivityImage::where("id",base64_decode($id))->first();
        @unlink("tour-and-activit-image/images/".$data->image);
        if(TourAndActivityImage::where("id",base64_decode($id))->delete()){
            $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Tour And Activity Image Deleted Successfully</b></div>";
             return redirect()->back()->with("message",$message);

        }
        else{
            $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect()->back()->with("message",$message);
        }
    }

    public function editMoreImage(Request $request,$id){
        $data=TourAndActivityImage::where("id",base64_decode($id))->first();
        return view("admin.page.tour_and_activity.tour_and_activity_more_image_edit",['data'=>$data]);
    }

    public function moreImageEditData(Request $request){

        $pre_data=TourAndActivityImage::where("id",$request->id)->first();
        @unlink("tour-and-activit-image/images".$pre_data->image);
        $file=$request->file("image");
        $filename=rand(1,99).time().uniqid().".".$file->getClientOriginalExtension();
        $update=TourAndActivityImage::where("id",$request->id)->update(['image'=>$filename]);
        if($update){
            $file->move("tour-and-activit-image/images",$filename);
             $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Tour And Activity Image Updated Successfully</b></div>";
             return redirect()->back()->with("message",$message);
        }
        else{
             $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect()->back()->with("message",$message);
        }
    }
}
