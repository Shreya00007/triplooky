<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MustDoAndSee extends Model
{
   protected $fillable=['name','type','city','image','description','status','city_name'];
}
