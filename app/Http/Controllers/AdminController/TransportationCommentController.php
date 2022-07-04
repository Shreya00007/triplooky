<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transportation;

class TransportationCommentController extends Controller
{
    public function index(Request $request,$id){
    	$id=base64_decode($id);
    	$data=Transportation::select("name","id")->where("id",$id)->first()->toArray();
    	return view("admin.page.transportation-comment.add",compact('data'));

    }
}
