@extends('frontend.layout.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
<style>
    @media screen and (max-width: 599px) {
        .margintp {
            margin-top: 12px !important;
        }
        .marginclass{
           margin-right:22px;
        }
    }

    .clamp-me {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        /* Number of lines to display before clamping */
        -webkit-line-clamp: 3;
        -moz-line-clamp: 3;
        /* For Firefox */
        -webkit-line-clamp: 3;
        /* For WebKit browsers */
        -o-line-clamp: 3;
        /* For Opera */
        line-clamp: 3;
        /* Standard property */
    }

    /* Google Fonts - Poppins */
    /* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap'); */
    .pic-title bmargin .row .box {
        width: 110px;
    }

    /* *{
   margin: 0;
   padding: 0;
   box-sizing: border-box;
   font-family: 'Poppins', sans-serif;
   }name
   body{
   min-height: 100vh;
   display: flex;
   align-items: center;
   justify-content: center;
   background-color: #EFEFEF;
   } */
    .slide-container {
        max-width: 1120px;
        width: 100%;
        padding: 40px 0;
    }

    .name {
        text-align: center;
    }

    .swiper-wrapper {
        height: 100%;
        cursor: pointer !important;
    }

    .slide-content {
        margin: 0 40px;
        overflow: hidden;
        border-radius: 0px;
    }

    .card {
        border-radius: 0px;
        background-color: #ebebeb;
    }

    .image-content,
    .card-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 5px 14px;
    }

    .image-content {
        position: relative;
        row-gap: 5px;
        padding: 10px 0;
    }

    .overlay {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        /* background-color: #4070F4; */
        /* border-radius: 25px 25px 0 25px; */
    }

    /*
   .overlay::before,
   .overlay::after {
   content: '';
   position: absolute;
   right: 0;
   bottom: -40px;
   height: 40px;
   width: 40px;
   background-color: #4070F4;
   } */
    /* .overlay::after {
   border-radius: 0 25px 0 0;
   background-color: #FFF;
   } */
    .swiper-slide {
        background: #f2f2f2 !important;
        height: 318px !important;
        border-top: 5px solid rgb(32, 80, 129) !important;
        border-bottom: 5px solid rgb(32, 80, 129) !important;
    }

    @media screen and (max-width: 320px) {
        .card-image {
            width: 120px !important;
        }
    }

    .card-image {
        position: relative;
        height: 100px;
        width: 150px;
        /* border-radius: 50%;
   background: #FFF; */
        /* padding: 3px; */
        border: 1px solid black;
    }

    .card-image .card-img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        /* border-radius: 50%; */
        /* border: 4px solid #4070F4; */
    }

    .name {
        font-size: 18px;
        font-weight: bold;
        color: rgb(32, 80, 129)
    }

    .description {
        font-size: 14px;
        color: black;
        text-align: center;
    }

    .button {
        border: none;
        font-size: 16px;
        color: #FFF;
        padding: 8px 16px;
        background-color: rgb(32, 80, 129);
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 111%;
    }

    form.example button {
        /* padding:15px; */
    }

    .button:hover {
        background: #265DF2;
    }

    .swiper-navBtn {
        color: #6E93f7;
        transition: color 0.3s ease;
    }

    .swiper-navBtn:hover {
        color: #4070F4;
    }

    @media screen and (max-width: 599px) {
        .popup {
            width: 84vw !important;
            font-size: 16px !important;
        }
    }

    .swiper-navBtn::before,
    .swiper-navBtn::after {
        font-size: 11px;
        background: rgb(32, 80, 129);
        padding: 9px 11px 11px 9px;
        border-radius: 0px;
        color: white;
    }

    .swiper-button-next {
        right: 0;
    }

    .swiper-button-prev {
        left: 0;
    }

    .swiper-pagination-bullet {
        background-color: #6E93f7;
        opacity: 1;
    }

    .swiper-pagination-bullet-active {
        background-color: #4070F4;
    }

    @media screen and (max-width: 768px) {
        .slide-content {
            margin: 0 10px;
        }

        .swiper-navBtn {
            display: none;
        }
    }

    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        /* width: 100%; */
        opacity: 0.9;
    }

    button:hover {
        opacity: 1;
    }

    /* Float cancel and delete buttons and add an equal width */
    .cancelbtn,
    .deletebtn {
        float: left;
        width: 50%;
    }

    /* Add a color to the cancel button */
    .cancelbtn {
        background-color: #ccc;
        color: black;
    }

    /* Add a color to the delete button */
    .deletebtn {
        background-color: #f44336;
    }

    /* Add padding and center-align text to the container */
    .container {
        padding: 16px;
        /* text-align: center; */
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: #474e5d;
        padding-top: 50px;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }

    /* Style the horizontal ruler */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* The Modal Close Button (x) */
    .close {
        position: absolute;
        right: 35px;
        top: 15px;
        font-size: 40px;
        font-weight: bold;
        color: #f1f1f1;
    }

    .close:hover,
    .close:focus {
        color: #f44336;
        cursor: pointer;
    }

    /* Clear floats */
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Change styles for cancel button and delete button on extra small screens */
    @media screen and (max-width: 300px) {

        .cancelbtn,
        .deletebtn {
            width: 100%;
        }
    }
</style>
@section('content')
    <style>
        /* Styles for the popup container */
        .popup {
            display: none;
            /* Hide the popup by default */
            position: fixed;
            top: 60%;
            left: 50%;
            padding: 20px;
            height: 500px;
            width: 50vw;
            transform: translate(-50%, -50%);
            background-color: #dcf5fa;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            overflow-y: auto;
        }

        @media screen and (min-width: 600px) and (max-width: 1024px) {
            .well2 {
                height: 230px !important;
            }
        }

        @media screen and (max-width: 599px) {
            .well2 {
                height: 230px !important;
            }
            .widthImage{
                width: 80vw;
            }
        }

        /* Styles for the close button */
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 3px;
            font-size: 15px;
        }

        .hover:hover {
            transform: scale(1.05);
        }

        .well1 {
            width: 100%
        }

        .img-height{
            height: 300px;
        }
    </style>
    <!-- Popup container -->
    {{-- add popup in id to show popup  --}}
    <div id="" class="popup" style="">
        <span class="close" onclick="closePopup()" style="font-size:30px">&times;</span> <!-- Close button -->
        <!-- Content of the popup (you can put any content here) -->
        <div class="text-center">
            <center>
                <button
                    style="margin-top: -16px;background: rgb(5,73,142);color: white;padding: 12px;font-weight:600;font-size:20px;">UPCOMING
                    EVENTS</button>
            </center>
            <h1 style="
         color: blue;
         font-weight: 600;margin-top:10px;margin-bottom:10px;
         ">
                {{ $nextMonthNameCapitalized }}
            </h1>
        </div>
        <div style="
      background: transparent;
      text-align: left;margin:20px;font-size:17px;
      ">
            @foreach ($news as $item)
                <div class="col-xs-12 col-sm-6 col-md-12 member featured-member-info" style="margin-bottom: 10px;">
                    <div class="well1 "
                        style="padding: 11px 20px 15px 20px;border-left:5px solid rgb(32, 80, 129);border-right:5px solid rgb(32, 80, 129);">
                        <div class="clearfix"></div>
                        <a class="h4 bold" title="Bank ABC - View Listing" href="#"
                            style="
               font-size: 23px;
               font-weight: 700;
               ">
                            {{ $item->name }}</a>
                        {{-- 
            <p class="h4 bold" title="Bank ABC - View Listing" href="#"
               style="font-size: 17px;color:#204d74;padding-top: 5px;">
               {{ \Carbon\Carbon::parse($item->date)->format('d F Y') }}
            </p>
            --}}
                        <div class="row" style="padding-top:10px;">
                            <div class="col-md-4 nopad text-center featured-member-image">
                                {{-- <img src="{{ asset('frontend/img/bank_1.jpg') }}" width="200" alt="Bank ABC"
                                    style="height: 210px;border-radius: 0px;width:100%"> --}}
                                <img src="{{ asset($item->image) }}" width="200" alt="Image"
                                    style="height: 210px; border-radius: 0px; width: 100%">

                                <a title="Bank ABC - View Listing" href="/manama/conventional-banks-wholesale-1/bank-abc">
                                </a>
                            </div>
                            <div class="col-md-8 norpad small featured-member">
                                <div class="col-xs-12 norpad  featured-member" style="width: 106%">
                                    <table>
                                        <tr>
                                            <td>Date :</td>
                                            <td> @php
                                                $startDate = \Carbon\Carbon::createFromFormat('Y-m-d', $item->date);
                                                $endDate = \Carbon\Carbon::createFromFormat('Y-m-d', $item->enddate);
                                            @endphp
                                                {{ $startDate->format('jS F Y') }}-{{ $endDate->format('jS F Y') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Location :</td>
                                            <td>{{ $item['location'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Organized by :</td>
                                            <td>{{ $item['organized_by'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tel :</td>
                                            <td> {{ $item['tel'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email address :</td>
                                            <td> {{ $item['email'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Website :</td>
                                            <td> {{ $item['website'] }}</td>
                                        </tr>
                                    </table>
                                    </p>
                                </div>
                                <a title="Bank ABC - View Listing" class="tmargin btn btn-sm btn-primary btn-block noti-btn"
                                    href="{{ route('admin.news_event', $item->id) }}"
                                    style="float:right;font-size:small;
                     background: rgb(5, 73, 142) !important;
                     color: white !important; width:fit-content">Read
                                    More</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            @endforeach
            <center>
                <button style="margin-top: 20px;background: rgb(5,73,142);color: white;padding: 12px;"><a
                        href="{{ route('admin.contact') }}" style="color:white;"> ADD YOUR EVENTS<br>CONTACT US
                        NOW</a></button>
            </center>
        </div>
    </div>
    </div>
    <script>
        // Function to show the popup when the window loads
        window.onload = function() {
            document.getElementById('popup').style.display = 'block';
        };
        // Function to close the popup
        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
    <div class="container-fluid" style="margin-top:10px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="homepage-sections fr-view">
                    <div class=" w3-display-container" style="place-content: center;display:flex;">
                        @foreach ($slide as $slider)
                            <img class="mySlides2" src="{{ asset($slider->image) }}"
                                style="width:100%;height:600px;border-radius:0px !important;">
                        @endforeach
                        <button class="w3-button w3-black w3-display-left"
                            style="border-radius:0px !important;background:blue !important;"
                            onclick="plusDivs(-1)">&#10094;</button>
                        <button class="w3-button w3-black w3-display-right"
                            style="border-radius:0px !important;background:blue !important;" id="autoSlideAs"
                            onclick="plusDivs(1)">&#10095;</button>
                    </div>
                </div>
            </div>
            <!-- Slider -->
        </div>
    </div>
    <!-- Swiper JS -->
    <script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.js"></script>
    <!-- JavaScript -->
    <!--Uncomment this line-->
    <script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/script.js"></script>
    {{-- </html> --}}
    <!--
               IMPORTANT: This widget contains real Adsense code as a sample to show how this widget functions.  Please replace the current Adsense code below with your own code in order to generate revenue from this ad space.
               
               -->
    <!-- <div class=" container clearfix text-center above-content-banner-ad">
               </div>
               <div class="clearfix"></div> -->
    <!-- Begin  Content -->
    <div class="clearfix"></div>
    </div>
    </div>
    <!-- closes container + content-container -->
    <style>
        @media only screen and (max-width: 768px) {
            .category {
                font-size: 12px;
            }
        }
    </style>
    <div class="homepage-sections fr-view">
        <div class="homepage-section-3" style="padding:0px;">
            <div class="clearfix"></div>
            <div class="content-container top-level-category-stream">
                <div class="clearfix"></div>
                <div class="container-fluid mt-2" style="padding-bottom: 40px;">
                    <div class="row">
                        <div class="col-md-12" style="padding: 20px;">
                            {{-- <a href="/categories" class="view-all-btn-desktop hidden-xs btn btn-info" style="margin:10px">
                  View All
                  </a> --}}
                            <h3 class="nomargin text-left streaming-title"
                                style="color:rgb(32, 80, 129);font-size:26px !important;">
                                Popular Categories
                            </h3>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row" style="" id="myTable" data-name="mytable">
                            <div class="col-md-12 slickTopCategories">
                                @foreach ($category as $categories)
                                    <div class="top-category-single col-xs-12 col-sm-6 col-md-3" style="">
                                        <h3 class="pic-title bmargin">
                                            {{-- 
                           <div class="row" style="background-color: #e5e7eb;display:flex;font-size:16px">
                              --}}
                                            {{-- 
                              <div class="box" style="border-radius: 10px;">
                                 <text><i class="fa fa-anchor"
                                    style="background-color: rgba(32, 80, 129,0.95);
                                    border-color: rgb(32, 80, 129);
                                    color: rgb(255, 255, 255); font-size: 50px;padding:10px;"></i></text>
                              </div>
                              --}}
                                            <div class="row"
                                                style="background-color: #e5e7eb;align-items:center;display:flex;font-size:16px;border-radius: 20px;">
                                                <div class="col marginclass" style="border-radius: 20px !important;padding:0px;"><img
                                                        src="{{ asset($categories->category_cover) }}" alt="Mountains"
                                                        style="
                                    width: 71px;
                                    height: 70px;
                                    border-radius: 20px;
                                    ">
                                                </div>
                                                <div class="col-9 category"
                                                    style="
                                    color: rgba(32, 80, 129,0.95);
                                    border-color: rgb(32, 80, 129);
                                    background-color: #e5e7eb;
                                    font-weight: 700;
                                    border-radius: 20px;
                                    ">
                                                    <a href="{{ route('admin.financial') }}"
                                                        style="
                                       color: inherit !important;">
                                                        {{-- CONVENTIONAL BANKS RETAIL AND WHOLESALE --}}
                                                        {{ $categories->category_name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </h3>
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                    <a href="{{ route('admin.financial') }}"
                                        class="view-all-btn-desktop hidden-xs btn btn-info"
                                        style="border-radius: 6px;background:rgb(5, 73, 142);color:white;padding: 7px;font-size: 12px;">
                                        View All
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.financial') }}" class="btn btn-lg btn-info btn-block visible-xs-block"
                            style="border-radius: 6px;background:rgb(5, 73, 142);color:white;padding: 7px;font-size: 12px;width: 23%;
                     float: right;">View
                            All</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container-fluid mt-1">
        <div class="clearfix">
            <div class="col-md-12" style="
         padding-left: 13px;
         ">
                {{-- <a href="{{ route('admin.profile_who') }}" class="view-all-btn-desktop hidden-xs btn btn-info">
         View All
         </a> --}}
                <h2 class="nomargin text-left streaming-title" style="color:rgb(32, 80, 129);font-size:26px !important;">
                    Featured Member
                </h2>
                <br>
            </div>
        </div>
        <style>
            p {
                /* height: 88px !important; */
            }
        </style>
        <div class="slide-container-fluid swiper mt-1" style="height: 342px" id="myTable2" data-name="mytable">
            <div class="slide-content">
                <div class="card-header swiper-wrapper" style="cursor: pointer;">
                    @foreach ($featured as $member)
                        <div class="card swiper-slide justify-content-between" style="width: 285.333px;">
                            <div class="image-content">
                                <span class="overlay"></span>
                                <div class="card-image">
                                    <img src="{{ asset($member->contact_person) }}" alt="" class="card-img">
                                </div>
                            </div>
                            <div class="card-content">
                                <h2 class="name"
                                    style="font-weight: 600;
                        width: 100%;
                        display: -webkit-box;
                        -webkit-line-clamp: 2;
                        font-size: 15px;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        ">
                                    {{ $member->username }}
                                </h2>
                                <p class="description"
                                    style="
                        width: 100%;
                        display: -webkit-box;
                        -webkit-line-clamp: 4;
                        font-size: 13px;
                        height:80px;
                        -webkit-box-orient: vertical;
                        overflow: hidden;">
                                    {{ $member->address }}
                                </p>
                                <a href="{{ route('admin.details-page', $member->id) }}"
                                    style="width: 111%;cursor: pointer;height: 40px;text-align: center;padding-top: 8px;font-size: 15px;background:rgb(5,73,142)"
                                    class="btn btn-primary">View Listing</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-button-next swiper-navBtn" style="margin-top: -50px;margin-right: 11px;"></div>
            <div class="swiper-button-prev swiper-navBtn"style="margin-top: -50px;margin-left: 11px;" id="autoSlideAs1">
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12" style="
   margin-top: -2rem;
   margin-left: -3rem;margin-bottom:0rem;
   ">
        <a href="{{ route('admin.feature') }}" class="view-all-btn-desktop hidden-xs btn btn-info"
            style="border-radius: 6px;background:rgb(5, 73, 142);color:white;padding: 7px;font-size: 12px;">
            View All
        </a>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <a href="{{ route('admin.feature') }}" class="btn btn-lg btn-info btn-block visible-xs-block"
            style="border-radius: 6px;background:rgb(5, 73, 142);color:white;padding: 7px;font-size: 12px;width: 23%;
      float: right">View
            All</a>
    </div>
    <style>
        .slider {
            margin: 0 30px;
            max-width: 45%;
        }

        .slide_viewer {
            height: 450px;
            overflow: hidden;
            position: relative;
            width: 698px;
        }



        .slide_group {
            height: 100%;
            position: relative;
            /* width: 100%; */
        }

        .hover1:hover {
            transform: scale(1.02) !important;
        }

        .slide {
            display: none;
            height: auto;
            position: absolute;
            width: 100%;
        }

        .slide:first-child {
            display: block;
        }

        /* .slide:nth-of-type(1) {
               background: #D7A151;
               }
               .slide:nth-of-type(2) {
               background: #F4E4CD;
               }
               .slide:nth-of-type(3) {
               background: #C75534;
               }
               .slide:nth-of-type(4) {
               background: #D1D1D4;
               } */
        .well2 {
            height: 200px;
        }

        .slide_buttons {
            left: 0;
            position: absolute;
            right: 0;
            text-align: center;
        }

        a.slide_btn {
            color: #474544;
            font-size: 42px;
            margin: 0 0.175em;
            -webkit-transition: all 0.4s ease-in-out;
            -moz-transition: all 0.4s ease-in-out;
            -ms-transition: all 0.4s ease-in-out;
            -o-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
        }

        .slide_btn.active,
        .slide_btn:hover {
            color: #428CC6;
            cursor: pointer;
        }

        .slider_right {
            margin: 0;
            max-width: 45%;
        }


        .slide_viewer_right {
            height: 450px;
            overflow: hidden;
            position: relative;
            width: 698px;
        }

        .slide_group_right {
            height: 100%;
            position: relative;
            width: 100%;
        }

        .slide_right {
            display: none;
            height: 100%;
            position: absolute;
            width: 100%;

            img {
                height: 450px;
                width: 100%
            }
        }

        .slide_right:first-child {
            display: block;
        }

        .slide_buttons_right {
            left: 0;
            position: absolute;
            right: 0;
            text-align: center;
        }

        a.slide_btn_right {
            color: #474544;
            font-size: 42px;
            margin: 0 0.175em;
            -webkit-transition: all 0.4s ease-in-out;
            -moz-transition: all 0.4s ease-in-out;
            -ms-transition: all 0.4s ease-in-out;
            -o-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
        }

        .slide_btn_right.active,
        .slide_btn_right:hover {
            color: #428CC6;
            cursor: pointer;
        }

        .directional_nav {
            height: 450x;
            margin: 0 auto;
            max-width: 100%;
            position: relative;
            top: -383px;
        }

        .previous_btn {
            bottom: 0;
            left: 100px;
            margin: auto;
            position: absolute;
            top: 0;
        }

        .next_btn {
            bottom: 0;
            margin: auto;
            position: absolute;
            right: 100px;
            top: 0;
        }

        .previous_btn,
        .next_btn {
            cursor: pointer;
            height: 65px;
            opacity: 0.5;
            -webkit-transition: opacity 0.4s ease-in-out;
            -moz-transition: opacity 0.4s ease-in-out;
            -ms-transition: opacity 0.4s ease-in-out;
            -o-transition: opacity 0.4s ease-in-out;
            transition: opacity 0.4s ease-in-out;
            width: 65px;
        }

        .previous_btn:hover,
        .next_btn:hover {
            opacity: 1;
        }

        @media only screen and (max-width: 767px) {
            .previous_btn {
                left: 50px;
            }

            .next_btn {
                right: 50px;
            }

            .popup {
                display: none;
                /* Hide the popup by default */
                position: fixed;
                top: 60%;
                left: 50%;
                padding: 20px;
                height: 500px;
                width: 70vw;
                transform: translate(-50%, -50%);
                background-color: #dcf5fa;
                border: 1px solid #ccc;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
                z-index: 1000;
                overflow: auto;
            }

            tr {
                display: grid
            }
        }

        .slide img {
            height: 450px;
            width: 100%
        }

        @media screen and (min-width: 1025px) and (max-width: 1439px) {
            .whoprofilecard {
                /* margin-bottom:15px; */
            }

            .noti-btn {
                width: 23%;
            }

            .slide_view4r_right {
                width: 600px !important;
            }


            .member {
                margin-bottom: 5px
            }

            .readbtn {
                width: 50%;
            }

            .read-btn2 {
                width: 41%;
            }

            .follow-btn {
                width: 15%;
            }

            .join-btn {
                width: 32%;
            }
        }

        @media screen and (min-width: 1440px) {
            .whoprofilecard {
                /* margin-bottom:32px; */
            }

            .readbtn {
                width: 60%;
            }
        }

        @media screen and (min-width: 1025px) and (max-width: 1440px) {
            .slide_viewer {
                width: 580px !important;
            }
        }

        @media screen and (min-width: 600px) and (max-width: 1024px) {
            .slide_viewer_right {
                width: 359px;
            }

            .slide_viewer {
                width: 346px;
            }

            .readbtn {
                width: 102% !important;
            }

            /* .btn-info-profile{
               margin-top: 44rem;
               } */
            .read-btn2 {
                width: 80%;
            }

            .follow-btn {
                width: 15%;
            }

            .join-btn {
                width: fit-content;
            }

            .noti-btn {
                width: 30%;
            }

            .join-btn {
                width: 36%;
            }
        }

        @media screen and (min-width: 600px) and (max-width: 1024px) {
            tr {
                display: grid
            }

            .slide_viewer_right {
                width: 359px;
            }

            .slide_viewer {
                width: 346px;
            }

            .readbtn {
                width: 80%;
            }

            .read-btn2 {
                width: 80%;
            }

            .follow-btn {
                width: 15%;
            }

            .join-btn {
                width: 50%;
            }
            .ab-btn{
                top: 186px !important; 
            } 
        }

        @media screen and (max-width: 599px) {
            .slide_viewer_right {
                width: 80vw;
                margin-left: 29px;
            }

            .featured-member-info {
                margin-top: 20px;
            }

            .noti-btn {
                width: 50%;
            }

            .slide_viewer {
                width: 80vw;
                margin-bottom: 10px
            }

            .marsmall {
                margin-top: 175px
            }

            .follow-btn {
                width: 50%;
            }

            .join-btn {
                width: 80%;
            }

            .featured-member-news {
                font-size: 11px !important;
            }

      

            /* .instagram {
                    padding-bottom: 20px;
                } */

            /* .swiper-slide{
               width:185px !important;
               } */
        }
        @media screen and (max-width: 599px) {
                .texttitle {
                    font-size: 18px !important;
                }

                .add-media {
                    margin-left: 30px !important;
                }

                .slide img {
            height: 300px;
            width: 100%
        }
        .ab-btn{
                top: 156px !important; 
            } 
            }
            .ab-btn{
                top: 194px; 
            }
    </style>
    <div class="container-fluid" style="margin-top: 5rem;">
        <div class="row" style="height: 500px;">
            <div class="col-md-6">
                <div class="slider">
                    <div class="slide_viewer">
                        <div class="slide_group">
                            @foreach ($banner as $bannerdata)
                                <div class="slide">
                                    <img src="{{ asset($bannerdata->image) }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- End // .slider -->
                <div class="slide_buttons">
                </div>
            </div>
            <div class="col-md-6">
                <div class="slider">
                    <div class="slide_viewer">
                        <div class="slide_group">
                            @foreach ($rbanner as $bannerdata)
                                <div class="slide">
                                    <img src="{{ asset($bannerdata->image) }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- End // .slider -->
                <div class="slide_buttons">
                </div>
            </div>
            {{-- 
      <div class="directional_nav">
         <div class="previous_btn" title="Previous">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
               x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
               <g>
                  <g>
                     <path fill="#474544"
                        d="M-10.5,22.118C-10.5,4.132,4.133-10.5,22.118-10.5S54.736,4.132,54.736,22.118
                        c0,17.985-14.633,32.618-32.618,32.618S-10.5,40.103-10.5,22.118z M-8.288,22.118c0,16.766,13.639,30.406,30.406,30.406 c16.765,0,30.405-13.641,30.405-30.406c0-16.766-13.641-30.406-30.405-30.406C5.35-8.288-8.288,5.352-8.288,22.118z" />
                     <path fill="#474544"
                        d="M25.43,33.243L14.628,22.429c-0.433-0.432-0.433-1.132,0-1.564L25.43,10.051c0.432-0.432,1.132-0.432,1.563,0	c0.431,0.431,0.431,1.132,0,1.564L16.972,21.647l10.021,10.035c0.432,0.433,0.432,1.134,0,1.564	c-0.215,0.218-0.498,0.323-0.78,0.323C25.929,33.569,25.646,33.464,25.43,33.243z" />
                  </g>
               </g>
            </svg>
         </div>
         <div class="next_btn" title="Next">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
               x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
               <g>
                  <g>
                     <path fill="#474544"
                        d="M22.118,54.736C4.132,54.736-10.5,40.103-10.5,22.118C-10.5,4.132,4.132-10.5,22.118-10.5	c17.985,0,32.618,14.632,32.618,32.618C54.736,40.103,40.103,54.736,22.118,54.736z M22.118-8.288	c-16.765,0-30.406,13.64-30.406,30.406c0,16.766,13.641,30.406,30.406,30.406c16.768,0,30.406-13.641,30.406-30.406 C52.524,5.352,38.885-8.288,22.118-8.288z" />
                     <path fill="#474544"
                        d="M18.022,33.569c 0.282,0-0.566-0.105-0.781-0.323c-0.432-0.431-0.432-1.132,0-1.564l10.022-10.035 			L17.241,11.615c 0.431-0.432-0.431-1.133,0-1.564c0.432-0.432,1.132-0.432,1.564,0l10.803,10.814c0.433,0.432,0.433,1.132,0,1.564 L18.805,33.243C18.59,33.464,18.306,33.569,18.022,33.569z" />
                  </g>
               </g>
            </svg>
         </div>
      </div>
      <!-- End // .directional_nav --> --}}
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            {{-- 
      <div class="carousel-item">
         <img src="{{ asset($bannerdata->image) }}" class="d-block w-100" alt="...">
      </div>
      --}}
            {{-- 
      <div class="carousel-item">
         <img src="..." class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
         <img src="..." class="d-block w-100" alt="...">
      </div>
      --}}
            {{-- 
   </div>
</div>
--}}
            {{-- 
<div class="col-md-6 col-sm-6 col-xs-12 " style="">
   <a href="{{ $bannerdata->name }}" target="_blank"> <img src="{{ asset($bannerdata->image) }}"
      style="height:300px;"></a>
</div>
--}}
            {{-- <iframe width="640" height="360" src="{{ $b->name }}" title="Yug ram raj ka aa gya shubh din ye aaj | Full Video | Hansraj Raghuwanshi | Latest Ram Bhajan 2024" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> --}}
            {{-- <img src="{{ asset('frontend/img/bank_1.jpg') }}" style="height:300px;">
<div class="col-md-6 col-sm-6 col-xs-12">
   <img class="" src="{{ asset('frontend/img/banner-2.png') }}" style="width:100%;height:300px;">
</div>
--}}
            <!-- <script type="template"
   id="homePageR1Template"> <a href="https://www.quickerala.com/products-services-directory" target="_blank" title="Trending products" alt="Trending products"> <img data-qk-el-name="imglazyload" src="https://assets.quickerala.com/ui/build/images/1x1.jpg" data-original-src="https://assets.quickerala.com/ui/build/images/ad-product.jpg" title="Trending products" alt="Trending products"> </a> </script>
                                                                                                                                                                                                                                          <script type="template"
   id="homePageR2Template"> <a href="https://www.quickerala.com/hospitals" target="_blank" title="Book an Appointment" alt="Book an Appointment"> <img data-qk-el-name="imglazyload" src="https://assets.quickerala.com/ui/build/images/1x1.jpg" data-original-src="https://assets.quickerala.com/ui/build/images/ad-hospitals.jpg" title="Book an Appointment" alt="Book an Appointment"> </a> </script> -->
        </div>
    </div>
    <!-- <div class="container-fluid"> -->
    <!-- <div class="w3-content w3-display-container" style="max-width: 1219px;">
               <img class="mySlides2" src="bank_1.jpg" style="width:100%;height:300px;">
               <img class="mySlides2" src="bank_2.jpg" style="width:100%;height:300px;">
               <img class="mySlides2" src="bank_3.jpg" style="width:100%;height:300px;">
               <img class="mySlides2" src="bank_4.jpg" style="width:100%;height:300px;">
               
               <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
               <button class="w3-button w3-black w3-display-right" id="new1slide" onclick="plusDivs(1)">&#10095;</button>
               </div> -->
    <!-- </div> -->
    <script>
        $('.slider').each(function() {
            var $this = $(this);
            var $group = $this.find('.slide_group');
            var $slides = $this.find('.slide');
            var bulletArray = [];
            var currentIndex = 0;
            var timeout;

            function move(newIndex) {
                var animateLeft, slideLeft;

                advance();

                if ($group.is(':animated') || currentIndex === newIndex) {
                    return;
                }

                bulletArray[currentIndex].removeClass('active');
                bulletArray[newIndex].addClass('active');

                if (newIndex > currentIndex) {
                    slideLeft = '100%';
                    animateLeft = '-100%';
                } else {
                    slideLeft = '-100%';
                    animateLeft = '100%';
                }

                $slides.eq(newIndex).css({
                    display: 'block',
                    left: slideLeft
                });
                $group.animate({
                    left: animateLeft
                }, function() {
                    $slides.eq(currentIndex).css({
                        display: 'none'
                    });
                    $slides.eq(newIndex).css({
                        left: 0
                    });
                    $group.css({
                        left: 0
                    });
                    currentIndex = newIndex;
                });
            }

            function advance() {
                clearTimeout(timeout);
                timeout = setTimeout(function() {
                    if (currentIndex < ($slides.length - 1)) {
                        move(currentIndex + 1);
                    } else {
                        move(0);
                    }
                }, 4000);
            }

            $('.next_btn').on('click', function() {
                if (currentIndex < ($slides.length - 1)) {
                    move(currentIndex + 1);
                } else {
                    move(0);
                }
            });

            $('.previous_btn').on('click', function() {
                if (currentIndex !== 0) {
                    move(currentIndex - 1);
                } else {
                    move(3);
                }
            });

            $.each($slides, function(index) {
                var $button = $('<a class="slide_btn">&bull;</a>');

                if (index === currentIndex) {
                    $button.addClass('active');
                }
                $button.on('click', function() {
                    move(index);
                }).appendTo('.slide_buttons');
                bulletArray.push($button);
            });

            advance();
        });
    </script>
    <script>
        $('.slider_right').each(function() {
            var $this = $(this);
            var $group = $this.find('.slide_group_right');
            var $slides = $this.find('.slide_right');
            var bulletArray = [];
            var currentIndex = 0;
            var timeout;

            function move(newIndex) {
                var animateLeft, slideLeft;

                advance();

                if ($group.is(':animated') || currentIndex === newIndex) {
                    return;
                }

                bulletArray[currentIndex].removeClass('active');
                bulletArray[newIndex].addClass('active');

                if (newIndex > currentIndex) {
                    slideLeft = '100%';
                    animateLeft = '-100%';
                } else {
                    slideLeft = '-100%';
                    animateLeft = '100%';
                }

                $slides.eq(newIndex).css({
                    display: 'block',
                    left: slideLeft
                });
                $group.animate({
                    left: animateLeft
                }, function() {
                    $slides.eq(currentIndex).css({
                        display: 'none'
                    });
                    $slides.eq(newIndex).css({
                        left: 0
                    });
                    $group.css({
                        left: 0
                    });
                    currentIndex = newIndex;
                });
            }

            function advance() {
                clearTimeout(timeout);
                timeout = setTimeout(function() {
                    if (currentIndex < ($slides.length - 1)) {
                        move(currentIndex + 1);
                    } else {
                        move(0);
                    }
                }, 4000);
            }

            $('.next_btn').on('click', function() {
                if (currentIndex < ($slides.length - 1)) {
                    move(currentIndex + 1);
                } else {
                    move(0);
                }
            });

            $('.previous_btn').on('click', function() {
                if (currentIndex !== 0) {
                    move(currentIndex - 1);
                } else {
                    move(3);
                }
            });

            $.each($slides, function(index) {
                var $button = $('<a class="slide_btn">&bull;</a>');

                if (index === currentIndex) {
                    $button.addClass('active');
                }
                $button.on('click', function() {
                    move(index);
                }).appendTo('.slide_buttons_right');
                bulletArray.push($button);
            });

            advance();
        });
    </script>
    <div class="content-container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="clearfix mt-5">
                    <div class="col-md-12">
                        <h2 class="nomargintext-left marsmall streaming-title"
                            style="color:rgb(32, 80, 129);font-size:26px !important;">
                            Who's Who Profile
                        </h2>
                        <br>
                    </div>
                </div>
            </div>
            <div class="">
                @foreach ($profile as $profiledata)
                    <div class="col-xs-12 col-sm-6 col-md-4 member featured-member">
                        <div class="well well2"
                            style=" position: relative; border-top: 5px solid rgb(5, 73, 142);border-bottom: 5px solid rgb(5, 73, 142);">

                            <div class="col-xs-4 nopad text-center featured-member-image">
                                {{-- <img src="{{ asset($profiledata->image) }}" width="200"
                                    style="height: 127px;border-radius:0px !important;" alt="Bank ABC"> --}}

                                    @if ($profiledata->image)
                                    <img class="imageclass" src="{{ asset($profiledata->image) }}" style="border-radius: 0px !important; height:auto;width:auto" alt="Bank ABC">
                                @else
                                    <img class="imageclass" src="{{ asset('assets/img/whou/image/dummy.png') }}" style="border-radius: 0px !important; height:auto;" alt="Bank ABC">
                                @endif


                                <a style="" title="Bank ABC - View Listing"
                                    href="{{ asset($profiledata->image) }}">
                                </a>
                            </div>
                            <div class="col-xs-8 norpad small featured-member-info">
                                <h4 class="bold bmargin inline-block" title="Bank ABC - View Listing" href="#"
                                    style="color: rgb(5, 73, 142); width: 100%;
                                    display: -webkit-box;
                                    -webkit-line-clamp: 2;
                                   font-size:16px;
                                    -webkit-box-orient: vertical;
                                    overflow: hidden;">
                                    {{ $profiledata->name }}
                                </h4>
                                <h4 class=""
                                    style=" width: 100%;
                                display: -webkit-box;
                                -webkit-line-clamp: 2;
                               
                                -webkit-box-orient: vertical;
                                overflow: hidden;">
                                    {{ $profiledata->position }}
                                </h4>
                                <h5 class=""
                                    style=" width: 100%;
                                display: -webkit-box;
                                -webkit-line-clamp: 3;
                               
                                -webkit-box-orient: vertical;
                                overflow: hidden;">
                                    {{ $profiledata->roll }}</h5>
                                {{-- <h4 class="profiledata_address clamp-me"> {{ $profiledata->address }} </h4> --}}
                            </div>
                        </div>
                        <a href="{{ route('admin.whous_profile_who_page', $profiledata->id) }}" class=" "
                            style=" position:absolute; right:38px; bottom:38px; float:right;font-size:small;
            background: rgb(5, 73, 142) !important;
            color: white !important; width:fit-content; padding:8px; font-size:14px">
                            Read More</a>
                    </div>
                @endforeach
                <div class="clearfix">
                    <div class="col-md-12 viewall" style="
            margin-top: -1rem;
            ">
                        <a href="{{ route('admin.profile_who') }}"
                            class="view-all-btn-desktop hidden-xs btn btn-info-profile"
                            style="border-radius: 6px;background:rgb(5, 73, 142);color:white;padding: 7px;font-size: 12px;">
                            View All
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.profile_who') }}" class="btn btn-lg btn-info btn-block visible-xs-block"
                            style="border-radius: 6px;background:rgb(5, 73, 142);color:white;padding: 7px;font-size: 12px;width: 23%;
               float: right">View
                            All</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="" style=" margin-top: 50px;margin-right:13px;">
                    <div class="">
                        <div class="col-xs-12" style="padding-right:0px;">
                            @if ($ad->reurl === null)
                                <img class="img-height" src="{{ asset($ad->adimage) }}" style=" width:100%;">
                            @else
                                <img class="img-height" src="{{ $ad->reurl }}" style=" width:100%;">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-container-fluid">
            <div class="container-fluid">
                @if ($newes !== null)
                    <div class="col-md-12">
                        <div style="margin-top:15px"></div>
                        <div class="" style="">
                            <div class="hover1" style=" ">
                                <div style="margin-top:2px;  background-color: #f5f5f5;
                  height:348px !important;
                  border-left:5px solid rgb(32, 80, 129); border-right:5px solid rgb(32, 80, 129);"
                                    class="col-xs-12 col-sm-6 col-md-10 col-lg-10 col-xl-6 member featured-member-info margintp article col-md-6 mb-md-4">
                                    <div class="texttitle"
                                        style="text-align:center;
                     font-size: 30px;
                     background:white;
                     font-weight: 600;
                     margin-top:10px;
                     color:#205081;
                     margin-bottom:10px;
                     ">
                                        Article And Features
                                    </div>
                                    <a class="h4 bold clamp-2" title="Bank ABC - View Listing" href="#"
                                        style="
                     font-size: 18px;
                     font-weight: 700;
                     width: 100%;
                                    display: -webkit-box;
                                    -webkit-line-clamp: 2;
                                   
                                    -webkit-box-orient: vertical;
                                    overflow: hidden;
                     ">
                                        {{ $newes->name }}</a>
                                    <p class="h4 bold" title="Bank ABC - View Listing" href="#"
                                        style="font-size: 17px;color:#204d74;padding-top: 5px;">
                                    </p>
                                    <div class="col-xs-6 nopad text-center featured-member-image">
                                        <img src="{{ asset($newes->image) }}" width="200" alt="Bank ABC"
                                            style="height: 210px;border-radius: 0px;width:100%">
                                        <a title="Bank ABC - View Listing"
                                            href="/manama/conventional-banks-wholesale-1/bank-abc">
                                        </a>
                                    </div>
                                    <div class="col-xs-6 norpad small featured-member- ">
                                        <div class="col-xs-12 norpad             featured-member-news">
                                            <p class="featured-member-news"
                                                style="margin-left:-13px;font-size: 14px; display: -webkit-box;
                           -webkit-line-clamp: 7;
                           -webkit-box-orient: vertical;
                           overflow: hidden;">
                                                {!! $newes->description !!}
                                            </p>
                                        </div>
                                        <a title="Bank ABC - View Listing"
                                            class="tmargin read-btn2 btn btn-sm btn-primary btn-block"
                                            href="{{ route('admin.news_and-event', $newes->id) }}"
                                            style="float:right;font-size: large;padding: 5px;
                        background: rgb(5, 73, 142) !important;    position: absolute;
                        top: 155px;
                        font-size:16px;
                        right: 0px;
                        color: white !important; width: fit-content;">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endif
                @if ($events !== null)
                    {{-- @foreach ($filteredRows as $events) --}}
                    <div class="col-xs-12 col-sm-6 col-md-10 col-lg-10 col-xl-6 member featured-member-info col-md-6 mb-md-4"
                        style="padding:2px;">
                        <div class="well"
                            style=" padding: 0px 44px 37px 10px;border-left:5px solid rgb(32, 80, 129);border-right:5px solid rgb(32, 80, 129);
               background-color: #f5f5f5;
               ">
                            <div class="texttitle"
                                style="text-align:center;
                  font-size: 30px;
                  font-weight: 600;
                  margin-top:10px;
                  margin-bottom:10px;
                  color:#205081;
                  background:white;
                  ">
                                Events
                            </div>
                            <div class="clearfix"></div>
                            <a class="h4 bold" title="Bank ABC - View Listing" href="#"
                                style="
                  font-size: 15px;
                  font-weight: 700;
                  width: 100%;
                        display: -webkit-box;
                        -webkit-line-clamp: 2;
                        
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        font-size:18px;
                  ">
                                {{ $events->name }}</a>
                            <p class="h4 bold" title="Bank ABC - View Listing" href="#"
                                style="font-size: 17px;color:#204d74;padding-top: 5px;">
                                {{-- 20 December 2023 
               </p>
               --}}
                                {{-- {{ \Carbon\Carbon::parse($events->date)->format('d F Y') }}</p> --}}
                            <div class="col-xs-6 nopad text-center featured-member-image widthImage">
                                <img src="{{ asset($events->image) }}" alt="Bank ABC"
                                    style="height: 210px;border-radius: 0px;width:100%">
                                <a title="Bank ABC - View Listing" href="/manama/conventional-banks-wholesale-1/bank-abc">
                                </a>
                            </div>
                            <div class="col-xs-6 norpad small featured-member- width-100">
                                <div class="col-xs-12 norpad  featured-member-">
                                    {{-- 
                     <p style="margin-left:-13px;font-size: 14px;">
                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                        publishing industries for previewing layouts and visual mockups.
                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                        publishing industries for previewing layouts and visual mockups.
                     </p>
                     --}}
                                    <p
                                        style="margin-left:-13px;font-size: 14px;margin-left:-13px;font-size: 14px; display: -webkit-box;
                        -webkit-line-clamp: 7;
                        -webkit-box-orient: vertical;
                        overflow: hidden;">
                                        {!! $events->description !!}
                                    </p>
                                </div>
                                <a title="Bank ABC - View Listing"
                                    class="tmargin ab-btn read-btn2 btn btn-sm btn-primary btn-block"
                                    href="{{ route('admin.news_event', $events->id) }}"
                                    style="width:fit-content; float:right;font-size: large;padding: 5px;
                     background: rgb(5, 73, 142) !important;
                     color: white !important;position: absolute;
                     margin: -26px;
                    
                     font-size:16px;
                     right: 0px; ">Read
                                    More</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                    {{-- 
         <div class="col-xs-12 col-sm-6 col-md-6 member featured-member-info">
            <div class="well"
               style="padding: 11px 20px 15px 20px;border-left:5px solid rgb(32, 80, 129);border-right:5px solid rgb(32, 80, 129);">
               <div class="clearfix"></div>
               <a class="h4 bold" title="Bank ABC - View Listing" href="#"
                  style="
                  font-size: 23px;
                  font-weight: 700;
                  ">
               Article Name Lorem ipsum </a>
               <p class="h4 bold" title="Bank ABC - View Listing" href="#"
                  style="font-size: 17px;color:#204d74;padding-top: 5px;">
                  20 December 2023 
               </p>
               <div class="col-xs-6 nopad text-center featured-member-image">
                  <img src="{{ asset('frontend/img/bank_1.jpg')}}" width="200"
                     alt="Bank ABC" style="height: 210px;border-radius: 0px;width:100%">
                  <a title="Bank ABC - View Listing" href="/manama/conventional-banks-wholesale-1/bank-abc">
                  </a>
               </div>
               <div class="col-xs-6 norpad small featured-member-">
                  <div class="col-xs-12 norpad  featured-member-">
                     <p style="margin-left:-13px;font-size: 14px;">
                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                        publishing industries for previewing layouts and visual mockups.
                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                        publishing industries for previewing layouts and visual mockups.
                     </p>
                  </div>
                  <a title="Bank ABC - View Listing" class="tmargin btn btn-sm btn-primary btn-block"
                     href="{{ route('admin.news_and-event') }}"
                     style="width:40%;float:right;font-size: large;padding: 7px;
                     background: rgb(5, 73, 142) !important;
                     color: white !important;">Read More</a>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
         --}}
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix">
            <div class="col-md-12" style="margin-top: -1.5rem;margin-left: -8px;">
                <a href="{{ route('admin.event') }}" class="view-all-btn-desktop hidden-xs btn btn-info"
                    style="border-radius: 6px;background:rgb(5, 73, 142);color:white;padding: 7px;font-size: 12px;">
                    View All
                </a>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6">
                <a href="{{ route('admin.event') }}" class="btn btn-lg btn-info btn-block visible-xs-block"
                    style="border-radius: 6px;background:rgb(5, 73, 142);color:white;padding: 7px;font-size: 12px;width: 23%;
            float: right">View
                    All</a>
            </div>
            {{-- 
      <div class="clearfix"></div>
      --}}
        </div>
        @endif
        <div class="homepage-section-4" style="padding: 30px 0 40px;">
            <div class="clearfix" id="capa1"></div>
            <div class="content-container-fluid">
                <div class="container-fluid">
                    <style>
                        #slider {
                            position: relative;
                            width: 100%;
                            height: auto;
                            margin: 25px auto;
                            overflow: hidden;
                            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
                        }

                        #slider ul {
                            position: relative;
                            list-style: none;
                            height: auto;
                            width: 10000%;
                            padding: 0;
                            margin: 0;
                            transition: all 750ms ease;
                            left: 0;
                        }

                        #slider ul li {
                            position: relative;
                            height: auto;
                            width: 1%;
                            float: left;
                        }

                        #slider ul li img {
                            width: 100%;
                            height: auto;
                        }

                        #slider #prev,
                        #slider #next {
                            width: 40px;
                            line-height: 40px;
                            font-size: 1.5rem;
                            text-shadow: 0 0 20px rgba(0, 0, 0, 0.6);
                            text-align: center;
                            color: black;
                            background: #f9f7fb;
                            text-decoration: none;
                            position: absolute;
                            top: 50%;
                            transform: translateY(-50%);
                            transition: all 150ms ease;
                        }

                        #slider #prev:hover,
                        #slider #next:hover {
                            background-color: rgba(0, 0, 0, 0.5);
                            text-shadow: 0;
                            color: white;
                        }

                        #slider #prev {}

                        #slider #next {
                            right: 0px;
                        }
                      
                    </style>
                    <div id="slider">
                        <ul id="slideWrap">
                            @foreach ($bottomslide as $bottomslider)
                                <li>
                                    <img src="{{ asset($bottomslider->image) }}" alt="">
                                </li>
                            @endforeach
                        </ul>
                        <button id="prev">&#8810;</button>
                        <button id="next">&#8811;</button>
                    </div>

                </div>
                <script>
                    var responsiveSlider = function() {

                        var slider = document.getElementById("slider");
                        var sliderWidth = slider.offsetWidth;
                        var slideList = document.getElementById("slideWrap");
                        var count = 1;
                        var items = slideList.querySelectorAll("li").length;
                        var prev = document.getElementById("prev");
                        var next = document.getElementById("next");

                        window.addEventListener('resize', function() {
                            sliderWidth = slider.offsetWidth;
                        });

                        var prevSlide = function() {
                            if (count > 1) {
                                count = count - 2;
                                slideList.style.left = "-" + count * sliderWidth + "px";
                                count++;
                            } else if (count = 1) {
                                count = items - 1;
                                slideList.style.left = "-" + count * sliderWidth + "px";
                                count++;
                            }
                        };

                        var nextSlide = function() {
                            if (count < items) {
                                slideList.style.left = "-" + (count * sliderWidth) + "px";
                                count++;
                            } else {
                                slideList.style.left = "0px";
                                count = 1;
                            }
                        };

                        next.addEventListener("click", function() {
                            nextSlide();
                        });

                        prev.addEventListener("click", function() {
                            prevSlide();
                        });

                        setInterval(function() {
                            nextSlide()
                        }, 5000);

                    };
                    $(document).ready(function() {
                        responsiveSlider();
                    });
                    // window.onload = function() {

                    // }
                </script>
                <div class="" id="join-about-modules">
                    <div class="col-md-12 homepage-join-module">
                        <div class="module  text-center nomargin">
                            <div>
                                <h2
                                    style="font-weight: 700;font-size: 28px;/* margin-bottom:10px; */color: rgb(32, 80, 129);">
                                    Are You A Financial Institution Or A Support Service ?
                                </h2>
                                <p style="text-align: center;font-size: 16px;margin-left: 17px;margin-right: 17px;">
                                    The Banking industry has changed into significant transformation in the modern
                                    world. We as Bahrain Banks Directory can support you to get easy accessibility and
                                    convenience to meet all your financial needs. However, as there are many options
                                    available, it can be challenging to choose the finest financial institution and its
                                    solutions that suit your needs. With our directory, we'll guide you through the
                                    process of locating and selecting the finest financial institution as per your
                                    requirements.
                                </p>
                            </div>
                            <div class="clearfix"></div>
                            <a href="{{ route('admin.contact') }}"
                                class="btn join-btn btn-lg tmargin center-block btn-primary"
                                style="
                        font-size: large;background:rgb(5, 73, 142);">Join
                                with
                                Bahrain Banks Directory Today</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix clearfix-lg hidden-md hidden-lg"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <style>
        div.col-md-2 img {
            border-radius: 0px;
            height: 217px;
        }

        /* div.desc {
               padding: 15px;
               text-align: center;
               }
               * {
               box-sizing: border-box;
               }
               .responsive {
               padding: 0 7px;
               float: left;
               width: 15.7%;
               } */
        @media only screen and (max-width: 700px) {
            .responsive {
                width: 49.99999%;
                margin: 6px 0;
            }
            .slider{
                            height: 318px;
                        }
                        .width-100{
                            width: 100%;
                        }
        }

        @media only screen and (max-width: 500px) {
            .responsive {
                width: 100%;
            }
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }
        @media only screen and (max-width: 600px) {
            .instagram-post{
                display: grid;
                gap:8px;
            }
             #slider {
height: auto;
            }
        }
    </style>
    {{-- <div class="content-container-fluid">
        <div class="container-fluid">
            <div class="row" style="">
                <div class="clearfix ">
                    <div class="col-md-12">
                        <h2 class="nomargin text-left streaming-title"
                            style="color:rgb(41, 41, 41);font-size:26px !important;">
                            Instagram Posts
                        </h2>
                        <br>
                    </div>
                </div>
                <div class="d-md-flex flex-md-row">
                    <div class="d-md-flex flex-md-row instagram-post">
                        <?php
                        for ($i = 0; $i < 6; $i++) {
                        ?>
                        <div class="col-md-2 instagram" id="instafeed-container">
                            <a target="_blank" href="https://www.instagram.com/bahrainbanksdirectory/">
                                <img src="{{ asset('frontend/img/slider-1.jpg') }}" alt="Forest" width="600" height="400">
                            </a>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                
                <script src="https://cdn.jsdelivr.net/gh/stevenschobert/instafeed.js@2.0.0rc1/src/instafeed.min.js"></script>
                <script type="text/javascript">
                    var userFeed = new Instafeed({
                        get: 'user',
                        target: "instafeed-container",
                        resolution: 'low_resolution',
                        accessToken: 'YOUR_INSTAGRAM_ACCESS_TOKEN_GOES_HERE'
                    });
                    userFeed.run();
                </script>
                


                @php
                    $social = DB::table('socials')->first();
                @endphp
                <div class="col-md-12">
                    <center> <a title="Bank ABC - View Listing" class="tmargin btn btn-sm btn-primary btn-block"
                            href="https://www.instagram.com/bahrainbanksdirectory/"
                            style="width: fit-content;font-size: 16px;margin-top: 20px;background:rgb(5, 73, 142);"><i
                                style="padding-right: 11px;" class="fa fa-instagram" aria-hidden="true"></i>Follow us on
                            instagram</a></center>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End Content -->
    <div class="clearfix footer-clear-element "></div>
    <!--
               IMPORTANT: This widget contains real Adsense code as a sample to show how this widget functions.  Please replace the current Adsense code below with your own code in order to generate revenue from this ad space.
               
               -->
    <div class="container clearfix text-center footer-banner-ad">
        <ins class="adsbygoogle" style="display:block height: 11px;" data-ad-client="ca-pub-9975807181018080"
            data-ad-slot="4261699163" data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <div class="clearfix clearfix-lg"></div>
    </div>
    <!-- <style type='text/css'>
               .newsletter_row input[type="email"] {
                float: none;
                margin-left: auto;
                margin-right: auto;
                width: 62% !important;
               }
               </style> -->
    <!-- <div class="content-container newsletter_row">
               <div class="container text-center vpad">
                <div class="col-md-12 xs-nopad">
                 <a href="#" data-toggle="modal" data-target="#newsletter_subscribe_modal"
                  class="btn btn-lg newsletter_footer_button col-xs-12 col-md-6 nofloat fpad bold">
                  <div class="col-sm-6 nopad newsletter_button_left">
                   Join Our Newsletter
                  </div>
                  <div class="col-sm-6 nopad newsletter_button_right">
                   Click to Subscribe
                   <i class=\'fa fa-chevron-circle-right fa-fw\'></i>
                  </div>
               
                  <div class="clearfix"></div>
                 </a>
                </div>
               </div>
               </div> -->
    {{-- <a href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202."
   class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a> --}}


    <script>
        function clickButton() {
            let button = document.getElementById('autoSlideAs');
            if (button) {
                button.click();
            }
        }
        setInterval(clickButton, 3000);
    </script>
    <script>
        function clickButton() {
            let button = document.getElementById('autoSlideAs1');
            if (button) {
                button.click();
            }
        }
        setInterval(clickButton, 3000);
    </script>
@endsection
<script>
    function myFunction() {
        var input, filter, div, i, alltables, hasResults;
        alltables = document.querySelectorAll("div[data-name=mytable]");
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        hasResults = false;

        // Clear previous search results
        var searchResultsContainer = document.getElementById("searchResults");
        searchResultsContainer.innerHTML = "";

        // Hide search results if input is empty
        if (filter.trim() === '') {
            searchResultsContainer.style.display = "none";
            return; // Exit function early
        }

        alltables.forEach(function(table) {
            var divs = table.querySelectorAll(".top-category-single, .swiper-slide");
            divs.forEach(function(div) {
                var textContent = div.textContent || div.innerText;
                if (textContent.toUpperCase().indexOf(filter) > -1) {
                    // Create a div for the matching element
                    var resultDiv = document.createElement("div");
                    resultDiv.textContent = textContent;
                    resultDiv.classList.add("search-result");
                    // Append the div to the search results container
                    searchResultsContainer.appendChild(resultDiv);
                    hasResults = true;
                }
            });
        });

        // Show or hide the search results container based on whether there are matching results
        searchResultsContainer.style.display = hasResults ? "block" : "none";
    }
</script>
<style>
    #searchResults {
        display: none;
        border: 1px solid #ccc;
        padding: 10px;
        margin-top: 10px;
    }
</style>
