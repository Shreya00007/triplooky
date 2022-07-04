<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable=['hotels_name','no_room','no_of_bed','thumb_image','tv','region_id','region_name','city_id','city_name','room_size','price','location','description','hotel_link'];


    public function hotel_image(){
        return $this->hasMany('App\Models\HotelImage','hotel_id','id');
    }
}
