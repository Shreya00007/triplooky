<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CopyRight;

class CopyRightController extends Controller
{
    private $data;
    private $check;
    public function index(){
        return view("admin.page.copyright.copyright");
    }
    public function create_copyright(Request $request){
        $this->check=CopyRight::get()->count();
        if($this->check==0){
            $this->data=array("copyright"=>$request->copyright,"status"=>"inactive");
            if(CopyRight::create($this->data)){
                return response("success");
            }
            else{
                return response("Failed try Again");
            }
        }
        else{
            return response("CopyRight Already Created");
        }
    }
    public function view(){
        $this->data=CopyRight::get();
        return view("admin.page.copyright.view_copyright",['data'=>$this->data]);
    }

    public function update(){
        $this->data=CopyRight::get();
        return view("admin.page.copyright.update_copyright",['data'=>$this->data]);
    }

    public function update_data(Request $request){
       $this->data=array("copyright"=>$request->copyright,"status"=>"active");
       $this->check=CopyRight::where("id",base64_decode($request->id))->update($this->data);
       if($this->check){
        return response()->json(['message'=>"success"]);
       }
       else{
        return response()->json(['message'=>"Failed"]);
       }

    }

    public function delete(Request $request,$id){
         $this->check=CopyRight::where("id",base64_decode($id))->delete();
        if($this->check){
            return redirect()->back()->with("message","CopyRight has been deleted successfully");
        }
        else{
            return redirect()->back()->with("message","Someyhing is wrong try again");
        }
    }
}
