@extends('layouts.admin.admin')
@section('style')
@endsection
@section('content')
    <div class="d_container">

        <div class="d_container_box">
            <h1 class="d_sec_title">Catagory List</h1>

            @if (Session::has('msg'))
                <div class="d_success_message">
                    <p class="">{{ Session::get('msg') }}</p>
                    <button type="button" class="hide_area"><i class="fa-solid fa-x"></i></button>
                </div>
            @endif
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Sl. No</th>
                            <th>Name</th>
                            <th>description</th>
                            <th>image</th>
                            <th>catagory</th>
                            <th>quantity</th>
                            <th>price</th>
                            <th>discount_price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ strip_tags($product->description) }}</td>
                                <td><img src="{{ asset('upload/product-image/' . $product->image) }}"
                                        alt="{{ $product->title }}"></td>
                                <td>{{ $product->catagory }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->discount_price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
