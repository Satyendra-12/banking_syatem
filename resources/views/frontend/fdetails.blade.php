@extends('frontend.layout.app')


@section('content')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');




        @media screen and (min-width: 601px) and (max-width: 1024px) {
            .fontSize {
                font-size: 20px;
            }

            .btn-primary {
                padding: 7px 10px !important;
            }

            .workingrow {
                margin-left: 67px !important;
                width: 150% !important;
            }
        }

        @media screen and (min-width: 1025px) and (max-width: 1440px) {
            .fontSize {
                font-size: 20px;
            }

        }

        @media screen and (min-width: 1441px) {
            .fontSize {
                font-size: 18px;
            }

            .offerImage {
                width: 693px;
            }
        }

        @media screen and (max-width: 600px) {
            .mobile-dates {
                display: grid;

                width: 155px !important;
                margin-left: 0px !important;
            }

            .workingrow {
                margin-left: 97px !important;
                width: 103%;
            }

            .margin1 {
                margin-left: 48px;
            }

            .managementFeedBack {
                margin-top: 5px;
            }

            .offerImage {
                width: 70vw;
            }
        }

        @media screen and (min-width: 1025px) and (max-width: 1440px) {
            .offerImage {
                width: 600px;
            }
        }

        .dropbtn {
            color: black;
            font-size: 16px;
            border-top: 1px solid;
            cursor: pointer;
            padding-top: 7px;
            padding-bottom: 7px;
            width: 253px;
            text-align: left;

        }

        p {
            margin-bottom: 0px;
        }


        .dropdown {
            padding-left: 15px;
            position: relative;
            display: inline-block;
        }


        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }


        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }


        .dropdown-content a:hover {
            background-color: #f1f1f1
        }


        .dropdown:hover .dropdown-content {
            display: block;
        }


        .dropdown:hover .dropbtn {}

        /* mobile */
        @media screen and (max-width:320px) {
            .well {
                height: auto !important;
            }

            .tab-section {
                width: 65vw;
                margin-left: -50px;
            }

            .bg {
                width: 70vw;
                margin-left: -26px;
            }

            .mediumscren {
                width: 80vw !important;

            }

            .overview {
                width: 50vw;
            }

            .mobile-text {

                margin-left: -54px !important;
            }

            .titlewd {
                margin-left: -47px !important;
            }

        }

        @media screen and (max-width: 599px) {
            .workingrowTab {}

            .phoneandmap {
                display: grid !important;
            }

            .centerContent {
                display: grid;
                place-content: center;
            }

            .keepInImage {
                left: 27%;
            }

            .location {
                width: 60%;
            }

            .mobileIcns {
                display: table-column;

            }

            .mobile-text {
                width: 70vw;
                margin-left: -12px;
            }

            .mobile-btn {
                width: 100%;
            }

            .iconsGroup {
                margin-top: 38px;
            }

            .mediumscren {
                width: 90vw !important;

                margin-top: 10px
            }

            .tab {
                display: grid;
            }

            .overview {
                display: grid !important;
                gap: 2px;

            }


            .sideresponsive {
                width: 70vw !important;
                margin-left: -10px
            }

            .well {
                width: 67vw !important;
                margin-left: -86px;
            }

            .card-body {
                width: 70vw;
                margin-left: -63px;
            }

            .width {
                width: 60vw;
                margin-left: -33px;
            }

            .titlewd {
                width: 60vw;
                margin-left: 4px;
            }

            .tab-section {
                width: 61vw;
                margin-left: 81px;
            }

            .media-center {
                margin-bottom: 15px;
                width: 75vw;
                margin-left: 40px;
            }

        }

        .location {
            width: 80%;
        }

        /* tablet */
        @media screen and (min-width: 600px) and (max-width: 1023px) {
            .tablinks {
                border: 1px solid rgb(32, 80, 129) !important;
            }

            .sideresponsive {
                width: 50vw !important;
                margin-left: 190px;
            }

            .titlewd {
                width: 72vw;
                margin-left: 102px;
            }

            .iconsGroup {
                padding-top: 24px
            }

        }

        @media screen and (min-width: 601px) and (max-width: 1024px) {
            .marginleft {
                display: contents;
            }
        }

        @media screen and (min-width: 1025px) {
            .gallery {
                margin-left: 210px;
            }

            .marginleft {
                margin-left: 180px;
            }

            .marginleft2 {
                margin-left: 206px;
            }
        }

        .font-size {
            font-size: 2.3rem;
        }

        @media screen and (min-width: 600px) and (max-width: 1024px) {
            .font-size {
                font-size: 1.3rem !important;
            }

            .midright {
                right: 18px;
            }


        }

        /* latop */
        @media screen and (min-width: 1025px) and (max-width: 1439px) {
            .midright {
                right: 222px;
            }

            .tab {
                display: flex;
                flex-wrap: wrap;
                border-bottom: 2px
            }

            .tablinks {
                border: 1px solid rgb(32, 80, 129) !important;
            }

            .icons>a {
                margin: 2px;
                margin-top: 2px
            }

            .phone {
                display: flex;
                flex-direction: row-reverse;
                margin-top: 0px;
                "

            }

            .iconsGroup {
                padding: 15px;
            }

            .textconnect {
                font-size: 1.2rem;
            }

            .facebook {
                margin-bottom: 15px;
            }

            .sideresponsive {
                width: 32vw;
            }

            .btm {
                width: 34vw;
            }
        }

        /* extra */
        @media screen and (min-width: 1440px) {
            .phone {
                display: flex;
                flex-direction: row-reverse;
                margin-top: -20px;
                "

            }

            .midright {
                right: 222px;
            }

            .iconsGroup {
                padding-top: 15px
            }

            /* .borderStyle{
                    border: 1px solid blue !important;
                } */
            .textconnect {
                font-size: 1.4rem;
            }
        }

        .phoneandmap {
            display: flex
        }
    </style>

    <div class="container-fluid" style="margin-top:10px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="homepage-sections fr-view">
                    <div class=" w3-display-container">
                        <img class="mySlides2" src="{{ asset('assets/BANNERS/Banking-and-financial-institution-2-02.jpg') }}"
                            style="width:100%;position: relative;height:auto !important;border-radius:0px !important;">

                        {{-- <div class="col-md-12 keepInImage" style="margin-bottom:13px; position: absolute;top:38%;">
                        <h2 class="nomargin text-center streaming-title"
                            style="border-radius:15px;color: #205081;padding: 15px;font-weight: 600;">
                         DETAILS</h2><br>
                    </div> --}}




                    </div>
                </div>
            </div>
            <!-- Slider -->
        </div>
    </div>

    <div class="container" style="margin-top:10px;">
        <div class="row">
            <div class="col-lg-12">
                <div id="main-slider"> <!-- Slider -->

                </div>
            </div>
            <!-- Slider -->

        </div>
    </div>



    <div class="container" style="
    width: 87%;
">
        <div class="row" style="margin-top: 35px;"><input type="hidden" name="id" value="{{ $user->id }}">
            <div class="col-sm-4 centerContent">
                <div class="" style="margin-top: -15px;width:180px;height:150px;"> <img
                        src="{{ asset($users->contact_person) }}" alt="" style="width:100%;height:100%;"
                        class=""></div>

            </div>
            <div class="col-sm-4 midright" style="">

                <h3 class="fontsize" style="font-family: 'Poppins';font-weight:700;">{{ $users->username }}</h3>
                <p style="
                padding-top: 10px;
                font-size: 17px;">
                    <i class="fa fa-map-marker" aria-hidden="true" style="font-size:16px;color:red"></i>
                    {{ $users->location }}
                </p>

            </div>
            <div class="col-sm-4">




                <div class=""
                    style="
                                padding:10px 0px 50px 20px;
                                border-radius: 13px;
                                background-color:rgb(237, 236, 232);
                            ">
                    <h1 class="" style="font-size: 2rem;"><b
                            style="
                                    font-size: 2rem;
                                    font-weight: 600;
                                    font-family: 'Poppins';
                                    color:rgb(32, 80, 129);
                                    ">CATEGORY</b>
                    </h1>
                    <div
                        style="
                            
                                width: 76%;
                                margin-left: 37px;
                            ">
                    </div>

                    <p class="text-bold">
                    </p>
                    <li style="padding-top: 5px;list-style: none;">
                        <b>{{ $subcategory->sub_category_name ?? '' }}</b>

                    </li>
                    <p></p>


                </div>
            </div>



        </div>
    </div>

    <style>
        ::placeholder {
            color: darkgray;
            padding-left: 20px;
            opacity: 1;
            /* Firefox */
        }

        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 16px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background: rgb(5, 73, 142);
            color: white;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border-top: none;
        }

        .tablinks {
            padding: 8px 13.6px !important;
        }

        .overview {
            display: flex;
        }

        @media screen and (min-width: 1440px) {
            .margin1 {
                margin-left: 180px;
                margin-right: 210px;
            }
        }

        @media screen and (min-width: 1025px) and (max-width: 1439px) {
            .margin1 {
                margin-left: 87px;
                margin-right: 87px;
            }
        }


        .hr-container {
            width: 65%;
            margin-left: 8px;
        }
    </style>
    <div class="tab-section" style="margin: 23px;
 
"> <a href="{{ route('admin.financial') }}" class="btn "
            style="display: flex;
 justify-content: center;
 align-items: center;
 width:fit-content;
 margin-top: 5px;
 background:#05498E;">
            <i class="fa fa-caret-left" aria-hidden="true"
                style="font-size: 16px;color:white; font-size: 20px; padding-right: 5px; padding-bottom: 8px; padding-top: 5px;"></i>
            <span style="font-size: 16px;color: white;">Back</span>
        </a>


        <div class="mediumscren"
            style=" margin-top:4px;display:flex;justify-content: center; padding:15px;background:lightgray;">

            <div class="tab borderContainer"
                style="
            color: #000;
            
            background-color: lightgray;
            border-radius:0px;margin-right:2.6px;
            ">



                <button class="tablinks active borderStyle" onclick="openCity(event, 'Overview')"
                    style=" border-radius: 0px;">Overview</button>

                @if ($singlemanagement != null && $singlemanagement->name != null)
                    <button class="tablinks borderStyle" onclick="openCity(event, 'Management')"
                        style=" border-radius: 0px;">Management</button>
                @endif
                @if ($singlefeature != null && $singlefeature->name != null)
                    <button class="tablinks borderStyle" onclick="openCity(event, 'Feature')"
                        style=" border-radius: 0px;">Features</button>
                @endif
                @if ($singlewhou != null && $singlewhou->name != null)
                    <button class="tablinks borderStyle" onclick="openCity(event, 'Whos')"
                        style=" border-radius: 0px;">Who's Who</button>
                @endif
                @if ($singleservice != null && $singleservice->name != null)
                    <button class="tablinks borderStyle" onclick="openCity(event, 'Product')"
                        style=" border-radius: 0px;">Products & Services</button>
                @endif
                @if ($singlebranch != null && $singlebranch->name != null)
                    <button class="tablinks borderStyle" onclick="openCity(event, 'Breanch')"
                        style=" border-radius: 0px;">Branches & ATM</button>
                @endif
                @if ($singlecarrer != null && $singlecarrer->name != null)
                    <button class="tablinks borderStyle" onclick="openCity(event, 'Careers')"
                        style=" border-radius: 0px;">Careers</button>
                @endif
                @if ($singleoffer != null && $singleoffer->image != null)
                    <button class="tablinks borderStyle" onclick="openCity(event, 'Offers')"
                        style=" border-radius: 0px; ">Offers</button>
                @endif
                <button class="tablinks" onclick="openCity(event, 'Reviews')" style="border-radius: 0px;">Reviews</button>
            </div>
        </div>
        <div class="row margin1">
            <div class="col-lg-8">
                {{-- @if ($users != null && $users->short_description != null) --}}
                <div id="Overview" class="tabcontent width" style="display:block";>
                    <div class="row" style="margin: 0px;padding-top: 12px;">
                        <div class="col-12">
                            <h1 class="btn fontSize" style="padding-left: 0px;"><b>Overview</b></h1>
                            <div class="btn overview" style="float:right;padding-top: 12px;"
                                onclick="openCity(event, 'Reviews')">
                                <button type="button" class="btn btn-primary overview"
                                    style="background:rgb(5, 73, 142);color:#fff;margin-right:5px;font-size: 18px;padding: 6px 12px;border-radius: 8px;">Send
                                    Enquiry</button>
                                <button type="button" class="btn btn-primary" class="overview"
                                    style="background:rgb(5, 73, 142);color:#fff;margin-right:5px;font-size: 18px;padding: 6px 12px;border-radius: 8px;">Customer
                                    Feedback</button>


                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row"
                        style="
                        padding-left: 13px;padding-top:20px;
                    ">
                        <div class="w-[100%] ">

                            <h1 class="text-justify mobile-text text-lg font-normal text-slate-600"
                                style="font-size: 18px;line-height: 1.75rem;color: black;">

                                {!! $users->short_description !!}
                            </h1>



                        </div>


                    </div>
                </div>
                {{-- @endif --}}

                @if ($singlemanagement != null && $singlemanagement->name != null)
                    <div id="Management" class="tabcontent" style="">
                        <div class="row" style="margin: 0px;padding-top: 12px;">
                            <div class="col-12" style="padding-left: 0">
                                <h1 class="btn fontSize" style=";padding-left: 0px;"><b>MANAGEMENT</b></h1>
                                <div class="btn"
                                    style="float:right;padding-top: 12px;margin-right: -30px;"onclick="openCity(event, 'Reviews')">
                                    <button type="button" class="btn btn-primary"
                                        style="background:rgb(5, 73, 142);color:#fff;margin-right:5px;font-size: 18px;padding: 6px 12px;border-radius: 8px;">Send
                                        Enquiry</button>
                                    <button type="button" class="btn btn-primary managementFeedBack"
                                        style="background:rgb(5, 73, 142);color:#fff;margin-right:5px;font-size: 18px;padding: 6px 12px;border-radius: 8px;">Customer
                                        Feedback</button>
                                    {{-- <a class="network-icon twitter" itemprop="sameAs"
                                        href="https://www.facebook.com/profile.php?id=100076479276353" target="_blank"
                                        title="BahrainBanksDirectory.com twitter" style="">
                                        <i class="fa fa-print"></i>
                                    </a> --}}

                                </div>
                            </div>
                        </div>
                        <div style="
                                        ">
                            @foreach ($management as $managementdata)
                                <div
                                    style="display: flex; justify-content: start; align-items: center; ,font-size:22px !important;">


                                    <h3 style="padding-top: 30px;font-weight: 600; font-family: 'Poppins'">
                                        {{ $managementdata->name }}</h3>
                                </div>
                                <h5
                                    style="
                            margin-top: 0px;
                            font-family: 'Poppins'
                                                ">
                                    {{ $managementdata->role }}<br>
                                    {{ $managementdata->email }}

                                    <p class="phone">
                                        {{ $managementdata->number }}</p>
                                </h5>
                            @endforeach

                        </div>

                    </div>
                @endif
                @if ($singlefeature != null && $singlefeature->name != null)
                    <div id="Feature" class="tabcontent">
                        <div class="row" style="margin: 0px;padding-top: 12px;">
                            <div class="col-12" style="padding-left: 0;">
                                <h1 class="btn fontSize" style=";padding-left: 0px;"><b>FEATURES</b></h1>
                                <div class="btn" style="float:right;padding-top: 12px;margin-right: -30px;"
                                    onclick="openCity(event, 'Reviews')">
                                    <button type="button" class="btn btn-primary"
                                        style="background:rgb(5, 73, 142);color:#fff;margin-right:5px;font-size: 18px;padding: 6px 12px;border-radius: 8px;">Send
                                        Enquiry</button>
                                    <button type="button" class="btn btn-primary managementFeedBack"
                                        style="background:rgb(5, 73, 142);color:#fff;margin-right:5px;font-size: 18px;padding: 6px 12px;border-radius: 8px;">Customer
                                        Feedback</button>
                                    {{-- <a class="network-icon twitter" itemprop="sameAs"
                                        href="https://www.facebook.com/profile.php?id=100076479276353" target="_blank"
                                        title="BahrainBanksDirectory.com twitter" style="">
                                        <i class="fa fa-print"></i>
                                    </a> --}}

                                </div>
                            </div>
                        </div>
                        <div>
                          @foreach ($feature as $featuredata)
    <div class="card mt-5" style="border: none;">
        <div class="card-body" style="border:1px solid rgb(5, 73, 142); border-radius: 22px;">
            <h5 class="card-title" style="font-weight: bold;">{{ $featuredata->name }}</h5>
            <p class="card-text" style="padding: 15px;padding-top: 2px;">
                <div style="font-size: 18px;">{!! $featuredata->desc !!}</div>
            </p>
        </div>
    </div>
@endforeach

                        </div>
                    </div>
                @endif
                @if ($singlewhou != null && $singlewhou->name != null)
                    <div id="Whos" class="tabcontent">
                        <div class="row" style="margin: 0px;padding-top: 12px;">
                            <div class="col-12" style="padding-left: 15px;">
                                <h1 class="btn fontSize" style=";padding-left: 0px;"><b>WHO'S WHO</b></h1>
                                <div class="btn" style="float:right;padding-top: 12px;margin-right: -30px;"
                                    onclick="openCity(event, 'Reviews')">
                                    <button type="button" class="btn btn-primary"
                                        style="background:rgb(5, 73, 142);color:#fff;margin-right:5px;font-size: 18px;padding: 6px 12px;border-radius: 8px;">Send
                                        Enquiry</button>
                                    <button type="button" class="btn btn-primary"
                                        style="background:rgb(5, 73, 142);color:#fff;margin-right:5px;font-size: 18px;padding: 6px 12px;border-radius: 8px;">Customer
                                        Feedback</button>
                                    {{-- <a class="network-icon twitter" itemprop="sameAs"
                                        href="https://www.facebook.com/profile.php?id=100076479276353" target="_blank"
                                        title="BahrainBanksDirectory.com twitter" style="">
                                        <i class="fa fa-print"></i>
                                    </a> --}}

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-5"
                            style="    display: flex;
                    flex-direction: column-reverse;
                    flex-wrap: wrap;
                    ">
                            @foreach ($whou as $profiledata)
                                {{-- <div class="col-xs-12 col-sm-6 col-md-8 member featured-member">
                                    <div class="well"
                                        style="padding: 10px 20px 20px 10px;border-left:5px solid rgb(32, 80, 129);height: 246px;border-right:5px solid rgb(32, 80, 129);">
                                        <h4 class="bold bmargin inline-block" title="Bank ABC - View Listing"
                                            href="#" style="color: rgb(5, 73, 142);">
                                            {{ $whoudata->name }} </h4>
                            
                                        <div class="col-xs-4 nopad text-center featured-member-image">
                                            <img src="{{ asset($whoudata->image) }}" width="200"
                                                style="height: 157px;border-radius:0px !important;" alt="Bank ABC">
                                            <a title="Bank ABC - View Listing"
                                                href="/manama/conventional-banks-wholesale-1/bank-abc">
                                                <!-- <img class="img-rounded lazyloader" loading="lazy" width="200" height="200"
                                                                                                                                                                                                                                             alt="Bank ABC" data-src="/case-1.jpg"> -->
                                            </a>
                                        </div>
                                        <div class="col-xs-8 norpad small featured-member-info">

                                            <h3 class=" "
                                                style="font-size: 15px;/* color: blue; */ padding-bottom:5px; padding-top:0px;font: icon;margin-top:0px;margin-bottom:32px">
                                                {{ $whoudata->position }}</h3>
                                            <text style="font-size:16px; font-weight: 600;" class="mt-3">
                                                {{ $whoudata->roll }}</text>
                                            <h4 style="font-size:15px;">{{ $whoudata->address }}</h4>
                                            <a href="{{ route('user.who_details', $whoudata->id) }}"
                                                class="tmargin readbtn btn btn-sm btn-primary btn-block"
                                                style=" width: fit-content; float: right;font-size: large;
                                        background: rgb(5, 73, 142);margin-top:4px;">
                                                Read More</a>
                                            <!-- <a title="Bank ABC - View Listing" class="tmargin btn btn-sm btn-primary btn-block"
                                                                            href="http://localhost/bahraia_bank/who-profile">View
                                                                            Listing</a> -->
                                        </div>
                                        <div class="clearfix"></div>

                                    </div>


                                </div> --}}
                                <div class="col-xs-12 col-sm-6 col-md-9 member featured-member">
                                    <div class="well well2"
                                        style=" height: 200px; position: relative; border-top: 5px solid rgb(5, 73, 142);border-bottom: 5px solid rgb(5, 73, 142);">

                                        <div class="col-xs-4 nopad text-center featured-member-image">
                                            <img src="{{ asset($profiledata->image) }}" width="200"
                                                style="height: 127px;border-radius:0px !important;" alt="Bank ABC">
                                            <a style="" title="Bank ABC - View Listing"
                                                href="{{ asset($profiledata->image) }}">
                                            </a>
                                        </div>
                                        <div class="col-xs-8 norpad small featured-member-info">
                                            <h4 class="bold bmargin inline-block" title="Bank ABC - View Listing"
                                                href="#"
                                                style="color: rgb(5, 73, 142); width: 100%;
                                                display: -webkit-box;
                                                -webkit-line-clamp: 2;
                                               font-size:15px;
                                                -webkit-box-orient: vertical;
                                                overflow: hidden;">
                                                {{ $profiledata->name }}
                                            </h4>
                                            <h5 class=""
                                                style=" width: 100%;
                                            display: -webkit-box;
                                            -webkit-line-clamp: 2;
                                           font-size:15px;
                                            -webkit-box-orient: vertical;
                                            overflow: hidden;">
                                                {{ $profiledata->position }}
                                            </h5>
                                            <h5 class=""
                                                style=" width: 100%;
                                            display: -webkit-box;
                                            -webkit-line-clamp: 3;
                                            font-size:13px;

                                            -webkit-box-orient: vertical;
                                            overflow: hidden;">
                                                {{ $profiledata->roll }}</h5>
                                            {{-- <h4 class="profiledata_address clamp-me"> {{ $profiledata->address }} </h4> --}}
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.profile_who_page', $profiledata->id) }}" class=" "
                                        style=" position:absolute; right:38px; bottom:38px; float:right;font-size:small;
                        background: rgb(5, 73, 142) !important;
                        color: white !important; width:fit-content; padding:8px; font-size:14px">
                                        Read More</a>
                                </div>
                            @endforeach

                        </div>



                    </div>
                @endif
                @if ($singleservice != null && $singleservice->name != null)
                    <div id="Product" class="tabcontent">
                        <div class="row" style="margin: 0px;padding-top: 12px;">
                            <div class="col-12" style="padding-left: 0px;">
                                <h1 class="btn fontSize" style="padding-left: 0px;"><b>PRODUCT & SERVICES</b>
                                </h1>
                                <div class="btn" style="float:right;padding-top: 12px;margin-right: -51px;"
                                    onclick="openCity(event, 'Reviews')">
                                    <button type="button" class="btn btn-primary"
                                        style="background:rgb(5, 73, 142);color:#fff;margin-right:5px;font-size: 18px;padding: 6px 12px;border-radius: 8px;">Send
                                        Enquiry</button>
                                    <button type="button" class="btn btn-primary managementFeedBack"
                                        style="background:rgb(5, 73, 142);color:#fff;margin-right:5px;font-size: 18px;padding: 6px 12px;border-radius: 8px;">Customer
                                        Feedback</button>
                                    {{-- <a class="network-icon twitter" itemprop="sameAs"
                                        href="https://www.facebook.com/profile.php?id=100076479276353" target="_blank"
                                        title="BahrainBanksDirectory.com twitter" style="">
                                        <i class="fa fa-print"></i>
                                    </a> --}}

                                </div>
                            </div>
                        </div>
                        <div>
                    @foreach ($service as $servicedata)
    <div class="card mt-5" style="border: none;">
        <div class="card-body" style="border: 1px solid rgb(5, 73, 142); border-radius: 22px;">
            <h5 class="card-title" style="font-weight: bold;">{{ $servicedata->name }}</h5>
            <p class="card-text" style="padding: 15px; padding-top: 2px;">
                <div style="font-size: 18px;">{!! $servicedata->desc !!}</div>
            </p>
        </div>
    </div>
@endforeach



                        </div>
                    </div>
                @endif
                @if ($singlebranch != null && $singlebranch->name != null)
                    <div id="Breanch" class="tabcontent">
                        <div class="row" style="margin: 0px;padding-top: 12px;">
                            <div class="col-12" style="padding-left: 0">
                                <h1 class="btn fontSize" style=";padding-left: 0px;"><b>BRANCHES</b></h1>
                                <div class="btn" style="float:right;padding-top: 12px;margin-right: -30px;"
                                    onclick="openCity(event, 'Reviews')">
                                    <button type="button" class="btn btn-primary"
                                        style="background:rgb(5, 73, 142);color:#fff;margin-right:5px;font-size: 18px;padding: 6px 12px;border-radius: 8px;">Send
                                        Enquiry</button>
                                    <button type="button" class="btn btn-primary managementFeedBack"
                                        style="background:rgb(5, 73, 142);color:#fff;margin-right:5px;font-size: 18px;padding: 6px 12px;border-radius: 8px;">Customer
                                        Feedback</button>
                                    {{-- <a class="network-icon twitter" itemprop="sameAs"
                                        href="https://www.facebook.com/profile.php?id=100076479276353" target="_blank"
                                        title="BahrainBanksDirectory.com twitter" style="">
                                        <i class="fa fa-print"></i>
                                    </a> --}}

                                </div>
                            </div>
                        </div>
                        <div style="
                ">

                            <!-- <div style="display: flex; justify-content: start; align-items: center;"> -->
                            @foreach ($branch as $branchdata)
                                <div class="card mt-5" style="border: none;">
                                    <div class="card-body"
                                        style="border:2px solid rgb(5, 73, 142); border-radius: 22px; padding:10px;">
                                        <h5 class="card-title" style="font-weight: bold;padding: 0px 8px 8px 8px;">
                                            {{ $branchdata->name }}
                                        </h5>
                                        {{-- <h5 class="" style="width:fit-content;padding-left:9px;">
                                            {{ $branchdata->location }}</h5> --}}

                                        <div class="phoneandmap" style="">
                                            <div class="border rounded-full bg-blue-900 flex items-center justify-center"
                                                style="margin-left: 15px;width: 3.2rem;height: 3.2rem;">

                                                <i class="fa fa-phone" aria-hidden="true"
                                                    style="color:#fff; font-size:20px;"></i>
                                            </div>
                                            <h6 class="card-title"
                                                style="padding-left: 10px;font-weight:600;font-size: 20px;margin-top: 13px;">
                                                {{ $branchdata->number }}
                                            </h6>


                                        </div>
                                        <div class="map" style="display:flex">
                                            <div class="border rounded-full bg-blue-900 flex items-center justify-center"
                                                style="margin-left: 15px;width: 3.2rem;height: 3.2rem;">

                                                <a href ="{{ $branchdata->location }}" target="_blank"> <i
                                                        class="fa fa-map-marker" aria-hidden="true"
                                                        style="color:#fff; font-size:20px;"></i></a>
                                            </div>
                                            {{-- <input type="text" id="fname" name="fname"
                                            style="border: 1px solid;width:64%;margin-top: 8px;margin-bottom: 5px;background: lightgray;margin-left:10px;border-radius: 0px;"
                                            placeholder="Google Map Location Pin Link"><br> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <h1 class="btn mt-5" style="font-size: 23px;margin-left: -11px;"><b>ATM</b></h1>
                            @foreach ($atm as $atms)
                                <div class="card mt-3" style="border: none;">
                                    <div class="card-body"
                                        style="border:2px solid rgb(5, 73, 142); border-radius: 22px; padding:10px;">
                                        <h5 class="card-title" style="font-weight: bold;padding: 0px 8px 8px 8px;">
                                            {{ $atms->name }}
                                        </h5>

                                        {{-- <h5 class="location" style="padding: 0px 0px 0px 8px;">
                                            {{ $atms->location }}</h5> --}}

                                        <div class="map" style="display:flex">
                                            <div class="border rounded-full bg-blue-900 flex items-center justify-center"
                                                style="margin-left: 15px;width: 3.2rem;height: 3.2rem;">
                                                <a href ="{{ $atms->location }}" target="_blank"> <i
                                                        class="fa fa-map-marker" aria-hidden="true"
                                                        style="color:#fff; font-size:20px;"></i></a>

                                            </div>
                                            {{-- <input type="text" id="fname" name="fname"
                                                style="border: 1px solid;width:64%;margin-top: 8px;margin-bottom: 5px;background: lightgray;margin-left:10px;border-radius: 0px;"
                                                placeholder="Google Map Location Pin Link"><br> --}}
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                            {{-- @foreach ($atm as $atms)
                                <div class="card mt-3" style="border: none;">
                                    <div class="card-body"
                                        style="border:2px solid rgb(5, 73, 142); border-radius: 22px; padding:10px;">
                                        <h5 class="card-title" style="font-weight: bold;padding: 0px 8px 8px 8px;">
                                            {{ $atms->name }}
                                        </h5>
                                        <h5 class="" style="padding: 0px 0px 0px 8px;width:40%;">
                                            {{ $atms->location }}</h5>

                                        <div class="" style="display:flex;">

                                            <input type="text" id="fname" name="fname"
                                                style="border: 1px solid;width: 100%;margin-bottom: 5px;background: lightgray;margin-left: 7px;border-radius: 0px;padding: 9px 0px 9px 0px;"
                                                placeholder="Google Map Location Pin Link"><br>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            --}}


                        </div>


                    </div>
                @endif
                @if ($singlecarrer != null && $singlecarrer->name != null)
                    <div id="Careers" class="tabcontent">
                        <div class="row" style="margin: 0px;padding-top: 12px;">
                            <div class="col-12" style="padding-left: 0">
                                <h1 class="btn fontSize" style=";padding-left: 0px;"><b>CAREERS</b></h1>
                                <div class="btn" style="float:right;padding-top: 12px;margin-right: -30px;"
                                    onclick="openCity(event, 'Reviews')">
                                    <button type="button" class="btn btn-primary"
                                        style="background:rgb(5, 73, 142);color:#fff;margin-right:5px;font-size: 18px;padding: 6px 12px;border-radius: 8px;">Send
                                        Enquiry</button>
                                    <button type="button" class="btn btn-primary managementFeedBack"
                                        style="background:rgb(5, 73, 142);color:#fff;margin-right:5px;font-size: 18px;padding: 6px 12px;border-radius: 8px;">Customer
                                        Feedback</button>
                                    {{-- <a class="network-icon twitter" itemprop="sameAs"
                                        href="https://www.facebook.com/profile.php?id=100076479276353" target="_blank"
                                        title="BahrainBanksDirectory.com twitter" style="">
                                        <i class="fa fa-print"></i>
                                    </a> --}}

                                </div>
                            </div>
                        </div>
                        <div>

                            <!-- <div style="display: flex; justify-content: start; align-items: center;"> -->

                            <div class="card mt-5" style="border: none;">
                                <div class="card-body mt-5"
                                    style="border:2px solid rgb(5, 73, 142); border-radius: 22px;">
                                    <h3 class="card-title" style="font-weight: bold;padding: 10px 15px 0px 15px;">Looking
                                        for
                                        a Promising
                                        Career Path?</h3>
                                    <h6 class="" style="padding-left: 15px;margin-top: 0px;">Join Our Team
                                        Today!</h6>
                                    <h5 class="card-title"
                                        style="
                               padding-top: 15px;
                               margin-left: 15px;
                               font-weight:bold;
                               border-bottom: 1px solid cornflowerblue;
                               width:95%;
                               border-radius:0px;
                               padding-bottom: 10px;
                               ">
                                        VACANCIES AVAILABLE:</h5>
@foreach ($carrer as $carrerdata)
    <div class="card mt-5" style="border: none;">
        <div class="card-body" style="border:1px solid rgb(5, 73, 142); border-radius: 22px;">
            <h5 class="card-title" style="font-weight: bold;">{{ $carrerdata->name }}</h5>
            <p class="card-text" style="padding-inline: 35px;margin-bottom:10px;margin-top: -24px;">
                <text style="padding-bottom: 10px;">
                    <div style="font-size: 18px;">{!! $carrerdata->desc !!}</div>
                </text>
            </p>
        </div>
    </div>
@endforeach

                                </div>
                            </div>


                        </div>
                    </div>
                @endif
                @if ($singleoffer != null && $singleoffer->image != null)
                    <div id="Offers" class="tabcontent">
                        <div class="row" style="margin: 0px;padding-top: 12px;">
                            <div class="offerImage" style="padding-left: 0">
                                <h1 class="btn fontSize" style=";padding-left: 0px;"><b>OFFERS</b></h1>
                                <div class="btn" style="float:right;padding-top: 12px;margin-right: -30px;"
                                    onclick="openCity(event, 'Reviews')">
                                    <button type="button" class="btn btn-primary"
                                        style="background:rgb(5, 73, 142);color:#fff;margin-right:5px;font-size: 18px;padding: 6px 12px;border-radius: 8px;">Send
                                        Enquiry</button>
                                    <button type="button" class="btn btn-primary"
                                        style="background:rgb(5, 73, 142);color:#fff;margin-right:5px;font-size: 18px;padding: 6px 12px;border-radius: 8px;">Customer
                                        Feedback</button>
                                    {{-- <a class="network-icon twitter" itemprop="sameAs"
                            href="https://www.facebook.com/profile.php?id=100076479276353" target="_blank"
                            title="BahrainBanksDirectory.com twitter" style="">
                            <i class="fa fa-print"></i>
                        </a> --}}

                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="row">


                                <div class="container">
                                    @foreach ($offer as $offerimage)
                                        <div class="mySlides offerImage" style=" height:285px;">
                                            {{-- <div class="numbertext">{{ $offerimage->id }} / 6</div> --}}

                                            <img src="{{ asset($offerimage->image) }}" style="width:100%; height:100%;">
                                        </div>
                                    @endforeach


                                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                                    <a class="next" onclick="plusSlides(1)">❯</a>



                                    <div class="row offerImage" style="margin-top:20px;">
                                        @foreach ($offer as $offerimage)
                                            <div class="column" style="width:97px; height:50px;">
                                                <img class="demo cursor" src="{{ asset($offerimage->image) }}"
                                                    style="width:100%; height:100%;"
                                                    onclick="currentSlide({{ $offerimage->id }})" alt="">
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <style>
                                img {
                                    vertical-align: middle;
                                }

                                /* Position the image container (needed to position the left and right arrows) */
                                .container {
                                    position: relative;
                                }

                                /* Hide the images by default */
                                .mySlides {
                                    display: none;
                                }

                                /* Add a pointer when hovering over the thumbnail images */
                                .cursor {
                                    cursor: pointer;
                                }

                                /* Next & previous buttons */
                                .prev,
                                .next {
                                    cursor: pointer;
                                    position: absolute;
                                    top: 40%;
                                    width: auto;
                                    padding: 16px;
                                    margin-top: -50px;
                                    color: white;
                                    font-weight: bold;
                                    font-size: 20px;
                                    border-radius: 0 3px 3px 0;
                                    user-select: none;
                                    -webkit-user-select: none;
                                }

                                /* Position the "next button" to the right */
                                .next {
                                    right: 0;
                                    border-radius: 3px 0 0 3px;
                                }

                                /* On hover, add a black background color with a little bit see-through */
                                .prev:hover,
                                .next:hover {
                                    background-color: transparent;
                                }

                                /* Number text (1/3 etc) */
                                .numbertext {
                                    color: #f2f2f2;
                                    font-size: 12px;
                                    padding: 8px 12px;
                                    position: absolute;
                                    top: 0;
                                }

                                /* Container for image text */
                                .caption-container {
                                    margin-top: 30px;
                                    text-align: center;
                                    /* background-color: #222; */
                                    /* padding: 2px 16px; */
                                    color: white;
                                }

                                .row:after {
                                    content: "";
                                    display: table;
                                    clear: both;
                                }

                                /* Six columns side by side */
                                .column {
                                    float: left;
                                    width: 16.66%;
                                }

                                /* Add a transparency effect for thumnbail images */
                                .demo {
                                    opacity: 0.6;
                                }

                                .active,
                                .demo:hover {
                                    opacity: 1;
                                }

                                .centerMedia {
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                }
                            </style>
                            <script>
                                let slideIndexBottom = 1;
                                showSlides(slideIndexBottom);

                                function plusSlides(n) {
                                    showSlides(slideIndexBottom += n);
                                }

                                function currentSlide(n) {
                                    showSlides(slideIndexBottom = n);
                                }

                                function showSlides(n) {
                                    let i;
                                    let slides = document.getElementsByClassName("mySlides");
                                    let dots = document.getElementsByClassName("demo");
                                    let captionText = document.getElementById("caption");
                                    if (n > slides.length) {
                                        slideIndexBottom = 1
                                    }
                                    if (n < 1) {
                                        slideIndexBottom = slides.length
                                    }
                                    for (i = 0; i < slides.length; i++) {
                                        slides[i].style.display = "none";
                                    }
                                    for (i = 0; i < dots.length; i++) {
                                        dots[i].className = dots[i].className.replace(" active", "");
                                    }
                                    slides[slideIndexBottom - 1].style.display = "block";
                                    dots[slideIndexBottom - 1].className += " active";
                                }
                            </script>


                        </div>
                    </div>
                @endif
                <div id="Reviews" class="tabcontent">
                    <div class="row" style="margin: 0px;padding-top: 12px;">
                        <div class="col-12" style="padding-left: 0">
                            <h1 class="btn fontSize" style=";padding-left: 0px;"><b>REVIEWS</b></h1>
                            <div class="btn" style="float:right;padding-top: 12px;margin-right: -30px;"
                                onclick="openCity(event, 'Reviews')">
                            </div>
                        </div>
                    </div>

                    <style>
                        .star-rating {
                            font-size: 24px;
                        }

                        .star {
                            cursor: pointer;
                        }

                        .star:hover,
                        .star.active {
                            color: gold;
                        }
                    </style>


                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            const starContainers = document.querySelectorAll(".star-rating");

                            starContainers.forEach(function(container) {
                                const stars = container.querySelectorAll(".star");
                                const ratingInput = container.querySelector(".rating-input");

                                stars.forEach(function(star) {
                                    star.addEventListener("click", function() {
                                        const ratingValue = parseInt(star.getAttribute("data-rating"));
                                        ratingInput.value = ratingValue;

                                        // Remove active class from all stars
                                        stars.forEach(function(s) {
                                            s.classList.remove("active");
                                        });

                                        // Add active class to clicked star and all previous stars
                                        for (let i = 0; i < ratingValue; i++) {
                                            stars[i].classList.add("active");
                                        }
                                    });
                                });
                            });
                        });
                    </script>
                    @php
                        $id = Route::current()->parameter('id');
                        // echo $id;
                    @endphp
                    <script>
                        $(function() {


                            $('#addratting').on('submit', function(e) {
                                e.preventDefault()
                                //  alert('your review submit successfully');

                                let fd = new FormData(this)
                                fd.append('_token', "{{ csrf_token() }}");
                                $.ajax({
                                    url: "{{ route('admin.ratingstore', ['id' => $id]) }}",
                                    type: "POST",
                                    data: fd,
                                    dataType: 'json',
                                    processData: false,
                                    contentType: false,
                                    beforeSend: function() {
                                        $('#login-button').prop('disabled', true);
                                        $('.loader').show();
                                    },
                                    success: function(result) {
                                        if (result.status) {
                                            iziToast.success({
                                                title: '',
                                                message: result.msg,
                                                position: 'topRight'
                                            });
                                            setTimeout(function() {
                                                window.location.href =
                                                    "{{ route('admin.details-page', ['id' => $id]) }}" +
                                                    result.routeName;
                                            }, 500);
                                        } else {
                                            iziToast.error({
                                                title: '',
                                                message: result.msg,
                                                position: 'topRight'
                                            });
                                        }
                                    },
                                    complete: function() {
                                        $('.loader').hide();
                                    },
                                    error: function(jqXHR, exception) {
                                        $('.loader').hide();
                                        // console.log(jqXHR.responseText);
                                    }
                                });
                            })
                        });
                    </script>
                  
                    <form id="addratting">
                        <h3 style="font-weight:600;font-size:20px;">Rate your experience</h3>
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif      
                        <div class="row" style="text-align:center;">
                            <div class="col-md-4"><input type="hidden" name="id" value="{{ $user->id }}">
                                <h3 style="font-size: 17px;font-weight: 600;color:blue" class="star-rating">OVERALL RATING
                                </h3>
                                <div class="star-rating" data-rating-id="1">
                                    <div class="fa fa-star-o star" data-rating="1"></div>
                                    <div class="fa fa-star-o star" data-rating="2"></div>
                                    <div class="fa fa-star-o star" data-rating="3"></div>
                                    <div class="fa fa-star-o star" data-rating="4"></div>
                                    <div class="fa fa-star-o star" data-rating="5"></div>
                                    <input type="hidden" name="ratings1" class="rating-input" value="0">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h3 style="font-size: 17px;font-weight: 600;color:blue">EXPERTISE</h3>
                                <div class="star-rating" data-rating-id="2">
                                    <div class="fa fa-star-o star" data-rating="1"></div>
                                    <div class="fa fa-star-o star" data-rating="2"></div>
                                    <div class="fa fa-star-o star" data-rating="3"></div>
                                    <div class="fa fa-star-o star" data-rating="4"></div>
                                    <div class="fa fa-star-o star" data-rating="5"></div>
                                    <input type="hidden" name="ratings2" class="rating-input" value="0">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h3 style="font-size: 17px;font-weight: 600;color:blue">COMMUNICATION</h3>
                                <div class="star-rating" data-rating-id="3">
                                    <div class="fa fa-star-o star" data-rating="1"></div>
                                    <div class="fa fa-star-o star" data-rating="2"></div>
                                    <div class="fa fa-star-o star" data-rating="3"></div>
                                    <div class="fa fa-star-o star" data-rating="4"></div>
                                    <div class="fa fa-star-o star" data-rating="5"></div>
                                    <input type="hidden" name="ratings3" class="rating-input" value="0">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h3 style="font-size: 17px;font-weight: 600;color:blue">SERVICE</h3>
                                <div class="star-rating" data-rating-id="4">
                                    <div class="fa fa-star-o star" data-rating="1"></div>
                                    <div class="fa fa-star-o star" data-rating="2"></div>
                                    <div class="fa fa-star-o star" data-rating="3"></div>
                                    <div class="fa fa-star-o star" data-rating="4"></div>
                                    <div class="fa fa-star-o star" data-rating="5"></div>
                                    <input type="hidden" name="ratings4" class="rating-input" value="0">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <h3 style="font-size: 17px;font-weight: 600;color:blue">RESULTS</h3>
                                <div class="star-rating" data-rating-id="5">
                                    <div class="fa fa-star-o star" data-rating="1"></div>
                                    <div class="fa fa-star-o star" data-rating="2"></div>
                                    <div class="fa fa-star-o star" data-rating="3"></div>
                                    <div class="fa fa-star-o star" data-rating="4"></div>
                                    <div class="fa fa-star-o star" data-rating="5"></div>
                                    <input type="hidden" name="ratings5" class="rating-input" value="0">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h3 style="font-size: 17px;font-weight: 600;color:blue">RESPONSIVENESS</h3>
                                <div class="star-rating" data-rating-id="6">
                                    <div class="fa fa-star-o star" data-rating="1"></div>
                                    <div class="fa fa-star-o star" data-rating="2"></div>
                                    <div class="fa fa-star-o star" data-rating="3"></div>
                                    <div class="fa fa-star-o star" data-rating="4"></div>
                                    <div class="fa fa-star-o star" data-rating="5"></div>
                                    <input type="hidden" name="ratings6" class="rating-input" value="0">
                                </div>
                            </div>

                        </div>



                        <br><br>
                        <div class="col-md-12" style="padding-left:0">
                            <h3 style="font-weight:600;font-size:20px;">Review your experience</h3>
                            <textarea name="reviews" class="form-control"
                                style="
              width: 100%;
              border: 1px solid blue;
              height: 145px;
              border-radius: 15px;
          "></textarea>
                        </div>
                        <div class="col-md-6"
                            style="
            padding-top: 15px;
            padding-left:0;
        ">
                            <h3 style="font-weight:600;font-size:20px;">Name</h3>
                            <input name="name" class="form-control"
                                style="
              width: 100%;
              height:40px;
              border: 1px solid blue;
              border-radius: 15px;
          "></input>
                        </div>
                        <div class="col-md-6" style="
            padding-top: 15px;
        ">
                            <h3 style="font-weight:600;font-size:20px;">Mobile</h3>
                            <input name="phone_number" class="form-control"
                                style="
                    width: 100%;
                    height:40px;
                    border: 1px solid blue;
                    border-radius: 15px;
                "></input>
                        </div>
                        <div class="col-md-12"
                            style="
            padding-top: 15px;
            padding-left:0;
        ">
                            <h3 style="font-weight:600;font-size:20px;">Email</h3>
                            <input name="email" class="form-control"
                                style="
                    width: 100%;
                    height:40px;
                    border: 1px solid blue;
                    border-radius: 15px;
                "></input>
                        </div>
                        <div class="col-md-12" style="
                padding-top: 15px;
            ">
                            <button type="submit" class="btn btn-primary"
                                style="background:rgb(5, 73, 142);float:right;color:#fff;font-size: 18px;padding: 6px 35px;border-radius: 8px;">SUBMIT</button>
                        </div>
                    </form>
                </div>

            </div>

            <div class="col-sm-4">
                <div class="titlewd"
                    style="
                    padding: 8px;
                    border-radius: 13px;
                    /* background-color:rgb(237, 236, 232); */ ">
                    <h1 style="text-align: center;font-size: 2rem;"><text class='textconnect'
                            style="font-family:'Poppins'">Connect
                            Digitally With Us</text></h1>
                    <div style=" border: 1px solid lightgray;">
                    </div>

                    <p>
                        @php
                            $social = DB::table('socials')->first();
                        @endphp
                        <li class="icons iconsGroup" style="list-style: none;text-align: center; ">
                            <div class="mobileIcns" style="margin-top: 10px">

                                <a class="network-icon facebook " itemprop="sameAs" href="{{ $social->flink }}"
                                    target="_blank" title="BahrainBanksDirectory.com Facebook" style="margin-top: -7px;">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a class="network-icon twitter" itemprop="sameAs" href="{{ $social->tlink }}"
                                    target="_blank" title="BahrainBanksDirectory.com twitter" style="margin-top: -7px;">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a class="network-icon youtube" itemprop="sameAs" href="{{ $social->ylink }}"
                                    target="_blank" title="BahrainBanksDirectory.com youtube" style="margin-top: -7px;">
                                    <i class="fa fa-youtube"></i>
                                </a>



                                <a class="network-icon instagram" itemprop="sameAs" href="{{ $social->ilink }}"
                                    target="_blank" title="BahrainBanksDirectory.com Instagram"
                                    style="margin-top: -7px;">
                                    <i class="fa fa-instagram"></i>
                                </a>

                                <a class="network-icon linkedin" itemprop="sameAs" href="{{ $social->llink }}"
                                    target="_blank" title="BahrainBanksDirectory.com linkedin" style="margin-top: -7px;">
                                    <i class="fa fa-linkedin"></i>
                                </a>

                                <a class="network-icon whatsapp" itemprop="sameAs" href="{{ $social->wlink }}"
                                    target="_blank" title="BahrainBanksDirectory.com whatsapp" style="margin-top: -7px;">
                                    <i class="fa fa-whatsapp"></i>
                                </a>
                            </div>
                        </li>
                    </p>


                </div>




                <div class="col-lg-12 sideresponsive" style="padding:15px; margin-bottom:10px;">

                    <div class=" bg-slate-100 rounded-md bg" style="border-radius:15px;">
                        <div class="flex flex-col justify-center items-center" style="font-family:Poppins;">
                            <h1 class="font-bold text-lg mt-6" style="font-size: 15px;">CONTACT DETAILS</h1>

                            <div class="border rounded-full bg-blue-900 flex items-center justify-center"
                                style="
                              width: 3.5rem;margin-top:1rem !important;
                                    height: 3.5rem;
                                          ">

                                <i class="fa fa-map-marker" aria-hidden="true" style="color:#fff; font-size:20px;"></i>
                            </div>
                            <h5 class="text-slate-900 text-center mt-5"
                                style="
                    width: 75%;margin-top:1rem !important; font-family:'Poppins'
                ">
                                {{ $users->location }}</h5>
                            <a href ="{{ $users->maps }}" target="_blank"> <button type="button"
                                    class="btn btn-primary mobile-btn"
                                    style="background:rgb(5, 73, 142);color:#fff;font-size: 18px;font-family:'Poppins';padding: 6px 12px;border-radius: 8px;">Open
                                    in Google Maps</button></a>
                            <div class="border rounded-full bg-blue-900 flex items-center justify-center"
                                style="
                                          width: 3.5rem;
                                                           height: 3.5rem;margin-top:45px;
">

                                <i class="fa fa-phone" aria-hidden="true" style="color:#fff; font-size:20px;"></i>
                            </div>
                            <h4 class="text-slate-900 mt-5" style="margin-top:1rem !important;font-family:'Poppins';">
                                {{ $users->phone_number }}</h4>
                            {{-- <h4 class="text-slate-900" style="
    margin-top: -2px !important;
">+973
                        1245 4521</h4> --}}

                            <div class="border rounded-full bg-blue-900 flex items-center justify-center mt-10"
                                style="
    width: 3.5rem;
    height: 3.5rem;
    font-family:'Poppins';
">

                                <a href="mailto:{{ $users->email }}" style="color:#fff;">
                                    <i class="fa fa-envelope-o" aria-hidden="true" style="font-size:20px;"></i>
                                </a>
                            </div>
                            <div class="text-slate-900 mt-2 "
                                style="font-family:'Poppins';width:100%; text-align:center; font-weight: 400;font-size: 20px;">
                                {{ $users->email }}</div>

                            <div class="border rounded-full bg-blue-900 flex items-center justify-center mt-10"
                                style="
    width: 3.5rem;
    height: 3.5rem;
">
                                <a href="https://{{ $users->website }}" target="_blank"
                                    style="color:#fff; text-decoration:none;">

                                    <i class="fa fa-globe" aria-hidden="true" style="color:#fff; font-size:20px;"></i>
                                </a>
                            </div>
                            <div class="text-slate-900 mt-3"
                                style="margin-bottom:20px; font-family:'Poppins';text-align:center;width:100%; font-weight:400;font-size:20px;">
                                {{ $users->website }}

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .responsive-map {
                overflow: hidden;
                padding-bottom: 56.25%;
                position: relative;
                height: 0;
                margin-top: 0px;
                /* width: 157%; */

            }

            .responsive-map iframe {
                left: 0;
                top: 0;
                height: 100%;
                width: 100%;
                position: absolute;
            }

            .workingrow {
                margin-left: 192px;
                width: 103%
            }
        </style>
        

        {{-- <div class="tabcontent" style="margin-top:2rem;" id="map">
            <div class="responsive-map">

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2822.7806761080233!2d-93.29138368446431!3d44.96844997909819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b32b6ee2c87c91%3A0xc20dff2748d2bd92!2sWalker+Art+Center!5e0!3m2!1sen!2sus!4v1514524647889"
                    width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div> --}}


        <h2 class="text-slate-900 gallery"
            style="font-weight:700;font-size:18px !important;font-family: `Poppins`, sans-serif;


        ">Media Gallery
        </h2>
        <div class="centerMedia">
            <div class="marginleft">
                @php $count = 0; @endphp
                @foreach ($media as $mediadata)
                    @if ($count < 3)
                        <div class="col-md-5  media-center">
                            {!! $mediadata->youtube_link !!}
                        </div>
                        @php $count++; @endphp
                    @else
                    @break
                @endif
            @endforeach
        </div>
    </div>

    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";

            if (cityName === 'Breanch') {
                document.getElementById('map').style.display = "block";
            } else {
                document.getElementById('map').style.display = "none";
            }
            // if (cityName === 'Reviews') {
            //     document.getElementById('Reviews').style.display = "block";
            // } else {
            //     document.getElementById('Reviews').style.display = "none";
            // }

        }
    </script>
    <div class="" style="
    margin-top: 3rem;
">
        <div>
            <div class="">
                <div class=" hr-container" style=" marin-let:3px;">
                    <h2 class="text-slate-900 marginleft2"
                        style="margin-bottom:1rem; font-size:18px;font-weight:700;">Working
                        Hours</h2>


                    <div class="row workingrow">
                        {{-- echo($workinghour); --}}
                        @foreach ($workinghour as $hour)
                            @if ($hour->opentime != null)
                                <div class="col-md-2 mobile-dates"
                                    style="
                    margin-left:13px;margin-bottom:10px;
                    border-radius: 0px;
                    padding: 7px;width: 18.8%;
                    height: 15%;background-color: rgb(30 58 138);
                    ">
                                    <div class="text-center">
                                        <p class="text-lg font-medium text-white">{{ $hour->day }}</p>


                                        {{-- $carbonTime = Carbon::parse($hour->opentime);

                            $formattedTime = $carbonTime->format('g:i A'); --}}
                                        <p class="text-lg font-medium text-white">
                                            {{ \Carbon\Carbon::parse($hour->opentime)->format('g:i A') }} -
                                            {{ \Carbon\Carbon::parse($hour->closetime)->format('g:i A') }}</p>
                                    </div>

                                </div>
                            @else
                                <div class="col-md-2 "
                                    style="
                    margin-left:13px;margin-bottom:10px;
                    border-radius: 0px;
                    padding: 7px;width: 18.8%;
                    height: 15%;background-color: rgb(30 58 138);
                    ">
                                    <div class="text-center">
                                        <p class="text-lg font-medium text-white">{{ $hour->day }}</p>

                                        <p class="text-lg font-medium text-white">CLOSED</p>

                                    </div>

                                </div>
                            @endif
                        @endforeach


                        {{-- <div class="bg-blue-900"
                            style="
                        width: 120%;
                        border-radius: 0px;
                        padding: 7px;
                        height: 15%;
                        ">
                            <div class="text-center">
                                <p class="text-lg font-medium text-white">Monday</p>
                                <p class="text-lg font-medium text-white">08:30 AM - 03:30 PM</p>
                            </div>

                        </div>

                        <div class="bg-blue-900"
                            style="
                        width: 120%;
                        border-radius: 0px;
                        padding: 7px;
                        height: 15%;
                        ">
                            <div class="text-center">
                                <p class="text-lg font-medium text-white">Tuesday</p>
                                <p class="text-lg font-medium text-white">08:30 AM - 03:30 PM</p>
                            </div>

                        </div>
                        <div class="bg-blue-900"
                            style="
                        width: 120%;
                        border-radius: 0px;
                        padding: 7px;
                        height: 15%;
                        ">

                            <div class="text-center">
                                <p class="text-lg font-medium text-white">Wednesday</p>
                                <p class="text-lg font-medium text-white">08:30 AM - 03:30 PM</p>
                            </div>

                        </div>
                        <div class="bg-blue-900"
                            style="
                        width: 120%;
                        border-radius: 0px;
                        padding: 7px;
                        height: 15%;
                        ">
                            <div class="text-center">
                                <p class="text-lg font-medium text-white">Thrusday</p>
                                <p class="text-lg font-medium text-white">08:30 AM - 03:30 PM</p>
                            </div>

                        </div> --}}
                    </div>
                </div>
            </div>
            {{-- <div class="flex">
                <div class="" style="width:39%">
                    <div class="flex mt-5 gap-x-5">
                        <div class="bg-blue-900"
                            style="
                        width: 120%;
                        border-radius: 0px;
                        padding: 7px;
                        height: 15%;
                        ">
                            <div class="text-center">
                                <p class="text-lg font-medium text-white">Friday</p>
                                <p class="text-lg font-medium text-white">CLOSED</p>
                            </div>

                        </div>
                        <div class="bg-blue-900"
                            style="
                        width: 120%;
                        border-radius: 0px;
                        padding: 7px;
                        height: 15%;
                        ">
                            <div class="text-center">
                                <p class="text-lg font-medium text-white">Saturday</p>
                                <p class="text-lg font-medium text-white">CLOSED</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div> --}}

        </div>

    </div>
</div>

<div class="clearfix footer-clear-element "></div>
{{-- 
<div class="container mt-5"
    style="display: flex ;flex-direction: column-reverse;flex-wrap: wrap;align-content: center;">
    <div class="col-sm-4 mt-5 btm">
        <div class=""
            style="
                            padding: 8px;
                            border-radius: 13px;
                            background-color:rgb(237, 236, 232);border:1px solid;
                        ">
            <h1 class='' style="text-align: center;font-size: 2rem;"><b
                    style="font-size: 1.4rem;
                                font-weight: 600;">Share This Page</b>
            </h1>
            <div
                style="
                            border:1px solid black;
                            width: 76%;
                            padding:2px;
                            border-radius:0px;
                            margin-left: 37px;
                        ">
            </div>

            <p>
                <li style="padding-top: 15px;list-style: none;text-align: center;">
                    <div class="">

                        <a class="network-icon facebook" itemprop="sameAs" href="{{ $social->flink }}"
                            target="_blank" title="BahrainBanksDirectory.com Facebook" style="margin-top: -7px;">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a class="network-icon twitter" itemprop="sameAs" href="{{ $social->tlink }}"
                            target="_blank" title="BahrainBanksDirectory.com twitter" style="margin-top: -7px;">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a class="network-icon youtube" itemprop="sameAs" href="{{ $social->ylink }}"
                            target="_blank" title="BahrainBanksDirectory.com youtube" style="margin-top: -7px;">
                            <i class="fa fa-youtube"></i>
                        </a>



                        <a class="network-icon instagram" itemprop="sameAs" href="{{ $social->ilink }}"
                            target="_blank" title="BahrainBanksDirectory.com Instagram" style="margin-top: -7px;">
                            <i class="fa fa-instagram"></i>
                        </a>

                        <a class="network-icon linkedin" itemprop="sameAs" href="{{ $social->llink }}"
                            target="_blank" title="BahrainBanksDirectory.com linkedin" style="margin-top: -7px;">
                            <i class="fa fa-linkedin"></i>
                        </a>

                        <a class="network-icon whatsapp" itemprop="sameAs" href="{{ $social->wlink }}"
                            target="_blank" title="BahrainBanksDirectory.com whatsapp" style="margin-top: -7px;">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                    </div>
                </li>
            </p>


        </div>




        <!-- </div>
                                                                                        </div> -->
    </div>
</div> --}}


<div class="container clearfix text-center footer-banner-ad">
    <ins class="adsbygoogle" style="display:block height: 11px;" data-ad-client="ca-pub-9975807181018080"
        data-ad-slot="4261699163" data-ad-format="auto" data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <div class="clearfix clearfix-lg"></div>
</div>

<script>
    function clickButton() {
        let button = document.getElementById('autoSlideAs');
        if (button) {
            button.click();
        }
    }
    setInterval(clickButton, 3000);
</script>

<style type='text/css'>
    .newsletter_row input[type="email"] {
        float: none;
        margin-left: auto;
        margin-right: auto;
        width: 62% !important;
    }

    .b1 {
        padding: 10px !important;
    }
</style>

<style type='text/css'>
    .scrollup {
        border-radius: 3px;
        width: 40px;
        height: 40px;
        opacity: 0.4;
        position: fixed;
        bottom: 30px;
        right: 30px;
        display: none;
        background: rgba(119, 119, 119, 0.8);
        z-index: 1000000;
    }

    .scrollup i {
        font-size: 36px;
        color: white;
        position: relative;
        top: 0px;
        left: 10px;
    }
</style>


<link rel="stylesheet" type="text/css"
    href="https://www.optimizecdn.com/directory/cdn/assets/bootstrap/limonte-sweetalert2/6.11.2/sweetalert2.min.css">
<script src="https://www.optimizecdn.com/directory/cdn/assets/bootstrap/limonte-sweetalert2/6.11.2/sweetalert2.min.js">
</script>


{{-- 
<script>
    function redirectToContactUs() {
        var url = '{{ route("admin.contact") }}';
        window.location.href = url;
    }
</script> --}}





<script defer src="https://www.optimizecdn.com/directory/cdn/assets/bootstrap/js/websiteScripts.min.js?v=0.6"></script>
</body>

</html>
@endsection
