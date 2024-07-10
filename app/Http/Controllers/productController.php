<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class productController extends Controller
{
    public function add_product()
    {
        return view('admin.product.add_product');
    }
    public function store_product(Request $request)
    {
        $request->validate([
            'productName' => 'required',
            'productDescription' => 'required',
            'productImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'productCatagory' => 'required',
            'productQuantity' => 'numeric|required',
            'productRegularPrice' => 'required',
            'productDiscountPrice' => 'string'
        ]);
        $imageName = time() . uniqid() . '.' . $request->productImage->extension();
        $request->productImage->move(public_path('upload/product-image'), $imageName);

        Product::create([
            'title' => $request->productName,
            'description' => $request->productDescription,
            'image' => $imageName,
            'catagory' => $request->productCatagory,
            'quantity' => $request->productQuantity,
            'price' => $request->productRegularPrice,
            'discount_price' => $request->productDiscountPrice
        ]);
        return Redirect::back()->with('msg', 'Product add successfully');
    }
    public function list_product()
    {
        $products = Product::all();

        return view('admin.product.list_product', compact('products'));
    }
}
