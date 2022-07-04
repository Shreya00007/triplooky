<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarRental;
use App\Models\CarRenetalImage;
use DB;
use Illuminate\Support\Facades\File;

class CarRentalController extends Controller
{
    public function index(){
        $region=DB::table("morocco_region")->get();

        return view("admin.page.car-rental.add_car_rental",compact('region'));
    }

    public function getCity(Request $request,$id){
        $data=DB::table("morocco_cities")->where("region",$id)->get();
        return response()->json(['data'=>$data]);
    }

    public function store(Request $request){
   $check=CarRental::where("car_no",$request->car_no)->get()->count();
   if($check>0){
  return response()->json(["message"=>'Car Already exist']);
   }
   else{
    $region=DB::table("morocco_region")->where("id",$request->region)->first();
    $city=DB::table("morocco_cities")->where("id",$request->city)->first();
    $file=$request->file("thumb_image");
    $filename=rand(1,999999999999999).time().session_id().uniqid().".".$file->getClientOriginalExtension();
    $data=array(
        "car_no"=>$request->car_no,
        "brand"=>$request->brand,
        "type"=>$request->car_type,
        "region_id"=>$region->id,
        "region_name"=>$region->region,
        "city_name"=>$city->ville,
        "city_id"=>$city->id,
        "car_model"=>$request->car_model,
        "charge"=>(int)$request->charge,
        "owner_name"=>$request->owner_name,
        "owner_email"=>$request->email,
        "owner_contact_no"=>$request->contact_no,
        "image"=>$filename,
        "no_of_people"=>(int)$request->no_of_people,
        "description"=>$request->desc,
        "status"=>0


    );

     $file->move("Car Rental/images/",$filename);
     $multiple_image=$request->file("multi_image");
     if($create=CarRental::create($data)){
        foreach($multiple_image as $image){
            $filename=rand(1,9999999999999).time().session_id().uniqid().".".$image->getClientOriginalExtension();
            $data=array(
                "image"=>$filename,
                "car_rental_id"=>$create->id,

            );
            if(CarRenetalImage::create($data)){
                $image->move("Car Rental/images/multiple_image/",$filename);
                $message="success";

            }
            else{
                $message="failed";
            }

        }
        return response()->json(['message'=>"success"]);
     }
     else{
        return response()->json(['message'=>"Failed"]);
     }
      
   }





    }


    public function view_car(){
        $data=CarRental::orderBy("id","desc")->paginate(10);
        return view("admin.page.car-rental.car_list",compact('data'));
    }

    public function status_change(Request $request,$id){
          $id=base64_decode($id);

        $data=CarRental::where("id",$id)->first();

         
        if($data->status==0){
            $update=CarRental::where("id",$id)->update(['status'=>1]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Car Rental Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }
        }
        else{

            $update=CarRental::where("id",$id)->update(['status'=>0]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Car Rental Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }


    }
}




public function delete(Request $request,$id){
    $pre_data=CarRental::where("id",base64_decode($id))->first();
    File::delete("CarRental/images/".$pre_data->image);
    $all_image=CarRenetalImage::where("car_rental_id",$pre_data->id)->get();
    foreach($all_image as $image){
        File::delete("Car Rental/images/multiple_image/".$image->image);
    }

    if(CarRental::where("id",base64_decode($id))->delete() && CarRenetalImage::where("car_rental_id",base64_decode($id))->delete()){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Car Rental Deleted Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
    }
    else{
        return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
    }
}


public function edit(Request $request,$id){
    $id=base64_decode($id);
    $data=CarRental::where("id",$id)->first();
    $region=DB::table("morocco_region")->get();
    $city=DB::table("morocco_cities")->where("region",$data->region_id)->get();
    return view("admin.page.car-rental.edit_car_rental",compact('data','region','city'));
}



public function edit_data(Request $request){
  $check=CarRental::where("car_no",$request->car_no)->get()->count();
  if($check>1){

  }
  else{

     $region=DB::table("morocco_region")->where("id",$request->region)->first();
    $city=DB::table("morocco_cities")->where("id",$request->city)->first();

    if($request->hasfile("thumb_image")){
        $pre_data=CarRental::where("id",$request->id)->first();
         $file=$request->file("thumb_image");
    $filename=rand(1,999999999999999).time().session_id().uniqid().".".$file->getClientOriginalExtension();

          $data=array(
        "car_no"=>$request->car_no,
        "brand"=>$request->brand,
        "type"=>$request->car_type,
        "region_id"=>$region->id,
        "region_name"=>$region->region,
        "city_name"=>$city->ville,
        "city_id"=>$city->id,
        "car_model"=>$request->car_model,
        "charge"=>(int)$request->charge,
        "owner_name"=>$request->owner_name,
        "owner_email"=>$request->email,
        "owner_contact_no"=>$request->contact_no,
        "image"=>$filename,
        "no_of_people"=>(int)$request->no_of_people,
        "description"=>$request->desc,
       );
           File::delete("Car Rental/images/".$pre_data->image);

         $update=CarRental::where("id",$request->id)->update($data);
         if($update){
             $file->move("Car Rental/images/",$filename);
            return response()->json(['message'=>"success"]);
         }
         else{
            return response()->json(['message'=>"Failed"]);
         }
    }
    else{

         $data=array(
        "car_no"=>$request->car_no,
        "brand"=>$request->brand,
        "type"=>$request->car_type,
        "region_id"=>$region->id,
        "region_name"=>$region->region,
        "city_name"=>$city->ville,
        "city_id"=>$city->id,
        "car_model"=>$request->car_model,
        "charge"=>(int)$request->charge,
        "owner_name"=>$request->owner_name,
        "owner_email"=>$request->email,
        "owner_contact_no"=>$request->contact_no,
       
        "no_of_people"=>(int)$request->no_of_people,
        "description"=>$request->desc,
       );
        

         $update=CarRental::where("id",$request->id)->update($data);
         if($update){
           
            return response()->json(['message'=>"success"]);
         }
         else{
            return response()->json(['message'=>"Failed"]);
         }


    }

  }

    
}

public function multiple_image(Request $request,$id){

    $data=CarRenetalImage::orderBy("id","desc")->where("car_rental_id",base64_decode($id))->get();
    
    $car=CarRental::select(["car_no",'id'])->where("id",base64_decode($id))->first();
    return view("admin.page.car-rental.view_image",compact('data','car'));
}


public function delete_multiple_image(Request $request,$id){
    $id=base64_decode($id);
    $pre_data=CarRenetalImage::where("id",$id)->first();
   
    $delete=CarRenetalImage::where("id",$id)->delete();
    if($delete){
         File::delete("Car Rental/images/multiple_image/".$pre_data->image);
       return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Car Rental Photo Deleted Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");

    }
    else{
        return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
    }
}


public function add_more_image(Request $request){
   
         $file=$request->file("image");
         $filename=rand(1,999999999999999999).time().session_id().uniqid().".".$file->getClientOriginalExtension();
         $data=array(
            "car_rental_id"=>$request->id,
            "image"=>$filename,

         );
        

         if(CarRenetalImage::create($data)){
            $file->move("Car Rental/images/multiple_image/",$filename);
            return response()->json(['message'=>"success"]);
         }
         else{
            return response()->json(['messages'=>"Failed"]);
         }
    }


    public function update_multi_image(Request $request){
       
        $pre_data=CarRenetalImage::where("id",$request->image_id)->first();
        File::delete("Car Rental/images/multiple_image/".$pre_data->image);
        $file=$request->file("image");
        $filename=rand(1,999999999999999999).time().uniqid().session_id().".".$file->getClientOriginalExtension();
        $update=CarRenetalImage::where("id",$pre_data->id)->update(["image"=>$filename]);
        if($update){
            $file->move("Car Rental/images/multiple_image/",$filename);
            return response()->json(['message'=>"success"]);
        }
        else{
            return response()->json(['message'=>"Failed"]);
        }
    }
}
