<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel = "icon" href ="{{asset('assets/user/peximg/logo.jpeg')}}" type = "image/x-icon">

    <title>PEX CARGO | @yield('title') | Admin Jakarta</title>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/fontawesome.min.css')}}">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/templatemo-style.css')}}">

</head>

<body id="reportsPage">
    <div class="" id="home">
        @include('admin.layouts.navbar')

        @yield('modal')
        @yield('modal-import')
        @yield('content')

        @include('admin.layouts.footer')
    </div>

    <script src="{{asset('assets/admin/js/jquery-3.3.1.min.js')}}"></script>
    <!-- https://jquery.com/download/ -->
    <script src="{{asset('assets/admin/js/moment.min.js')}}"></script>
    <!-- https://momentjs.com/ -->
    <script src="{{asset('assets/admin/js/Chart.min.js')}}"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
    <!-- https://getbootstrap.com/ -->

    {{-- <script src="{{asset('assets/admin/js/tooplate-scripts.js')}}"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();
            });
        })
    </script> --}}
    @yield('js')
</body>

</html>
