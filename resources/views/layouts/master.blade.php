<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset=UTF-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="url-home" content="{{ URL::to('/') }}" />
    <title>@yield('title')</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('/public/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/boostrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!-- <link href="{{ asset('/public/vendor/css/sb-admin-2.min.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/table.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/document.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/products.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/cart.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/list-partner.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/order-history.css')}}" rel="stylesheet" type="text/css">
    @stack('css')
</head>

<body id="page-top">
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')
    <script src="{{ asset('/public/vendor/jquery/jquery.min.js') }}"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script src="{{ asset('/public/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
    <script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('ckeditor_des');
        CKEDITOR.replace('ckeditor_short_des');
    </script>
</body>
</html>

