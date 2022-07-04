<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\ThingToDo;
use App\Models\ActivityGallery;
use App\Models\Activity;
use App\Models\ThingToDoGalleryImage;
use Illuminate\Support\Facades\DB;
use App\Models\Language;
use App\Models\Category;
use App\Models\City;

class ThingToDoController extends Controller
{
    private $message;
   public function index(){
    $region=DB::table("morocco_region")->get();
    $lang=Language::all();
    $city=City::select("id","city_name")->where("status",1)->get()->toArray();
    

    return view("admin.page.thing-to-do.thing_to_do",['region'=>$region,'lang'=>$lang,'city'=>$city]);
   }
   

       public function fetch_city(Request $request){
    $city=DB::table("morocco_cities")->where("region",$request->id)->get();
    return response()->json(['message'=>"success","data"=>$city]);

   }

   public function create(Request $request){
      $city=City::where("id",$request->city)->first()->toArray();
      $file=$request->file('thing_to_do_image');
      $filename=rand().time().".png";
      $language=Language::where("id",$request->lang_id)->first()->toArray();
      $language_name=$language['lang_name'];
      $lang_id=$request->lang_id;

     $data=array(
        "heading"=>$request->heading,
        "image"=>$filename,
        
        "status"=>1,
        "city_id"=>$request->city,
         
         "city_name"=>$city['city_name'],
        
         "phone_facility"=>$request->phone_facility,
         "hotel_pickup"=>$request->hotal_pickup,
         "fare_cancel"=>$request->fare,
         "duration"=>$request->duration,
         "language"=>$language_name,
         "lang_id"=>$lang_id,
         "departure_time"=>$request->departure_time,
         "departure_details"=>$request->departure_details,
         "cancel_policy"=>$request->cancel_policy,
         "return_details"=>$request->return_detail,
         "higlight"=>$request->highlight,
         "inclusion"=>$request->inclusion,
         "exclusion"=>$request->exclusion,
         "additional_info"=>$request->add_info,
         
         "know_more"=>$request->know_more,
         "overview"=>$request->description,
         "price"=>(int)$request->price,
         "mrp"=>(int)$request->mrp,
           "is_new"=>$request->new,
         

    );

     if(ThingToDo::create($data)){
        $file->move("thing-to-do/",$filename);
        return response()->json(['message'=>"success"]);
     }
     else{
         return response()->json(['message'=>"failed"]);
     }

   }

   public function view(){
    $data=ThingToDo::select("heading","image","id","status")->orderBy("id","desc")->get();
    return view("admin.page.thing-to-do.view",['data'=>$data]);
   }

   public function delete(Request $request,$id){
    $id=base64_decode(($id));
   $data=ThingToDo::where("id",$id)->get();
   if(File::exists("thing-to-do/".$data[0]->image)){
      if(File::delete("thing-to-do/".$data[0]->image)){
        if(ThingToDo::where("id",$id)->delete()){
            return redirect()->back()->with("message_success","Thing to do Deleted successfully");
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
     $data=ThingToDo::where("id",$id)->first();
     
     
    if($data->status==0){
        $check=ThingToDo::where("id",$data->id)->update(['status'=>1]);
        if($check){
            return redirect()->back()->with("success","Status has been changed successfully");
        }
        else{
            return redirect()->back()->with("failed","Something is wrong try again");
        }
    }
    else{
         $check=ThingToDo::where("id",$data->id)->update(['status'=>0]);
         if($check){
            return redirect()->back()->with("success","Status has been changed successfully");
        }
        else{
            return redirect()->back()->with("failed","Something is wrong try again");
        }
    }

   }

   public function edit_thing(Request $request,$id){
     $id=base64_decode($id);
   
    
     
   
   
    $data=ThingToDo::where("id",$id)->first();
   
   
    $language=Language::all();
    $city=City::where("status",1)->get()->toArray();
    return view("admin.page.thing-to-do.edit",['data'=>$data,"lang"=>$language,'city'=>$city]);
   }

   public function edit_data(Request $request){


      $city=City::where("id",$request->city)->first()->toArray();
      $file=$request->file('thing_to_do_image');
      $filename=rand().time().".png";
      $language=Language::where("id",$request->lang_id)->first()->toArray();
      $language_name=$language['lang_name'];
      $lang_id=$request->lang_id;

      if($request->hasFile("thing_to_do_image")){
         $data=array(
        "heading"=>$request->heading,
        "image"=>$filename,
        
        "status"=>1,
        "city_id"=>$request->city,
         
         "city_name"=>$city['city_name'],
        
         "phone_facility"=>$request->phone_facility,
         "hotel_pickup"=>$request->hotal_pickup,
         "fare_cancel"=>$request->fare,
         "duration"=>$request->duration,
         "language"=>$language_name,
         "lang_id"=>$lang_id,
         "departure_time"=>$request->departure_time,
         "departure_details"=>$request->departure_details,
         "cancel_policy"=>$request->cancel_policy,
         "return_details"=>$request->return_detail,
         "higlight"=>$request->highlight,
         "inclusion"=>$request->inclusion,
         "exclusion"=>$request->exclusion,
         "additional_info"=>$request->add_info,
         
         "know_more"=>$request->know_more,
         "overview"=>$request->description,
         "price"=>(int)$request->price,
         "mrp"=>(int)$request->mrp,
           "is_new"=>$request->new,
         


    );
          if(ThingToDo::where("id",$request->id)->update($data)){
            return response()->json(['message'=>"success"]);
         }
         else{
            return response()->json(['message'=>"failed"]);
         }


      }
      else{
         $data=array(
        "heading"=>$request->heading,
        "image"=>$filename,
        
        "status"=>1,
        "city_id"=>$request->city,
         
         "city_name"=>$city['city_name'],
        
         "phone_facility"=>$request->phone_facility,
         "hotel_pickup"=>$request->hotal_pickup,
         "fare_cancel"=>$request->fare,
         "duration"=>$request->duration,
         "language"=>$language_name,
         "lang_id"=>$lang_id,
         "departure_time"=>$request->departure_time,
         "departure_details"=>$request->departure_details,
         "cancel_policy"=>$request->cancel_policy,
         "return_details"=>$request->return_detail,
         "higlight"=>$request->highlight,
         "inclusion"=>$request->inclusion,
         "exclusion"=>$request->exclusion,
         "additional_info"=>$request->add_info,
         
         "know_more"=>$request->know_more,
         "overview"=>$request->description,
         "price"=>(int)$request->price,
         "mrp"=>(int)$request->mrp,
           "is_new"=>$request->new,
       );
         

         if(ThingToDo::where("id",$request->id)->update($data)){
            return response()->json(['message'=>"success"]);
         }
         else{
            return response()->json(['message'=>"failed"]);
         }

      }
 
         
           
           
       
   }

   public function details(Request $request ,$id){
    $id=base64_decode($id);
    $data=ThingToDo::where("id",$id)->get();
    return view("admin.page.thing-to-do.details",['data'=>$data]);

   }



   public function gallery(){
    $this->data=ThingToDo::select("heading","id")->get();
    return view("admin.page.thing-to-do.add_gallery_activity",['data'=>$this->data]);
   }



  public function gallery_data(Request $request){
  if($request->hasfile("thing_to_do_image")){
     $heading_data=ThingToDo::find($request->heading);
    $allfile=($request->file("thing_to_do_image"));

    for($i=0;$i<count($allfile);$i++){
        $filename=$allfile[$i]->getClientOriginalName();
       $data=array(
           "image"=>$filename,
           "thing_id"=>(int)$request->heading,
           "status"=>1,

       );

          if(!File::exists("Thing-to-do-gallery/".$heading_data->heading."/".$filename)){
            if($allfile[$i]->move("Thing-to-do-gallery/".$heading_data->heading,$filename)){
               

               if(ThingToDoGalleryImage::create($data)){

                $this->message="success";
               }
               else{
                 $this->message="failed";
               }
            }
          }
          else{
             $this->message="file already exists";
          }
    }
     

      return response($this->message);
  }
   }


   public function view_gallery(){
    $this->data=ThingToDo::get();
    return view("admin.page.thing-to-do.view_thing_gallery",['data'=>$this->data]);
   }

   public function show_gallery_list(Request $request){
   $thing=ThingToDo::find($request->heading_id);
   $data=ThingToDoGalleryImage::where("thing_id",$request->heading_id)->get();
   return response()->json(['message'=>"success","data"=>$data,"heading_name"=>$thing->heading]);

   }


   public function change_activity_gallery_status(Request $request){
    $check=ThingToDoGalleryImage::where("id",$request->id)->update(['status'=>$request->status]);
    if($check){
        return response()->json(['message'=>"success"]);
    }
    else
    {
         return response()->json(['message'=>"Failed"]);
    }

   }

   public function delete_thing_gallery(Request $request){

    $check=ThingToDoGalleryImage::where("id",$request->id)->delete();
    if($check){
        return response()->json(['message'=>"success"]);
    }
    else{
        return response()->json(['message'=>"Failed"]);
    }

   }


   public function edit_thing_gallery(Request $request,$id){

    $data=ThingToDoGalleryImage::find($id);
    $activity_name=ThingToDo::where("id",$data->thing_id)->first();
    $activity=ThingToDo::get();
    return view("admin.page.activity.edit_activity_gallery",['data'=>$data,'activity'=>$activity,'activity_name'=>$activity_name]);
   }


   public function updated_thing_gallery_data(Request $request){
      if($request->hasfile("thing_image")){
          $data=ThingToDoGalleryImage::find($request->id);
       
          $activity=ThingToDo::where("id",$data->thing_id)->first();
         
          if(File::delete("Thing-to-do-gallery/".$activity->heading."/".$data->image)){
            $file=$request->file("thing_image");
            if($file->move("Thing-to-do-gallery/".$activity->heading,$file->getClientOriginalName())){
                if(ThingToDoGalleryImage::where("id",$request->id)->update(['image'=>$file->getClientOriginalName()])){
                    return response()->json(['message'=>"success"]);
                }
                else{
                     return response()->json(['message'=>"Faield"]);
                }
            }
            else{
                return response()->json(['message'=>"Faield"]);
            }
          }
          else{
            return response()->json(['message'=>"Failed11"]);
          }
      }
      else{
        return redirect("/admin/view-gallery-photo");
      }
   }



  public function region(){
    $data=DB::table("morocco_region")->get();
    return view("admin.page.thing-to-do.region_list",['data'=>$data]);
   }

   public function viewcity(){
     $data=DB::table("morocco_region")->get();
    return view("admin.page.thing-to-do.city.view_city",['data'=>$data]);

   }

   public function city_list(Request $request){
     $region=DB::table("morocco_cities")->where("region",$request->id)->get();
     return response()->json(["message"=>"success",'data'=>$region]);
   }
}
