<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
   protected $fillable=['admin_email','admin_password','admin_name','admin_image','company_logo','admin_mobile','admin_address','status'];
}
