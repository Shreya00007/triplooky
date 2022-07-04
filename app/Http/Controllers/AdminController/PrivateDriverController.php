<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PrivateDriver;
use Illuminate\Support\Facades\File;

class PrivateDriverController extends Controller
{
   public function index(){
    $region=DB::table("morocco_region")->get();
    return view("admin.page.private_driver.add_private_driver",compact('region'));
   }

   public function getCity(Request $request,$id){
    $data=DB::table("morocco_cities")->where("region",$id)->get();
    return response()->json(['data'=>$data]);
   }

   public function store(Request $request){
    $file=$request->file("driver_image");
    $filename=rand(1,9999999999999).time().session_id().uniqid().".".$file->getClientOriginalExtension();

    $region=DB::table("morocco_region")->where("id",$request->region)->first();
    $city=DB::table("morocco_cities")->where("id",$request->city)->first();
    $data=['driver_name'=>$request->driver_name,'image'=>$filename,'phone'=>$request->contact_no,'address'=>$request->address,'description'=>$request->desc,'charge'=>(int)$request->price,'region_name'=>$region->region,"city_name"=>$city->ville,'email'=>$request->email,'alternate_phone'=>$request->alternate_no];

      $check=PrivateDriver::where("email",$request->email)->get()->count();
      if($check>0){
        return response()->json(['message'=>"Email Already Exist"]);

      }
      else{
        $check=PrivateDriver::create($data);
        if($check){
            $file->move("Private Driver/images/driver/",$filename);
            return response()->json(['message'=>"success"]);
        }
        else{
            return response()->json(['message'=>"Failed"]);
        }
      }
      
   }

   public function show(){
    $data=PrivateDriver::orderBy("id","desc")->paginate(10);
    return view("admin.page.private_driver.list_private_driver",compact('data'));
   }

   public function status_change(Request $request,$id){
    $id=base64_decode($id);

      $data=PrivateDriver::where("id",$id)->first();

         
        if($data->status==0){
            $update=PrivateDriver::where("id",$id)->update(['status'=>1]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Driver Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }
        }
        else{

            $update=PrivateDriver::where("id",$id)->update(['status'=>0]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Driver Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }

        }
   }

   public function edit(Request $request,$id){
    
  $id=base64_decode($id);

    $data=PrivateDriver::where("id",$id)->first();
    $region=DB::table("morocco_region")->get();
   
    $region_id=DB::table("morocco_region")->select("id")->where("region",$data->region_name)->first();
    
    $city=DB::table("morocco_cities")->where("region",$region_id->id)->get();
    return view("admin.page.private_driver.edit_private_driver",compact('data','region','city'));
   }

   public function edit_data(Request $request){
   

   
    if($request->hasfile("driver_image")){
        $file=$request->file("driver_image");
    $filename=rand(1,9999999999999).time().session_id().uniqid().".".$file->getClientOriginalExtension();
         $data=['driver_name'=>$request->driver_name,'phone'=>$request->contact_no,'address'=>$request->address,'description'=>$request->desc,'charge'=>(int)$request->price,'region_name'=>$request->region,"city_name"=>$request->city,'email'=>$request->email,'alternate_phone'=>$request->alternate_no,'image'=>$filename];
         $pre_data=PrivateDriver::where("id",$request->id)->first();
         File::delete("Private Driver/images/driver/".$pre_data->image);
         $update=PrivateDriver::where("id",$request->id)->update($data);
         if($update){
            $file->move("Private Driver/images/driver/",$filename);
            return response()->json(['message'=>"success"]);
         }
         else{
            return response()->json(['message'=>"Failed"]);
         }
    }
    else{
         $data=['driver_name'=>$request->driver_name,'phone'=>$request->contact_no,'address'=>$request->address,'description'=>$request->desc,'charge'=>(int)$request->price,'region_name'=>$request->region,"city_name"=>$request->city,'email'=>$request->email,'alternate_phone'=>$request->alternate_no];

         if(PrivateDriver::where("id",$request->id)->update($data)){
            return response()->json(['message'=>"success"]);
         }
         else{
            return response()->json(['message'=>"Failed"]);
         }

    }
   }



   public function delete(Request $request,$id){
    $id=base64_decode($id);
    $pre_data=PrivateDriver::where("id",$id)->first();
    File::delete("Private Driver/images/driver/".$pre_data->image);
    $check=PrivateDriver::where("id",$id)->delete();
    if($check){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Driver Deleted Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
    }
    else{
        return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font text-danger'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
    }
   }
}




