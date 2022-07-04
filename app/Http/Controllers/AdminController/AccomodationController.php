<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accomodation;
use Validator;
use App\Models\AccomodatiomImage;
use App\Models\CMS\CMSAccomodation;
use App\Models\City;

class AccomodationController extends Controller
{
    public function index(){
        $accomodation=CMSAccomodation::where("status",1)->get();
        $city=City::latest()->where("status",1)->get();
  
    return view("admin.page.accomodation.accomodation",compact('city','accomodation'));

   }

   public function create(Request $request){
     $rule=[
     "name"=>"required",
    
     "star"=>"required",
     "image"=>"required|max:4048",
     
  
     "address"=>"required|max:500",
     "description"=>"required",
     "rating"=>"required",
     "status"=>"required|in:1,0",
     "price"=>"required|integer|not_in:0",
     "link"=>"required",
     "map"=>"required",
     "phone"=>"required",
     "more_image"=>"required",
     "type.exists"=>"Select Accomodation Type",


     ];
     $custom_rule=[
        'name.required'=>"Accomodation Name can`t be empty",
        "type.in"=>"Select Accomodation Type",
        "star.required"=>"Star can`t be empty",
        "image.required"=>"Choose Photo",
        
       
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
        "more_image"=>"Select At Least one Photo",


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
        $data['language']=$request->lang_name;
        $check=Accomodation::where("name",$request->name)->where("type",$request->type)->get()->count();
        if($check){
             $message="<div class='alert alert-warning p-font' ><b>Accomodation  Name is Already Created</b><i class='la la-close close' data-dismiss='alert'></i></div>";
             return redirect()->back()->with("message",$message);
        }
        else{
            if($create=Accomodation::create($data)){
                $file->move("accomodation-image/images/",$filename);
                 $allMultiImage=$request->file("more_image");
                 foreach($allMultiImage as $image){
                    $filename=rand(1,99).time().uniqid().".".$image->getClientOriginalExtension();
                    $data=['accomodation_id'=>$create->id,'image'=>$filename,'status'=>1];
                    AccomodatiomImage::create($data);
                    $image->move("accomodation-image/images/",$filename);
                 }
                 $message="<div class='alert alert-success p-font' ><b>Accomodation Created Successfully</b><i class='la la-close close' data-dismiss='alert'></i></div>";
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
    $data=Accomodation::latest()->paginate(20);
    return view("admin.page.accomodation.accomodation_list",compact('data'));
   }
   //status change
    public function status_change(Request $request,$id){
        $data=Accomodation::where("id",base64_decode($id))->first();
        if($data->status==1){
            $update=Accomodation::where("id",base64_decode($id))->update(['status'=>0]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Accomodation Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }
           

        }
        else{
              $update=Accomodation::where("id",base64_decode($id))->update(['status'=>1]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Accomodation Updated Successfully</b></div>";
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
        $accomodation=CMSAccomodation::where("status",1)->get();
        $city=City::latest()->where("status",1)->get();
        $data=Accomodation::where("id",base64_decode($id))->first();
        

        return view("admin.page.accomodation.edit_accomodation",compact('data','city','accomodation'));
    }

    //update data store
    public function edit_data(Request $request){

        if($request->hasFile("image")){
            $rule=[
     "name"=>"required",
     
 
     "image"=>"required|mimes:jpeg,jpg,png|max:2048",
     
     "address"=>"required|max:500",
     "description"=>"required",
     "rating"=>"required",
     "status"=>"required|in:1,0",
     'star'=>"required",
     "price"=>"required|integer|not_in:0",
     "link"=>"required",
     "map"=>"required",
     "phone"=>"required",


     ];
     $custom_rule=[
        'name.required'=>"Accomodation Name can`t be empty",
        "type.in"=>"Select Accomodation Type",
        "star.required"=>"Star cant`t be empty",
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
        $pre_data=Accomodation::where("id",$request->id)->first();
        $file=$request->file("image");
        $filename=rand(1,9999999999999999).session_id().time().uniqid().".".$file->getClientOriginalExtension();
        @unlink("accomodation-image/images/".$pre_data->image);
        $data=$request->all();
      
        unset($data['_token']);
        
        $data['image']=$filename;
        if(Accomodation::where("id",$request->id)->update($data)){
            $file->move("accomodation-image/images/",$filename);
            $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Accomodation updated successfully</b></div>";
            return redirect("/admin/accomodation/view-accomodation")->with("message",$message);
        }
        else{
            $message="<div class='alert alert-warning'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
            return redirect("/admin/accomodation/view-accomodation")->with("message",$message);
        }

     }

        }
        else{
           $rule=[
     "name"=>"required",
      
   'star'=>"required",
     
   
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
        'name.required'=>"Accomodation Name can`t be empty",
       
        "star.required"=>"Duration can`t be empty",
        
       
       
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
       
        $update=Accomodation::where("id",$request->id)->update($data);
        if($update){
             $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Accomodation updated successfully</b></div>";
            return redirect()->back()->with("message",$message);
        }
        else{
             $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect()->back()->with("message",$message);
        }
     }

        }
    }


    public function delete(Request $request,$id){
        $data=Accomodation::where("id",base64_decode($id))->first();
        @unlink("accomodation-image/images/".$data->image);
        if(Accomodation::where("id",base64_decode($id))->delete()){
            $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Accomodation Deleted Successfully</b></div>";
             return redirect("/admin/accomodation/view-accomodation")->with("message",$message);

        }
        else{
            $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect("/admin/accomodation/view-accomodation")->with("message",$message);
        }
    }

    public function showMultiImage(Request $request,$id){
        $data=Accomodation::where("id",base64_decode($id))->first();
        $imagedata=AccomodatiomImage::where("accomodation_id",base64_decode($id))->latest()->get();
        return view("admin.page.accomodation.view_accomodation_image",['data'=>$data,'imagelist'=>$imagedata]);
    }

    public function addMoreImage(Request $request,$id){
            $data=Accomodation::where("id",base64_decode($id))->first();
        return view("admin.page.accomodation.add_accomodation_image",['data'=>$data]);
    }

    public function addMoreImageStore(Request $request){
        $image=$request->file("image");
      foreach($image as $image_list){
        $filename=rand(1,99).time().".".$image_list->getClientOriginalExtension();
        $data=array(
            "accomodation_id"=>$request->id,
            "image"=>$filename,
            "status"=>1,
        );
        AccomodatiomImage::create($data);
        $image_list->move("accomodation-image/images",$filename);

      }
       $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Accomodation Image Added Successfully</b></div>";
             return redirect()->back()->with("message",$message);
    }

    public function More_image_status_change(Request $request,$id){
         $data=AccomodatiomImage::where("id",base64_decode($id))->first();
        if($data->status==1){
            $update=AccomodatiomImage::where("id",base64_decode($id))->update(['status'=>0]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Accomodation Image Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }
           

        }
        else{
              $update=AccomodatiomImage::where("id",base64_decode($id))->update(['status'=>1]);
            if($update){
                 $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Accomodation Image Status Updated Successfully</b></div>";
                  return redirect()->back()->with("message",$message);
            }
            else{
                $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
                  return redirect()->back()->with("message",$message);

            }

        }
    }

    public function deleteMoreImage(Request $request,$id){
         $data=AccomodatiomImage::where("id",base64_decode($id))->first();
        @unlink("accomodation-image/images/".$data->image);
        if(AccomodatiomImage::where("id",base64_decode($id))->delete()){
            $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Accomodation Image Deleted Successfully</b></div>";
             return redirect()->back()->with("message",$message);

        }
        else{
            $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect()->back()->with("message",$message);
        }
    }

    public function editMoreImage(Request $request,$id){
        $data=AccomodatiomImage::where("id",base64_decode($id))->first();
        return view("admin.page.accomodation.accomodaation_more_image_edit",['data'=>$data]);
    }

    public function moreImageEditData(Request $request){
        
        $pre_data=AccomodatiomImage::where("id",$request->id)->first();
        @unlink("accomodation-image/images/".$pre_data->image);
        $file=$request->file("image");
        $filename=rand(1,99).time().uniqid().".".$file->getClientOriginalExtension();
        $update=AccomodatiomImage::where("id",$request->id)->update(['image'=>$filename]);
        if($update){
            $file->move("accomodation-image/images/",$filename);
             $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i><b>Accomodation Image Updated Successfully</b></div>";
             return redirect()->back()->with("message",$message);
        }
        else{
             $message="<div class='alert alert-warning text-danger'><i class='la la-close close' data-dismiss='alert'></i><b>Whoops! something went wrong</b></div>";
             return redirect()->back()->with("message",$message);
        }
    }
}
