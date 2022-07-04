<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable=['category','sub_category_name','status'];

    public function categories(){
        return $this->belongsTo("App\Models\Category",'category','id');
    }
}
