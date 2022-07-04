<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
use Validator;
use App\Models\CurrencyConverter;
class CurrencyConverterController extends Controller
{
   public function index(){
   	$currency=Currency::where("status","active")->get()->toArray();
   return view("admin.page.currencyConvert.add",['data'=>$currency]);

   }

   public function create(Request $request){
      $validate=Validator::make($request->all(),
         [
         'currency_from'=>"required|exists:currencies,currency_name",
         'currency_to'=>"required|exists:currencies,currency_name",
         "price_from"=>"required",
         "price_to"=>"required",
         ],
         [
            'currency_from.exists'=>"Currency From Can`t be empty",
            'currency_to.exists'=>"Currency To Can`t be empty",
            'price_from.required'=>"Price From Can`t be empty",
            'price_to.required'=>"Price To Can`t be empty",


         ]



   );

      if($validate->fails()){
         return redirect()->back()->withInput($request->all())->withErrors($validate);
      }
      else{
        if($request->currency_from==$request->currency_to){
         $message="<div class='alert alert-danger text-danger p-font'><i class='la la-warning'></i> Both Currency Sholud Be Not Same <i class='la la-close close' data-dismiss='alert'></i></div>";
            return redirect()->back()->withInput($request->all())->with("message",$message);

        }
        else{
          $check=CurrencyConverter::where("currency_from",$request->currency_from)->where("currency_to",$request->currency_to)->get();
         if(count($check)){
            $message="<div class='alert alert-danger text-danger p-font'><i class='la la-warning'></i> This Currency Converter Already Exists <i class='la la-close close' data-dismiss='alert'></i></div>";
            return redirect()->back()->withInput($request->all())->with("message",$message);

         }
         else{
            $create=CurrencyConverter::create($request->all());
            if($create){
                  $message="<div class='alert alert-success p-font'> Successfully Created <i class='la la-close close' data-dismiss='alert'></i></div>";
            return redirect()->back()->with("message",$message);

            }

         }
        }
      }

   }

   public function show(){
      $data=CurrencyConverter::latest()->get()->toArray();
     
   	return view("admin.page.currencyConvert.list",['data'=>$data]);
   }

   public function edit(Request $request,$id){
      $id=base64_decode($id);
      $data=CurrencyConverter::where("id",$id)->first()->toArray();
     
    	$currency=Currency::where("status","active")->get()->toArray();
   return view("admin.page.currencyConvert.edit",['currency'=>$currency,'data'=>$data]);
   }

   public function edit_data(Request $request){
       $validate=Validator::make($request->all(),
         [
         'currency_from'=>"required|exists:currencies,currency_name",
         'currency_to'=>"required|exists:currencies,currency_name",
         "price_from"=>"required",
         "price_to"=>"required",
         ],
         [
            'currency_from.exists'=>"Currency From Can`t be empty",
            'currency_to.exists'=>"Currency To Can`t be empty",
            'price_from.required'=>"Price From Can`t be empty",
            'price_to.required'=>"Price To Can`t be empty",


         ]



   );

      if($validate->fails()){
         return redirect()->back()->withInput($request->all())->withErrors($validate);
      }
      else{
        if($request->currency_from==$request->currency_to){
         $message="<div class='alert alert-danger text-danger p-font'><i class='la la-warning'></i> Both Currency Sholud Be Not Same <i class='la la-close close' data-dismiss='alert'></i></div>";
            return redirect()->back()->withInput($request->all())->with("message",$message);

        }
        else{
          $check=CurrencyConverter::where("currency_from",$request->currency_from)->where("currency_to",$request->currency_to)->get();
         if(count($check)>1){
            $message="<div class='alert alert-danger text-danger p-font'><i class='la la-warning'></i> This Currency Converter Already Exists <i class='la la-close close' data-dismiss='alert'></i></div>";
            return redirect()->back()->withInput($request->all())->with("message",$message);

         }
         else{
            unset($request['_token']);
            $update=CurrencyConverter::where("id",$request->id)->update($request->all());
            if($update){
                  $message="<div class='alert alert-success p-font'> Successfully Updated <i class='la la-close close' data-dismiss='alert'></i></div>";
            return redirect("/admin/currency-convert/list")->with("message",$message);

            }

         }
        }
      }

   }


   public function delete(Request $request,$id){
      $id=base64_decode($id);
      $check=CurrencyConverter::where("id",$id)->delete();
      if($check){
           $message="<div class='alert alert-success p-font'> Successfully Delete <i class='la la-close close' data-dismiss='alert'></i></div>";
            return redirect()->back()->with("message",$message);


      }
      else{
          $message="<div class='alert alert-danger text-danger p-font'><i class='la la-warning'></i> Whoops! something went wrong try again <i class='la la-close close' data-dismiss='alert'></i></div>";
            return redirect()->back()->with("message",$message);

      }
   }
}
