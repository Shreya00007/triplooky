<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyUseTriplooky;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class WhyUseTriplookyController extends Controller
{
   public function index(){
    $data = DB::table('morocco_region')->get();   
    return view("admin.page.why_triplooky.why_triplooy",['region'=>$data]);
   }
   
   
 
 
 public function getCity(Request $request){
    
         $data=DB::table("morocco_cities")->where("region",$request->id)->get();
       // dd($cities);           
                    
        return response()->json(['message'=>"success","data"=>$data]);
    }

   public function create(Request $request){


    $region_id = $request->region;
    $region_detail = DB::table('morocco_region')->find($region_id);
        $region_name = $region_detail->region;
    
    
    $city_id = $request->city;
    
    $city_detail = DB::table('morocco_cities')->find($city_id);
    $city_name = $city_detail->ville;


    $file=$request->file("image");
    $filname=$file->getClientOriginalName();
    $data=[];
    $data=array(
        "heading"=>$request->heading,
        "image"=>$filname,
        "description"=>$request->desc,
        "region_id"=>$request->region,
        "region_name"=>$region_name,
        "city_id"=>$request->city,
        "city_name"=>$city_name,
        "status"=>0,
    );



    if(1){
        if($file->move("why_triplooy",$filname)){

            if(WhyUseTriplooky::create($data)){
                return response()->json(['message'=>"success"]);
            }
            else{
                return response()->json(['message'=>"Failed"]);
            }
        }
    else{
         return response()->json(['message'=>"Image Not move"]);

    }

    }
    else{
        return response()->json(['message'=>"Image is Already exist"]);
    }

   }

   public function view(){
    $data=WhyUseTriplooky::select("heading","image","id","region_id","region_name","city_id","city_name","status")->get();
    return view("admin.page.why_triplooky.view",['data'=>$data]);
   }

   public function delete(Request $request,$id){
    $id=base64_decode(($id));
   $data=WhyUseTriplooky::where("id",$id)->get();
   if(File::exists("why_triplooy/".$data[0]->image)){
      if(File::delete("why_triplooy/".$data[0]->image)){
        if(WhyUseTriplooky::where("id",$id)->delete()){
            return redirect()->back()->with("message_success","Thing to do Delete successfully");
        }
      }
      else{
         return redirect()->back()->with("message","Something is wrong");
      }
   }
   else{
     return redirect()->back()->with("message","SomeThing is wrong");
   }

   }

   public function status(Request $request,$id){
    $id=base64_decode($id);
     $data=WhyUseTriplooky::select("status")->where("id",$id)->first();
    if(($data['status'])==0){
        $check=WhyUseTriplooky::where("id",$id)->update(['status'=>1]);
        if($check){
            return redirect()->back()->with("success","Status has been changed successfully");
        }
        else{
            return redirect()->back()->with("failed","Something is wrong try again");
        }
    }
    else{
         $check=WhyUseTriplooky::where("id",$id)->update(['status'=>0]);
         if($check){
            return redirect()->back()->with("success","Status has been changed successfully");
        }
        else{
            return redirect()->back()->with("failed","Something is wrong try again");
        }
    }

   }

   public function edit(Request $request,$id){
    $id=base64_decode($id);
    $trip_detail = DB::table('why_use_triplookies')->find($id);
    $regionid = $trip_detail->region_id;
    
    $region = DB::table('morocco_region')->get();
    $city = DB::table('morocco_cities')->where("region",$regionid)->get();
    $data=WhyUseTriplooky::where("id",$id)->get();
    return view("admin.page.why_triplooky.edit",['data'=>$data, 'region'=>$region, 'city'=>$city]);
   }

   public function edit_data(Request $request){
   $region_id = $request->region;
    $region_detail = DB::table('morocco_region')->find($region_id);
        $region_name = $region_detail->region;
    
    
    $city_id = $request->city;
    
    $city_detail = DB::table('morocco_cities')->find($city_id);
    $city_name = $city_detail->ville;


    if($request->hasfile("image")){
       
       $data=WhyUseTriplooky::where("id",$request->id)->get();
         $file=$request->file("image");
          
            $updatedata=array(
                "heading"=>$request->heading,
                 "image"=>$file->getClientOriginalName(),
                 "description"=>$request->desc,
                 "region_id"=>$request->region,
        "region_name"=>$region_name,
        "city_id"=>$request->city,
        "city_name"=>$city_name,
                
             );
            
       if(1){
        if(File::delete("why_triplooy/".$data[0]->image)){


            if(!File::exists("why_triplooy/".$file->getClientOriginalName())){
                if($file->move("why_triplooy",$file->getClientOriginalName())){
                   
                    $check=WhyUseTriplooky::where("id",$request->id)->update($updatedata);
                    if($check){
                        return response("success");
                    }
                    else{
                        return response("Failed");
                    }
                }
                else{
                     return response("Failed");
                }

            }
            else{
                return response("File already exists");
            }
        }
        else{
             return response("Failed");
        }
       }
       else{
        return response("Failed");
       }

    }
    else{
        $data=array("heading"=>$request->heading,"description"=>$request->desc,

      "region_id"=>$request->region,
        "region_name"=>$region_name,
        "city_id"=>$request->city,
        "city_name"=>$city_name,
    );
        $check=WhyUseTriplooky::where("id",$request->id)->update($data);
        if($check){
            return response("success");
        }
        else{
            return response("Failed");
        }
    }
   }

   public function details(Request $request ,$id){

    $id=base64_decode($id);
    $data=WhyUseTriplooky::where("id",$id)->get();
    return view("admin.page.why_triplooky.details",['data'=>$data]);

   }
}
