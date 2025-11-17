<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Product extends Model
{
    protected $casts = [
        'available_colors' => 'array',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
