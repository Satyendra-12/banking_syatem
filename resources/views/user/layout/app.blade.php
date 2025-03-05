<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Up Hello - User Dashboard eCommerce HTML Template.">

	<title>Bahrain Bank - Bank Dashboard</title>

	<!-- GOOGLE FONTS -->
	
	<link rel="preconnect" href="https://fonts.googleapis.com">

	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet"> 

	<link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

	<!-- PLUGINS CSS STYLE -->
	<link href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet">
	<link href="{{asset('assets/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />

	<!-- Ekka CSS -->
	<link id="ekka-css" href="{{asset('assets/css/ekka.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/bundles/izitoast/css/iziToast.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('ckedit/sample/styles.css') }}"> --}}

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"> --}}


	<!-- FAVICON -->
	<link href="{{asset('assets/img/favicon.png')}}" rel="shortcut icon" />
	<style>
		.text-white{
			background-color: rgb(5, 73, 142) !important;
			border-color: rgb(5, 73, 142) !important;
			color:white !important;
		}
		.btn.btn-success {
			background-color: green !important;
			border-color: green !important;
			color:white !important;
}
.form-group label, .input-group label {
    color: black;
    font-size: 15px;
}
.form-group .form-control, .input-group .form-control {
    font-size: 15px;
    padding: 0.5rem 1.06rem;
    border-color: black;
}
.card {
    border: 1px solid darkgray;
}
div.dataTables_wrapper div.dataTables_length, div.dataTables_wrapper div.dataTables_filter {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    width: 100%;
}
.table-responsive {
    overflow-x:hidden !important;
    -webkit-overflow-scrolling: touch;
}

.pagination .page-item:first-child .page-link {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
	background-color: rgb(5, 73, 142) !important;
			color:white !important;
}
.pagination .page-item:last-child .page-link {
   
	background-color: rgb(5, 73, 142) !important;
			color:white !important;
}
.page-item.active .page-link {
    z-index: 3;
	background-color: rgb(5, 73, 142) !important;
			color:white !important;
    border-color: rgb(5, 73, 142) !important;
}
.pl-2, .px-2 {
    padding-left: 5px !important;
    color: #000;
}


.breadcrumb-wrapper h1, .breadcrumb-wrapper .h1 {
    color: #000;
}
.breadcrumb-wrapper .breadcrumbs {
    margin-top: 5px;
    color: #000 !important;
}
table.dataTable td, table.dataTable th {
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
table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting {
    padding-right: 30px;
    color: black !important;
}
.sidebar .nav > li > a i {
    float: left;
    margin-right: 0.94rem;
    width: 20px;
    text-align: center;
    line-height: 20px;
    font-size: 1.5rem;
    color: white !important;
}
.sidebar li > a .caret {
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
    max-width: 130px;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.mdi-view-dashboard-outline::before {
    content: "\FA1C";
}

.sidebar .nav > li.active > a i {
    color: white !important;
}
.btn.btn-primary {
    color: white;
    background-color: rgb(5, 73, 142) !important;
    border-color: rgb(5, 73, 142) !important;
}
.btn.btn-primary:hover{
    color: white;
    background-color: rgb(5, 73, 142) !important;
    border-color: rgb(5, 73, 142) !important;
}
p, li, span {
    letter-spacing: 0.02rem;
    color: black;
}
p, span, a {
    color: black;
}
p, span, a, i {
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
.note-insert{
    display: none !important;
}
	</style>

	@yield('extra_css')

</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">


	

	<div class="wrapper">
		{{-- <div class="ec-left-sidebar ec-bg-sidebar"> --}}
			@include('user.include.sidebar')

		{{-- </div> --}}
		<div class="ec-page-wrapper">
			@include('user.include.header')

			<div class="ec-content-wrapper">
				@yield('content')

			</div>
			@include('user.include.footer')
	
		</div>
	</div>



	   
<!-- Common Javascript -->

<script src="{{asset('assets/plugins/jquery/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/plugins/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-zoom/jquery.zoom.min.js')}}"></script>
<script src="{{asset('assets/plugins/slick/slick.min.js')}}"></script>

<!-- Chart -->
<script src="{{asset('assets/plugins/charts/Chart.min.js')}}"></script>
<script src="{{asset('assets/js/chart.js')}}"></script>

<!-- Google map chart -->
<script src="{{asset('assets/plugins/charts/google-map-loader.js')}}"></script>
<script src="{{asset('assets/plugins/charts/google-map.js')}}"></script>

<!-- Date Range Picker -->
<script src="{{asset('assets/plugins/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/js/date-range.js')}}"></script>

<!-- Option Switcher -->
<script src="{{asset('assets/plugins/options-sidebar/optionswitcher.js')}}"></script>

<!-- Ekka Custom -->
<script src="{{asset('assets/js/ekka.js')}}"></script>
<script src="{{ asset('assets/bundles/izitoast/js/iziToast.min.js') }}"></script>
{{-- <script src="{{ asset('ckedit/sample/script.js') }}"></script> --}}
{{-- <script src="{{ asset('ckedit/build/ckeditor.js') }}"></script> --}}


@yield('extra_js')

   
</body>