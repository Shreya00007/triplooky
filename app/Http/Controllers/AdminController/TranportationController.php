<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transportation;
use App\Models\Language;
use Validator;
use App\Models\City;
use App\Models\TransportationImage;
use App\Models\TransportationComment;
use App\Models\CMS\CMSTransportation;

class TranportationController extends Controller
{
    public function index(){
    $language=Language::latest()->where("status","active")->get();
    $city=City::latest()->where("status",1)->get();
    $transportation_type=CMSTransportation::where("status",1)->get()->toArray();
    return view("admin.page.transportation.add_transportation",compact('language','city','transportation_type'));

   }

   public function create(Request $request){


     $rule=[
     "name"=>"required",
     "type"=>"required|exists:c_m_s_transportations,name",
     "city"=>"required|exists:cities,id",
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
     "star"=>"required",
     "multi_image"=>"required",


     ];
     $custom_rule=[
        'name.required'=>"Transportation can`t be empty",
        "type.exists"=>"Select Transportation Type",
        "city.exists"=>"Select City",
        "city.required"=>"Select City",
    
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
         "star.required"=>"Star can`t be empty",
         "multi_image.required"=>"Select At Least one image",


     ];

     $validate=Validator::make($request->all(),$rule,$custom_rule);
     if($validate->fails()){
        return redirect()->back()->withInput($request->all())->withErrors($validate);
     }
     else{
        $file=$request->file("image");
        $filename=rand(1,90).time().".".$file->getClientOriginalExtension();
        $data=$request->all();
         // $city=json_encode($request->city);
        $city=$request->city;
        $data['city']=$city;
        $data['image']=$filename;
        $data['driver_language']=$request->lang_name;
        $check=Transportation::where("name",$request->name)->get()->count();
        if($check){
             $message="<div class='alert alert-warning p-font' ><b>Transportation Already Created</b><i class='la la-close close' data-dismiss='alert'></i></div>";
             return redirect()->back()->with("message",$message);
        }
        else{
            if($create=Transportation::create($data)){
                $file->move("transportation-image/images/",$filename);
                $all_multiple_image=$request->file("multi_image");
                foreach($all_multiple_image as $image){
                      $filename=rand(1,99).time().".".$image->getClientOriginalExtension();
                      $data=array(
                        'transportation_id'=>$create->id,
                        "image"=>$filename,
                        "status"=>1,

                      );
                      if(TransportationImage::create($data)){
                        $image->move("transportation-image/images/",$filename);
                      }
                }
                 $message="<div class='alert alert-success p-font' ><b>Transportation Created Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";
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
    $data=Transportation::latest()->paginate(20);
    return view("admin.page.transportation.transportation_list",compact('data'));
   }
   //status change
    public function status_change(Request $request,$id){
        $data=Transportation::where("id",base64_decode($id))->first();
        if($data->status==1){
            $update=Transportation::where("id",base64_decode($id))->update(['status'=>0]);
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
              $update=Transportation::where("id",base64_decode($id))->update(['status'=>1]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Transportation Updated Successfully</b></div>";
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
        $city=City::latest()->where("status",1)->get();
        $data=Transportation::where("id",base64_decode($id))->first();
        $language=Language::all();
        $transportation_type=CMSTransportation::where("status",1)->get()->toArray();


        return view("admin.page.transportation.transportation_edit",compact('data','language','city','transportation_type'));
    }

    //update data store
    public function edit_data(Request $request){

        if($request->hasFile("image")){
            $rule=[
     "name"=>"required",
     "type"=>"required|exists:c_m_s_transportations,name",
   
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
      "star"=>"required",
      "city"=>"required|exists:cities,id",


     ];
     $custom_rule=[
        'name.required'=>"Transportation Name can`t be empty",
        "type.exists"=>"Select Transportation Type",
        
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
         "star.required"=>"Star can`t be empty",
         "city.exists"=>"Select City",


     ];
     $validate=Validator::make($request->all(),$rule,$custom_rule);
     if($validate->fails()){
        return redirect()->back()->withInput()->withErrors($validate);
     }
     else{
        $pre_data=Transportation::where("id",$request->id)->first();
        $file=$request->file("image");
        $filename=rand(1,9999999999999999).session_id().time().uniqid().".".$file->getClientOriginalExtension();
        @unlink("transportation-image/images/".$pre_data->image);
        $data=$request->all();
        $data['driver_language']=$request->lang_name;
         // $city=json_encode($request->city);
        $city=$request->city;
        $data['city']=$city;
        unset($data['_token']);
        unset($data['lang_name']);
        $data['image']=$filename;
        if(Transportation::where("id",$request->id)->update($data)){
            $file->move("transportation-image/images/",$filename);
            $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Transportation updated successfully</b></div>";
            return redirect("/admin/transportation/view-transportation")->with("message",$message);
        }
        else{
            $message="<div class='alert alert-warning'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
            return redirect("/admin/transportation/view-transportation")->with("message",$message);
        }

     }

        }
        else{
           $rule=[
     "name"=>"required",
     "type"=>"required|exists:c_m_s_transportations,name",
   
     
     "lang_name"=>"required|exists:languages,lang_name",
     "address"=>"required|max:500",
     "description"=>"required",
     "rating"=>"required",
     "status"=>"required|in:1,0",
     "price"=>"required|integer|not_in:0",
     "link"=>"required",
     "map"=>"required",
     "phone"=>"required",
      "star"=>"required",
      "city"=>"required|exists:cities,id",


     ];
     $custom_rule=[
        'name.required'=>"Tour And Activity Name can`t be empty",
        "type.exists"=>"Select Tour and Activity Type",
      
        
       
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
         "star.required"=>"Star can`t be empty",
         "city.exists"=>"Select City",


     ];
     $validate=Validator::make($request->all(),$rule,$custom_rule);

     if($validate->fails()){
        return redirect()->back()->withInput()->withErrors($validate);
     }
     else{
        unset($request['_token']);
        $data=$request->all();
        $data['driver_language']=$request->lang_name;
        unset($data['lang_name']);
        $update=Transportation::where("id",$request->id)->update($data);
        if($update){
             $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Transportation updated successfully</b></div>";
            return redirect("/admin/transportation/view-transportation")->with("message",$message);
        }
        else{
             $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect("/admin/transportation/view-transportation")->with("message",$message);
        }
     }

        }
    }


    public function delete(Request $request,$id){
        $data=Transportation::where("id",base64_decode($id))->first();
        @unlink("transportation-image/images/".$data->image);
        if(Transportation::where("id",base64_decode($id))->delete()){
            $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Transportation Deleted Successfully</b></div>";
             return redirect()->back()->with("message",$message);

        }
        else{
            $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect()->back()->with("message",$message);
        }
    }



    public function showMultiImage(Request $request,$id){
        $data=Transportation::where("id",base64_decode($id))->first();
        $imagedata=TransportationImage::where("transportation_id",base64_decode($id))->latest()->get();
        return view("admin.page.transportation.view_transportation_more_image",['data'=>$data,'imagelist'=>$imagedata]);
    }

    public function addMoreImage(Request $request,$id){
            $data=Transportation::where("id",base64_decode($id))->first();
        return view("admin.page.transportation.add_transportation_image",['data'=>$data]);
    }

    public function addMoreImageStore(Request $request){
        $image=$request->file("image");
      foreach($image as $image_list){
        $filename=rand(1,99).time().".".$image_list->getClientOriginalExtension();
        $data=array(
            "transportation_id"=>$request->id,
            "image"=>$filename,
            "status"=>1,
        );
       TransportationImage::create($data);
        $image_list->move("transportation-image/images/",$filename);

      }
       $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Transportation Image Added Successfully</b></div>";
             return redirect()->back()->with("message",$message);
    }

    public function More_image_status_change(Request $request,$id){
         $data=TransportationImage::where("id",base64_decode($id))->first();
        if($data->status==1){
            $update=TransportationImage::where("id",base64_decode($id))->update(['status'=>0]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Transportation Image Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }
           

        }
        else{
              $update=TransportationImage::where("id",base64_decode($id))->update(['status'=>1]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Transportation Image Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }

        }
    }

    public function deleteMoreImage(Request $request,$id){
         $data=TransportationImage::where("id",base64_decode($id))->first();
        @unlink("transportation-image/images/".$data->image);
        if(TransportationImage::where("id",base64_decode($id))->delete()){
            $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Transportation Image Deleted Successfully</b></div>";
             return redirect()->back()->with("message",$message);

        }
        else{
            $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect()->back()->with("message",$message);
        }
    }

    public function editMoreImage(Request $request,$id){
        $data=TransportationImage::where("id",base64_decode($id))->first();
        return view("admin.page.transportation.transportation_more_image_edit",['data'=>$data]);
    }

    public function moreImageEditData(Request $request){

        $pre_data=TransportationImage::where("id",$request->id)->first();
        @unlink("transportation-image/images/".$pre_data->image);
        $file=$request->file("image");
        $filename=rand(1,99).time().uniqid().".".$file->getClientOriginalExtension();
        $update=TransportationImage::where("id",$request->id)->update(['image'=>$filename]);
        if($update){
            $file->move("transportation-image/images/",$filename);
             $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Transportation Image Updated Successfully</b></div>";
             return redirect()->back()->with("message",$message);
        }
        else{
             $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect()->back()->with("message",$message);
        }
    }

     // transportation comment
    public function comment(Request $request,$id){
        $data=TransportationComment::where("transportation_id",base64_decode($id))->get()->toArray();

     
            return view("admin.page.transportation.transportation_comment",compact('data'));
      
    }
}
