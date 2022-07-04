<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TravelLookingPartner;
use Illuminate\Support\Facades\File;

class TravelLookingPartnerController extends Controller
{
    private $partner_name;
    private $partner_image;
    private $partner_desc;
    private $message;
    private $file;
    private $filename;
    private $check;
    private $data;

    public function index(){
        return view("admin.page.travel-looking-partner.travel_looking_partner");

    }

    public function create(Request $request){
   $this->check=TravelLookingPartner::where("travel_partner_company_name",$request->partner_name)->get()->count();
   if($this->check>0){
   $this->message="This Partner Already exist";
    return response()->json(['message'=>$this->message]);
   }
   else{
      $this->file=$request->file("partner-company-logo");
      $this->filename=$this->file->getClientOriginalName();
      $this->data=array(
       "travel_partner_company_name"=>$request->partner_name,
       "travel_partner_company_logo"=>$this->filename,
       "travel_partner_company_description"=>$request->desc,
       "status"=>"active",

      );

     
       if(!File::exists("travel-looking-partner/".$this->filename)){
          if($this->file->move("travel-looking-partner/",$this->filename)){
           $this->check=TravelLookingPartner::create($this->data);
           if($this->check){
             $this->message="success";
    return response()->json(['message'=>$this->message]);
           }
           else{
             $this->message="Something is wrong";
    return response()->json(['message'=>$this->message]);
           }

          }
          else{
             $this->message="Something is wrong";
    return response()->json(['message'=>$this->message]);

          }
       }
       else{
        $this->message="Something is wrong";
    return response()->json(['message'=>$this->message]);
       }

   }

    }


    public function view(){
        $this->data=TravelLookingPartner::paginate(10);
        return view("admin.page.travel-looking-partner.list",['data'=>$this->data]);
    }

    public function edit_status(Request $request){
       
       $this->check=TravelLookingPartner::where("id",$request->id)->update(['status'=>$request->status]);
       if($this->check){
         return response()->json(['message'=>"success"]);
       }
       else{
         return response()->json(['message'=>"Failed"]);
       }
    }

    public function delete(Request $request){


        $this->data=TravelLookingPartner::find($request->id);
        if(File::delete("travel-looking-partner/".$this->data-> travel_partner_company_logo)){
            if(TravelLookingPartner::where("id",$request->id)->delete()){
                return response()->json(['message'=>"success"]);
            }
            else{
                return response()->json(['message'=>"Something is wrong"]);
            }
        }
        else{
            return response()->json(['message'=>"Something is wrong"]);
        }

    }

    public function edit(Request $request,$id){
        $this->data=TravelLookingPartner::find($id);
        return view("admin.page.travel-looking-partner.edit",['data'=>$this->data]);

    }

    public function update(Request $request){
        if($request->file("partner-company-logo")){
            $this->file=$request->file("partner-company-logo");
            $this->filename=$this->file->getClientOriginalName();
            $this->data=array("travel_partner_company_name"=>$request->partner_name,
                "travel_partner_company_logo"=>$this->filename,
                "travel_partner_company_description"=>$request->desc,
        );
             if($this->file->move("travel-looking-partner",$this->filename)){
                if(TravelLookingPartner::where("id",$request->id)->update($this->data)){
                return response()->json(['message'=>"success"]);
            }
            else{
                return response()->json(['message'=>"Failed"]);
            }
             }
           

        }
        else{
            $this->data=array(
                   "travel_partner_company_name"=>$request->partner_name,
                   "travel_partner_company_description"=>$request->desc,
                    );

            if(TravelLookingPartner::where("id",$request->id)->update($this->data)){
                return response()->json(['message'=>"success"]);
            }
            else{
                return response()->json(['message'=>"Failed"]);
            }



        }
    }

    public function details(Request $request,$id){
       
        $this->data=TravelLookingPartner::find($id);
        return view("admin.page.travel-looking-partner.details",['data'=>$this->data]);
    }
}
