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
            'productCatagory' => 'required',
            'productImage' => 'required|image|mimes:png,jpg,jpeg,svg,webp',
            'productQuantity' => 'required',
            'productRegularPrice' => 'numeric|required|min:0',
            'productDiscountPrice' => 'numeric|nullable|min:0|lt:productRegularPrice',
            'productDescription' => 'nullable|string',
        ]);
        $imageName = date('dmy') . '-' . uniqid() . '.' . $request->productImage->extension();
        $request->productImage->move(public_path('upload/product-image'), $imageName);
        if ($request->productDiscountPrice) {

            $discountPercentag = (($request->productRegularPrice - $request->productDiscountPrice) / $request->productRegularPrice) * 100;
        }

        Product::create([
            'title' => $request->productName,
            'description' => $request->productDescription,
            'image' => $imageName,
            'catagory' => $request->productCatagory,
            'quantity' => $request->productQuantity,
            'price' => $request->productRegularPrice,
            'discount_price' => $request->productDiscountPrice,
            'discount_percentage' => $discountPercentag,
        ]);
        return Redirect::route('list.product')->with('msg', 'Product add successfully');
    }
    public function list_product()
    {
        $products = Product::all();
        return view('admin.product.list_product', compact('products'));
    }
    public function edit_product($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit_product', compact('product'));
    }
    public function update_product(Request $request, $id)
    {
        $product = Product::find($id);
        $request->validate([
            'productName' => 'required',
            'productCatagory' => 'required',
            'productImage' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp',
            'productQuantity' => 'required',
            'productRegularPrice' => 'numeric|required',
            'productDiscountPrice' => 'numeric|nullable',
            'productDescription' => 'nullable|string',
        ]);
        $oldImage = public_path('upload/product-image/' . $product->image);
        if ($request->file('productImage')) {
            if (file_exists($oldImage)) {
                File::delete($oldImage);
            }
            $newImageName = date('dmy') . '-' . uniqid() . '.' . $request->productImage->extension();
            $request->productImage->move(public_path('upload/product-image/'), $newImageName);
        } else {
            $newImageName = $product->image;
        }
        if ($request->productDiscountPrice) {

            $discountPercentag = (($request->productRegularPrice - $request->productDiscountPrice) / $request->productRegularPrice) * 100;
        } else {
            $discountPercentag = null;
        }
        Product::find($id)->update([
            'title' => $request->productName,
            'description' => $request->productDescription,
            'image' => $newImageName,
            'catagory' => $request->productCatagory,
            'quantity' => $request->productQuantity,
            'price' => $request->productRegularPrice,
            'discount_price' => $request->productDiscountPrice,
            'discount_percentage' => $discountPercentag,

        ]);
        return Redirect::route('list.product')->with('msg', 'Product update successfully');
    }
    public function delete_product($id)
    {
        $product = Product::find($id);
        $oldImage = public_path('upload/product-image/' . $product->image);
        if (file_exists($oldImage)) {
            File::delete($oldImage);
        }
        Product::find($id)->delete();
        return Redirect::back()->with('msg', 'Product deleted successfully');
    }
}
