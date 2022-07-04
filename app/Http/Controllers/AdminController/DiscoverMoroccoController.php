<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Validator;
use App\Models\DiscoverMorocco;
use App\Models\DiscoverMoroccoImage;

class DiscoverMoroccoController extends Controller
{
    public function index(){
        $city=City::latest()->where("status",1)->get();
        return view("admin.page.discover-morocco.add")->with("city",$city);
    }



   public function create(Request $request){
         $validator=Validator::make($request->all(),
            [
                "name"=>"required",
                
                "status"=>"required|in:1,0",
                "thumb_image"=>"required|max:2048",
              
                "city"=>"required|exists:cities,id",
                "description"=>"required",
                "multi_image"=>"required",
            ],
            [
                "name.required"=>"Must Do And See Name is required",
                "type.in"=>"Select Type",
                "status.in"=>"Select Status",
              
               
                "thumb_image.max"=>"Thumb Photo Size Sholud be less than 2 MB",
            
               
              
                "city.exists"=>"Select City",
                "city.required"=>"Select City",
                "description.required"=>"Description is required",
                 "multi_image.required"=>"Select At Least one Photo",

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
            unset($data['_token']);
            
            if($create=DiscoverMorocco::create($data)){
               $file->move("discover-morocco/images/",$filename);
                $id=$create->id;
               $all_image=$request->file("multi_image");
               foreach($all_image as $image){

                  $filename=rand(1,99).time().".png";
                  
                  $data=['image'=>$filename,"discover_moroccos_id"=>$id,"status"=>0];
                  DiscoverMoroccoImage::create($data);
                  $image->move("discover-morocco/images/",$filename);
               }
              
               

           $message="<div class='alert alert-success p-font' ><b>Discover Morocco Created Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";
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
      $data=DiscoverMorocco::findOrFail($id);
      $city=City::latest()->where("status",1)->get();
      return view("admin.page.discover-morocco.edit")->with("data",$data)->with("city",$city);

   }


   public function edit_data(Request $request){
      if($request->hasFile("thumb_image")){
            $validator=Validator::make($request->all(),
            [
                "name"=>"required",
               
                "status"=>"required|in:1,0",
                "thumb_image"=>"required|max:2048",
              
                "city"=>"required|exists:cities,id",
                "description"=>"required",
            ],
            [
                "name.required"=>"Name is required",
                
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
            $pre_data=DiscoverMorocco::findOrFail($request->id);
           
        $data=$request->all();
         $city_name=City::where("id",$request->city)->first()->toArray();
            $data['city_name']=$city_name['city_name'];
            $file=$request->file("thumb_image");
            $filename=rand(1,99).time().".png";
            $data['image']=$filename;
            unset($data['_token']);
            unset($data['thumb_image']);

           
            if(DiscoverMorocco::where("id",$request->id)->update($data)){
               $file->move("discover-morocco/images/",$filename);
                @unlink("discover-morocco/images/".$pre_data->image);
               
               

           $message="<div class='alert alert-success p-font' ><b> Updated Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                 return redirect("/admin/discover-morocco/view")->with("message",$message);

            }
            else{
               $message="<div class='alert alert-warning p-font text-danger' ><b>Whoops! something went wrong</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                 return redirect("/admin/discover-morocco/view")->with("message",$message);
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
              
                "status"=>"required|in:1,0",
              
                "city"=>"required|exists:cities,id",
                "description"=>"required",
            ],
            [
                "name.required"=>"Must Do And See Name is required",
                 "status.required.in"=>"Select Status",
              
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
          
            if($create=DiscoverMorocco::where("id",$request->id)->update($data)){
             
           

           $message="<div class='alert alert-success p-font' ><b> Updated Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                 return redirect("/admin/discover-morocco/view")->with("message",$message);

            }
            else{
               $message="<div class='alert alert-warning p-font text-danger' ><b>Whoops! something went wrong</b><i class='la la-close close' data-dismiss='alert'></i></div>";
                 return redirect("/admin/discover-morocco/view")->with("message",$message);
            }


           }
           catch(\Exception $e){
            return redirect()->back()->with("message",$e->getMessage());
           }
            
         }
         }
   }

   public function show(){
      $data=DiscoverMorocco::latest()->paginate(20);
      return view("admin.page.discover-morocco.list")->with("data",$data);
   }


    public function status_change(Request $request,$id){
        $data=DiscoverMorocco::where("id",base64_decode($id))->first();
        if($data->status==1){
            $update=DiscoverMorocco::where("id",base64_decode($id))->update(['status'=>0]);
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
              $update=DiscoverMorocco::where("id",base64_decode($id))->update(['status'=>1]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>DiscoverMorocco Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }

        }
    }


   public function delete(Request $request,$id){
        $data=DiscoverMorocco::where("id",base64_decode($id))->first();
        
        @unlink("discover-morocco/images/".$data->image);
        if(DiscoverMorocco::where("id",base64_decode($id))->delete()){
            
            $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>DiscoverMorocco Deleted Successfully</b></div>";
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
        $data=DiscoverMorocco::findOrFail($id);
        return view("admin.page.discover-morocco.add_more_image")->with("data",$data);
    }

    public function addMoreImageData(Request $request){

        try{
            $allfile=$request->file("image");
        foreach($allfile as $image){
            $filename=rand(1,99).time().".png";
            $data=array("discover_moroccos_id"=>$request->id,"image"=>$filename,"status"=>0);
            if(DiscoverMoroccoImage::create($data)){
                $image->move("discover-morocco/images/",$filename);
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

        $data=DiscoverMorocco::select("name","id")->where("id",$id)->first();
        $imagedata=DiscoverMoroccoImage::where("discover_moroccos_id",$id)->get()->toArray();
     
        return view("admin.page.discover-morocco.view_more_image")->with("imagedata",$imagedata)->with("data",$data);
    }


    public function status_change_more_image(Request $request,$id){
        $data=DiscoverMoroccoImage::where("id",base64_decode($id))->first();
        if($data->status==1){
            $update=DiscoverMoroccoImage::where("id",base64_decode($id))->update(['status'=>0]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Discover Morocco Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }
           

        }
        else{
              $update=DiscoverMoroccoImage::where("id",base64_decode($id))->update(['status'=>1]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>DiscoverMorocco Status Updated Successfully</b></div>";
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

        $data=DiscoverMoroccoImage::findOrFail($id)->toArray();
        
      
        @unlink("discover-morocco/images/".$data['image']);
        if(DiscoverMoroccoImage::where("id",$id)->delete()){
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

        return view("admin.page.discover-morocco.edit_more_image")->with("data",$data);
    }

    public function editMoreImageData(Request $request){
       try{
        $pre_data=DiscoverMoroccoImage::where("id",$request->id)->first();
        $file=$request->file("image");
        $filename=rand(1,99).time().".png";
        if(DiscoverMoroccoImage::where("id",$request->id)->update(['image'=>$filename])){
            @unlink("discover-morocco/images/".$pre_data['image']);
            $file->move("discover-morocco/images/",$filename);
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
