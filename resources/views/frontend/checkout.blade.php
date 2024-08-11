@extends('layouts.frontend')
@section('styles')
@endsection
@section('content')
    <section class="container py-[3rem]">
        <div class="heading_container heading_center mb-[3rem]">
            <h2>
                <span>Checkout</span>
            </h2>
        </div>

        <div class="w-full flex flex-col md:flex-row gap-10">
            <div class="w-full md:w-1/2">
                <h3 class="font-bold text_primary text-xl mb-4">

                    Billing Details
                </h3>
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="w-full" value="{{ $userInfo->userName }}"
                            placeholder="Enter Your Name">
                    </div>
                    <div>
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" id="phone" class="w-full"
                            placeholder="Enter Your Phone Number" value="{{ $userInfo->phone }}">
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="w-full" placeholder="Enter Your Email"
                            value="{{ $userInfo->email }}">
                    </div>
                    <div>
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="w-full" placeholder="Enter Your address"
                            value="{{ $userInfo->address }}">

                    </div>

                </form>

            </div>
            <div class="w-full md:w-1/2">
                <h3 class="font-bold text_primary text-xl mb-4">
                    Billing Details
                </h3>
                <div class="border-b border-[#555] pb-4">
                @foreach ($carts as $cart)
                    <div class="flex  gap-3 justify-between mb-3">
                        <div class="flex gap-3">

                            <div class="w-[100px]">
                                <img src="{{ asset('upload/product-image/' . $cart->productImage) }}" alt="">
                            </div>
                            <div>

                                <h3 class="font-semibold text-xl">{{ $cart->productName }}</h3>
                                <p>* {{ $cart->productQuantity }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p> {{ $cart->productPrice * $cart->productQuantity }} TK</p>
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="border-b border-[#555] py-4 flex justify-between">
                    <div>
                        <h3 class="font-semibold text-xl">sub Total</h3>
                    </div>
                    <div>
                        <p>{{$totalPrice}} TK</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
@endsection
