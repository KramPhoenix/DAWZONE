<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'name', 'start', 'end', 'value_discount', 'percentage_discount', 'active'
    ];
}
