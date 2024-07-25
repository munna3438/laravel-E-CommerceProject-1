@extends('layouts.frontend')
@section('styles')
@endsection
@section('content')
    <div class="container">
        <div class="my-[4rem]">
            <div class="flex flex-col md:flex-row gap-10 mb-6">
                <div class="w-full md:w-1/2 ">
                    <img class="w-full h-auto" src="{{ asset('upload/product-image/' . $product->image) }}" alt="">
                </div>
                <div class="w-full md:w-1/2">
                    <h1 class="mb-3 text-4xl font-bold">{{ $product->title }}</h1>
                    @if ($product->discount_price)
                        <p class="text-red-500 text-2xl font-bold">৳ {{ $product->discount_price }}</p>
                        <div> <span class="text-[#a3a3a3] line-through">৳ {{ $product->price }}</span> -
                            <span>{{ $product->discount_percentage }}%</span>
                        </div>
                    @else
                        <p class="text-red-500 text-2xl font-bold">৳ {{ $product->price }}</p>
                    @endif
                    @if ($product->quantity > 0)
                        <p class="text-green-500">In Stock</p>
                    @else{
                        <p class="text-red-500">Out of Stock</p>
                        }
                    @endif
                </div>
            </div>
            <div>
                {{ strip_tags($product->description) }}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
@endsection
