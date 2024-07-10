<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class productController extends Controller
{
    public function add_product(){
        return view('admin.product.add_product');
    }
    public function store_catagory(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable',
            'catagory' => 'required',
            'quantity' => '[numeric]required',
            'price' => 'required',
            'discount_price' => 'string'
        ]);
        Product::create([
            'title' => $request->productName,
            'description' => $request->productDescription,
            'image' => $request->productImage,
            'catagory' => $request->productCatagory,
            'quantity' => $request->productQuantity,
            'price' => $request->productRegularPrice,
            'discount_price' => $request->productDiscountPrice
        ]);
        return Redirect::back()->with('msg', 'Product add successfully');
    }
}