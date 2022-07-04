<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends Controller
{
    private $check;
    private $data;
    public function index(){
        return view("admin.page.faq.faq");
    }

    public function create_faq(Request $request){
   $this->check=FAQ::get()->count();
   if($this->check){
    return response("FAQ is already Created");

   }
   else{
    $this->data=array("faq"=>$request->faq,"status"=>"inactive");
    if(FAQ::create($this->data)){
        return response("success");
    }
    else{
        return response("Failed try Again");
    }
   }

    }

    public function view(){
        $this->data=FAQ::get();
        return view("admin.page.faq.view_faq",['data'=>$this->data]);
    }

    public function update(){
        $this->data=FAQ::get();
        return view("admin.page.faq.update_faq",['data'=>$this->data]);
    }

    public function update_data(Request $request){
        $this->data=array("faq"=>$request->faq,"status"=>"active");
        $this->check=FAQ::where("id",base64_decode($request->id))->update($this->data);
        if($this->check){
            return response()->json(['message'=>"success"]);
        }
        else{
            return response()->json(['message'=>"Failed"]);
        }

    }

    public function delete(Request $request,$id){
        $this->check=FAQ::where("id",base64_decode($id))->delete();
        if($this->check){
            return redirect()->back();
        }
        else{
            return redirect()->back()->with("message","Something is wrong try again");
        }
    }
}
