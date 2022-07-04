<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\File;
use App\Models\Activity;
use App\Models\ActivityGallery;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Language;


class ActivityController extends Controller
{
    private $validate;
    private $check;
    private $data;
    private $file;
    private $filename;
    private $message;
   public function index(){
       $data=DB::table("morocco_region")->get();
    $category=Category::all();
    $lang=Language::all();
    return view("admin.page.activity.activity",['data'=>$data,'category'=>$category,'lang'=>$lang]);
   }
    public function fetch_city(Request $request){
   $data=DB::table("morocco_cities")->where("region",$request->id)->get();
   return response()->json(['message'=>"success","data"=>$data]);

   }

   public function create_activity(Request $request){

       
     $this->validate=Validator::make($request->all(),[
          "activity_name"=>"required",
           "activity_image"=>"required",
            "activity_date"=>"required",

        ],[

    "activity_date.required"=>"Activity Date can`t be empty",
     "activity_name.required"=>"Activity Name can`t be empty",
      "activity_image.required"=>"Activity Photo can`t be empty",
        ]);

  if(1){
    if($request->region!="Select Region"){
          $region=DB::table("morocco_region")->where("id",$request->region)->first();
           $region_name=($region->region);
           $region_id=$region->id;
    }
    else{
        $region_name=0;
         $region_id=0;
    }

              if($request->lang_id!="Select Language"){
                 $language=Language::where("id",$request->lang_id)->first();
                 $language_name=$language->lang_name;
                 $language_id=$language->id;
              }
              else{
                $language_name="";
                $language_id="";

              }
       
    $category=Category::where("category_name",$request->category)->first();
       if($request->city!="Select City"){
        $city=DB::table("morocco_cities")->where("id",$request->city)->first();
      $city_name= ($city->ville);
      $city_id=$city->id;
       }
       else{
        $city_name=0;
        $city_id=0;

       }

       if($request->is_new=="Select is new"){
        $new=0;
       }
       else{
        $new= $request->is_new;
       }
      
 
    if($request->hasfile("activity_image")){
        $this->file=$request->file("activity_image");
        $this->filename=date('mdYHis') . uniqid().$this->file->getClientOriginalName();
        $data=array(
        "activity_name"=>$request->activity_name,
        "activity_image"=>$this->filename,
         "activity_date"=>date("Y-m-d",strtotime($request->activity_date)),
        "status"=>0,
        "city_id"=>$city_id,
         "region_id"=>$region_id,
         "city_name"=>$city_name,
         "region_name"=>$region_name,
         "phone_facility"=>$request->phone_facility,
         "hotel_pickup"=>$request->hotal_pickup,
         "fare_cancel"=>$request->fare,
         "duration"=>$request->duration,
         "language"=>$language_name,
         "lang_id"=>$language_id,
         "departure_time"=>$request->departure_time,
         "departure_details"=>$request->departure_details,
         "cancel_policy"=>$request->cancel_policy,
         "return_details"=>$request->return_detail,
         "higlight"=>$request->highlight,
         "inclusion"=>$request->inclusion,
         "exclusion"=>$request->exclusion,
         "additional_info"=>$request->add_info,
         "category_name"=>$request->category,
         "category_id"=>$category->id,
         "know_more"=>$request->know_more,
         "overview"=>$request->description,
         "price"=>$request->price,
         "mrp"=>$request->mrp,
           "is_new"=>$new,
         

    );
       
       
        
      if(File::exists("admin-asstes/images/activity_image/".$this->filename)){
       return response()->json(['message'=>"Culture Activity Photo Alreay Exists"]);

      }
      else{
        $this->check=Activity::where("activity_name",$request->activity_name)->get()->count();

        if($this->check){
            return response()->json(['message'=>"Activity Name is already Created"]);

        }
        else{
            if($this->file->move("admin-asstes/images/activity_image/",$this->filename)){
                if(Activity::create($data)){
                return response()->json(['message'=>"success"]);

            }
            else{
                return response()->json(['message'=>"Failed try Again"]);
            }
            }
            else{
                 return response()->json(['message'=>"Failed Move file "]);

            }
        }
      }

    }
    

  }
  else{
    return response()->json(['message'=>"Failed"]);
  }


   }



   public function activity_list(){
       $title = 'View';
    $this->data=Activity::orderBy("id","desc")->paginate(5);
    return view("admin.page.activity.activity_list",['data'=>$this->data, 'title'=>$title]);
   }

   public function update_activity(Request $request,$id){
       $title = 'Update';

    $this->data=Activity::where("id",$id)->first();

      $region=DB::table("morocco_region")->get();
       $category=Category::all();
       $language=Language::all();
      $city=DB::table("morocco_cities")->where("region",$this->data->region_id)->get();
    return view("admin.page.activity.update_activity",['data'=>$this->data,'region'=>$region,'city'=>$city, 'title'=>$title,'category'=>$category,"lang"=>$language]);

   }

    public function status_change(Request $request){
       

        $check=Activity::where("id",$request->id)->update(['activity_status'=>$request->status]);

        if($check){
            return response()->json(['message'=>"success"]);
        }
        else{
            return response()->json(['message'=>"Failed"]);
        }

    }
   public function update_activity_data(Request $request){
    
 if($request->lang_id!="Select Language"){
                 $language=Language::where("id",$request->lang_id)->first();
                 $language_name=$language->lang_name;
                 $language_id=$language->id;
              }
              else{
                $language_name="";
                $language_id="";

              }
    $category=Category::where("category_name",$request->category)->first();
    
     if($request->region!="Select Region"){
          $region=DB::table("morocco_region")->where("id",$request->region)->first();
           $region_name=($region->region);
           $region_id=$region->id;
    }
    else{
        $region_name=0;
         $region_id=0;
    }
       
     if($request->city!="Select City"){
        $city=DB::table("morocco_cities")->where("id",$request->city)->first();
      $city_name= ($city->ville);
      $city_id=$city->id;
       }
       else{
        $city_name=0;
        $city_id=0;

       }

       if($request->is_new=="Select is new"){
        $new=0;
       }
       else{
        $new= $request->is_new;
       }
      
    if($request->hasfile("activity_image")){

        if(File::delete("admin-asstes/images/activity_image/".$request->old_image_path)){
             $this->file=$request->file("activity_image");
             $this->filename=date('mdYHis') . uniqid().$this->file->getClientOriginalName();

            $data=array(
        "activity_name"=>$request->activity_name,
        "activity_image"=>$this->filename,
         "activity_date"=>date("Y-m-d",strtotime($request->activity_date)),
       
         "city_id"=>$city_id,
         "region_id"=>$region_id,
         "city_name"=>$city_name,
         "region_name"=>$region_name,
         "phone_facility"=>$request->phone_facility,
         "hotel_pickup"=>$request->hotal_pickup,
         "fare_cancel"=>$request->fare,
         "duration"=>$request->duration,
         "language"=>$language_name,
         "lang_id"=>$language_id,
         "departure_time"=>$request->departure_time,
         "departure_details"=>$request->departure_details,
         "cancel_policy"=>$request->cancel_policy,
         "return_details"=>$request->return_detail,
         "higlight"=>$request->highlight,
         "inclusion"=>$request->inclusion,
         "exclusion"=>$request->exclusion,
         "additional_info"=>$request->add_info,
         "category_name"=>$request->category,
         "category_id"=>$category->id,
         "know_more"=>$request->know_more,
         "overview"=>$request->description,
         "price"=>$request->price,
         "mrp"=>$request->mrp,
           "is_new"=>$new,
         

    );

           
           if(File::exists("admin-asstes/images/activity_image/".$this->filename)){
            return response()->json(['message'=>"This Activity Image Already exist"]);
           }
           else{
             if($this->file->move("admin-asstes/images/activity_image/",$this->filename)){
                $check=Activity::where("id",$request->id)->update($data);
        if($check){
            return response()->json(['message'=>"success"]);

        }
        else{
            return response()->json(['message'=>"Acivity Updation failed"]);
        }


             }
             else{
                return response()->json(['message'=>"unable to upload file"]);
             }
           }
            
        

        }
        else{
            return response()->json(['message'=>"Old File not delete"]);
        }

    }
    else{

       $data=array(
        "activity_name"=>$request->activity_name,
       
         "activity_date"=>date("Y-m-d",strtotime($request->activity_date)),
       
         "city_id"=>$city_id,
         "region_id"=>$region_id,
         "city_name"=>$city_name,
         "region_name"=>$region_name,
         "phone_facility"=>$request->phone_facility,
         "hotel_pickup"=>$request->hotal_pickup,
         "fare_cancel"=>$request->fare,
         "duration"=>$request->duration,
         "language"=>$language_name,
         "lang_id"=>$language_id,
         "departure_time"=>$request->departure_time,
         "departure_details"=>$request->departure_details,
         "cancel_policy"=>$request->cancel_policy,
         "return_details"=>$request->return_detail,
         "higlight"=>$request->highlight,
         "inclusion"=>$request->inclusion,
         "exclusion"=>$request->exclusion,
         "additional_info"=>$request->add_info,
         "category_name"=>$request->category,
         "category_id"=>$category->id,
         "know_more"=>$request->know_more,
         "overview"=>$request->description,
         "price"=>$request->price,
         "mrp"=>$request->mrp,
           "is_new"=>$new,
         

    );



       

        $check=Activity::where("id",$request->id)->update($data);
         

   
        if($check){
            return response()->json(['message'=>"success"]);

        }
        else{
            return response()->json(['message'=>"Acivity Updation failed"]);
        }
    }

   }


   public function delete_activity(Request $request){
    $data=Activity::where("id",$request->id)->first();
    if(File::delete("admin-asstes/images/activity_image/".$data->activity_image)){
        if(Activity::where("id",$request->id)->delete()){
            return response("success");
        }
        else{
            return response("Failed");
        }
    }
    else{
        return response("failed");
    }

   }

   public function gallery(){
    $this->data=Activity::select("activity_name","id")->get();
    return view("admin.page.activity.add_gallery_activity",['data'=>$this->data]);
   }



   public function gallery_data(Request $request){
   $activity=Activity::find($request->activity_name);
    $allfile=($request->file("activity_image"));
      for($i=0;$i<count($allfile);$i++){
        if(!File::exists("Activity Gallery/".$activity->activity_name."/".$allfile[$i]->getClientOriginalName())){
            if($allfile[$i]->move("Activity Gallery/".$activity->activity_name."/",$allfile[$i]->getClientOriginalName())){
                $this->data=array("image"=>$allfile[$i]->getClientOriginalName(),
               "activity_id"=>$request->activity_name,
               "status"=>1,
            );
                if(ActivityGallery::create($this->data)){
                    $this->message="success";
                }
                else{
                    $this->message="failed";
                }
            }
            else{
                $this->message="Something wrong try again";
            }
        }
        else{
             $this->message="Something wrong try again";
        }


      }

      return response($this->message);
   }


   public function view_gallery(){
    $this->data=Activity::orderBy("id","desc")->get();
    return view("admin.page.activity.view_activity_gallery",['data'=>$this->data]);
   }

   public function show_gallery_list(Request $request){
   $activity=Activity::find($request->activity_id);
   $data=ActivityGallery::where("activity_id",$request->activity_id)->get();
   return response()->json(['message'=>"success","data"=>$data,"activity_name"=>$activity->activity_name]);

   }


   public function change_activity_gallery_status(Request $request){
    $check=ActivityGallery::where("id",$request->id)->update(['status'=>$request->status]);
    if($check){
        return response()->json(['message'=>"success"]);
    }
    else
    {
         return response()->json(['message'=>"Failed"]);
    }

   }

   public function delete_activity_gallery(Request $request){

    $check=ActivityGallery::where("id",$request->id)->delete();
    if($check){
        return response()->json(['message'=>"success"]);
    }
    else{
        return response()->json(['message'=>"Failed"]);
    }

   }


   public function edit_activity_gallery(Request $request,$id){

    $data=ActivityGallery::find($id);
    $activity_name=Activity::where("id",$data->activity_id)->first();
    $activity=Activity::get();
    return view("admin.page.activity.edit_activity_gallery",['data'=>$data,'activity'=>$activity,'activity_name'=>$activity_name]);
   }


   public function updated_activity_gallery_data(Request $request){
      if($request->hasfile("activity_image")){
          $data=ActivityGallery::find($request->id);
       
          $activity=Activity::where("id",$data->activity_id)->first();
         
          if(File::delete("Activity Gallery/".$activity->activity_name."/".$data->image)){
            $file=$request->file("activity_image");
            if($file->move("Activity Gallery/".$activity->activity_name,$file->getClientOriginalName())){
                if(ActivityGallery::where("id",$request->id)->update(['image'=>$file->getClientOriginalName()])){
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
}
