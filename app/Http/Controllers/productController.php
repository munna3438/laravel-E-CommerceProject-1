<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
            'productDiscountPrice' => 'nullable'
        ]);
        $imageName = date('dmy') .'-'. uniqid() . '.' . $request->productImage->extension();
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
    public function edit_product($id){
        $product = Product::find($id);
        return view('admin.product.edit_product',compact('product'));
    }
    public function update_product(Request $request , $id){
        $product = Product::find($id);
        $request->validate([
            'productName' => 'required',
            'productDescription' => 'required',
            'productImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'productCatagory' => 'required',
            'productQuantity' => 'numeric|required',
            'productRegularPrice' => 'required',
            'productDiscountPrice' => 'nullable'
        ]);
        $oldImage = public_path('upload/product-image/'.$product->image);
        if($request->file('productImage')){

            if(file_exists($oldImage)){
                File::delete($oldImage);
            }
            $newImage = date('dmy') .'-'. uniqid() . '.' . $request->productImage->extension();
            $request->productImage->move(public_path('upload/product-image'), $newImage);
        }else{
            $newImage = $product->image;

        }
        Product::find($id)->update([
            'title' => $request->productName,
            'description' => $request->productDescription,
            'image' => $newImage,
            'catagory' => $request->productCatagory,
            'quantity' => $request->productQuantity,
            'price' => $request->productRegularPrice,
            'discount_price' => $request->productDiscountPrice
        ]);
        return Redirect::route('list.product')->with('msg', 'Product update successfully');
    }
    public function delete_product($id){
        Product::find($id)->delete();
        return Redirect::back()->with('msg', 'Product delete successfully');
    }
}