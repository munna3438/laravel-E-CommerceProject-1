<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function add_product(){
        return view('admin.product.add_product');
    }
}