<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodDrink extends Model
{
     protected $fillable=['name','type','link','map','address','description','status','image','price','rating','phone','star','city'];
}
