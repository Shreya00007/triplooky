<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;

class CurrencyController extends Controller
{
    private $check;
    private $data;
   public function index(){
    $this->data=Currency::latest()->paginate(10);
    return view("admin.page.currency.currency",['data'=>$this->data]);
   }

   public function create(Request $request){
     $this->check=Currency::where("country_name",$request->country_name)->where("currency_name",$request->currency_name)->where("symbol",$request->symbol)->get()->count();
     if($this->check>0){
        return response()->json(['message'=>"Country Currency Already Exist"]);
     }
     else{
        $this->data=array(
            "country_name"=>$request->country_name,
            "currency_name"=>$request->currency_name,
            "symbol"=>$request->symbol,
            "status"=>$request->status,
        );
        if($this->data=Currency::create($this->data)){
            return response()->json(['message'=>"success","data"=>$this->data]);
        }
        else{
            return response()->json(['message'=>"Failed"]);
        }
     }

   }

   public function update(Request $request){
   
     $this->check=Currency::where("country_name",$request->country_name)->where("currency_name",$request->currency_name)->where("symbol",$request->symbol)->get()->count();
     if($this->check>1){
        return response()->json(['message'=>"Country Currency Already Exist"]);
     }
     else{
        $this->data=array(
            "country_name"=>$request->country_name,
            "currency_name"=>$request->currency_name,
            "symbol"=>$request->symbol,
            "status"=>$request->status,
        );
      
        if($this->data=Currency::where("id",$request->id)->update($this->data)){
            return response()->json(['message'=>"success","data"=>$this->data]);
        }
        else{
            return response()->json(['message'=>"Failed"]);
        }
     }

   }


   public function delete(Request $request){
    $this->check=Currency::where("id",$request->id)->delete();
    if($this->check){
        return response()->json(['message'=>"success"]);
    }
    else{
        return response()->json(['message'=>"Failed"]);
    }

   }

   public function update_status(Request $request,$id){
   $id=base64_decode($id);
     $status=Currency::where("id",$id)->first()->toArray();;
     
        if($status['status']=="inactive"){
            $update=Currency::where("id",$id)->update(['status'=>"active"]);
            if($update){
                return redirect()->back()->with("message","<div class='alert alert-success'>Currency Status Updated Successfully<i class='la la-close close' data-dismiss='alert'></i></div>");
            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning'>Something is wrong<i class='la la-close close' data-dismiss='alert'></i></div>");
            }

        }
        else{
            $update=Currency::where("id",$id)->update(['status'=>"inactive"]);
            if($update){
                return redirect()->back()->with("message","<div class='alert alert-success'>Currency Status Updated Successfully<i class='la la-close close' data-dismiss='alert'></i></div>");
            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning'>Something is wrong<i class='la la-close close' data-dismiss='alert'></i></div>");
            }

        }
   }
}
