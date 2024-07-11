<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'catagory',
        'quantity',
        'price',
        'discount_price',
        'discount_percentage'
    ];
}
