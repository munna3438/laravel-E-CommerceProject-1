<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
    public function cart()
    {
        $carts = Cart::where('userId', auth()->user()->id)->get();

        return view('frontend.cart', compact('carts'));
    }
    public function cart_store($id)
    {
        if (auth()->user()) {
            $product = Product::find($id);
            if ($product->discount_price !== null) {
                $product->price = $product->discount_price;
            }
            if (Cart::where('productId', $product->id)->where('userId', auth()->user()->id)->exists()) {
                $cart = Cart::where('productId', $product->id)->where('userId', auth()->user()->id)->first();
                $cart->productQuantity = $cart->productQuantity + 1;
                $cart->save();
                return redirect()->route('cart');
            } else {
                Cart::create([
                    'userId' => auth()->user()->id,
                    'email' => auth()->user()->email,
                    'phone' => auth()->user()->phone,
                    'address' => auth()->user()->address,
                    'productName' => $product->title,
                    'productImage' => $product->image,
                    'productQuantity' => 1,
                    'productPrice' => $product->price,
                    'productId' => $product->id,

                ]);
                return redirect()->route('cart');
            }
        } else {
            return redirect()->route('login');
        }
    }
    public function cart_update(Request $request, $pId, $uId)
    {
        Cart::where('userId', $uId)->where('productId', $pId)->update([
            'productQuantity' => $request->quantity
        ]);
        return back();
    }
    public function delete_cart($uId,$pId){
        Cart::where('userId',$uId)->where('productId',$pId)->delete();
        return back();

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