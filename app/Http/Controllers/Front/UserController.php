<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;

use App\Models\UserPlan\UserPlan;
use App\Models\Accomodation;
use App\Models\TourAndActivity;
use App\Models\FoodDrink;
use App\Models\Transportation;
class UserController extends Controller
{
    public function register(Request $request){
       

      $check=User::where("email",$request->email)->get()->count();
      if($check>0){
        return response()->json(['message'=>"Email Already Exist"]);
      }
      else{
        $check=User::where("user_name",$request->user_name)->get()->count();
        if($check>0){
            return response()->json(['message'=>"username is already exists"]);
        }
        else{
           
           $user=new User;
           $user->name=$request->first_name." ".$request->last_name;
           $user->email=$request->email;
           $user->user_name=$request->user_name;
           $user->city_name=$request->city_name;
           $user->country_name=$request->country_name;
           $user->password=password_hash($request->password, PASSWORD_DEFAULT);

            if($user->save()){
                Session::put("user_login",$request->email);
          Session::put("user_name",$request->first_name." ".$request->last_name);
                return response()->json(['message'=>"success"]);
            }
            else{
                return response()->json(['message'=>"Failed try Again"]);
            }
        }
      }
    }

    public function login(Request $request){

       $check=User::where("email",$request->email)->get()->toArray();
      
       if(!empty($check)>0){

       
         
         
        $verify=password_verify($request->password, $check[0]['password']);

       if($verify){
       
        Session::put("user_image",$check[0]['image']);
       Session::put("user_login",$request->email);
          Session::put("user_name",$check[0]['name']);
          
          $checkplan=UserPlan::where("user_email",$request->email)->get()->toArray();
           
       
          if(count($checkplan)>0){
            session()->put("myplan","save");
          }
         
          return response("success");
       }
       else{
        return response("Password Wrong");
       }

       }
       else{
          return response("Email Not Exist  Kindly Register");
       }

    }

    public function logout(){
        Session::forget("user_login");
        Session::forget("user_name");
        Session::forget("user_image");
        session()->forget('myplan');
        return redirect("/");
    }

    public function dashboard(){
       

        return view("useradmin.index");
    }

      public function profile(){
        $data=User::where("email",Session::get("user_login"))->first();
        return view("useradmin.page.profile.profile",['data'=>$data]);
    }
    public function updateprofile(Request $request){

       if($request->file("user_image")){
         $file=$request->file("user_image");
         $filename=$file->getClientOriginalName();
         Session::put("user_image",$filename);
         if($file->move("user/",$filename)){

             $data=array("name"=>$request->name,
            "user_name"=>$request->username,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "address"=>$request->address,
            "dob"=>$request->dob,
            "image"=>$filename,


    );
        $id=User::select("id")->where("email",Session::get("user_login"))->first();


        $check=User::where("id",$id->id)->update($data);
        if($check){
            return response("success");
        }
        else{
            return response("Failed");
        }

         }
       }
       else{
        $data=array("name"=>$request->name,
            "user_name"=>$request->username,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "address"=>$request->address,
            "dob"=>$request->dob


    );
        $id=User::select("id")->where("email",Session::get("user_login"))->first();


        $check=User::where("id",$id->id)->update($data);
        if($check){
            return response("success");
        }
        else{
            return response("Failed");
        }
       }
    }


    public function update_password(Request $request){

       $check=User::where("email",Session::get("user_login"))->get();
     $verify=password_verify($request->oldpassword, $check[0]->password);
     echo $verify;
       die;
      
       if(1){
         return response("success");

       }
       else{
        return response("Old Password Wrong");
       }
    }


   public function GoogleLogin()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }
 
    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function GoogleLoginRedirect()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $email=$user->email;
        
       



           $data=DB::table("users")->where("email",$email)->get();

            
          

           if(count($data)>0){
            
            
        
            Session::put("user_login",$email);
            return redirect("/user/dashboard-admin");

           }
           else{
            $data=array(
                "name"=>$user->name,
                "email"=>$user->email,
                "user_name"=>$user->email,
                "image"=>$user->avatar,
                "password"=>password_hash($user->id,PASSWORD_DEFAULT),
                "address"=>"",
                "dob"=>"",
                "phone"=>"",
                "status"=>"active",
            );

            
            if(User::create($data)){
                Session::put("user_login",$user->email);
                 return redirect("/user/dashboard-admin");

            }
           }
    }



      public function facebook_login()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }


    public function facebook_login_success(){
        $user = Socialite::driver('facebook')->stateless()->user();
        $email=$user->email;
        
       



           $data=DB::table("users")->where("email",$email)->get();

            
          

           if(count($data)>0){
            
            
        
            Session::put("user_login",$email);
            return redirect("/user/dashboard-admin");

           }
           else{
            $data=array(
                "name"=>$user->name,
                "email"=>$user->email,
                "user_name"=>$user->email,
                "image"=>$user->avatar,
                "password"=>password_hash($user->id,PASSWORD_DEFAULT),
                "address"=>"",
                "dob"=>"",
                "phone"=>"",
                "status"=>"active",
            );

            
            if(User::create($data)){
                Session::put("user_login",$user->email);
                 return redirect("/user/dashboard-admin");

            }
           }
       

    }


      public function twitter_login()
    {
        return Socialite::driver('twitter')->redirect();
    }


    public function twitter_redirect(){
        $user = Socialite::driver('twitter')->user();
        dd($user);

    }


    public function forgetPasswordData(Request $request){
      $check=User::where("email",$request->email)->orWhere("user_name",$request->email)->get()->count();

      if($check==0){
        return response("Email or Username is not Correct");
      }
      else{
              $password =password_hash($request->password, PASSWORD_DEFAULT);
             $update=User::where("email",$request->email)->orWhere("user_name",$request->email)->update(['password'=>$password]);
             if($update){
              return response("success");
             }
             else{
              return response("Your Password Updation Failed try Again");
             }
             
      }
    }

     public function planShow(){

      if(!session()->has('myplan')){
        return redirect("/");
      }

       $data=UserPlan::where("user_email",session()->get('user_login'))->get()->toArray();
       
      
      if(!empty($data)){
        
         $accomodation=json_decode($data[0]['accomodation'],true);
       $tour=json_decode($data[0]['tour'], true);
       $fooddrink=json_decode($data[0]['fooddrink'],true);
       $transportation=json_decode($data[0]['transportation'],true);
       $accomodation_data=[];
       $tour_data=[];
       $fooddrink_data=[];
       $transportation_data=[];
         $total_price=0;
       // getting data
       foreach($accomodation as $key=> $accomodation_list){
        $accomodation_data[$key]=Accomodation::where("id",$accomodation_list['accomodation'])->first()->toArray();
         $total_price=$total_price+(int)$accomodation_data[$key]['price'];

       }
       if(!empty($tour)){
        foreach($tour as $key=> $tour_list){
        $tour_data[$key]=TourAndActivity::where("id",$tour_list['tour'])->first()->toArray();
        $total_price=$total_price+(int)$tour_data[$key]['price'];

       }
       }

       if(!empty($fooddrink)){
        foreach($fooddrink as $key=> $fooddrink_list){
         $fooddrink_data[$key]=FoodDrink::where("id",$fooddrink_list['tour'])->first()->toArray();
         $total_price=$total_price+(int)$fooddrink_data[$key]['price'];

       }
       }
      
       if(!empty($transportation)){
        foreach($transportation as $key=> $transportation_list){
         $transportation_data[$key]=Transportation::where("id",$transportation_list['tour'])->first()->toArray();
         $total_price=$total_price+(int)$transportation_data[$key]['price'];

       }
       }
      

     return view("front.pages.user_plan",compact('accomodation','tour','fooddrink','transportation','accomodation_data','tour_data','fooddrink_data','transportation_data','total_price'));
      

      }

    }

}


