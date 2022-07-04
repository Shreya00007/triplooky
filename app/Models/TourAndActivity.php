<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourAndActivity extends Model
{
   protected $fillable=['name','type','duration','link','map','rating','address','description','status','image','language','price','rating','phone','star','city'];
}
