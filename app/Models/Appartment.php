<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appartment extends Model
{
    protected $fillable=['appartment_name',
    'thumb_image',
    'no_room',
    'no_of_bed',
    'furnished_facility',
    'region_name',
    'region_id',
    'city_name',
    'city_id',
    'room_size',
    'price',
    'bathroom',
    'balcony',
    'parking',
    'age_of_property',
    'build_area',
    'carpet_area',
    'owner_name',
    'owner_contact_no',
    'owner_email',
    'security_charge',
    'broker_charge',
    'address',
    'description',
    'is_available',
    'status'
];
}
