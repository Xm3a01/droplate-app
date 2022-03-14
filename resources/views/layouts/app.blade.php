<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/ms.png') }}" style="width: 100%; " type="image/png">
    <title>{{ config('app.name', 'Laravel') }}</title>

    

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/admin/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-free/css/all.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/js/chart/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}"> --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('assets/css/boostrap/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/boostrap/custom-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/rtl.css')}}"> --}}
    {{-- assets\css\boostrap --}}
    @stack('css')

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>

<body class="sidebar-mini layout-fixed">
    <div class="wrapper">

        {{-- nav --}}
        @include('app._include.navbar')
        <!-- Main Sidebar Container -->
        @include('app._include.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            {{-- header --}}
            @include('app._include.header')

            <main class="py-4">
                @yield('content')
            </main>
            {{-- @include('app._include.footer') --}}

        </div>
    </div>

    <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/boostrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/adminlte.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/chart/Chart.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/pages/dashboard3.js') }}"></script>
    @stack('js')
    {{-- <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script> --}}
    {{-- {{asset('plugins/select2/css/select2.min.css')}} --}}
    {{-- <script src="{{asset('assets/plugins/input/bs-custom-file-input.min.js')}}"></script> --}}
    {{-- <script src="{{ asset('assets/plugins/overlayScrollbars/js/OverlayScrollbars.min.js') }}"></script> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    @include('app._include.message')
    <script>
        $(function() {
            //Initialize Select2 Elements
            // $('.select2').select2();

            // //Initialize Select2 Elements
            // $('.select2bs4').select2({
            //     theme: 'bootstrap4'
            // })

            // bsCustomFileInput.init();
            // bsCustomFileInput.init();
        })
    </script>
</body>

</html>
