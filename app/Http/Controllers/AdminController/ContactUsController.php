<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactUsController extends Controller
{
    private $check;
    private $data;
    private $message;
    public function index(){
        return view("admin.page.contact_us.contact");
    }
    public function create_contact(Request $request){
    $this->check=Contact::get()->count();
    if($this->check>0){
        return response("Contact us already Created");

    }
    else{
        $this->data=array("address"=>$request->contact,"status"=>"inactive","email"=>$request->email,"phone"=>$request->phone);
        $this->check=Contact::create($this->data);
        if($this->check){
            return response("success");
        }
        else{
            return response("Failed try Again");
        }
    }

    }

    public function viewContact(){
        $this->data=Contact::get();
        return view("admin.page.contact_us.view_contact_us",['data'=>$this->data]);
    }

    public function update(){
         $this->data=Contact::get();
        return view("admin.page.contact_us.update",['data'=>$this->data]);
    }

    public function update_data(Request $request){
      
       
        $this->data=array(
         "email"=>$request->email,
         "phone"=>$request->phone,
         "address"=>$request->contact,
         "status"=>"active",
        );

        $this->check=Contact::where("id",base64_decode($request->id))->update($this->data);
        if($this->check){
            return response()->json(['message'=>"success"]);
        }
        else{
            return response()->json(['message'=>"Failed"]);
        }

    }

    public function delete(Request $request,$id){
        $this->check=Contact::where("id",base64_decode($id))->delete();
        if($this->check){
            return redirect()->back();
        }
        else{
            return redirect()->back()->with("message","Failed try Again");
        }

    }
}
