@extends('layouts.frontend')
@section('styles')
@endsection
@section('content')
    <section class="container py-[3rem]">
        <div class="heading_container heading_center mb-[3rem]">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Clear</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <form action="{{ route('cart.update', [$cart->productId, $cart->userId]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <tr>

                                <td><img class="w-[80px] mx-auto"
                                        src="{{ asset('upload/product-image/' . $cart->productImage) }}"
                                        alt="{{ $cart->productImage }}">
                                </td>
                                <td>{{ $cart->productName }}</td>
                                <td>
                                    ৳
                                    <p class="">{{ $cart->productPrice }}</p>
                                </td>
                                <td>

                                    <input type="number" class="quantity" name="quantity"
                                        value="{{ $cart->productQuantity }}" min="1">

                                    <button type="submit" class="bg-green-400 text-white py-[.6rem] px-[1rem]"><i
                                            class="fa-solid fa-check"></i></button>
                                </td>
                                <td>৳
                                    <span class="total-price">{{ $cart->productPrice * $cart->productQuantity }}</span>

                                </td>
                                </td>
                                <td class="">
                                    <a href="#" onclick="return confirm('Are you sure delete catagory?')"
                                        class="">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        </form>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">Sub Total = </td>
                        <td colspan="2">৳
                            <span id="subTotal">

                            </span>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        function total_price(current) {

            let quantity = current.val()
            let price = current.parent().prev().children().text()
            let total_price = quantity * price
            current.parent().next().children().text(total_price)
        }
        //sub total
        function sub_total() {
            let subTotal = 0
            $('.total-price').each(function() {
                subTotal += parseInt($(this).text())
            })
            $('#subTotal').text(subTotal)
        }
        $('.quantity').change(function() {
            total_price($(this))
            sub_total()
        })
        $('.quantity').keyup(function() {

            total_price($(this))
            sub_total()
        })
        sub_total()
    </script>
@endsection
