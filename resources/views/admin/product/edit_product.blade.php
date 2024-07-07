@extends('layouts.admin.admin')
@section('style')
@endsection
@section('content')
    <div class="d_container">
        <div class="d_container_box">

            <a href="{{ route('list.catagory') }}" class="text_primary"><i class="fa-solid fa-arrow-left"></i></a>
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

                <form action="{{ route('update.catagory', $catagory->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex gap-3 items-end">

                        <div class="w-1/2">
                            <label for="catagoryName" class="d_label">Catagory Name <span
                                    class="text-red-500">*</span></label>

                            <input type="text" name="catagoryName" id="catagoryName" class="d_input_field"
                                value="{{ $catagory->catagoryName }}" placeholder="Enter Catagory Name">
                        </div>
                        <div>
                            <button type="submit" class="d_button">Update Catagory</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('script')
@endsection
