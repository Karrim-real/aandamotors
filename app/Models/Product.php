<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'short_desc',
        'selling_price',
        'discount_price',
        'status',
        'qty',
        'desc',
        'slug',
        'image',
        'brand_id',
    ];

}
