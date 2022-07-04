<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable=['name','user_name','email','password','status',"dob","image","phone","address","city_name","country_name"];
}
