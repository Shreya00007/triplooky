<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;
use Illuminate\Support\Facades\DB;


class PlaceController extends Controller
{
   public function index(){
    $region=DB::table("morocco_region")->get();
    return view("admin.page.place.place",['region'=>$region]);
   }

    public function getCity(Request $request,$region_id){
        $city=DB::table("morocco_cities")->where("region",$region_id)->get();
        return response()->json(['data'=>$city]);
    }


    public function store(Request $request){
        $region=DB::table("morocco_region")->where("id",$request->region)->first();
        $city=DB::table("morocco_cities")->where("id",$request->city)->first();

        $data=array(
            "place_name"=>$request->input("place-name"),
            "region"=>$region->region,
            "city"=>$city->ville,
            "place_desc"=>$request->desc,
            "status"=>0,

        );
        $check=Place::where("place_name",$request->input("place-name"))->get()->count();
        if($check>0){
            return response()->json(['message'=>"This Place Name is already exists kindly try another"]);

        }
        else{
            if(Place::create($data)){
               return response()->json(['message'=>"success"]);
            }
            else{
                 return response()->json(['message'=>"Something is wrong try again"]);
            }

        }
    }

    public function show(){
        $data=Place::latest()->paginate(20);
        return view("admin.page.place.place_list",['data'=>$data]);
    }


    public function status_change(Request $request,$id){
        $id=base64_decode($id);
         $data=Place::where("id",$id)->first();
         if($data->status==0){
            $update=Place::where("id",$id)->update(['status'=>1]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Place Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }
        }
        else{

            $update=Place::where("id",$id)->update(['status'=>0]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Place Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }

        }
    }


    public function edit(Request $request,$id){
        $data=Place::where("id",base64_decode($id))->first();
        $region=DB::table("morocco_region")->get();
        $single_region=DB::table("morocco_region")->where("region",$data->region)->first();
        $city=DB::table("morocco_cities")->where("region",$single_region->id)->get();

        return view("admin.page.place.edit_place",['data'=>$data,'region'=>$region,'city'=>$city]);
    }

    public function delete(Request $request,$id){
        $id=base64_decode($id);
        $check=Place::where("id",$id)->delete();
        if($check){
             return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Place Deleted Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
        }
        else{
    return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
  }


    }



public function edit_data(Request $request){
   $region=DB::table("morocco_region")->where("id",$request->region)->first();
        $city=DB::table("morocco_cities")->where("id",$request->city)->first();

        $data=array(
            "place_name"=>$request->input("place-name"),
            "region"=>$region->region,
            "city"=>$city->ville,
            "place_desc"=>$request->desc,
           

        );

        ;
       

        $update=Place::where("id",$request->id)->update($data);
            if($update){
               return response()->json(['message'=>"success"]);
            }
            else{
                 return response()->json(['message'=>"Something is wrong try again"]);
            }
        

}


public function details(Request $request,$id){
    $data=Place::where("id",base64_decode($id))->first();
    return view("admin.page.place.place_details",['data'=>$data]);
}



}
