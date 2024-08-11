<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId',
        'userName',
        'email',
        'phone',
        'address',
        'productName',
        'productImage',
        'productQuantity',
        'productPrice',
        'productId',
    ];
}
