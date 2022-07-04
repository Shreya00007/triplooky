<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HowToVideo;

class HowToVideoController extends Controller
{
   public function index(){
        return view("admin.page.how-to-video.Howtovideo");
    }

    public function create(Request $request){
        $check=HowToVideo::where("video_link",$request->link)->get()->count();
        if($check){

        }
        else{
            $data=array("video_link"=>$request->link,"status"=>1);
            if(HowToVideo::create($data)){
               
                return redirect()->back()->with("message","<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i>successfully video created</div>");
            }
            else{
                 echo "<script>alert('Something is wrong')</script>";
                return redirect()->back()->with("message","<div class='alert alert-warning'><i class='la la-close close' data-dismiss='alert'></i>Something is wrong try again</div>");
            }
        }


}
    public function view(){
        $data=HowToVideo::orderBy("id","desc")->get();
        return view("admin.page.how-to-video.view",['data'=>$data]);
    }

    public function edit(Request $request,$id){
        $id=base64_decode($id);
        $data=HowToVideo::where("id",$id)->get();
        return view("admin.page.how-to-video.edit",['data'=>$data]);

    }

    public function edit_data(Request $request){
        $check=HowToVideo::where("id",$request->id)->update(['video_link'=>$request->link]);
        if($check){
            return redirect()->back()->with("message","<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i>successfully video updated</div>");
        }
        else{
             return redirect()->back()->with("message","<div class='alert alert-warning'><i class='la la-close close' data-dismiss='alert'></i>Something is wrong try again</div>");
        }

    }

    public function delete(Request $request,$id){
        $id=base64_decode($id);
        $check=HowToVideo::where("id",$id)->delete();
        if($check){
            return redirect()->back()->with("message_success","<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i>successfully video deleted</div>");
        }
        else{
            return redirect()->back()->with("message","<div class='alert alert-warning'><i class='la la-close close' data-dismiss='alert'></i>Something is try again</div>");
        }

    }

    public function details(Request $request,$id){
        $id=base64_decode($id);
        $data=HowToVideo::where("id",$id)->get();
    return view("admin.page.how-to-video.details",['data'=>$data]);


    }

    public function update_status(Request $request,$id){
         $data=HowToVideo::where("id",base64_decode($id))->first();
         $all_video=HowToVideo::get();
         foreach($all_video as $video){
            HowToVideo::where("id",$video->id)->update(["status"=>0]);
         }
         
        
         
         if($data->status==1){
            $update=HowToVideo::where("id",base64_decode($id))->update(['status'=>0]);
            if($update){
                return redirect()->back()->with("message","<div class='alert alert-success mb-2'><i class='la la-close close' data-dismiss='alert'></i>Status updated successfully</div>");
            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-success mb-2'><i class='la la-close close' data-dismiss='alert'></i>Status updated successfully</div>");
            }

         }
         else{
            $update=HowToVideo::where("id",base64_decode($id))->update(['status'=>1]);
            $update2=HowToVideo::where("id", '!=' ,base64_decode($id))->update(['status'=>0]);
            
             if($update){
                return redirect()->back()->with("message","<div class='alert alert-success mb-2'><i class='la la-close close' data-dismiss='alert'></i>Status updated successfully</div>");
            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-success mb-2'><i class='la la-close close' data-dismiss='alert'></i>Status updated successfully</div>");
            }

         }
    }

}
