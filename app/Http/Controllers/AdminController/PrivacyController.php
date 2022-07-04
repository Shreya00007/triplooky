<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Privacy;

class PrivacyController extends Controller
{
    private $data;
    private $check;
    public function index(){
        return view("admin.page.privacy.privacy");
    }

    public function create(Request $request){
        $this->check=Privacy::get()->count();
        if($this->check>0){
            return response()->json(['message'=>"Privacy Policy Already Created"]);
        }
        else{
            $this->data=array("privacy"=>$request->privacy,"status"=>"active");
            if(Privacy::create($this->data)){
                return response()->json(['message'=>"success"]);
            }
            else{
                return response()->json(['message'=>"failed"]);
            }
        }

    }

    public function view(){
        $this->data=Privacy::get();
        return view("admin.page.privacy.view_privacy",['data'=>$this->data]);
    }

    public function update(){
        $this->data=Privacy::get();
        return view("admin.page.privacy.update_privacy",['data'=>$this->data]);
    }

    public function update_data(Request $request){
       $this->data=array("privacy"=>$request->privacy,"status"=>"active");
       $this->check=Privacy::where("id",$request->id)->update($this->data);
       if($this->check){
        return response()->json(['message'=>"success"]);
       }
       else{
        return response()->json(['message'=>"Failed"]);
       }

    }

    public function delete(Request $request,$id){
        $this->check=Privacy::where("id",base64_decode($id))->delete();
        if($this->check){
            return redirect()->back()->with("message","Privacy Policy has been deleted successfully");
        }
        else{
            return redirect()->back()->with("message","Someting is wrong try again");
        }

    }
}
