<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accomodation extends Model
{
    protected $fillable=['name','type','star','link','map','address','description','status','image','price','rating','phone','city'];
}
