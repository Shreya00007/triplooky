<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable=['activity_name','activity_desc','activity_date','activity_image','activity_status','city_id','city_name','region_id','region_name',"phone_facility",'hotel_pickup','fare_cancel','duration','language','lang_id','departure_time','departure_details','cancel_policy','return_details','higlight','inclusion','exclusion','additional_info','category_name','category_id','know_more','overview','price','mrp','is_new'];
}
