<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransportationComment extends Model
{
    protected $fillable=['transportation_id','status','comments','rating'];
}
