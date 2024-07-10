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
                            <th>image</th>
                            <th>catagory</th>
                            <th>quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td><img class="w-[80px] h-auto" src="{{ asset('upload/product-image/' . $product->image) }}"
                                        alt="{{ $product->title }}"></td>
                                <td>{{ $product->catagory }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td >
                                    <div class="d_action_container">

                                        <a href="{{ route('edit.product', $product->id) }}"
                                            class="d_action_button  bg_secondary hover:bg_secondary_light">

                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{route('delete.product',$product->id)}}" onclick="return confirm('Are you sure delete catagory?')" class="d_action_button bg_primary hover:bg_primary_light">

                                            <i class="fa-regular fa-trash-can"></i>
                                        </a>
                                    </div>
                                </td>
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
