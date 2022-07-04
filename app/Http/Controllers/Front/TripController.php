<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Front\Trip;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Activity;
use App\Models\Hotel;
use App\Models\Appartment;
use App\Models\HotelImage;
use App\Models\AppartmentImage;
use App\Models\Rides;
use App\Models\Category;
use App\Models\Language;
use App\Models\ActivityGallery;
use App\Models\Tour;
use App\Models\PublicTransportation;
use App\Models\CarRental;
use App\Models\Transfer;
use App\Models\PrivateDriver;
use App\Models\SubCategory;
use App\Models\TourAndActivity;
use App\Models\FoodDrink;
use App\Models\Transportation;
use App\Models\Accomodation;
use App\Models\City;
use App\Models\CityImage;
use App\Models\AccomodatiomImage;
use App\Models\TourAndActivityImage;
use App\Models\FoodAndDrinkImage;
use App\Models\TransportationImage;
use App\Models\CMS\CMSTourAndActivity;
use App\Models\CMS\CMSFoodAndDrink;
use App\Models\CMS\CMSTransportation;
use App\Models\UserPlan\UserPlan;
use App\Models\TransportationComment;


class TripController extends Controller
{
    public function trip(){
      
        return view("front.pages.trip.trip_plan");
    }

    public function tour_date(Request $request){
        $user=User::where("email",Session::get("user_login"))->first();
        $user_id=$user->id;
         $check=Trip::where("user_id",$user_id)->get();
         if(count($check)>0){
            echo "You Have Already plan Tour";

         }
         else{
             $trip=new Trip();
        $trip->user_id=$user_id;

       
        $trip->adult=(int)$request->data['adult'];
          $trip->teen=(int)$request->data['teen'];
            $trip->kid=(int)$request->data['kid'];
              $trip->start_time=date("Y-m-d",strtotime($request->data['arrival_date']));
                $trip->departure_time=date("Y-m-d",strtotime($request->data['departure_date']));
                if($trip->save()){
                    return response("success");
                }
                else{
                    return response("Failed");
                }
         }

    }

    public function tour_data(Request $request){
         $user=User::where("email",Session::get("user_login"))->first();
        $user_id=$user->id;
         $city=implode(",",$request->data['city']);
         $tour=implode(",",$request->data['tour']);
         $activity=implode(",",$request->data['activity']);
         $accomodation=implode(",",$request->data['accomodation']);
          $transportation=implode(",",$request->data['transportation']);
           $trip=new Trip();
         $trip->user_id=$user_id;
          $trip->adult=(int)$request->data['adult'];
          $trip->teen=(int)$request->data['teen'];
          $trip->kid=(int)$request->data['kid'];
          $trip->city=$city;
          $trip->activity=$activity;
          $trip->accomodation=$accomodation;
          $trip->tour_excursion=$tour;
          $trip->transport=$transportation;
          $trip->start_time=date("Y-m-d",strtotime($request->data['arrival_date']));
          $trip->departure_time=date("Y-m-d",strtotime($request->data['departure_date']));
                if($trip->save()){
                    return response("success");
                }
                else{
                    return response("Failed");
                }
    }


    public function get_city(Request $request){
       $city_data=$request->data['city'];// trip start page url
        
         Session::put("city",$city_data);
      
  $date1=strtotime($request->data['arrival_date']);
  $date2=strtotime($request->data['departure_date']);
  $day=$date2-$date1;
 $day= round($day/86400);
 
 
      
          $all_city=[];
        
        for($i=0;$i<count($city_data);$i++){
            $data[$i]=DB::table("cities")->select('id','city_name')->where("id",$city_data[$i])->first();
           $all_city[$i]=$data[$i];
        }
       

      
           
       
        $start_date=date("F j, Y",strtotime($request->data['arrival_date']));
        $end_date=date("F j, Y",strtotime($request->data['departure_date']));
        return response()->json(['data'=>$all_city,'start_date'=>$start_date,'end_date'=>$end_date,'day'=>$day]);
    }

    public function activity_filter_by_price(Request $request){
         $data=Activity::whereBetween("price",[0,$request->price])->get();
         return response()->json(['data'=>$data]);
    }

    public function tour_details(Request $request){
        
         $city_data=$request->data['city'];
      
       
        
 
        
        for($i=0;$i<count($city_data);$i++){
            $data[$i]=DB::table("morocco_cities")->where("id",$city_data[$i])->get();
        }
       
      
       
        $date1=date("Y-m-d",strtotime($request->data['arrival_date']));
        $date2=date("Y-m-d",strtotime($request->data['departure_date']));
        
        $days=round(abs(strtotime($date2) - strtotime($date1))/86400);
        $start_date=date("F j, Y",strtotime($request->data['arrival_date']));
        $end_date=date("F j, Y",strtotime($request->data['departure_date']));


         // tour
         for($i=0;$i<count($city_data);$i++){
            $data[$i]=DB::table("morocco_cities")->where("id",$city_data[$i])->get();
        }

         return response()->json(['data'=>$data,'days'=>$days,'start_date'=>$start_date,'end_date'=>$end_date]);
    }

    public function getHotels(Request $request){
      foreach($request->city as $key=>$city){
          $data[$key]=Hotel::where("city_id",$city)->where("status",1)->first();
      }
      return response()->json(['data'=>$data]);
    }

    public function getAppartment(Request $request){
        foreach($request->city as $key=>$city){
          $data[$key]=Appartment::where("city_id",$city)->where("status",1)->first();
      }
      return response()->json(['data'=>$data]);
    }

    public function getMoreHotelImage(Request $request,$id){
       $data=HotelImage::where("hotel_id",$id)->get();
       return response()->json(['data'=>$data]);
    }

    public function getAppartmentImage(Request $request,$id){
        $data=AppartmentImage::where("appartment_id",$id)->get();
        return response()->json(['data'=>$data]);
    }

    public function getRide(Request $request){
       foreach($request->city as $key=>$city){
          $data[$key]=Rides::where("city_id",$city)->first();
       }
       return response()->json(['data'=>$data]);
    }

    public function getPreferableActivity(){
      $activity=CMSTourAndActivity::where("status",1)->get()->toArray();
        $minprice=TourAndActivity::min("price");
        $maxprice=TourAndActivity::max("price");

       
  


      return view("front.pages.preferable_activities")->with(["data"=>$activity,"minprice"=>$minprice,"maxprice"=>$maxprice]);
    
     
    }

    public function getFoodDrink(){
     
      $maxprice=FoodDrink::where("status",1)->max("price");
      $minprice=FoodDrink::where("status",1)->min("price");
      $data=CMSFoodAndDrink::where("status",1)->get()->toArray();

    

    return view("front.pages.tour_excursions")->with(['data'=>$data,'minprice'=>$minprice,"maxprice"=>$maxprice]);

    }

    public function transport(){
        $minprice=Transportation::where("status",1)->min("price");
        $maxprice=Transportation::where("status",1)->max("price");
        $data=CMSTransportation::where("status",1)->get()->toArray();
      
        return view("front.pages.transport")->with(['data'=>$data,'minprice'=>$minprice,"maxprice"=>$maxprice]);
    }

    public function tripSummary(Request $request){



      //check
     if(!session()->has('travel')){
        return redirect("/");
      }

      if(!session()->has('city')){
        return redirect("/pick-city");
      }
      if(!session()->has('accomodation')){
        return redirect("/accomodation");
      }
      if(!session()->has('activity')){
        return redirect("/preferable-activity");
      }
      if(!session()->has('fooddrink')){
        return redirect("/tour-excursions");
      }
      if(!session()->has('transportation')){
        return redirect("/transport");
      }
      //end check
      $accomodation=[];
      $transportation=[];
      $activity=[];
      $fooddrink=[];
      $city=[];
      $accomodation_min_price=Session::get("accomodation_min_price");
      $accomodation_max_price=Session::get("accomodation_max_price");
      $activity_min_price=Session::get("activity_min_price");
      $activity_max_price=Session::get("activity_max_price");
      $fooddrink_min_price=Session::get("fooddrink_min_price");
      $fooddrink_max_price=Session::get("fooddrink_max_price");
      $transportation_min_price=Session::get("transportation_min_price");
      $transportation_max_price=Session::get("transportation_max_price");

      
        try{
          if(session()->has('accomodation')){
            foreach(session()->get('city') as $list=> $city_list){
                foreach(session('accomodation') as $key=> $accomodation_list){
              $data=Accomodation::select("id","image","name","price","link","city")->where("type",$accomodation_list)->where("city",$city_list)->whereBetween("price",[$accomodation_min_price,$accomodation_max_price])->get()->toArray();
              array_push($accomodation,$data);
              
         
      }
 
            }
  
            
          }
          
         

      //     if(session()->has('transportation')){
      //      foreach(session()->get("city") as $city_list){
      //        foreach (session('transportation') as $key => $transportation_list) {
      //  $data=Transportation::select("city")->where("type",$transportation_list)->get()->toArray();
      //  for($i=0;$i<count($data);$i++){
      //     $city_data=json_decode($data[$i]['city'],true);
      //     for($l=0;$i<count($city_data);$l++){
      //       if($city_data[$l]==$city_list){
      //           echo $city_list;
      //       }
      //     }
       
        
      //  }
      
      //  array_push($transportation,$data);
      
      // }
      //      }
      //     }
      //     else{
           
      //     }

          if(session()->has('activity')){
             foreach(session()->get("city") as $list=> $city_list){
                foreach (session('activity') as $key => $activity_list) {
                 $data=TourAndActivity::select("id","image","name","price","link","city")->where("type",$activity_list)->where("city",$city_list)->whereBetween("price",[$activity_min_price,$activity_max_price])->get()->toArray();
                 array_push($activity,$data);
                 
             }
             }

          }
         


          if(session()->has('fooddrink')){

             foreach(session()->get('city') as $list=> $city_list){
                foreach (session('fooddrink') as $key => $fooddrink_list) {
        $data=FoodDrink::select("id","image","name","price","link","city")->where("city",$city_list)->where("type",$fooddrink_list)->whereBetween("price",[$fooddrink_min_price,$fooddrink_max_price])->get()->toArray();

        array_push($fooddrink,$data);
        
      }
             }

          }
          




// transportation data fetch and push in array
  if(session()->has("transportation")){
    foreach(session()->get("city") as $city_list){
        foreach(session()->get("transportation") as $transportation_list){
            $data=Transportation::where("type",$transportation)->where("city",$city_list)->whereBetween("price",[$transportation_min_price,$transportation_max_price])->get()->toArray();
                if(!empty($data)){
                    array_push($transportation,$data);
                }
        }
    }
  }




//end transportation data fetch and push in array


    $data=($transportation[0]);
    
   $transportation=$data;






   
   

      /* FINDING NUMBER OF  DAY ON BASE OF SELECTD TRAVEL DATE  */
           $data=(array)json_decode((session()->get("travel")));
          $date1=$data['arrival_date'];
          $date2=$data['departure_date'];
           $date1= date($date1);
            $date = str_replace('/', '-', $date1);
             $date1= date('Y-m-d', strtotime($date));
  

         $aa = str_replace('/', '-', $date2);
    $date2= date('Y-m-d', strtotime($aa));
  
     $dateDifference = abs(strtotime($date2) - strtotime($date1));

     $years  = floor($dateDifference / (365 * 60 * 60 * 24));
     $months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
     $days   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));
         for($i=0;$i<$days;$i++){
            foreach (session('city') as $key => $city_list) {
        $city[$key]=City::select("id","city_name","image")->where("id",$city_list)->get()->toArray();

       }
         }

         //store how many day travel in session that to show on tripsummary pages
         session()->put("total_travel_day",$days);
         //
         $city=session()->get('all_city_details');
         $city_list=session()->get("city");
         $city_details=[];
         for($i=0;$i<count($city_list);$i++){
          $data=($city[$i]['day']);

          $id=($city[$i]['data']);
         
          for($j=1;$j<=$data;$j++){
            $city_details_find=City::select("city_name","image","id")->where("id",$city_list[$i])->get()->toArray();
            array_push($city_details,$city_details_find);
          }
          
         }

           //store total no of trip day in session
            $total_travel_date=[];
            for($i=0;$i<=$days;$i++){
              $total_travel_date[$i]= date('d-m-Y', strtotime($date1 . " + $i day"));
            }
              

             

     
       return view("front.pages.trip_summary",["accomodation"=>$accomodation,"activity"=>$activity,"fooddrink"=>$fooddrink,"transportation"=>$transportation,"city"=>$city_details,'total_travel_date'=>$total_travel_date]);


        }
        catch(\Exception $e){
        
           
        }
    

    
       
   

     
        
     


    
       
      





       
    }
    
    // trip summary details show
    public function tripSummaryDetails(Request $request){
         if($request->ajax()){
          $accomodation=$request->data['accomodation'];
          $transportation=$request->data['transportation'];
          $city_data=array();
          $city=$request->data['city'];
          $activity=$request->data['activity'];
          $tour_list=$request->data['tour'];
          $foodanddrink=$request->data['tour'];
          $accomodation_data=array();
          $activity_data=array();
          $FoodDrink_data=array();
          $transportation_data=array();
          $city_size= count(($city));
          $first_city_details=City::where("id",$city[0])->first();

         //toru&activity,accomodation,foodrink,transportation listing fetch and return that list to trip summary page
          for($i=0;$i<count($accomodation);$i++){
            $accomodation_data[$i]=Accomodation::where("type",base64_decode($accomodation[$i]))->where("status",1)->get()->toArray();
            }
            for($i=0;$i<count($activity);$i++){
              $activity_data[$i]=TourAndActivity::where("type",base64_decode($activity[$i]))->where("status",1)->get()->toArray();
              }

              for($i=0;$i<count($transportation);$i++){
                $transportation_data[$i]=Transportation::where("type",base64_decode($transportation[$i]))->where("status",1)->get()->toArray();
                }


                
              for($i=0;$i<count($foodanddrink);$i++){
                $FoodDrink_data[$i]=FoodDrink::where("type",$foodanddrink[$i])->where("status",1)->get()->toArray();
                }
                for($i=0;$i<count($city);$i++){
                  $city_data[$i]=City::where("id",$city[$i])->where("status",1)->get()->toArray();
                  }
                
                return response()->json(["accomodation"=>$accomodation_data,"activity"=>$activity_data,"fooddrink"=>$FoodDrink_data,"transportation"=>$transportation_data,'city'=>$city_data],200);
             
       
         }

       
     
    
       


    }



    /*public function preferableActivityFilterByCategory(Request $request,$id){
        echo $id;
    }

    public function preferableActivityDetailShow(Request $request){
        $activity_name=$request->activity;
        $data=Activity::where("activity_name",base64_decode($activity_name))->first();
        $image=ActivityGallery::where("activity_id",$data->id)->get();
        return view("front.pages.trip.preferableActivityDetails")->with(['data'=>$data,"image"=>$image]);
    }

    */


public function hotel_list_by_city(Request $request){
   
$hotels=array();
$city=Session::get("city");//city list store already store in session here get
    
    foreach($city as $city){
        $data=Hotel::where("city_id",$city)->where("hotels_name","!=",$request->hotels)->get()->toArray();
        if(!empty($data))
        array_push($hotels,$data);
    }

    //first hotel click
    $data=Hotel::where("hotels_name",$request->hotels)->get()->toArray();
     if(!empty($data)){
          array_unshift($hotels, $data);
     }
  
   

    
    return view("front.pages.trip.hotel_list_by_city")->with("data",$hotels);

}


  public function HotelFilterByPrice(Request $request){
    $message=$request->method;
    $hotels=array();
    $city=Session::get("city");
      if($message=="price-low-to-high"){
          foreach($city as $city){
        $data=Hotel::where("city_id",$city)->orderBy("price","ASC")->get()->toArray();
        if(!empty($data))
        array_push($hotels,$data);
    }
        return view("front.pages.trip.hotel_list_by_city")->with("data",$hotels);

      }

       if($message=="price-high-to-low"){
          foreach($city as $city){
        $data=Hotel::where("city_id",$city)->orderBy("price","ASC")->get()->toArray();
        if(!empty($data))
        array_push($hotels,$data);
    }
        return view("front.pages.trip.hotel_list_by_city")->with("data",$hotels);

      }

       if($message=="latest"){
          foreach($city as $city){
        $data=Hotel::where("city_id",$city)->orderBy("id","DESC")->get()->toArray();
        if(!empty($data))
        array_push($hotels,$data);
    }
        return view("front.pages.trip.hotel_list_by_city")->with("data",$hotels);

      }




  }
   // all activity list show by city choose
  public function Activity_list_by_city(Request $request){
  $activity=array();
    $city=Session::get("city");
    
    foreach($city as $city){
        $data=Activity::where("city_id",$city)->where("activity_name","!=",$request->activity)->get()->toArray();
        if(!empty($data)){
            array_push($activity,$data);
        }
    }

    $data=Activity::where("activity_name",$request->activity)->get()->toArray();
    if(!empty($data)){
        array_unshift($activity,$data);//click activity lish show fisrt
       
    } 
   



   
    $category=Category::all();

    return view("front.pages.trip.activity_list_by_city",['data'=>$activity,'category'=>$category]);
  }

  //activity filter by category

  public function ActivityFilterByCategoryOrByPrice(Request $request){
    $city=Session::get("city");//array of city list have store in session 
     $activity=array();
     if($request->method=="category"){
         foreach($city as $city){
     $data=Activity::where("city_id",$city)->where("category_id",$request->category)->get()->toArray();
     if(!empty($data)){
        array_push($activity,$data);
     }
     }

     //subcategory list
     $subcategory=array();
     $subcategory=SubCategory::where("category",$request->category)->select("sub_category_name")->get();

     return response()->json(['data'=>$activity,'message'=>"success","subcategory"=>$subcategory],200);
     }

     if($request->method=="date"){
         foreach($city as $city){
     $data=Activity::where("city_id",$city)->where("category_id",$request->category)->where("activity_date",$request->date)->get()->toArray();
     if(!empty($data)){
        array_push($activity,$data);
     }
     }

  
     

     return response()->json(['data'=>$activity,'message'=>"success",],200);
     }
    
  }

  public function ResetActivityFilterByCategory(Request $request){

        $activity=array();
    $city=Session::get("city");
    foreach($city as $city){
        $data=Activity::where("city_id",$city)->get()->toArray();
        if(!empty($data)){
            array_push($activity,$data);
        }
    }

    $data=Activity::where("activity_name",$request->activity)->get()->toArray();
    if(!empty($data)){
        array_unshift($activity,$data);//click activity lish show fisrt
       
    }

    return response()->json(['data'=>$activity],200);
  }


  public function ActivityFilterByDate(Request $request){
    $date= date("Y-m-d",strtotime($request->date));
    $data=Activity::where("activity_date",$date)->get()->toArray();
  return response()->json(['data'=>$data,"message"=>"success"],200);
    

  }

// show all tour list order by city selected
  public function AllTourListShow(Request $request,$tour_name){

    $tour=array();
    $city=Session::get("city");
    
   if(!empty($city)){
     foreach($city as $city_list){
        $data=Tour::where("city_id",$city_list)->where("heading","!=",$tour_name)->get()->toArray();
        if(!empty($data)){
            array_push($tour,$data);
        }
    }

    $data=Tour::where("heading",$tour_name)->get()->toArray();
    if(!empty($data)){
      array_unshift($tour,$data);//tour list unshift order
       
    } 
     return  view("front.pages.trip.tour_list",compact('tour'));
   }
   else{
    return redirect("/pick-city");
   }

  
   
   
  }


  //trip summary page listing show all select by user show specific data on click that details button ajax call

   public function getSpecificActivityDetailsShow(Request $request){
    $data=TourAndActivity::where("id",$request->activity)->first();
    $city=City::select("city_name")->where("id",$data->city)->first();
    return response()->json(['data'=>$data,'city'=>$city],200);
   }


   public function getSpecificAccomodationDetailsShow(Request $request){
    $data=Accomodation::where("id",$request->accomodation)->where("status",1)->first();
    return response()->json(['data'=>$data],200);
   }


   public function getSpecificFooddrinkDetailsShow(Request $request){
    $data=FoodDrink::where("id",$request->fooddrink)->first();
    return response()->json(['data'=>$data],200);
   }


public function getSpecificTransportationDetailsShow(Request $request){
    if($request->type=="Public Transportation"){
       $data=Transportation::where("id",$request->transportation)->where("type","Public Transportation")->first();
       $comment=TransportationComment::where("transportation_id",$data['id'])->get()->toArray();
       return response()->json(['data'=>$data,"comment"=>$comment],200);
    }
    else{
        $data=Transportation::where("id",$request->transportation)->first();
        return response()->json(['data'=>$data],200);
    }

    
}



  //end trip summary page listing show all select by user show specific data on click that details button ajax call

  
  //city details fetch on single data by click on details button
public function getCitySpecificDetails(Request $request){
    $data=City::where("id",$request->city)->first();
    $image=CityImage::where("city_id",$data->id)->latest()->get();
    return response()->json(['data'=>$data,'image'=>$image],200);
}

//get specific details 
 public function getActivitySpecificDetails(Request $request){
    $data=TourAndActivity::where("id",$request->activity)->first();
    $image=TourAndActivityImage::where("tour_and_activity_id",$data->id)->latest()->get();
    return response()->json(['data'=>$data,'image'=>$image]);
 }
//end get specific details


//accomodation
 public function getAccomodationSpecificDetails(Request $request){
    $data=Accomodation::where("id",$request->accomodation)->first();
    $image=AccomodatiomImage::where("accomodation_id",$data->id)->latest()->get();
    return response()->json(['data'=>$data,'image'=>$image]);
 }
 //end accomodation

 //food and drink
   public function getFoodAndDrinkSpecificDetails(Request $request){
    $data=FoodDrink::where("id",$request->fooddrink)->first();
    $image=FoodAndDrinkImage::where("food_And_drink_id",$data->id)->latest()->get();
    return response()->json(['data'=>$data,'image'=>$image]);
   }
 //end food and drink

   //transportation 
   public function getTransportationSpecificDetails(Request $request){
    $data=Transportation::where("id",$request->transportation)->first();
    $image=TransportationImage::where("transportation_id",$data->id)->latest()->get();
    $comment=TransportationComment::where("transportation_id",$request->transportation)->get();
    return response()->json(['data'=>$data,'image'=>$image,'comment'=>$comment]);
   }
   //end transportation



   //save user plan
   public function saveMyPlan(Request $request){
    $check=UserPlan::where("user_email",session()->get('user_login'))->get()->count();
    if($check>0){
   return response()->json(['message'=>"Your Plan Have  Already Exist"]);
    }
    else{
        try{
      $accomodation=json_encode($request->accomodation);
    $tour=json_encode($request->tour);
    $fooddrink=json_encode($request->fooddrink);
    $transportation=json_encode($request->transportation);
    $city=json_encode($request->city);
    $currency=$request->currency;
    $start_date=$request->start_date;
    $end_date=$request->end_date;
    $user=User::where("email",session()->get('user_login'))->first()->toArray();
   $user_id=$user['id'];
   $user_email=$user['email'];
   $plan=new UserPlan();
   $plan->accomodation=$accomodation;
   $plan->tour=$tour;
   $plan->fooddrink=$fooddrink;
   $plan->transportation=$transportation;
   $plan->city=$city;
   $plan->start_date=$start_date;
   $plan->end_date=$end_date;
   $plan->date=date("Y-m-d H:i:s");
   $plan->status=1;
   $plan->currency=$currency;
   $plan->user_id=$user_id;
   $plan->user_email=$user_email;
   if($plan->save()){
    session()->put("myplan","save");
    return response()->json(['message'=>"success"]);
   }
   else{
    return response()->json(['message'=>"failed"]);
   }



    }
    catch(\Exception $e){
     return response()->json(['message'=>$e->getMessage()]);
    }

    }

   }
   //end save user plan
    
}
