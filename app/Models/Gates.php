<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gates extends Model
{
    protected $fillable=['type','room_type','budget','status','rating','location','facility'];
}
