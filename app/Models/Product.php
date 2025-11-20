<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
        'available_colors',
        'type',
        'category',
    ];

    protected $casts = [
        'available_colors' => 'array',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
