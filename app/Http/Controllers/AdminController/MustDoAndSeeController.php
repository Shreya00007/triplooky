<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Validator;
use App\Models\MustDoAndSee;
use App\Models\MustDoAndSeeImage;

class MustDoAndSeeController extends Controller
{
   public function index(){
    $city=City::latest()->where("status",1)->get();
    return view("admin.page.must_do_and_see.add_must_do_and_see",['city'=>$city]);
   }

   public function create(Request $request){
         $validator=Validator::make($request->all(),
            [
                "name"=>"required",
                "type"=>"required|in:Nature & Discovery,Medina & Culture,Beach & Sports",
                "status"=>"required|in:1,0",
                "thumb_image"=>"required|max:2048",
                "multi_image"=>"required|max:2048",
                "city"=>"required|exists:cities,id",
                "description"=>"required",
            ],
            [
                "name.required"=>"Must Do And See Name is required",
                "type.in"=>"Select Type",
                "status.in"=>"Select Status",
                "thumb_image.required"=>"Select thumb Photo",
               
                "thumb_image.max"=>"Thumb Photo Size Sholud be less than 2 MB",
                "multi_image.required"=>"Select At Least one  Photo",
               
                "multi_image.max"=>" Photo Size Sholud be less than 2 MB",
                "city.exists"=>"Select City",
                "city.required"=>"Select City",
                "description.required"=>"Description is required",

            ]

     );

         if($validator->fails()){
            return redirect()->back()->withInput($request->all())->withErrors($validator);
         }
         else{
           try{
             $data=$request->all();
            $file=$request->file("thumb_image");
            $filename=rand(1,99).time().".png";
            $data['image']=$filename;
             $city_name=City::where("id",$request->city)->first()->toArray();
            $data['city_name']=$city_name['city_name'];
            if($create=MustDoAndSee::create($data)){
               $file->move("Must-do-and-see/images/",$filename);
               $all_image=$request->file("multi_image");
               foreach($all_image as $image){
                  $filename=rand(1,99).time().".png";
                  $data=['image'=>$filename,"must_do_and_see_id"=>$create->id,"status"=>0];
                  MustDoAndSeeImage::create($data);
                  $image->move("Must-do-and-see/images/",$filename);
               }

           $message="<div class='alert alert-success p-font' ><b>Must Do & See Created Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                 return redirect()->back()->with("message",$message);

            }
            else{
               $message="<div class='alert alert-warning p-font text-danger' ><b>Whoops! something went wrong</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                 return redirect()->back()->with("message",$message);
            }


           }
           catch(\Exception $e){
            return redirect()->back()->with("message",$e->getMessage());
           }
            
         }
   }


   public function edit(Request $request,$id){
      $id=base64_decode($id);
      $data=MustDoAndSee::findOrFail($id);
      $city=City::latest()->where("status",1)->get();
      return view("admin.page.must_do_and_see.edit_must_do_and_see")->with("data",$data)->with("city",$city);

   }


   public function edit_data(Request $request){
      if($request->hasFile("thumb_image")){
            $validator=Validator::make($request->all(),
            [
                "name"=>"required",
                "type"=>"required|in:nature_and_discovery,medina_and_culture,beach_and_sport",
                "status"=>"required|in:1,0",
                "thumb_image"=>"required|max:2048",
              
                "city"=>"required|exists:cities,id",
                "description"=>"required",
            ],
            [
                "name.required"=>"Must Do And See Name is required",
                "type.in"=>"Select Type",
                "status.in"=>"Select Status",
                "thumb_image.required"=>"Select thumb Photo",
               
                "thumb_image.max"=>"Thumb Photo Size Sholud be less than 2 MB",
               
                "city.exists"=>"Select City",
                "city.required"=>"Select City",
                "description.required"=>"Description is required",

            ]

     );

         if($validator->fails()){
            return redirect()->back()->withInput($request->all())->withErrors($validator);
         }
         else{
           
           try{
            $pre_data=MustDoAndSee::findOrFail($request->id);
           
        $data=$request->all();
            $file=$request->file("thumb_image");
            $filename=rand(1,99).time().".png";
            $data['image']=$filename;
             $city_name=City::where("id",$request->city)->first()->toArray();
            $data['city_name']=$city_name['city_name'];
            unset($data['_token']);
            unset($data['thumb_image']);

           
            if(MustDoAndSee::where("id",$request->id)->update($data)){
               $file->move("Must-do-and-see/images/",$filename);
                @unlink("Must-do-and-see/images/".$pre_data->image);
               
               

           $message="<div class='alert alert-success p-font' ><b>Must Do & See Updated Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                 return redirect("/admin/must-do-and-see/view-must-do-and-see")->with("message",$message);

            }
            else{
               $message="<div class='alert alert-warning p-font text-danger' ><b>Whoops! something went wrong</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                 return redirect("/admin/must-do-and-see/view-must-do-and-see")->with("message",$message);
            }


           }
           catch(\Exception $e){
            return redirect()->back()->with("message",$e->getMessage());
           }
            
         }
        
      }

       else{


               $validator=Validator::make($request->all(),
            [
                "name"=>"required",
                "type"=>"required|in:nature_and_discovery,medina_and_culture,beach_and_sport",
                "status"=>"required|in:1,0",
              
                "city"=>"required|exists:cities,id",
                "description"=>"required",
            ],
            [
                "name.required"=>"Must Do And See Name is required",
                "type.in"=>"Select Type",
              
                "city.exists"=>"Select City",
                "city.required"=>"Select City",
                "description.required"=>"Description is required",

            ]

     );

         if($validator->fails()){
            return redirect()->back()->withInput($request->all())->withErrors($validator);
         }
         else{
           try{
             $data=$request->all();
              $city_name=City::where("id",$request->city)->first()->toArray();
            $data['city_name']=$city_name['city_name'];
             unset($data['_token']);
          
            if($create=MustDoAndSee::where("id",$request->id)->update($data)){
             
           

           $message="<div class='alert alert-success p-font' ><b>Must Do & See Updated Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                 return redirect("/admin/must-do-and-see/view-must-do-and-see")->with("message",$message);

            }
            else{
               $message="<div class='alert alert-warning p-font text-danger' ><b>Whoops! something went wrong</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                 return redirect("/admin/must-do-and-see/view-must-do-and-see")->with("message",$message);
            }


           }
           catch(\Exception $e){
            return redirect()->back()->with("message",$e->getMessage());
           }
            
         }
         }
   }

   public function show(){
      $data=MustDoAndSee::latest()->paginate(20);
      return view("admin.page.must_do_and_see.must_do_and_see_list")->with("data",$data);
   }


    public function status_change(Request $request,$id){
        $data=MustDoAndSee::where("id",base64_decode($id))->first();
        if($data->status==1){
            $update=MustDoAndSee::where("id",base64_decode($id))->update(['status'=>0]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Must Do & See Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }
           

        }
        else{
              $update=MustDoAndSee::where("id",base64_decode($id))->update(['status'=>1]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Must Do & See Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }

        }
    }


   public function delete(Request $request,$id){
        $data=MustDoAndSee::where("id",base64_decode($id))->first();
        $all_image_data=MustDoAndSeeImage::where("must_do_and_see_id",$data->id)->get();
        @unlink("Must-do-and-see/images/".$data->image);
        if(MustDoAndSee::where("id",base64_decode($id))->delete()){
            foreach($all_image_data as $image_data){
                @unlink("Must-do-and-see/images/".$image_data->image);
            }
            $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Must Do & See Deleted Successfully</b></div>";
             return redirect()->back()->with("message",$message);

        }
        else{
            $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect()->back()->with("message",$message);
        }
    }


/// ****************** add more image *******************************//
    public function addMoreImage(Request $request,$id){
        $id=base64_decode($id);
        $data=MustDoAndSee::findOrFail($id);
        return view("admin.page.must_do_and_see.add_more_image")->with("data",$data);
    }

    public function addMoreImageData(Request $request){
        try{
            $allfile=$request->file("image");
        foreach($allfile as $image){
            $filename=rand(1,99).time().".png";
            $data=array("must_do_and_see_id"=>$request->id,"image"=>$filename,"status"=>0);
            if(MustDoAndSeeImage::create($data)){
                $image->move("Must-do-and-see/images/",$filename);
            }
            else{

            }
        }
         $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Photo Added Successfully</b></div>";
             return redirect()->back()->with("message",$message);

        }
        catch(\Exception $e){
          
             return redirect()->back()->with("message",$e->getMessage());

        }

    }


    public function showMoreImageList(Request $request,$id){
        $id=base64_decode($id);
        $data=MustDoAndSee::select("name","id")->where("id",$id)->first();
        $imagedata=MustDoAndSeeImage::where("must_do_and_see_id",$id)->get();
        return view("admin.page.must_do_and_see.view_more_image")->with("imagedata",$imagedata)->with("data",$data);
    }


    public function status_change_more_image(Request $request,$id){
        $data=MustDoAndSeeImage::where("id",base64_decode($id))->first();
        if($data->status==1){
            $update=MustDoAndSeeImage::where("id",base64_decode($id))->update(['status'=>0]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Must Do & See Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }
           

        }
        else{
              $update=MustDoAndSeeImage::where("id",base64_decode($id))->update(['status'=>1]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Must Do & See Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }

        }


    }

    public function deleteMoreImage(Request $request,$id){
        $id=base64_decode($id);

        $data=MustDoAndSeeImage::findOrFail($id)->toArray();
        
      
        @unlink("Must-do-and-see/images/".$data['image']);
        if(MustDoAndSeeImage::where("id",$id)->delete()){
              $message="<div class='alert alert-success '><i class='la la-close close' data-dismiss='alert'></i><b>Photo Deleted Successfully</b></div>";
             return redirect()->back()->with("message",$message);

        }
        else{
             $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect()->back()->with("message",$message);
        }
        
     

    }

    public function editMoreImage(Request $request,$id){
   $id=base64_decode($id);
   
        $data=MustDoAndSeeImage::findOrFail($id)->toArray();

        return view("admin.page.must_do_and_see.edit_more_image")->with("data",$data);
    }

    public function editMoreImageData(Request $request){
       try{
        $pre_data=MustDoAndSeeImage::where("id",$request->id)->first();
        $file=$request->file("image");
        $filename=rand(1,99).time().".png";
        if(MustDoAndSeeImage::where("id",$request->id)->update(['image'=>$filename])){
            @unlink("Must-do-and-see/images/".$pre_data['image']);
            $file->move("Must-do-and-see/images/",$filename);
                $message="<div class='alert alert-success '><i class='la la-close close' data-dismiss='alert'></i><b>Photo Updated Successfully</b></div>";
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

}
