<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
   public function index(){
    return view("admin.page.category.add_category");
   }

   public function create(Request $request){
       $category=$request->category_name;
       $check=Category::where("category_name",$category)->get()->count();
       if($check){
        return response()->json(['message'=>"This Category Already exist"]);

       }
       else{
        $data=array("category_name"=>$category,"status"=>"inactive");
        if(Category::create($data)){
            return response()->json(['message'=>"success"]);
        }
        else{
            return response()->json(['message'=>"Failed"]);
        }

       }
   }

   public function view_category(){
    $data=Category::orderBy("id","desc")->paginate(10);
     return view("admin.page.category.view_category",['data'=>$data]);
   }


   public function status(Request $request){
    $check=Category::where("id",$request->id)->update(['status'=>$request->status]);
    if($check){
        return response()->json(['message'=>"success"]);
    }
    else{
        return response()->json(['message'=>"Failed"]);
    }

   }

   public function edit(Request $request,$id){
    $data=Category::where("id",base64_decode($id))->first();
    return view("admin.page.category.edit_category",['data'=>$data]);

   }


   public function edit_data(Request $request){
    $data=Category::where("id",$request->id)->first();
  
    $check=Category::where("category_name",$request->category_name)->get()->count();
    if($data->category_name==trim($request->category_name) || $check!=1){
        $check=Category::where("id",$request->id)->update(['category_name'=>$request->category_name]);

        if($check){
             return response()->json(['message'=>"success"]);
        }
        else{
             return response()->json(['message'=>"Failed try Again"]);
        }
    }
    else{
        return response()->json(['message'=>"This Category Already exist"]);
    }
   }


   public function delete(Request $request){
   $check=Category::where("id",$request->id)->delete();
   if($check){
     return response()->json(['message'=>"success"]);
   }
   else{
     return response()->json(['message'=>"Failed try Again"]);
   }
   }
}
