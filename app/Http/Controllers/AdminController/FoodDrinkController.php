<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodDrink;
use Validator;
use App\Models\FoodAndDrinkImage;
use App\Models\City;
use App\Models\CMS\CMSFoodAndDrink;

class FoodDrinkController extends Controller
{
    public function index(){
        $city=City::latest()->get();
        $fooddrink=CMSFoodAndDrink::where("status",1)->get();
        return view("admin.page.food-drink.add_food_drink",compact('city','fooddrink'));
    }



    public function create(Request $request){
     $rule=[
     "name"=>"required",
    
      "city"=>"required|exists:cities,id",
     "image"=>"required|mimes:jpeg,jpg,png|max:2048",
   
     "address"=>"required|max:500",
     "description"=>"required",
     "rating"=>"required",
     "status"=>"required|in:1,0",
     "price"=>"required|integer|not_in:0",
     "link"=>"required",
     "map"=>"required",
     "phone"=>"required",
     "multi_image"=>"required",


     ];
     $custom_rule=[
        'name.required'=>"Food and Drink can`t be empty",
      
       "city.exists"=>"Select City",
        "image.required"=>"Choose Photo",
        "image.mimes"=>"Photo Format is not valid",
     
        "address.required"=>"Address can`t be empty",
        "address.max"=>"Address size should not be greter than 500 word",
        "rating.required"=>"Rating can`t be empty",
        "status.in"=>"Select Status",
        "link.required"=>"Link can`t be empty",
        "price.required"=>"Price can`t be empty",
        "price.integer"=>"Price not Accept Any Character",
        "map.required"=>"Map can`t be empty",
        "description.required"=>"Description can`t be empty",
        "phone.required"=>"Phone No can`be empty",
        "multi_image.required"=>"Select At Least One Photo",


     ];

     $validate=Validator::make($request->all(),$rule,$custom_rule);
     if($validate->fails()){
        return redirect()->back()->withInput($request->all())->withErrors($validate);
     }
     else{
        $file=$request->file("image");
        $filename=rand(1,9999999999999999).time().session_id().uniqid().".".$file->getClientOriginalExtension();
        $data=$request->all();
        $data['image']=$filename;
       
        $check=FoodDrink::where("name",$request->name)->get()->count();
        if($check){
             $message="<div class='alert alert-warning p-font' ><b>Food And Drink Name Already Created</b><i class='la la-close close' data-dismiss='alert'></i></div>";
             return redirect()->back()->with("message",$message);
        }
        else{
            if($create=FoodDrink::create($data)){
                $file->move("food-drink-image/images/",$filename);
                $allMultiImage=$request->file("multi_image");
                 foreach($allMultiImage as $image){
                    $filename=rand(1,99).time().uniqid().".".$image->getClientOriginalExtension();
                    $data=['food_And_drink_id'=>$create->id,'image'=>$filename,'status'=>1];
                    FoodAndDrinkImage::create($data);
                    $image->move("food-drink-image/images/",$filename);
                 }
                 $message="<div class='alert alert-success p-font' ><b>Food And Drink Created Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                 return redirect()->back()->with("message",$message);
            }
            else{
                 $message="<div class='alert alert-warning p-font' ><b>Whoops! something went wrong</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                 return redirect()->back()->with("message",$message);

            }
        }
     }

   }

   //show list
   public function show_list(){
    $data=FoodDrink::latest()->paginate(20);
    return view("admin.page.food-drink.food_drink_list",compact('data'));
   }
   //status change
    public function status_change(Request $request,$id){
        $data=FoodDrink::where("id",base64_decode($id))->first();
        if($data->status==1){
            $update=FoodDrink::where("id",base64_decode($id))->update(['status'=>0]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Food and drink Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }
           

        }
        else{
              $update=FoodDrink::where("id",base64_decode($id))->update(['status'=>1]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Food And Drink Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }

        }
    }


    //edit toru and activity

    public function edit(Request $request,$id){
        $city=City::latest()->where("status",1)->get();
         $fooddrink=CMSFoodAndDrink::where("status",1)->get();
        $data=FoodDrink::where("id",base64_decode($id))->first();
       

        return view("admin.page.food-drink.food_drink_edit",compact('data','city','fooddrink'));
    }

    //update data store
    public function edit_data(Request $request){

        if($request->hasFile("image")){
            $rule=[
     "name"=>"required",
      
   "city"=>"required|exists:cities,id",
     "image"=>"required|mimes:jpeg,jpg,png|max:2048",
     
     "address"=>"required|max:500",
     "description"=>"required",
     "rating"=>"required",
     "status"=>"required|in:1,0",
     "price"=>"required|integer|not_in:0",
     "link"=>"required",
     "map"=>"required",
     "phone"=>"required",


     ];
     $custom_rule=[
        'name.required'=>"Transportation Name can`t be empty",
       "city.exists"=>"Select City",
        
        "image.required"=>"Choose Photo",
        "image.mimes"=>"Photo Format is not valid",
       
        "address.required"=>"Address can`t be empty",
        "address.max"=>"Address size should not be greter than 500 word",
        "rating.required"=>"Rating can`t be empty",
        "status.in"=>"Select Status",
        "link.required"=>"Link can`t be empty",
        "price.required"=>"Price can`t be empty",
        "price.integer"=>"Price not Accept Any Character",
        "map.required"=>"Map can`t be empty",
        "description.required"=>"Description can`t be empty",
        "phone.required"=>"Phone No can`be empty",


     ];
     $validate=Validator::make($request->all(),$rule,$custom_rule);
     if($validate->fails()){
        return redirect()->back()->withInput()->withErrors($validate);
     }
     else{
        $pre_data=FoodDrink::where("id",$request->id)->first();
        $file=$request->file("image");
        $filename=rand(1,9999999999999999).session_id().time().uniqid().".".$file->getClientOriginalExtension();
        @unlink("food-drink-image/images/".$pre_data->image);
        $data=$request->all();
        
        unset($data['_token']);
       
        $data['image']=$filename;
        if(FoodDrink::where("id",$request->id)->update($data)){
            $file->move("food-drink-image/images/",$filename);
            $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Transportation updated successfully</b></div>";
            return redirect("/admin/food-and-drink/view-food-drink")->with("message",$message);
        }
        else{
            $message="<div class='alert alert-warning'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
            return redirect("/admin/food-and-drink/view-food-drink")->with("message",$message);
        }

     }

        }
        else{
           $rule=[
     "name"=>"required",
   
   
     "city"=>"required|exists:cities,id",
    
     "address"=>"required|max:500",
     "description"=>"required",
     "rating"=>"required",
     "status"=>"required|in:1,0",
     "price"=>"required|integer|not_in:0",
     "link"=>"required",
     "map"=>"required",
     "phone"=>"required",


     ];
     $custom_rule=[
        'name.required'=>"Tour And Activity Name can`t be empty",
       
        
       "city.exists"=>"Select City",
       
        "address.required"=>"Address can`t be empty",
        "address.max"=>"Address size should not be greter than 500 word",
        "rating.required"=>"Rating can`t be empty",
        "status.in"=>"Select Status",
        "link.required"=>"Link can`t be empty",
        "price.required"=>"Price can`t be empty",
        "price.integer"=>"Price not Accept Any Character",
        "map.required"=>"Map can`t be empty",
        "description.required"=>"Description can`t be empty",
        "phone.required"=>"Phone No can`be empty",


     ];
     $validate=Validator::make($request->all(),$rule,$custom_rule);

     if($validate->fails()){
        return redirect()->back()->withInput()->withErrors($validate);
     }
     else{
        unset($request['_token']);
        $data=$request->all();
   
       
        $update=FoodDrink::where("id",$request->id)->update($data);
        if($update){
             $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Food And Drink updated successfully</b></div>";
            return redirect("/admin/food-and-drink/view-food-drink")->with("message",$message);
        }
        else{
             $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect("/admin/food-and-drink/view-food-drink")->with("message",$message);
        }
     }

        }
    }


    public function delete(Request $request,$id){
        $data=FoodDrink::where("id",base64_decode($id))->first();
        @unlink("food-drink-image/images/".$data->image);
        if(FoodDrink::where("id",base64_decode($id))->delete()){
            $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Food And Drink Deleted Successfully</b></div>";
             return redirect()->back()->with("message",$message);

        }
        else{
            $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect()->back()->with("message",$message);
        }
    }


     public function showMultiImage(Request $request,$id){
        $data=FoodDrink::where("id",base64_decode($id))->first();
        $imagedata=FoodAndDrinkImage::where("food_And_drink_id",base64_decode($id))->latest()->get();
        return view("admin.page.food-drink.view_food_and_drink_image",['data'=>$data,'imagelist'=>$imagedata]);
    }

    public function addMoreImage(Request $request,$id){
            $data=FoodDrink::where("id",base64_decode($id))->first();
        return view("admin.page.food-drink.add_food_and_drink_image",['data'=>$data]);
    }

    public function addMoreImageStore(Request $request){
        $image=$request->file("image");
      foreach($image as $image_list){
        $filename=rand(1,99).time().".".$image_list->getClientOriginalExtension();
        $data=array(
            "food_And_drink_id"=>$request->id,
            "image"=>$filename,
            "status"=>1,
        );
        FoodAndDrinkImage::create($data);
        $image_list->move("food-drink-image/images",$filename);

      }
       $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Food And Drink Image Added Successfully</b></div>";
             return redirect()->back()->with("message",$message);
    }

    public function More_image_status_change(Request $request,$id){
         $data=FoodAndDrinkImage::where("id",base64_decode($id))->first();
        if($data->status==1){
            $update=FoodAndDrinkImage::where("id",base64_decode($id))->update(['status'=>0]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Food And Drink Image Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }
           

        }
        else{
              $update=FoodAndDrinkImage::where("id",base64_decode($id))->update(['status'=>1]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Food And Drink Image Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }

        }
    }

    public function deleteMoreImage(Request $request,$id){
         $data=FoodAndDrinkImage::where("id",base64_decode($id))->first();
        @unlink("food-drink-image/images/".$data->image);
        if(FoodAndDrinkImage::where("id",base64_decode($id))->delete()){
            $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Food Nad Drink Image Deleted Successfully</b></div>";
             return redirect()->back()->with("message",$message);

        }
        else{
            $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect()->back()->with("message",$message);
        }
    }

    public function editMoreImage(Request $request,$id){
        $data=FoodAndDrinkImage::where("id",base64_decode($id))->first();
        return view("admin.page.food-drink.food_and_drink_more_image_edit",['data'=>$data]);
    }

    public function moreImageEditData(Request $request){
        
        $pre_data=FoodAndDrinkImage::where("id",$request->id)->first();
        @unlink("food-drink-image/images/".$pre_data->image);
        $file=$request->file("image");
        $filename=rand(1,99).time().uniqid().".".$file->getClientOriginalExtension();
        $update=FoodAndDrinkImage::where("id",$request->id)->update(['image'=>$filename]);
        if($update){
            $file->move("food-drink-image/images/",$filename);
             $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Food And Drink Image Updated Successfully</b></div>";
             return redirect()->back()->with("message",$message);
        }
        else{
             $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect()->back()->with("message",$message);
        }
    }
}
