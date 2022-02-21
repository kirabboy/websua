<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset=UTF-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('/public/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/boostrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <!-- <link href="{{ asset('/public/vendor/css/sb-admin-2.min.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="{{ asset('css/sidebar.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/table.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/document.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/products.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/cart.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/list-partner.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/order-history.css')}}" rel="stylesheet" type="text/css">
</head>
</head>
</head>
<body id="page-top">
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
      </script>
    <script src="{{ asset('/public/vendor/jquery/jquery.min.js') }}"></script>
    <!-- <script src="{{ asset('/public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>


    

    <!-- <script>
                                            String.prototype.replaceAll = function(find, replace) {
                                                var str = this;
                                                return str.replace(new RegExp(find.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&'), 'g'), replace);
                                            };

                                            google.charts.load('current', {
                                                packages: ['corechart', 'bar']
                                            });
                                            google.charts.setOnLoadCallback(drawBasic);
                                            var data1 = ('[["Element", "Doanh số (₫)"],[&quot;12&quot;, 0],[&quot;01&quot;, 0],[&quot;02&quot;, 0]]').replaceAll('&quot;', '"');
                                            var dataView = JSON.parse(data1);

                                            function drawBasic() {

                                                var data = google.visualization.arrayToDataTable(dataView);

                                                var options = {
                                                    title: '',
                                                    colors: ['#0596d8'],
                                                    legend: {
                                                        position: 'top',
                                                        alignment: 'center'
                                                    },

                                                };

                                                var chart = new google.visualization.ColumnChart(
                                                    document.getElementById('chart_div'));

                                                chart.draw(data, options);
                                            }

                                            $(function() {
                                                $(".resetChart").click(function() {
                                                    var year = $(this).data("year");
                                                    var datas = $("#chart_" + year).val();
                                                    datas = ('[["Element", "Doanh số (₫)"],' + datas + ']').replaceAll('&quot;', '"');
                                                    var data = JSON.parse(datas);
                                                    resetChart(data);
                                                });

                                                function resetChart(data) {
                                                    dataView = data;
                                                    drawBasic();
                                                }
                                            });
                                        </script>
    </script> -->
</body>
</html>