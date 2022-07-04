<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Model;

class CustomerQuery extends Model
{
   protected $fillable=['name','email','subject','query'];
}
