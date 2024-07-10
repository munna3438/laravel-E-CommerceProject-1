@extends('layouts.admin.admin')
@section('style')
@endsection
@section('content')
    <div class="d_container">
        <div class="d_container_box">

            <a href="{{ route('list.product') }}" class="text_primary"><i class="fa-solid fa-arrow-left"></i></a>
            <h1 class="d_sec_title"> Add New Catagory </h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{route('update.product',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 x gap-3">

                        <div>
                            <label for="productName" class="d_label">Product Name <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="productName" id="productName" class="d_input_field"
                                placeholder="Enter Product Name" value="{{$product->title}}">
                        </div>
                        <div >
                            <label for="productName" class="d_label">Product Catagory <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="productCatagory" id="productCatagory" class="d_input_field"
                                placeholder="Enter Product Name" value="{{$product->catagory}}">
                        </div>
                        <div >
                            <label for="productName" class="d_label">Product Image <span
                                    class="text-red-500">*</span></label>
                            <input type="file" name="productImage" id="productImage" class="d_input_field"
                                placeholder="Enter Product Name" >
                        </div>
                        <div >
                            <label for="productName" class="d_label">Product Quantity <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="productQuantity" id="productQuantity" class="d_input_field"
                                placeholder="Enter Product Name" value="{{$product->quantity}}">
                        </div>
                        <div >
                            <label for="productName" class="d_label">Product Regular Price <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="productRegularPrice" id="productRegularPrice" class="d_input_field"
                                placeholder="Enter Product Name" value="{{$product->price}}">
                        </div>
                        <div >
                            <label for="productName" class="d_label">Product Discount Price <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="productDiscountPrice" id="productDiscountPrice" class="d_input_field"
                                placeholder="Enter Product Name" value="{{$product->discount_price}}">
                        </div>
                    </div>
                    <div class="my-4">
                        <label for="productDescription" class="d_label">Product Description </label>
                        <input id="productDescription" type="hidden" name="productDescription" value="{{$product->description}}">
                        <trix-editor input="productDescription" ></trix-editor>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="d_button ">Update Product</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('script')
@endsection
