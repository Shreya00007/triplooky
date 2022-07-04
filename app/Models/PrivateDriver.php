<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivateDriver extends Model
{
   protected $fillable=['driver_name','image','phone','alternate_phone','email','address','charge','description','region_name','city_name','status'];
}
