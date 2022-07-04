<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transfer;


class TransferController extends Controller
{
    public function index(){
        return view("admin.page.transfer.add_transfer");
    }

    public function store(Request $request){
        $validate=$request->validate(
     [
  "transfer_type"=>"required",
     ],
     [
        "transfer_type.required"=>"Transfer Type Required",

     ]
        );

        if(Transfer::create($request->all())){
            return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Transfer Created Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
        }
        else{
            return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
        }


    }


    public function show(){
        $data=Transfer::orderBy("id","desc")->paginate(10);
        return view("admin.page.transfer.transfer_list",compact('data'));
    }



    public function status_change(Request $request,$id){
        $id=base64_decode($id);
        $data=Transfer::where("id",$id)->first();

         
        if($data->status==0){
            $update=Transfer::where("id",$id)->update(['status'=>1]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Transfer Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }
        }
        else{

            $update=Transfer::where("id",$id)->update(['status'=>0]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Transfer Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }

        }
    }

    public function delete(Request $request,$id){
        $id=base64_decode($id);
        if(Transfer::where("id",$id)->delete()){
             return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Transfer Deleted Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
        }
        else{
             return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
        }
    }

   public function edit(Request $request,$id){
    $id=base64_decode($id);
    $data=Transfer::where("id",$id)->first();
    return  view("admin.page.transfer.edit_transfer",compact('data'));
   }


   public function edit_data(Request $request){

      $request->validate([
        "transfer_type"=>"required"

      ],
      [
        "transfer_type.required"=>"Transfer Type Required"
      ]
  );
      $update=Transfer::where("id",$request->id)->update(['transfer_type'=>$request->transfer_type]);

      if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Transfer Updated Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
      }
      else{
         return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
      }

   }

}
