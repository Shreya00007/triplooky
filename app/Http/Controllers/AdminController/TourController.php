<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
Use App\Models\SubCategory;
use App\Models\Tour;
use Illuminate\Support\Facades\File;


class TourController extends Controller
{
    public function index(){
        $region=DB::table("morocco_region")->get();
        $category=Category::all();
        $lang=Language::where("status","active")->get();
        return view("admin.page.tour.tour",['region'=>$region,'category'=>$category,'lang'=>$lang]);
    }



    public function store(Request $request){

        $region=DB::table("morocco_region")->where("id",$request->region)->first();
        $city=DB::table("morocco_cities")->where("id",$request->city)->first();
        $subcategory=SubCategory::where("id",$request->input("sub-category"))->first();
        $category=Category::where("id",$request->category)->first()->toArray();
        $language=Language::where("id",$request->lang_id)->first()->toArray();
         $file=$request->file("tour_image");

       $filename=rand(1,999999999).uniqid().session_id().time().$request->file("tour_image")->getClientOriginalName();
     
        $data=array(
            "heading"=>$request->tour_name,
            "image"=>$filename,
            "city_id"=>$city->id,
            "city_name"=>$city->ville,
            "region_id"=>$request->region,
            "region_name"=>$region->region,
            "phone_facility"=>$request->phone_facility,
            "hotel_pickup"=>$request->hotal_pickup,
            "fare_cancel"=>$request->fare,
            "duration"=>$request->duration,
            "language"=>$language['lang_name'],
            "departure_time"=>$request->departure_time,
            "departure_details"=>$request->departure_details,
            "cancel_policy"=>$request->cancel_policy,
            "return_details"=>$request->return_detail,
            "overview"=>$request->description,
            "higlight"=>$request->highlight,
            "inclusion"=>$request->inclusion,
            "exclusion"=>$request->exclusion,
            "additional_info"=>$request->add_info,
            "know_more"=>$request->know_more,
            "category_id"=>$category['id'],
            "category_name"=>$category['category_name'],
            "sub_category_id"=>$subcategory['id'],
            "sub_category_name"=>$subcategory['sub_category_name'],
            "price"=>$request->price,
            "mrp"=>$request->mrp,
            "is_new"=>$request->is_new,
            "status"=>0,


        );




       $check=Tour::where("heading",$request->tour_name)->get()->count();
       if($check>0){
        return response()->json(['message'=>"This Tour Already Exist"]);;

       }
       else{
          if($file->move("tour/images/",$filename)){

            if(Tour::create($data)){
                return response()->json(['message'=>"success"]);
            }
            else{
                return response()->json(['message'=>"Failed Try Again "]);
            }

          }
        

       }
      
    }


    public function getSubCategory(Request $request,$id){
        $data=SubCategory::where("category",$id)->where("status",1)->get();
        return response()->json(['data'=>$data]);

    }



    public function showTour(){
        $data=Tour::orderBy("id","desc")->paginate(10);
        return view("admin.page.tour.tour_list",['data'=>$data]);
    }



    public function status_change(Request $request,$id){
        $id=base64_decode($id);
       $data=Tour::where("id",$id)->first();
       if($data->status==1){
        $check=Tour::where("id",$id)->update(['status'=>0]);

        if($check){
            return redirect()->back()->with('message',"<div class='alert alert-success text-info p-font'><b>Tour Status Has Been Changed Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>");
        }
        else{
            return redirect()->back()->with('message',"<div class='alert alert-warning text-danger p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert'></i></div>");
        }
       }
       else{
        $check=Tour::where("id",$id)->update(['status'=>1]);

        if($check){
            return redirect()->back()->with('message',"<div class='alert alert-success text-info p-font'><b>Tour Status Has Been Changed Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>");
        }
        else{
            return redirect()->back()->with('message',"<div class='alert alert-warning text-danger p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert'></i></div>");
        }

       }
    }


    public function edit(Request $request,$id){
        $data=Tour::where("id",base64_decode($id))->first();
        $category=Category::all();
        $lang=Language::all();
        $region=DB::table("morocco_region")->get();
        $city=Db::table("morocco_cities")->where("region",$data->region_id)->get();
        $subcategory=SubCategory::where("category",$data->category_id)->get();
       
        return view("admin.page.tour.tour_edit",['data'=>$data,'category'=>$category,"region"=>$region,"lang"=>$lang,"city"=>$city,"subcategory"=>$subcategory]);


    }


    public function edit_data(Request $request){

        $olddata=Tour::where("id",$request->id)->first();
   
        
         $region=DB::table("morocco_region")->where("id",$request->region)->first();
        $city=DB::table("morocco_cities")->where("id",$request->city)->first();
        $subcategory=SubCategory::where("id",$request->input("sub-category"))->first();
        $category=Category::where("id",$request->category)->first()->toArray();
        $language=Language::where("id",$request->lang_id)->first()->toArray();

        if($request->hasfile("tour_image")){
              $file=$request->file("tour_image");

       $filename=rand(1,999999999).uniqid().session_id().time().$request->file("tour_image")->getClientOriginalName();
       
     
        $data=array(
            "heading"=>$request->tour_name,
            "image"=>$filename,
            "city_id"=>$city->id,
            "city_name"=>$city->ville,
            "region_id"=>$request->region,
            "region_name"=>$region->region,
            "phone_facility"=>$request->phone_facility,
            "hotel_pickup"=>$request->hotal_pickup,
            "fare_cancel"=>$request->fare,
            "duration"=>$request->duration,
            "language"=>$language['lang_name'],
            "departure_time"=>$request->departure_time,
            "departure_details"=>$request->departure_details,
            "cancel_policy"=>$request->cancel_policy,
            "return_details"=>$request->return_detail,
            "overview"=>$request->description,
            "higlight"=>$request->highlight,
            "inclusion"=>$request->inclusion,
            "exclusion"=>$request->exclusion,
            "additional_info"=>$request->add_info,
            "know_more"=>$request->know_more,
            "category_id"=>$category['id'],
            "category_name"=>$category['category_name'],
            "sub_category_id"=>$subcategory['id'],
            "sub_category_name"=>$subcategory['sub_category_name'],
            "price"=>$request->price,
            "mrp"=>$request->mrp,
            "is_new"=>$request->is_new,
            


        );
       

         if(File::delete("tour/images/".$olddata->image)){
            $file->move("tour/images/",$filename);
            if(Tour::where("id",$request->id)->update($data)){
                return response()->json(['message'=>"success"]);
            }
            else{
                  return response()->json(['message'=>"Failed to update try again"]);
            }
         }
         else{
              return response()->json(['message'=>"Failed to update try again"]);
         }
         


        }
        else{
           
      

       
     
        $data=array(
            "heading"=>$request->tour_name,
            
            "city_id"=>$city->id,
            "city_name"=>$city->ville,
            "region_id"=>$request->region,
            "region_name"=>$region->region,
            "phone_facility"=>$request->phone_facility,
            "hotel_pickup"=>$request->hotal_pickup,
            "fare_cancel"=>$request->fare,
            "duration"=>$request->duration,
            "language"=>$language['lang_name'],
            "departure_time"=>$request->departure_time,
            "departure_details"=>$request->departure_details,
            "cancel_policy"=>$request->cancel_policy,
            "return_details"=>$request->return_detail,
            "overview"=>$request->description,
            "higlight"=>$request->highlight,
            "inclusion"=>$request->inclusion,
            "exclusion"=>$request->exclusion,
            "additional_info"=>$request->add_info,
            "know_more"=>$request->know_more,
            "category_id"=>$category['id'],
            "category_name"=>$category['category_name'],
            "sub_category_id"=>$subcategory['id'],
            "sub_category_name"=>$subcategory['sub_category_name'],
            "price"=>$request->price,
            "mrp"=>$request->mrp,
            "is_new"=>$request->is_new,
           


        );

        if(Tour::where("id",$request->id)->update($data)){
            return response()->json(['message'=>"success"]);
        }
        else{
             return response()->json(['message'=>"Failed to update try again"]);
        }

        }
    }



    public function delete(Request $request,$id){
       $id=base64_decode($id);
       $check=Tour::where("id",$id)->delete();

       if($check){
            return redirect()->back()->with('message',"<div class='alert alert-success text-info p-font'><b>Tour Deleted Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>");
        }
        else{
            return redirect()->back()->with('message',"<div class='alert alert-warning text-danger p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert'></i></div>");
        }

    }
}
