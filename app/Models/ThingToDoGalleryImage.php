<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThingToDoGalleryImage extends Model
{
    protected $fillable=['image','thing_id','status'];
}
