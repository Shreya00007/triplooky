<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Validator;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function index(){
        $category=Category::where("status","active")->get();
        return view("admin.page.sub_category.sub_category",['category'=>$category]);
    }

    public function store(Request $request){
       
       
       $validate=Validator::make($request->all(),
        [
       'category'=>"required|exists:categories,id",
       "sub_category_name"=>"required",


        ],
       [
         "category_id.required|exists:categories,id"=>"Select Category",
        "sub_category_name.required"=>"Sub Category Name can`t be empty",
       ]





   );
   if($validate->fails()){
    return redirect()->back()->withErrors($validate);
   }
   else{
  $data=array(
     "category"=>$request->category,
     "sub_category_name"=>$request->sub_category_name,
     "status"=>0,


  );


  if(SubCategory::create($data)){
    return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Sub Category Created Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
  }
  else{
    return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
  }


   }


    }


    public function show(){
      $data=SubCategory::with("categories")->orderBy("id","desc")->get();
        
   
        return view("admin.page.sub_category.sub_category_list",['data'=>$data]);
    }

    public function status_change(Request $request,$name){

        $name=base64_decode($name);

        $data=SubCategory::where("sub_category_name",$name)->first();
         
        if($data->status==0){
            $update=SubCategory::where("sub_category_name",$name)->update(['status'=>1]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Sub Category Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }
        }
        else{

            $update=SubCategory::where("sub_category_name",$name)->update(['status'=>0]);
            if($update){
        return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Sub Category Status changed Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");


            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
            }

        }
    }

    public function edit(Request $request,$id){
        $id=base64_decode($id);
        $category=Category::all();
        $data=SubCategory::with("categories")->findOrfail($id);
        return view("admin.page.sub_category.edit_sub_category",['category'=>$category,'data'=>$data]);
    }


    public function edit_data(Request $request){
        $validate=Validator::make($request->all(),
        [
       'category'=>"required|exists:categories,id",
       "sub_category_name"=>"required",


        ],
       [
         "category_id.required|exists:categories,id"=>"Select Category",
        "sub_category_name.required"=>"Sub Category Name can`t be empty",
       ]





   );
   if($validate->fails()){
    return redirect()->back()->withErrors($validate);
   }
   else{
  $data=array(
     "category"=>$request->category,
     "sub_category_name"=>$request->sub_category_name,
     


  );


  if(SubCategory::where("id",$request->id)->update($data)){
    return redirect("/admin/view-sub-category")->with("message","<div class='alert alert-success animated flash p-font'><b>Sub Category Updated Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
  }
  else{
    return redirect("/admin/view-sub-category")->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
  }


   }
    }

    public function delete(Request $request,$id){
        $id=base64_decode($id);
        $check=SubCategory::where("id",$id)->delete();
        if($check){
             return redirect()->back()->with("message","<div class='alert alert-success animated flash p-font'><b>Sub Category Deleted Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
        }
        else{
    return redirect()->back()->with("message","<div class='alert alert-warning animated flash p-font'><b>Something is wrong try again</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>");
  }


    }
}