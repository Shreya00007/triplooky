<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Hotel;
use App\Models\HotelImage;
use Illuminate\Support\Facades\File;

class HotelController extends Controller
{
    public function index(){
        $region=DB::table("morocco_region")->get();

        return view("admin.page.hotel.hotel",['region'=>$region]);
    }


    public function getCity(Request $request,$id){
        $data=DB::table("morocco_cities")->where("region",$id)->get();
        return response()->json(['data'=>$data]);
    }

    public function store(Request $request){
       
      
        $file=$request->file("thumb_image");
        $filename=rand(1,999999999).session_id().time().uniqid().$file->getClientOriginalName();
        $region=DB::table("morocco_region")->where("id",$request->region)->first();
        $city=DB::table("morocco_cities")->where("id",$request->city)->first();
        $data=array(
          "hotels_name"=>$request->hotel_name,
          "no_room"=>$request->no_room,
          "no_of_bed"=>$request->input("no-of-bed"),
          "thumb_image"=>$filename,
          "tv"=>$request->tv,
          "room_size"=>$request->room_size,
          "price"=>(int)$request->price,
          "location"=>$request->location,
          "description"=>$request->desc,
          "region_id"=>$region->id,
          "region_name"=>$region->region,
          "city_id"=>$city->id,
          "city_name"=>$city->ville,
          "hotel_link"=>$request->hotel_link,
          "status"=>0,

        );


        try{
              $check=Hotel::where("hotels_name",$request->hotel_name)->get()->count();
         if($check>0){
          return response()->json(['message'=>"This Hotel name is  already exists"]);
         }
         else{
            $message="";
            $insert_data=Hotel::create($data);
            $file->move("hotels_image/images/thumb_image",$filename);
             /// multiple image insert of hotels
               $multiple_image=$request->file("hotel_image");
        foreach($multiple_image as $image){
            $filename=rand(1,999999999).session_id().uniqid().time().$image->getClientOriginalName();
            
            $data=array(
                "hotel_id"=>$insert_data->id,
                "image"=>$filename,
                "status"=>0,


            );
            if(HotelImage::create($data)){
                $message="success";
                $image->move("hotels_image/images/multiple_image/",$filename);
            }
            else{
                $message="failed";
            }
        }
        return response()->json(['message'=>"success"]);

        //end insert multple image
         }
        }
        catch(\Exceptions $e){

            return response()->json(['message'=>"failed"]);

        }

    }


    public function show(){
        $data=Hotel::paginate(10);
        return view("admin.page.hotel.hotel_list",['data'=>$data]);
    }



      public function status_change(Request $request,$id){

        $id=base64_decode($id);

        $data=Hotel::where("id",$id)->first();

         
        if($data->status==0){
            $update=Hotel::where("id",$id)->update(['status'=>1]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Hotel Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }
        }
        else{

            $update=Hotel::where("id",$id)->update(['status'=>0]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Hotel Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }

        }
    }

    public function edit(Request $request,$id){
        $id=base64_decode($id);
        $region=DB::table("morocco_region")->get();
        $data=Hotel::where("id",$id)->first();
        $city=DB::table("morocco_cities")->where("region",$data->region_id)->get();
        return view("admin.page.hotel.hotel_edit",['data'=>$data,'region'=>$region,'city'=>$city]);
    }


    public function edit_data(Request $request){
        if($request->has("thumb_image")){
            $olddata=Hotel::where("id",$request->id)->first();
              $file=$request->file("thumb_image");
        $filename=rand(1,999999999).session_id().time().uniqid().$file->getClientOriginalName();
        $region=DB::table("morocco_region")->where("id",$request->region)->first();
        $city=DB::table("morocco_cities")->where("id",$request->city)->first();
        $data=array(
          "hotels_name"=>$request->hotel_name,
          "no_room"=>$request->no_room,
          "no_of_bed"=>$request->input("no-of-bed"),
          "thumb_image"=>$filename,
          "tv"=>$request->tv,
          "room_size"=>$request->room_size,
          "price"=>(int)$request->price,
          "location"=>$request->location,
          "desc"=>$request->desc,
          "region_id"=>$region->id,
          "region_name"=>$region->region,
          "city_id"=>$city->id,
          "city_name"=>$city->ville,
          "status"=>0,

        );
          File::delete("hotels_image/images/thumb_image/".$olddata->thumb_image);
          $file->move("hotels_image/images/thumb_image/",$filename);
         if(Hotel::where("id",$request->id)->update($data)){
            return response()->json(['message'=>"success"]);
        }
        else{
            return response()->json(['message'=>"Failed"]);
        }

        }
        else{
            $region=DB::table("morocco_region")->where("id",$request->region)->first();
        $city=DB::table("morocco_cities")->where("id",$request->city)->first();
        $data=array(
          "hotels_name"=>$request->hotel_name,
          "no_room"=>$request->no_room,
          "no_of_bed"=>$request->input("no-of-bed"),
          
          "tv"=>$request->tv,
          "room_size"=>$request->room_size,
          "price"=>(int)$request->price,
          "location"=>$request->location,
          "desc"=>$request->desc,
          "region_id"=>$region->id,
          "region_name"=>$region->region,
          "city_id"=>$city->id,
          "city_name"=>$city->ville,
          "status"=>0,

        );

        if(Hotel::where("id",$request->id)->update($data)){
            return response()->json(['message'=>"success"]);
        }
        else{
            return response()->json(['message'=>"Failed"]);
        }
        }
    }



    public function delete(Request $request,$id){
        $id=base64_decode($id);
        $olddata=Hotel::where("id",$id)->first();
         $multiple_image=HotelImage::where("hotel_id",$id)->get();
         foreach($multiple_image as $image){
            File::delete("hotels_image/images/multiple_image/".$image->image);
         }
         File::delete("hotels_image/images/thumb_image/".$olddata->thumb_image);
         $delete_hotel_image=HotelImage::where("hotel_id",$id)->delete();
         $delete_hotel=Hotel::where("id",$id)->delete();

         if($delete_hotel_image && $delete_hotel ){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Hotel Deleted Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }
    }


    public function view_image(Request $request,$id){
        $id=base64_decode($id);
        $hotel=Hotel::select(['id','hotels_name'])->where("id",$id)->first();
          $data=HotelImage::orderBy("id","desc")->where("hotel_id",$id)->get();
          return view("admin.page.hotel.view_image",['data'=>$data,'hotel'=>$hotel]);
    }

    public function add_more_image(Request $request){
          $file=$request->file("image");
          $filename=rand(1,99999999999).time().session_id().uniqid().$file->getClientOriginalName();
          $data=array(
            "image"=>$filename,
            "status"=>0,
            "hotel_id"=>$request->id,

          );
          $file->move("hotels_image/images/multiple_image/",$filename);
          if(HotelImage::create($data)){
            return response()->json(['message'=>"success"]);
          }
          else{
            return response()->json(['message'=>"failed"]);
          }
    }

    public function update_more_image(Request $request){
           $olddata=HotelImage::where("id",$request->image_id)->get()->toArray();
         
          
           File::delete("hotels_image/multiple_image/".$olddata[0]['image']);
           $file=$request->file("image");
           $filename=rand(1,99999999999).time().uniqid().session_id().$file->getClientOriginalName();
           $file->move("hotels_image/images/multiple_image/",$filename);
           $check=HotelImage::where("id",$request->image_id)->update(['image'=>$filename]);
           if($check){
            return response()->json(['message'=>"success"]);
           }
           else{
            return response()->json(['message'=>"failed"]);
           }
    }

    public function delete_multiple_image(Request $request,$id){
        $data=HotelImage::where("id",$id)->first();
         File::delete("hotels_image/images/multiple_image".$data->image);
         if(HotelImage::where("id",$id)->delete()){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Hotel Photo Deleted Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }
    }
}
