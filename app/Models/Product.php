<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'image', 'description', 'last_price', 'price', 'brand_id', 'category_id', 'offer_id', 'owner_id'
    ];
}
