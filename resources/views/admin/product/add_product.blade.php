@extends('layouts.admin.admin')

@section('style')
@endsection
@section('content')
    <div class="d_container">
        <div class="d_container_box">
            <h1 class="d_sec_title"> Add New Product </h1>
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
                @if (Session::has('msg'))
                    <div class="d_success_message">

                        <p class="">{{ Session::get('msg') }}</p>
                        <button type="button" class="hide_area"><i class="fa-solid fa-x"></i></button>
                    </div>
                @endif
                <form action="{{route('store.product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-3 x gap-3">

                        <div>
                            <label for="productName" class="d_label">Product Name <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="productName" id="productName" class="d_input_field"
                                placeholder="Enter Product Name">
                        </div>
                        <div >
                            <label for="productCatagory" class="d_label">Product Catagory <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="productCatagory" id="productCatagory" class="d_input_field"
                                placeholder="Enter Product Name">
                        </div>
                        <div >
                            <label for="productImage" class="d_label">Product Image <span
                                    class="text-red-500">*</span></label>
                            <input type="file" name="productImage" id="productImage" class="d_input_field"
                                placeholder="Enter Product Name">
                        </div>
                        <div >
                            <label for="productQuantity" class="d_label">Product Quantity <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="productQuantity" id="productQuantity" class="d_input_field"
                                placeholder="Enter Product Name">
                        </div>
                        <div >
                            <label for="productRegularPrice" class="d_label">Product Regular Price <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="productRegularPrice" id="productRegularPrice" class="d_input_field"
                                placeholder="Enter Product Name">
                        </div>
                        <div >
                            <label for="productDiscountPrice" class="d_label">Product Discount Price <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="productDiscountPrice" id="productDiscountPrice" class="d_input_field"
                                placeholder="Enter Product Name">
                        </div>
                    </div>
                    <div class="my-4">
                        <label for="productDescription" class="d_label">Product Description </label>
                        <input id="productDescription" type="hidden" name="productDescription">
                        <trix-editor input="productDescription"></trix-editor>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="d_button ">Add Product</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('script')

@endsection
