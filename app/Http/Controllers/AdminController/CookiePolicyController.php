<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CookiePolicy;

class CookiePolicyController extends Controller
{
    private $data;
    private $check;

    public function index(){
        return view("admin.page.cookie_policy.cookie_policy");
    }

    public function create_cookie_policy(Request $request){
        $this->check=CookiePolicy::get()->count();
        if($this->check==0){
            $this->data=array("cookie"=>$request->cookie_policy,"status"=>"inactive");
            $this->check=CookiePolicy::create($this->data);
            if($this->check){
                return response("success");
            }
            else{
                return response("Failed try Again");
            }
        }
    }

    public function view(){
        $this->data=CookiePolicy::get();
        return view("admin.page.cookie_policy.view_cookie_policy",['data'=>$this->data]);
    }

    public function update(){
        $this->data=CookiePolicy::get();
        return view("admin.page.cookie_policy.update_cookie_policy",['data'=>$this->data]);
    }

    public function update_data(Request $request){
       $updatedata=array("cookie"=>$request->cookie_policy);
      
       $check=CookiePolicy::where("id",base64_decode($request->id))->update($updatedata);
       if($check){
        return response("success");
       }
       else{
        return response("Failed");
       }
    }

    public function delete(Request $request,$id){

         $this->check=CookiePolicy::where("id",base64_decode($id))->delete();
        if($this->check){
            return redirect()->back()->with("message","CookiePolicy has been deleted successfully");
        }
        else{
            return redirect()->back()->with("message","Someyhing is wrong try again");
        }

    }
}
