<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="OLX SHORT - Admin Dashboard eCommerce HTML Template.">

    <title>Bahrain - Admin Dashboard </title>

    <!-- GOOGLE FONTS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap"
        rel="stylesheet">

    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css"
        rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

    <!-- Ekka CSS -->
    <link id="ekka-css" href="{{ asset('assets/css/ekka.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/bundles/izitoast/css/iziToast.min.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet"> --}}


    <!-- FAVICON -->

    <style>
        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .table-responsive {
                /* overflow-x: hidden !important; */
                -webkit-overflow-scrolling: touch;
            }

        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {
            .table-responsive {
                /* overflow-x: hidden !important; */
                -webkit-overflow-scrolling: touch;
            }
        }

        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {
            .table-responsive {
                /* overflow-x: hidden !important; */
                -webkit-overflow-scrolling: touch;
            }
        }

        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 1280x) {
            .table-responsive {
                overflow-x: hidden !important;
                -webkit-overflow-scrolling: touch;
            }
        }

        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1290px) {
            .table-responsive {
                overflow-x: hidden !important;
                -webkit-overflow-scrolling: touch;
            }
        }

        @media (min-width: 1500px) .card-default .card-header {
            padding-left: 30px;
            padding-right: 30px;
            background-color: white !important;
            color: rgb(5, 73, 142) !important;
        }

        .form-group label,
        .input-group label {
            color: black;
            font-size: 15px;
        }

        .form-group .form-control,
        .input-group .form-control {
            font-size: 15px;
            padding: 0.5rem 1.06rem;
            border-color: black;
        }

        .card {
            border: 1px solid darkgray;
        }

        div.dataTables_wrapper div.dataTables_length,
        div.dataTables_wrapper div.dataTables_filter {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: 100%;
        }

        /* .table-responsive {
    overflow-x: hidden !important;
    -webkit-overflow-scrolling: touch;
}*/
        .page-item:not(:first-child) .page-link {
            margin-left: -1px;
            color: white !important;
        }

        .text-white {
            background-color: #37393d !important;
            border-color: #37393d;
            !important;
            color: white !important;
        }

        .btn.btn-success {
            background-color: green;
            border-color: green;
            color: white !important;
        }


        .pagination .page-item:first-child .page-link {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            background-color: rgb(5, 73, 142) !important;
            color: white !important;
        }

        .pagination .page-item:last-child .page-link {

            background-color: rgb(5, 73, 142) !important;
            color: white !important;
        }

        .page-item.active .page-link {
            z-index: 3;
            background-color: rgb(5, 73, 142) !important;
            color: white !important;
            border-color: rgb(5, 73, 142) !important;
        }

        .pl-2,
        .px-2 {
            padding-left: 5px !important;
            color: #000;
        }


        .breadcrumb-wrapper h1,
        .breadcrumb-wrapper .h1 {
            color: #000;
        }

        .breadcrumb-wrapper .breadcrumbs {
            margin-top: 5px;
            color: #000 !important;
        }

        table.dataTable td,
        table.dataTable th {
            -webkit-box-sizing: content-box;
            box-sizing: content-box;
            color: black !important;
        }

        a {
            text-decoration: none;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            color: #000 !important;
        }

        table.dataTable thead>tr>th.sorting_asc,
        table.dataTable thead>tr>th.sorting_desc,
        table.dataTable thead>tr>th.sorting,
        table.dataTable thead>tr>td.sorting_asc,
        table.dataTable thead>tr>td.sorting_desc,
        table.dataTable thead>tr>td.sorting {
            padding-right: 30px;
            color: black !important;
        }

        .sidebar .nav>li>a i {
            float: left;
            margin-right: 0.94rem;
            width: 20px;
            text-align: center;
            line-height: 20px;
            font-size: 1.5rem;
            color: white !important;
        }

        .sidebar li>a .caret {
            width: 20px;
            height: 20px;
            line-height: 20px;
            text-align: center;
            font-size: 1.25rem;
            border: none;
            color: white;
        }

        .sidebar .sidenav-item-link .nav-text {
            margin-right: auto;
            overflow: hidden;
            max-width: 150px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .mdi-view-dashboard-outline::before {
            content: "\FA1C";
        }

        .sidebar .nav>li.active>a i {
            color: white !important;
        }

        .btn.btn-primary {
            color: white;
            background-color: rgb(5, 73, 142) !important;
            border-color: rgb(5, 73, 142) !important;
        }

        .btn.btn-primary:hover {
            color: white;
            background-color: rgb(5, 73, 142) !important;
            border-color: rgb(5, 73, 142) !important;
        }

        .btn {
            background-color: #37393d;
            border: 1px solid #37393d;
            border-radius: 0px;
            color: white !important;
            padding: 6px 11px 6px 11px;
        }

        p,
        li,
        span {
            letter-spacing: 0.02rem;
            color: black;
        }

        p,
        span,
        a {
            color: black;
        }

        p,
        span,
        a,
        i {
            color: black;
        }

        .btn-sm {
            color: #fff !important;
        }

        .btn.btn-warning {
            color: #ffffff !important;
            background-color: red;
            border-color: red;
        }

        .sidebar .sidebar-inner>li>a:before {
            background: #fff !important;
        }

        #goToTopBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 99;
            font-size: 16px;
            border: none;
            outline: none;
            background-color: gray;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
        }

        #goToTopBtn:hover {
            background-color: lightgray;
        }
    </style>

    @yield('extra_css')


</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body" style="font-family: "Gill
    Sans", sans-serif !important;">

    /* <button title="Go to top">Top</button> */
    <a href="#" onclick="goToTop()" id="goToTopBtn" title="Back to top">&uarr;</a>


    <div class="wrapper">
        @include('admin.include.sidebar')

        <div class="ec-page-wrapper">
            @include('admin.include.header')

            <div class="ec-content-wrapper">
                @yield('content')

            </div>
            @include('admin.include.footer')

        </div>
    </div>




    <!-- Common Javascript -->
    <script src="{{ asset('assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-zoom/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/slick/slick.min.js') }}"></script>

    <!-- Chart -->
    <script src="{{ asset('assets/plugins/charts/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.js') }}"></script>

    <!-- Google map chart -->
    <script src="{{ asset('assets/plugins/charts/google-map-loader.js') }}"></script>
    <script src="{{ asset('assets/plugins/charts/google-map.js') }}"></script>

    <!-- Date Range Picker -->
    <script src="{{ asset('assets/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/date-range.js') }}"></script>

    <!-- Option Switcher -->
    <script src="{{ asset('assets/plugins/options-sidebar/optionswitcher.js') }}"></script>

    <!-- Ekka Custom -->
    <script src="{{ asset('assets/js/ekka.js') }}"></script>
    <script src="{{ asset('assets/bundles/izitoast/js/iziToast.min.js') }}"></script>

    <script>
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("goToTopBtn").style.display = "block";
            } else {
                document.getElementById("goToTopBtn").style.display = "none";
            }
        }

        function goToTop() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>

    @yield('extra_js')
</body>

</html>
