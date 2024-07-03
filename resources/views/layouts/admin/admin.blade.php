<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My First E-commerce Project</title>
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('styles')
</head>
<body>
    <div class="h-screen flex">

        <div class="w-[300px] h-full bg_primary">
            <div class="admin_sidebar h-full">
                <div class="overflow-y-auto relative">
                    <div class="sidebar_logo"><h2>logo</h2></div>
                    <div class="sidebar_link_contanier">
                        <div class="accordion">
                            <div class="sidebar_link  dropdown_head">Catagory</div>
                            <div class="dropdown_inner ">
                                <a href="#" class="sidebar_link">New Catagory</a>
                                <a href="#" class="sidebar_link">Catagory List</a>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="sidebar_link sidebar_setings">
                        <h1 >setting</h1>
                    </div>
            </div>
        </div>
        <div class="w-[calc(100%-300px)] h-screen overflow-y-auto relative">
            <div class="sticky top-0 left-0">

                @include('layouts.admin.header')
            </div>
            @yield('content')
            <div class="w-[calc(100%-300px)] fixed bottom-0 right-0">
                @include('layouts.admin.footer')
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script> --}}
    <script src="{{ asset('assets/admin/js/index.js') }}"></script>
    @yield('scripts')
    @livewireScripts
</body>
</html>
