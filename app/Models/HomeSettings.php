<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;

class HomeSettings extends Model
{
    protected $fillable = [
        'hero_product_id',
        'featured_product_ids',
    ];

    protected $casts = [
        'featured_product_ids' => 'array',
    ];
}
