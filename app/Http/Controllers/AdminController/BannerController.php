<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Banner;


class BannerController extends Controller
{
    private $check;
    private $message;
    private $filename;
    private $file;
    private $data;
   public function index(){
    $this->data=Banner::orderBy("order_by","desc")->get();
    return view("admin.page.banner.banner",['data'=>$this->data]);
   }


   public function create_banner(Request $request){
     $order=Banner::max("order_by");
   
    if($request->hasfile("banner")){
        
       
   $this->file=$request->file("banner");
      $this->filename=date('mdYHis').uniqid().$this->file->getClientOriginalName();
        if(File::exists("admin-assets/images/banner/".$this->filename)){
           return response("This Banner is already created");
        }
        else{
          if($this->file->move("admin-assets/images/banner",$this->filename)){
               $this->data=array(
                "banner_name"=>$this->filename,
                "status"=>"0",
                "order_by"=>$order+1,
                 );
               $this->check=Banner::create($this->data);
               if($this->check){
                return response("success");
               }
               else{
                return response("Failed to created");
               }
          }
          else{
            return response("File to move in banner folder");
          }
        }
        
    }
    else{
        echo "File Not Found";
    }
   }

  
    public function banner_change(Request $request){

          
        $this->file=$request->file("banner");
         $data=Banner::where("id",$request->id)->get();
         $this->filename=rand(1,999).time() . uniqid() .$this->file->getClientOriginalName();

          
      if(File::exists("admin-assets/images/banner/".$data[0]->banner_name)){
         if(File::delete("admin-assets/images/banner/".$data[0]->banner_name)){
             
            
              if($this->file->move("admin-assets/images/banner",$this->filename)){
               $this->data=array(
                "banner_name"=>$this->filename,
               
                 );
               $this->check=Banner::where("id",$request->id)->update($this->data);
               if($this->check){
                return response("success");
               }
               else{
                return response("Failed to Update");
               }
          }
          else{
            return response("Something is wrong try again");
          }
           
         }
         else{
             return response()->json(['message'=>"Something is wrong try again"]);

         }
      

   }
   else{
           return response()->json(['message'=>"File Not exist"]);
   }


    }


   public function delete(Request $request){
     $data=Banner::where("id",$request->id)->get();
      if(File::exists("admin-assets/images/banner/".$data[0]->banner_name)){
         if(File::delete("admin-assets/images/banner/".$data[0]->banner_name)){

            if(Banner::where("id",$request->id)->delete()){
                return response()->json(['message'=>"success"]);
            }
            else{
                return response()->json(['message'=>"Failed"]);
            }
         }
         else{
             return response()->json(['message'=>"File Not delete"]);

         }
      

   }
   else{
           return response()->json(['message'=>"File Not exist"]);
   }
}
   
   public function status_change(Request $request){

     $this->check=Banner::where("id",$request->id)->update(['status'=>$request->status]);

     if($this->check){
         return response()->json(['message'=>"success"]);
     }
     else{
         return response()->json(['message'=>"File Not delete"]);
     }

   }


   public function order_change(Request $request){
    $data=Banner::where("id",$request->id)->first();
   
    $check=Banner::where("order_by",$request->order)->update(["order_by"=>$data->order_by]);
    $check=Banner::where("id",$request->id)->update(['order_by'=>$request->order]);
    if($check){
        return response()->json(['message'=>"success"]);
    }
    else{
        return response()->json(['message'=>"faield"]);
    }
   }

}
