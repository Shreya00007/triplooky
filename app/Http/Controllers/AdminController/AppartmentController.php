<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Appartment;
use App\Models\AppartmentImage;
use Illuminate\Support\Facades\File;


class AppartmentController extends Controller
{
    public function index(){
      $region=DB::table("morocco_region")->get();
      return view("admin.page.Appartment.add_appartment",compact('region'));
    }

    public function getCity(Request $request,$id){
        $city=DB::table("morocco_cities")->where("region",$id)->get();
        return response()->json(['data'=>$city]);
    }

    public function store(Request $request){
        $check=Appartment::where("appartment_name",$request->appartment_name)->get()->count();
        if($check==0){
            $check=Appartment::where("owner_email",$request->email)->get()->count();
            if($check==0){
                $file=$request->file("thumb_image");
                $filename=rand(1,99999999999999999).time().uniqid().session_id().".".$request->file("thumb_image")->getClientOriginalExtension();
                $region=DB::table("morocco_region")->where("id",$request->region)->first();
                $city=DB::table("morocco_cities")->where("id",$request->city)->first();

                $data=array(
               "appartment_name"=>$request->appartment_name,
               "thumb_image"=>$filename,
               "no_room"=>(int)$request->no_room,
               "no_of_bed"=>(int)$request->no_bed,
               "furnished_facility"=>(int)$request->furnished_facility,
               "region_name"=>$region->region,
               "region_id"=>$region->id,
               "city_name"=>$city->ville,
               "city_id"=>$city->id,
               "room_size"=>$request->room_size,
               "price"=>(int)$request->price,
               "bathroom"=>$request->bathroom,
               "parking"=>$request->parking,
               "balcony"=>(int)$request->balcony,
               "age_of_property"=>$request->age_of_property,
               "build_area"=>$request->build_area,
               "carpet_area"=>$request->carpet_area,
               "owner_name"=>$request->owner_name,
               "owner_contact_no"=>(int)$request->contact_no,
               "owner_email"=>$request->email,
               "security_charge"=>(int)$request->security_charge,
               "broker_charge"=>(int)$request->broker_charge,
               "address"=>$request->address,
               "description"=>$request->desc,
               "is_available"=>(int)$request->is_available,
               "status"=>0

                );
  
               
                $file->move("Appartment/images/thumb_image/",$filename);
              

                
                $create=Appartment::create($data);
             
                $message="";
                if($create){
                    $multiple_image=$request->file("multi_image");
                    foreach($multiple_image as $image){
                        $filename=rand(1,99999999999999).time().session_id().uniqid().".".$image->getClientOriginalExtension();
                        $image_data=array(
                            "appartment_id"=>$create->id,
                            "image"=>$filename,
                        );
                        if(AppartmentImage::create($image_data)){

                            $image->move("Appartment/images/multiple_image/",$filename);
                            $message="success";

                        }
                        else{
                            $message="failed";
                        }

                    }

                    return response()->json(['message'=>"success"]);

                }
                else{
                    return response()->json(['message'=>"Something is wrong try again"]);
                }


            }
            else{
                return response()->json(['message'=>"Appartment name is already exists"]);
            }
        }
        else{
            return response()->json(['message'=>"Appartment name is already exists"]);
        }

    }


    public function show(){
        $data=Appartment::orderBy("id","desc")->paginate(10);
        return view("admin.page.Appartment.appartment_list",compact('data'));
    }



      public function status(Request $request,$id){

        $id=base64_decode($id);

        $data=Appartment::where("id",$id)->first();

         
        if($data->status==0){
            $update=Appartment::where("id",$id)->update(['status'=>1]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Appartment Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }
        }
        else{

            $update=Appartment::where("id",$id)->update(['status'=>0]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Appartment Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }

        }
    }

    public function edit(Request $request,$id){
        $id=base64_decode($id);
        $data=Appartment::where("id",$id)->first();
        $region=DB::table("morocco_region")->get();
        $city=DB::table("morocco_cities")->where("region",$data->region_id)->get();
        return view("admin.page.Appartment.edit_appartment",compact('data','region','city'));
    }

    public function edit_data(Request $request){
       $pre_data=Appartment::where("appartment_name",$request->appartment_name)->get();
       if(count($pre_data)>1){
        echo "This Name is already exists";
       }
       else{
           $region=DB::table("morocco_region")->where("id",$request->region)->first();
                $city=DB::table("morocco_cities")->where("id",$request->city)->first();
        if($request->hasfile("thumb_image")){
           $file=$request->file("thumb_image");
                $filename=rand(1,99999999999999999).time().uniqid().session_id().".".$request->file("thumb_image")->getClientOriginalExtension();
                $region=DB::table("morocco_region")->where("id",$request->region)->first();
                $city=DB::table("morocco_cities")->where("id",$request->city)->first();

                $data=array(
               "appartment_name"=>$request->appartment_name,
               "thumb_image"=>$filename,
               "no_room"=>(int)$request->no_room,
               "no_of_bed"=>(int)$request->no_bed,
               "furnished_facility"=>(int)$request->furnished_facility,
               "region_name"=>$region->region,
               "region_id"=>$region->id,
               "city_name"=>$city->ville,
               "city_id"=>$city->id,
               "room_size"=>$request->room_size,
               "price"=>(int)$request->price,
               "bathroom"=>$request->bathroom,
               "parking"=>$request->parking,
               "balcony"=>(int)$request->balcony,
               "age_of_property"=>$request->age_of_property,
               "build_area"=>$request->build_area,
               "carpet_area"=>$request->carpet_area,
               "owner_name"=>$request->owner_name,
               "owner_contact_no"=>(int)$request->contact_no,
               "owner_email"=>$request->email,
               "security_charge"=>(int)$request->security_charge,
               "broker_charge"=>(int)$request->broker_charge,
               "address"=>$request->address,
               "description"=>$request->desc,
               "is_available"=>(int)$request->is_available,
               "status"=>0

                );

     
    
                File::delete("Appartment/images/thumb_image/".$pre_data[0]->thumb_image);

                $file->move("Appartment/images/thumb_image/",$filename);
                $update=Appartment::where("id",$request->id)->update($data);
                if($update){
                    return response()->json(['message'=>"success"]);
                }
                else{
                    return response()->json(['message'=>"Failed"]);
                }


        }
        else{
                  
           $data=array(
               "appartment_name"=>$request->appartment_name,
                
               "no_room"=>(int)$request->no_room,
               "no_of_bed"=>(int)$request->no_bed,
               "furnished_facility"=>(int)$request->furnished_facility,
               "region_name"=>$region->region,
               "region_id"=>$region->id,
               "city_name"=>$city->ville,
               "city_id"=>$city->id,
               "room_size"=>$request->room_size,
               "price"=>(int)$request->price,
               "bathroom"=>$request->bathroom,
               "parking"=>$request->parking,
               "balcony"=>(int)$request->balcony,
               "age_of_property"=>$request->age_of_property,
               "build_area"=>$request->build_area,
               "carpet_area"=>$request->carpet_area,
               "owner_name"=>$request->owner_name,
               "owner_contact_no"=>(int)$request->contact_no,
               "owner_email"=>$request->email,
               "security_charge"=>(int)$request->security_charge,
               "broker_charge"=>(int)$request->broker_charge,
               "address"=>$request->address,
               "description"=>$request->desc,
               "is_available"=>(int)$request->is_available,
               "status"=>0

                );


           $update=Appartment::where("id",$request->id)->update($data);
           if($update){
            return response()->json(['message'=>"success"]);
           }
           else{
            return response()->json(['message'=>"Failed"]);
           }
  
        }
       }
    }

    public function view_image(Request $request,$id){
        $id=base64_decode($id);
        $data=AppartmentImage::where("appartment_id",$id)->orderBy("id","desc")->get();
        $apparatment=Appartment::where("id",$id)->first();
        return view("admin.page.Appartment.view_image",compact('data','apparatment'));
    }

    public function update_multi_image(Request $request){
        $pre_data=AppartmentImage::where("id",$request->image_id)->first();
        File::delete("Appartment/images/multiple_image/".$pre_data->image);
        $file=$request->file("image");
        $filename=rand(1,999999999999999999).time().uniqid().session_id().".".$file->getClientOriginalExtension();
        $update=AppartmentImage::where("id",$pre_data->id)->update(["image"=>$filename]);
        if($update){
            $file->move("Appartment/images/multiple_image/",$filename);
            return response()->json(['message'=>"success"]);
        }
        else{
            return response()->json(['message'=>"Failed"]);
        }
    }

    public function add_more_image(Request $request){
         $file=$request->file("image");
         $filename=rand(1,999999999999999999).time().session_id().uniqid().".".$file->getClientOriginalExtension();
         $data=array(
            "appartment_id"=>$request->id,
            "image"=>$filename,

         );

         if(AppartmentImage::create($data)){
            $file->move("Appartment/images/multiple_image/",$filename);
            return response()->json(['message'=>"success"]);
         }
         else{
            return response()->json(['messages'=>"Failed"]);
         }
    }


    public function delete_more_image(Request $request,$id){
        $pre_data=AppartmentImage::where("id",$id)->first();
        File::delete("Appartment/images/multiple_image/".$pre_data->image);
        if(AppartmentImage::where("id",$id)->delete()){
             return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Appartment Photo Deleted Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
        }
        else{
            return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
        }
    }
}
