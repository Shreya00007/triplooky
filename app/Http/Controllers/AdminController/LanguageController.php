<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    private $check;
    private $data;
    private $message;

   public function index(){
    $this->data=Language::orderBy("id","desc")->get();
     return view("admin.page.language.create_lang",['data'=>$this->data]);
   }
   public function create(Request $request){
     $this->check=Language::where("lang_name",$request->lang)->get()->count();
     if($this->check>0){
        return response()->json(['message'=>"Language already exists"]);
     }
     else{
        $this->data=array("lang_name"=>$request->lang,"status"=>"inactive");
        if($this->data=Language::create($this->data)){
            return response()->json(['message'=>"success","data"=>$this->data]);
        }
        else{
             return response()->json(['message'=>"Failed try Again"]);
        }
     }
   }
    

    public function update(Request $request){
    
       $this->check=Language::where("lang_name",$request->lang)->get()->count();
       if($this->check>1){
        return response()->json(["message"=>"Language name is already exists"]);
       }
       else{
        $this->check=Language::where("id",$request->id)->update(['lang_name'=>$request->lang]);
        if($this->check){
            return response()->json(['data'=>$this->check,"message"=>"success"]);
        }
        else{
             return response()->json(["message"=>"Failed"]);
        }
       }
    }

    public function update_status(Request $request){
        $this->check=Language::where("id",($request->id))->update(['status'=>$request->status]);
        if($this->check){
            return response()->json(['message'=>"success"]);
        }
        else{
            return response()->json(['message'=>"Failed"]);
        }

    }

    public function delete(Request $request,$id){
        $this->check=Language::where("id",$id)->delete();
        if($this->check){
             $message="<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i>Language Deleted Successfully</div>";
            return redirect()->back()->with("message",$message);
        }
        else{
            $message="<div class='alert alert-danger text-white'><i class='la la-close close' data-dismiss='alert'></i>Something is went worng try again</div>";
             return redirect()->back()->with("message",$message);
        }

    }

}
