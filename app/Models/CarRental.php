<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarRental extends Model
{
    protected $fillable=['car_no','brand','type','region_name','region_id','city_name','city_id','car_model','charge','owner_name','owner_email','owner_contact_no','no_of_people','status','description','image'];
}
