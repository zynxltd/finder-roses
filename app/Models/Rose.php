<?php

namespace App\Models;

use Database\Factories\RoseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rose extends Model
{
    /** @use HasFactory<RoseFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'image_url',
        'locations',
        'sizes',
        'fragrance',
        'colours',
        'light',
        'aspects',
        'soils',
        'flowering',
        'features',
        'price',
        'shop_url',
    ];

    protected $attributes = [
        'fragrance' => 'medium',
        'flowering' => 'repeat_flowering',
        'light' => '[]',
        'aspects' => '[]',
        'soils' => '[]',
        'features' => '[]',
    ];

    protected $casts = [
        'locations' => 'array',
        'sizes' => 'array',
        'colours' => 'array',
        'light' => 'array',
        'aspects' => 'array',
        'soils' => 'array',
        'features' => 'array',
        'price' => 'decimal:2',
    ];
}
