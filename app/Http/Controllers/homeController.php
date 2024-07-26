<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('frontend.home', compact('products'));
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function testimonial()
    {
        return view('frontend.testimonial');
    }
    public function products()
    {
        return view('frontend.products');
    }
    public function product_details($id)
    {
        $product = Product::find($id);
        return view('frontend.product_details', compact('product'));
    }
    public function cart(Request $request, $id)
    {
        if(auth()->user()){
            $product = Product::find($id);
            if($product->discount_price!==null){
                $product->price=$product->discount_price;
            }

            return view('frontend.cart', compact('product'));
        }else{
            return redirect()->route('login');
        }
    }
    public function checkout()
    {
        return view('frontend.checkout');
    }
    public function blog()
    {
        return view('frontend.blog');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
}