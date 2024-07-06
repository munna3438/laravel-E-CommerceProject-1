@extends('layouts.admin.admin')
@section('style')
@endsection
@section('content')
<div class="d_container">
    <div class="bg-white rounded-md p-8">
        <h1 class="d_sec_title"> Add New Catagory </h1>
        <div>
            <form action="#" method="POST">
                <div class="flex gap-3 items-end">

                    <div class="w-1/2">
                        <label for="catagoryName" class="d_label">Catagory Name <span class="text-red-500">*</span></label>
                        <input type="text" name="catagoryName" id="catagoryName" required class="d_input_field" placeholder="Enter Catagory Name">
                    </div>
                    <div>
                        <button type="submit" class="d_button">Add Catagory</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
@section('script')
@endsection
