<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyConverter extends Model
{
   protected $fillable=['currency_to','currency_from','price_to','price_from'];
}
