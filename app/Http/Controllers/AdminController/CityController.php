<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\CMS\CMSTourAndActivity;

use App\Models\CityImage;


class CityController extends Controller
{
    private $check;
    private $data;
    private $message;

    public function index(){
      
       

        return view("admin.page.city.city");
    }


    public function create(Request $request){
            
    

       $validate=Validator::make($request->all(),
        [
            'city_name'=>"required",
            'temp'=>"required",
            "population"=>"required",
            "area"=>"required",
            "map_location"=>"required",
           
            "recommend_day"=>"required",
            "city-image"=>"required|mimes:jpeg,png,jpg,svg|max:2048",
            "description"=>"required",
             "multi_image"=>"required",
          



        ],
        [
            "city_name.required"=>"City Name can`t be empty",
            "temp.required"=>"City Temperature can`t be empty",
            "population.required"=>"City Population can`t be empty",
            "area.required"=>"City Surface Area can`t be empty",
            "map_location.required"=>"City Map longitude can`t be empty",
            "recommend_day.required"=>"City Recommended can`t be empty",
            "city-image.required"=>"City Photo Select",
            "city-image.mimes"=>"City Photo Type Should be jpeg,jpg,jpg,svg,webp",
            "city-image.max"=>"City Photo Image Should not be large than 2 MB",
           "multi_image.required"=>"Select At Least one Photo",
            "description.required"=>"City about description can`t be empty",
           
           
        ]

        


   );

       if($validate->fails()){

        return redirect()->back()->withInput()->withErrors($validate);

       }
       else{
             
      
         $this->check=City::where("city_name",$request->city)->get()->count();
        if($this->check>0){
             $this->message="<div class='alert alert-warning p-font' ><b>City Name is Already Created</b><i class='la la-close close' data-dismiss='alert'></i></div>";
             return redirect()->back()->with(['message'=>$this->message,"status"=>"faield"]);

        }
        else{
            $order=City::max("order_by");
            $this->data=$request->all();

           $file=$request->file("city-image");
            $filename=rand(1,999).time().".".$file->getClientOriginalExtension();
            $city_weather_image=$request->file("weather_image");
            $city_weather_image_name=rand(1,999).time()."png";
            $city_busy_month_image=$request->file("busy_month_image");
            $city_busy_month_image_name=rand(1,999).time().".png";
             unset($this->data['city-image']);
            $this->data['image']=$filename;
            $this->data['weather_image']=$city_weather_image_name;
            $this->data['busy_month_image']= $city_busy_month_image_name;
            $this->data['good_for']=json_encode($request->good_for);
            $this->data['order_by']=$order+1;
               
            $create=City::create($this->data);
            if($create){
                $file->move("city-image/images/",$filename);
                $city_weather_image->move("city-image/weather/",$city_weather_image_name);
                $city_busy_month_image->move("city-image/busy-month/",$city_busy_month_image_name);
                $allfile=$request->file("multi_image");
                foreach($allfile as $image){
                    $filename=rand(1,99).time().".png";
                    $data=array("city_id"=>$create->id,"status"=>0,"image"=>$filename);
                    CityImage::create($data);
                    $image->move("city-image/images/",$filename);
                }
               
                $this->message="<div class='alert alert-success p-font' ><b>City Created Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";

                return redirect()->back()->with(['message'=>$this->message]);
            }
            else{
                   $this->message="<div class='alert alert-warning p-font' ><b>City Creation Failed Try Again</b><i class='la la-close close' data-dismiss='alert'></i></div>";

               return redirect()->back()->with(['message'=>$this->message]);
            }
        }
       }


    }


    public function view_city(){
        $this->data=City::orderBy("order_by","asc")->paginate(10);
        return view("admin.page.city.view_city",['data'=>$this->data]);
    }


    public function status(Request $request){
        $this->check=City::where("id",$request->id)->update(['status'=>$request->status]);

        if($this->check){
            return response()->json(['message'=>"success"]);
        }
        else{
            return response()->json(['message'=>"Failed"]);
        }
    }


    public function delete(Request $request,$id){
 
        $this->check=City::where("id",$id)->get()->toArray();
        @unlink("city-image/images/".$this->check[0]['image']);
        $this->check=City::where("id",$id)->delete();
        if($this->check){

              $this->message="<div class='alert alert-success p-font' ><b>City Deleted Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";
            return redirect()->back()->with("message",$this->message);
        }
        else{
              $this->message="<div class='alert alert-warning p-font' ><b>Whoops! something went wrong</b><i class='la la-close close' data-dismiss='alert'></i></div>";
             return redirect()->back()->with("message",$this->message);
        }

    }
    public function edit(Request $request,$id){
        $this->data=City::find(base64_decode($id));
        $tour=CMSTourAndActivity::where("status",1)->get();
        return view("admin.page.city.update_city",['data'=>$this->data,'tour'=>$tour]);

    }

    public function edit_data(Request $request){

                
            if($request->hasFile("city-image")){

                   
               
       $validate=Validator::make($request->all(),
        [
            'city_name'=>"required",
            'temp'=>"required",
            "population"=>"required",
            "area"=>"required",
            "map_location"=>"required",
           
            "recommend_day"=>"required",
            "city-image"=>"required|mimes:jpeg,png,jpg,svg|max:2048",
            "description"=>"required",


        ],
        [
            "city_name.required"=>"City Name can`t be empty",
            "remp.required"=>"City Temperature can`t be empty",
            "population.required"=>"City Population can`t be empty",
            "area.required"=>"City Surface Area can`t be empty",
            "map_location.required"=>"City Map longitude can`t be empty",
            "recommend_day.required"=>"City Recommended can`t be empty",
            "city-image.required"=>"City Photo Select",
            "city-image.mimes"=>"City Photo Type Should be jpeg,jpg,jpg,svg,webp",
            "city-image.max"=>"City Photo Image Should not be large than 2 MB",

            "description.required"=>"City about description can`t be empty",
        ]

        


   );
 
       if($validate->fails()){
        return redirect()->back()->withErrors($validate);
       }
       else{
               
          $pre_data=City::where("id",$request->id)->first();
         $this->data=$request->all();
          $this->data['good_for']=json_encode($request->good_for);
         unset($this->data['_token']);
         @unlink("city-image/images/".$pre_data->image);

           $file=$request->file("city-image");
            $filename=rand(1,99999999999999).time().session_id().uniqid().".".$file->getClientOriginalExtension();
             unset($this->data['city-image']);
            $this->data['image']=$filename;
               
            $this->check=City::where("id",$request->id)->update($this->data);
            if($this->check){
                $file->move("city-image/images/",$filename);
               
                $this->message="<div class='alert alert-success p-font' ><b>City Details Updated Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";

                return redirect()->back()->with(['message'=>$this->message]);
            }
            else{
                   $this->message="<div class='alert alert-warning p-font' ><b>City Creation Failed Try Again</b><i class='la la-close close' data-dismiss='alert'></i></div>";

               return redirect()->back()->with(['message'=>$this->message]);
            }
      
         
       }

            }
            //file not found
            else{
                    //check city waether  images
             if($request->hasFile("weather_image")){


               
       $validate=Validator::make($request->all(),
        [
            'city_name'=>"required",
            'temp'=>"required",
            


        ],
        [
            "city_name.required"=>"City Name can`t be empty",
            "temp.required"=>"City Temperature can`t be empty",
           
        ]

        


   );
 
       if($validate->fails()){
        return redirect()->back()->withErrors($validate);
       }
       else{
               
          $pre_data=City::where("id",$request->id)->first();
         $this->data=$request->all();
          $this->data['good_for']=json_encode($request->good_for);
         unset($this->data['_token']);
         @unlink("city-image/weather/".$pre_data->weather_image);

           $file=$request->file("weather_image");
            $filename=rand(1,999).time().session_id().uniqid().".png";
             unset($this->data['weather_image']);
            $this->data['weather_image']=$filename;
             
               
            $this->check=City::where("id",$request->id)->update($this->data);
            if($this->check){
                $file->move("city-image/weather/",$filename);
               
                $this->message="<div class='alert alert-success p-font' ><b>City Details Updated Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";

                return redirect()->back()->with(['message'=>$this->message]);
            }
            else{
                   $this->message="<div class='alert alert-warning p-font' ><b>City Creation Failed Try Again</b><i class='la la-close close' data-dismiss='alert'></i></div>";

               return redirect()->back()->with(['message'=>$this->message]);
            }
      
         
       }

            }
            else{

                 //check city busy month image
            if($request->hasFile("busy_month_image")){

                   
               
       $validate=Validator::make($request->all(),
        [
            'city_name'=>"required",
            'temp'=>"required",
            


        ],
        [
            "city_name.required"=>"City Name can`t be empty",
            "temp.required"=>"City Temperature can`t be empty",
            
        ]

        


   );
 
       if($validate->fails()){
        return redirect()->back()->withErrors($validate);
       }
       else{
               
          $pre_data=City::where("id",$request->id)->first();
         $this->data=$request->all();
          $this->data['good_for']=json_encode($request->good_for);
         unset($this->data['_token']);
         @unlink("city-image/busy-month/".$pre_data->busy_month_image);

           $file=$request->file("busy_month_image");
            $filename=rand(1,99999999999999).time().session_id().uniqid().".".$file->getClientOriginalExtension();
             unset($this->data['busy_month_image']);
            $this->data['busy_month_image']=$filename;
               
            $this->check=City::where("id",$request->id)->update($this->data);
            if($this->check){
                $file->move("city-image/busy-month/",$filename);
               
                $this->message="<div class='alert alert-success p-font' ><b>City Details Updated Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";

                return redirect()->back()->with(['message'=>$this->message]);
            }
            else{
                   $this->message="<div class='alert alert-warning p-font' ><b>City Creation Failed Try Again</b><i class='la la-close close' data-dismiss='alert'></i></div>";

               return redirect()->back()->with(['message'=>$this->message]);
            }
      
         
       }

            }
            else{
                              $validate=Validator::make($request->all(),
        [
            'city_name'=>"required",
            'temp'=>"required",
            "population"=>"required",
            "area"=>"required",
            "map_location"=>"required",
           
            "recommend_day"=>"required",
          
            "description"=>"required",


        ],
        [
            "city_name.required"=>"City Name can`t be empty",
            "remp.required"=>"City Temperature can`t be empty",
            "population.required"=>"City Population can`t be empty",
            "area.required"=>"City Surface Area can`t be empty",
            "map_location.required"=>"City Map longitude can`t be empty",
            "recommend_day.required"=>"City Recommended can`t be empty",
            

            "description.required"=>"City about description can`t be empty",
        ]

        


   );

       if($validate->fails()){
        return redirect()->back()->withErrors($validate);
       }
       else{
           unset($request['_token']);
                 unset($request['city-image']);
                 $data=$request->all();
                 $data['good_for']=json_encode($request->good_for);
               
        $pre_data=City::where("city_name",$request->city_name)->get();
               if(count($pre_data)>2){
             $this->message="<div class='alert alert-warning p-font' ><b>City name is Already exist</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                    return redirect()->back()->with("message",$this->message);
               }
               else{
               
                
                $update=City::where("id",$request->id)->update($data);
                if($update){
                     $this->message="<div class='alert alert-success p-font' ><b>City Details Updated Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                    return redirect()->back()->with("message",$this->message);
                }
                else{
                    $this->message="<div class='alert alert-warning p-font' ><b>Whoops! something went wrong try again</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                    return redirect()->back()->with("message",$this->message);
                }
               }
         
       }
 

            }

            }



   
               
            }

           



           



        

    }

     public function showMultiImage(Request $request,$id){
        $id=base64_decode($id);
        $city_name=City::select("city_name","id")->where("id",$id)->first();
        $data=CityImage::latest()->where("city_id",$id)->paginate(20);
        return view("admin.page.city.city_image_list")->with(["data"=>$data,"city_name"=>$city_name]);

    }

    public function cityImageStatusChange(Request $request,$id){
         $data=CityImage::where("id",base64_decode($id))->first();
        if($data->status==1){
            $update=CityImage::where("id",base64_decode($id))->update(['status'=>0]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>City Photo Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }
           

        }
        else{
              $update=CityImage::where("id",base64_decode($id))->update(['status'=>1]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>City Photo Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }

        }
    }

    public function cityImageDelete(Request $request,$id){
         try{
            $data=CityImage::findOrFail(base64_decode($id))->toArray();
       
        
        @unlink("city-image/images/".$data['image']);
        if(CityImage::where("id",base64_decode($id))->delete()){
            
            $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>City Photo Deleted Successfully</b></div>";
             return redirect()->back()->with("message",$message);

        }
        else{
            $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect()->back()->with("message",$message);
        }

         }
         catch(\Exception $e){
            return redirect()->back()->with("message",$e->getMessage());

         }
    }

    public function edit_image(Request $request,$id){
        try{
              $data=CityImage::find(base64_decode($id))->toArray();
            $city_name=City::select("city_name","id")->where("id",$data['city_id'])->first()->toArray();
           
         
           return view("admin.page.city.edit_city_image",['data'=>$data,'city_name'=>$city_name]);
        }
        catch(\Exception $e){
       return redirect()->back()->with("message",$e->getMessage());
        }

    }

    public function editCityImageData(Request $request){
        try{

           $pre_data=CityImage::where("id",$request->id)->first()->toArray();
           @unlink("city-image/images/".$pre_data['image']);
           $file=$request->file("city-image");
           $filename=rand(1,99).time().".png";
           if(CityImage::where("id",$request->id)->update(['image'=>$filename])){
            $file->move("city-image/images",$filename);
              $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>City Photo Updated Successfully</b></div>";
            return redirect()->back()->with("message",$message);
           }
           else{
             $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect()->back()->with("message",$message);

           }

        }
        catch(\Exception $e){
            $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>".$e->getMessage()."</b></div>";
            return redirect()->back()->with("message",$message);
        }
    }


    public function addMoreImage(Request $request,$id){
        try{
            $data=City::select("city_name","id")->where("id",base64_decode($id))->first()->toArray();
            return view("admin.page.city.add_city_image",['data'=>$data]);

        }
        catch(\Exception $e){
             $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>".$e->getMessage()."</b></div>";
         return redirect()->back()->with("message",$message);
        }
    }


    public function addMoreImageData(Request $request){
        try{
            $allfile=$request->file("city-image");
            foreach($allfile as $image){
                $filename=rand(1,99).time().".png";
                $data=array("city_id"=>$request->id,"status"=>0,"image"=>$filename);
                if(CityImage::create($data)){
                    $image->move("city-image/images/",$filename);
                }
            }
              $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>City Photo Added Successfully</b></div>";
            return redirect()->back()->with("message",$message);
        }
        catch(\Exception $e){
             $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>".$e->getMessage()."</b></div>";
         return redirect()->back()->with("message",$message);
        }

    }



// update city order
    public function updateOrder(Request $request){
        $data=City::where("id",$request->id)->first();
   
    $check=City::where("order_by",$request->order)->update(["order_by"=>$data->order_by]);
    $check=City::where("id",$request->id)->update(['order_by'=>$request->order]);
    if($check){
        return response()->json(['message'=>"success"]);
    }
    else{
        return response()->json(['message'=>"faield"]);
    }
   }
    
    //end update city order

}



