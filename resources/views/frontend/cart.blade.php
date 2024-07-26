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
                    <tr>
                        <td><img class="w-[80px] mx-auto" src="{{ asset('upload/product-image/' . $product->image) }}"
                                alt="{{ $product->image }}">
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>
                            @if ($product->discount_price)
                                <p class="">৳ {{ $product->discount_price }}</p>
                            @else
                                <p class="">৳ {{ $product->price }}</p>
                            @endif
                        </td>
                        <td>
                            <input type="number" id="quantity" name="quantity" value="1" min="1">
                        </td>
                        <td>৳
                                <span id="total-price">{{ $product->price }}</span>

                        </td>
                        </td>
                        <td class="">
                            <a href="#" onclick="return confirm('Are you sure delete catagory?')" class="">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">Sub Total = </td>
                        <td colspan="2">৳ 00</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        function total_price() {
            let quantity = $("#quantity").val()
            let total_price = quantity * {{ $product->price }}
            $('#total-price').text(total_price)
        }
        $('#quantity').keyup(function() {
            total_price()
        });
        $('#quantity').change(function() {
            total_price()
        })
    </script>
@endsection
