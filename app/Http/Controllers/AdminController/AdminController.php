<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\User;
use App\Models\Front\CustomerQuery;
use App\Models\UserPlan\UserPlan;
use App\Models\Accomodation;
use App\Models\Transportation;
use App\Models\FoodDrink;
use App\Models\TourAndActivity;
class AdminController extends Controller
{
    private $check;
    public function index(){
        $admin=Admin::first();
        return view("admin.index",['admin'=>$admin]);
    }
    public function login_data(Request $request){
        $this->check=Admin::where("admin_email",$request->email)->get()->count();
        if($this->check>0){
            
           
          
             $get_admin=Admin::where("admin_email",$request->email)->get()->count();
            // $get_admin = DB::table('admins')->where('admin_email', $request->email)->first();
             if($get_admin>0)
             {
                 $get_admins = DB::table('admins')->where('admin_email', $request->email)->first();
                 
                 if (!empty($get_admins)) {
            $hashed_password = password_verify($request->password, $get_admins->admin_password);
            
            
                if ($hashed_password) {
            Session::put("admin_login",$request->email);
                 Session::put("admin_id",$get_admins->id);
                 Session::put("admin_mobile",$get_admins->admin_mobile);
                 Session::put("admin_image",$get_admins->admin_image);
                 Session::put("admin_pass",$get_admins->admin_pass);
                 Session::put("admin_address",$get_admins->admin_address);
                
               
              return response()->json(['message'=>"success"]); 
        }else{
            return response()->json(['message'=>"Password Wrong"]);
            
        }
            
                      
                 }else{ 
                     return response()->json(['message'=>"Email Wrong"]);
                 }
    
                 
             }else{ 
                     return response()->json(['message'=>"Email Wrong"]);
                 }
                 
                 
             }
       
    }


    public function logout(){
        Session::forget("admin_login");
        return redirect("/admin/login");
    }

    public function profile(){
        $data=Admin::get();
        return view("admin.page.admin_profile.profile",['data'=>$data]);
    }

   


     /*=================== Edit Profile =================*/
    
    public function settings(){
       //  $data=Admin::get();
    //  return view('admin/settings');
//  print_r($data);exit;
//echo Session::get('admin_login');exit;
$id = Session::get('admin_id');
    $check_admin = DB::table('admins')->find($id);
//dd($check_admin);
        return view("admin.page.admin_profile.settings", ['checkadmin'=>$check_admin]);
    }
    
    
    public function edit_admin_profile(Request $request, $id){
        $name = $request->input('name');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $address = $request->input('address');
        $check_admin = DB::table('admins')->find($id);
        if (empty($check_admin)) {
            $message = "<p class='alert alert-danger'>User does not exist.</p>";
            session()->flash('msg', $message);
            return redirect('admin/settings');
        }else{
            /*----------Image Upload --------*/
            if ($_FILES['image']['name']!="") {
                $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480',
                ]);
                $imageName = rand(100,999999).$_FILES['image']['name'];  
                $request->image->move(public_path('admin-assets/images/admin_image'), $imageName);
                /*----------Unlink Image-------*/
              $image = public_path('admin-assets/images/admin_image').'/'.$check_admin->admin_image;
                @unlink($image);
            }else{ $imageName = $check_admin->admin_image; }
            /*--------------------------*/
            $postdata = array(
                'admin_name'=>$name,
                "admin_mobile"=>$mobile,
                "admin_address"=>$address,
                "admin_image"=>$imageName
            );
            //print_r($postdata); die();
            DB::table('admins')->where('id', $id)->update($postdata);
            $message = "<p class='alert alert-success'>Record updated successfully.</p>";
            session()->flash('msg', $message);
            /*------------ Session ----------*/
            Session::forget("userData");
            $get_admin = DB::table('admins')->where('id', $id)->first();
            Session::push('userData', $get_admin);
            /*-------------------------------*/
            return redirect('admin/settings');
        }
    }
    /*=============== Change Email ==================*/
    public function edit_admin_email(Request $request, $id){
        $old_email = $request->input('old_email');
        $new_email = $request->input('new_email');
        $confirm_new_email = $request->input('confirm_new_email');
        $check_admin = DB::table('admins')->find($id);
        
        
        if (empty($check_admin)) {
            $message = "<p class='alert alert-danger'>User does not exist.</p>";
            session()->flash('msg', $message);
            return redirect('admin/settings');
        }elseif ($old_email!=$check_admin->admin_email) {
            $message = "<p class='alert alert-danger'>Invalid current email id.</p>";
            session()->flash('msg', $message);
            return redirect('admin/settings');
        }elseif ($old_email==$new_email) {
            $message = "<p class='alert alert-danger'>Please enter new email id.</p>";
            session()->flash('msg', $message);
            return redirect('admin/settings');
        }elseif ($new_email!=$confirm_new_email) {
            $message = "<p class='alert alert-danger'>Email not matched.</p>";
            session()->flash('msg', $message);
            return redirect('admin/settings');
        }else{ 
            $postdata = array("admin_email"=>$new_email);
        }
        DB::table('admins')->where('id', $id)->update($postdata);
        $message = "<p class='alert alert-success'>Record updated successfully.</p>";
        session()->flash('msg', $message);
        /*------------ Session ----------*/
       // Session::forget("admin_login");
       // Session::forget("admin_id");
        $get_admin = DB::table('admins')->where('id', $id)->first();
        Session::put('userData', $get_admin);
        /*-------------------------------*/
        return redirect('admin/settings');
    }
    /*================= Change Password ============*/
    public function change_admin_password(Request $request, $id){
        $current_password = $request->input('current_password');
        $new_password = $request->input('new_password');
        $confirm_new_password = $request->input('confirm_new_password');
        $check_admin = [];
        $check_admin = DB::table('admins')->find($id);
        if (empty($check_admin)) {
            $message = "<p class='alert alert-danger'>User does not exist.</p>";
            session()->flash('msg', $message);
            return redirect('admin/settings');
        }elseif ($current_password!=$check_admin->admin_pass) {
            $message = "<p class='alert alert-danger'>Invalid current password</p>";
            session()->flash('msg', $message);
            return redirect('admin/settings');
        }elseif ($current_password==$new_password) {
            $message = "<p class='alert alert-danger'>Please create a new password</p>";
            session()->flash('msg', $message);
            return redirect('admin/settings');
        }elseif ($new_password!=$confirm_new_password) {
            $message = "<p class='alert alert-danger'>Password not matched</p>";
        }else{
            $postdata = array('admin_pass'=>$new_password, 'admin_password'=>password_hash($new_password, PASSWORD_DEFAULT));
            DB::table('admins')->where('id', $id)->update($postdata);
            $message = "<p class='alert alert-success'>Password changed successfully</p>";
            session()->flash('msg', $message);
            return redirect('admin/settings');
        }

    }
    

     public function user_list(){
        $data=User::latest()->paginate(15);
        return view("admin.page.user.user_list",['data'=>$data]);
    }

    public function user_status(Request $request,$id){
        $status=User::find($id);
        if($status->status=="inactive"){
            $update=User::where("id",$id)->update(['status'=>"active"]);
            if($update){
                return redirect()->back();
            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning'>Something is wrong<i class='la la-close close'></i></div>");
            }

        }
        else{
            $update=User::where("id",$id)->update(['status'=>"inactive"]);
            if($update){
                return redirect()->back();
            }
            else{
                return redirect()->back()->with("message","<div class='alert alert-warning'>Something is wrong<i class='la la-close close'></i></div>");
            }

        }
    }

    public function user_delete(Request $request,$id){
        $check=User::where("id",$id)->delete();
        if($check){
            return redirect()->back()->with("message","<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i> User successfully deleted</div>");
        }
        else{
            return redirect()->back()->with("message","<div class='alert alert-warning'><i class='la la-close close' data-dismiss='alert'></i> User successfully deleted</div>");
        }
    }



     public function customer_query(){
        $data=CustomerQuery::latest()->paginate(8);
        return  view("admin.page.customer-query.customer_query",['data'=>$data]);
     }

     public function delete_customer_query(Request $request,$id){
        $check=CustomerQuery::where("id",$id)->delete();
        if($check){
            return redirect()->back()->with('message',"<div class='alert alert-success'><i class='la la-close close' data-dismiss='alert'></i> Customer Query Deleted</div>");
        }
        else{
            return redirect()->back()->with('message',"<div class='alert alert-warning'><i class='la la-close close' data-dismiss='alert'></i> Something is wrong</div>");

        }
     }


     public function userPlan(Request $request,$id){
        $total_price=0;
        $user=User::where("id",$id)->first()->toArray();

         $data=UserPlan::where("user_email",$user['email'])->get()->toArray();
        
          if(!empty($data)){
             $data=UserPlan::where("user_email",$user['email'])->first()->toArray();

             $accomodation=json_decode($data['accomodation'],true);
       $tour=json_decode($data['tour'], true);
       $fooddrink=json_decode($data['fooddrink'],true);
       $transportation=json_decode($data['transportation'],true);
       $accomodation_data=[];
       $tour_data=[];
       $fooddrink_data=[];
       $transportation_data=[];

        if(!empty($user)){
            try{
             
       // getting data
       if(!empty($accomodation)){
        foreach($accomodation as $key=> $accomodation_list){
        $accomodation_data[$key]=Accomodation::where("id",$accomodation_list['accomodation'])->first()->toArray();
        $total_price=$total_price+$accomodation_data[$key]['price'];

       }
       }
       else{
      
       }
       
       if(!empty($tour)){
        foreach($tour as $key=> $tour_list){
        $tour_data[$key]=TourAndActivity::where("id",$tour_list['tour'])->first()->toArray();
        $total_price=$total_price+$tour_data[$key]['price'];

       }
       }
       else{
       
       }

       if(!empty($fooddrink)){
        foreach($fooddrink as $key=> $fooddrink_list){
         $fooddrink_data[$key]=FoodDrink::where("id",$fooddrink_list['tour'])->first()->toArray();
         $total_price=$total_price+$fooddrink_data[$key]['price'];
       }

       }
       else{
        
       }
      
       if(!empty($transportation)){
        foreach($transportation as $key=> $transportation_list){
         $transportation_data[$key]=Transportation::where("id",$transportation_list['tour'])->first()->toArray();
         $total_price=$total_price+$transportation_data[$key]['price'];

       }

       }
       else{
         
       }
       


      
      
     
     return view("front.pages.mytrip_plan",compact('accomodation','tour','fooddrink','transportation','accomodation_data','tour_data','fooddrink_data','transportation_data','total_price'));
      


            }
            catch(\Exception $e){
                return redirect()->back()->with('message',"<div class='alert alert-danger p-font'><i class='la la-close close' data-dismiss='alert'></i> ".$e->getMessage()."</div>");


            }
        }
        else{
             return redirect()->back()->with('message',"<div class='alert alert-danger'><i class='la la-close close' data-dismiss='alert'></i> No Any Plan</div>");
        }

          }
          else{
              return redirect()->back()->with('message',"<div class='alert alert-danger'><i class='la la-close close' data-dismiss='alert'></i> No Any Plan</div>");
          }
     }

}
