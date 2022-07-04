<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model
{
    protected $fillable=['hotel_id','image','status'];


    public function hotels(){
        return $this->belongsTo("App\Models\Hotel",'hotel_id','id');
    }
}
