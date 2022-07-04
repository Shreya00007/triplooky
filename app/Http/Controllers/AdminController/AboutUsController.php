<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutUsController extends Controller
{
    private $check;
    private $data;
    private $message;
    public function index(){
        return view("admin.page.about_us.about_us");
    }

    public function create_about(Request $request){
        $this->check=About::get()->count();
        if($this->check>0){
            return response("About us already Created");
        }
        else{
            $this->data=array(
            "about_us"=>$request->about,
            "status"=>"inactive"
            );
            $this->check=About::create($this->data);
            if($this->check){
                return response("success");
            }
            else{
                return response("Failed try Again");
            }
        }


    }

    public function view_about(){
        $this->data=About::get();
        return view("admin.page.about_us.view_about_us",['data'=>$this->data]);
    }

    public function update(){
        $this->data=About::get();
        return view("admin.page.about_us.update_about_us",['data'=>$this->data]);
    }

    public function update_data(Request $request){
       $this->data=array(
            "about_us"=>$request->about,
            "status"=>"active",

       );

       $this->check=About::where("id",base64_decode($request->id))->update($this->data);
       if($this->check){
        return response()->json(['message'=>"success"]);
       }
       else{
        return response()->json(['message'=>"Failed"]);
       }

    }

    public function delete(Request $request,$id){
        $this->check=About::where("id",base64_decode($id))->delete();
        if($this->check){
            return redirect()->back();
        }
        else{
            return redirect()->back()->with("message","Someyhing is wrong try again");
        }

    }
}
