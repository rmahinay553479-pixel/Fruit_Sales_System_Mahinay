<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    protected $fillable = [
        'name',
        'category',
        'price_per_kg',
        'stock_quantity',
        'description',
        'availability',
    ];

    protected $casts = [
        'availability' => 'boolean',
        'price_per_kg' => 'decimal:2',
    ];
}
