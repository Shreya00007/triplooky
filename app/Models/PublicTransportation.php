<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicTransportation extends Model
{
    protected $fillable=['charge_of_person','image','charge','details','status'];
}
