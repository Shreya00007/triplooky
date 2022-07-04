<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rides extends Model
{
    protected $fillable=[
        'region_name',
        'region_id',
        'city_name',
        'city_id',
        'rider_name',
        'rider_email',
        'rider_phone',
        'vehicle_name',
        'vehicle_brand',
        'vehicle_type',
        'vehicle_no',
        'start_location',
        'end_location',
        'start_time',
        'end_time',
        'owner_name',
        'owner_email',
        'owner_contact_no',
        'status',
        'rider_image',
        'charge'




    ];
}
