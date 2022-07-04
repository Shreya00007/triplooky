<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rides;
use Illuminate\Support\Facades\File;


class RideController extends Controller
{
    public function index(){
        $region=DB::table("morocco_region")->get();
        return view("admin.page.rides.add_rides",compact('region'));
    }

    public function getCity(Request $request,$id){
        $data=DB::table("morocco_cities")->where("region",$id)->get();
        return response()->json(['data'=>$data]);
    }

    public function store(Request $request){
        $region=DB::table("morocco_region")->where("id",$request->region)->first();
        $city=DB::table("morocco_cities")->where("id",$request->city)->first();
        $file=$request->file("image");
        $filename=rand(1,9999999999999).time().session_id().uniqid().".".$file->getClientOriginalExtension();
        $data=array(
            "region_name"=>$region->region,
            "region_id"=>$region->id,
            "city_name"=>$city->ville,
            "city_id"=>$city->id,
            "rider_name"=>$request->rider_name,
            "rider_email"=>$request->rider_email,
            "rider_phone"=>$request->contact_no,
            "vehicle_name"=>$request->vehical_name,
            "vehicle_brand"=>$request->brand,
            "vehicle_type"=>$request->vehical_type,
            "vehicle_no"=>$request->vehile_no,
            "start_location"=>$request->start_location,
            "end_location"=>$request->end_location,
            "start_time"=>date("Y-m-d",strtotime($request->start_time)),
            "end_time"=>date("Y-m-d",strtotime($request->end_time)),
            "owner_name"=>$request->owner_name,
            "owner_email"=>$request->owner_email,
            "owner_contact_no"=>$request->owner_contact_no,
            "start_location"=>$request->start_location,
            "end_location"=>$request->end_location,
            "status"=>0,
            "rider_image"=>$filename,
            "charge"=>(int)$request->charge,



        );

         $file->move("Rides/image/",$filename);
         $create=Rides::create($data);
         if($create){
            return response()->json(['message'=>"success"]);
         }
         else{
            return response()->json(['message'=>"Failed"]);
         }
        
    }

    public function view_ride(){
        $data=Rides::orderBy("id","desc")->paginate(10);
        return view("admin.page.rides.ride_list",compact('data'));
    }

    public function status_change(Request $request,$id)
    {
        $id=base64_decode($id);

         $data=Rides::where("id",$id)->first();

         
        if($data->status==0){
            $update=Rides::where("id",$id)->update(['status'=>1]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Rides Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }
        }
        else{

            $update=Rides::where("id",$id)->update(['status'=>0]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Rides Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }

        }
    }

    public function delete(Request $request,$id){
        $pre_data=Rides::where("id",base64_decode($id))->first();
        File::delete("Ride/image/".$pre_data->rider_image);
        $check=Rides::where("id",base64_decode($id))->delete();
        if($check){
            return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Rides Deleted Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");

        }
        else{
         return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
        }

    }

    public function edit(Request $request,$id){
        $data=Rides::where("id",base64_decode($id))->first();
        $region=DB::table("morocco_region")->get();
        $city=DB::table("morocco_cities")->where("region",$data->region_id)->get();
        return view("admin.page.rides.edit_ride",compact('data','region','city'));
    }



    public function edit_data(Request $request){
         
         $region=DB::table("region")->where("id",$request->region)->first();
        $city=DB::table("ville")->where("id",$request->city)->first();
        if($request->hasfile('image')){
            $pre_data=Rides::where("id",$request->id)->first();
            $file=$request->file("image");
        $filename=rand(1,9999999999999).time().session_id().uniqid().".".$file->getClientOriginalExtension();
        $data=array(
            "region_name"=>$region->region,
            "region_id"=>$region->id,
            "city_name"=>$city->ville,
            "city_id"=>$city->id,
            "rider_name"=>$request->rider_name,
            "rider_email"=>$request->rider_email,
            "rider_phone"=>$request->contact_no,
            "vehicle_name"=>$request->vehical_name,
            "vehicle_brand"=>$request->brand,
            "vehicle_type"=>$request->vehical_type,
            "vehicle_no"=>$request->vehile_no,
            "start_location"=>$request->start_location,
            "end_location"=>$request->end_location,
            "start_time"=>date("Y-m-d",strtotime($request->start_time)),
            "end_time"=>date("Y-m-d",strtotime($request->end_time)),
            "owner_name"=>$request->owner_name,
            "owner_email"=>$request->owner_email,
            "owner_contact_no"=>$request->owner_contact_no,
            "start_location"=>$request->start_location,
            "end_location"=>$request->end_location,
           
            "rider_image"=>$filename,
            "charge"=>(int)$request->charge,



        );
         

        $update=Rides::where("id",$request->id)->update($data);
        if($update){
            File::delete("Rides/image/".$pre_data->rider_image);
            $file->move("Rides/image/",$filename);

            return response()->json(['message'=>"success"]);
        }
        else{
            return response()->json(['message'=>"Failed"]);
        }
        }
        else{

        $data=array(
            "region_name"=>$region->region,
            "region_id"=>$region->id,
            "city_name"=>$city->ville,
            "city_id"=>$city->id,
            "rider_name"=>$request->rider_name,
            "rider_email"=>$request->rider_email,
            "rider_phone"=>$request->contact_no,
            "vehicle_name"=>$request->vehical_name,
            "vehicle_brand"=>$request->brand,
            "vehicle_type"=>$request->vehical_type,
            "vehicle_no"=>$request->vehile_no,
            "start_location"=>$request->start_location,
            "end_location"=>$request->end_location,
            "start_time"=>date("Y-m-d",strtotime($request->start_time)),
            "end_time"=>date("Y-m-d",strtotime($request->end_time)),
            "owner_name"=>$request->owner_name,
            "owner_email"=>$request->owner_email,
            "owner_contact_no"=>$request->owner_contact_no,
            "start_location"=>$request->start_location,
            "end_location"=>$request->end_location,
           
            
            "charge"=>(int)$request->charge,



        );

        $update=Rides::where("id",$request->id)->update($data);
        if($update){
            return response()->json(['message'=>"success"]);
        }
        else{
            return response()->json(['message'=>"Failed"]);
        }
        }

    }
}
