<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
   protected $fillable=['heading','image','status','city_id','city_name','region_id','region_name',"phone_facility",'hotel_pickup','fare_cancel','duration','language','lang_id','departure_time','departure_details','cancel_policy','return_details','higlight','inclusion','exclusion','additional_info','category_name','category_id','know_more','overview','price','mrp','is_new','sub_category_id','sub_category_name'];
}
