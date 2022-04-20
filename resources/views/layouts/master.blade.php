<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset=UTF-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="url-home" content="{{ URL::to('/') }}" />
    <title>@yield('title')</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('public/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('public/css/boostrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!-- <link href="{{ asset('/public/vendor/css/sb-admin-2.min.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <script src="{{ asset('/public/vendor/jquery/jquery.min.js') }}"></script>

    <!-- -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- abc -->
    <link href="{{ asset('public/css/sidebar.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/table.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/document.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/products.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/cart.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/list-partner.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('public/css/order-history.css')}}" rel="stylesheet" type="text/css">
    @stack('css')
</head>

<body id="page-top">
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')
    <script src="{{ asset('public/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/js/product.js') }}"></script>
    @stack('scripts')
</body>

</html>