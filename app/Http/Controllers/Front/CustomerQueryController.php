<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Front\CustomerQuery;

class CustomerQueryController extends Controller
{
    public function query(Request $request){

       $check=CustomerQuery::where("email",$request->email)->get()->count();
       if($check>0){
         return response()->json(['message'=>"This query has been already submited"]);

       }
       else{
        $data=array(
         "name"=>$request->name,
         "email"=>$request->email,
         "subject"=>$request->subject,
         "query"=>$request->input("query"),

        );
       

     
        if(CustomerQuery::create($data)){
            return response()->json(['message'=>"success"]);
        }
        else{
             return response()->json(['message'=>"failed"]);

        }
       }
    }
}
