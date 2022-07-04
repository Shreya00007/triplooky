<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Term;

class TermController extends Controller
{
   private $check;
    private $data;
    public function index(){
        return view("admin.page.terms.terms");
    }

    public function create_term(Request $request){
   $this->check=Term::get()->count();
   if($this->check){
    return response("Terms is already Created");

   }
   else{
    $this->data=array("terms"=>$request->term,"status"=>"inactive");
    if(Term::create($this->data)){
        return response("success");
    }
    else{
        return response("Failed try Again");
    }
   }

    }

    public function view(){
        $this->data=Term::get();
        return view("admin.page.terms.view_term",['data'=>$this->data]);
    }

    public function update(){
          $this->data=Term::get();
        return view("admin.page.terms.update_terms",['data'=>$this->data]);
    }

    public function update_data(Request $request){

       $this->data=array("terms"=>$request->term,"status"=>"active");
       $this->check=Term::where("id",base64_decode($request->id))->update($this->data);

       if($this->check){
        return response()->json(['message'=>"success"]);
       }
       else{
        return response()->json(['message'=>"Failed"]);
       }

    }

     public function delete(Request $request,$id){

         $this->check=Term::where("id",base64_decode($id))->delete();
        if($this->check){
            return redirect()->back()->with("message","Terms has been deleted successfully");
        }
        else{
            return redirect()->back()->with("message","Someyhing is wrong try again");
        }

    }
}
