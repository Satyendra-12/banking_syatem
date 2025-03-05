@extends('frontend.layout.app')
<style>
    .pagination {
        display: inline-block;
        margin: 19px 30px;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: background-color .3s;
        border: 1px solid #ddd;
    }

    .pagination a.active {
        background-color: rgb(32, 80, 129);
        color: white;
        border: 1px solid rgb(32, 80, 129);
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }
</style>
<style>
    li {
        list-style: inside !important;
    }

    @media screen and (max-width: 599px) {

        .streaming-title {
            font-size: 12px !important;
            height: 60px;
        }

        .keepInImage {
            left: 27%;
        }
    }
</style>

@section('content')
    <div class="container-fluid" style="margin-top:10px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="homepage-sections fr-view">
                    <div class=" w3-display-container">
                        <img class="mySlides2" src="{{ asset('assets/BANNERS/Whos-who-004-04.jpg') }}"
                            style="width:100%;position: relative;height:auto !important;border-radius:0px !important;">

                        {{-- <div class="col-md-12 keepInImage" style="margin-bottom:13px; position: absolute;top:38%;">
                        <h2 class="nomargin text-center streaming-title"
                            style="border-radius:15px;color: #205081;padding: 15px;font-weight: 600;">
                         WHO'S WHO PROFILE </h2><br>
                    </div> --}}
                        <a href="{{ route('admin.profile_who') }}" class="btn "
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


                        {{-- <img class="mySlides2" src="{{ asset('frontend/img/bank_2.jpg') }}"
                        style="width:100%;height:400px;border-radius:0px !important;">
                    <img class="mySlides2" src="{{ asset('frontend/img/bank_3.jpg') }}"
                        style="width:100%;height:400px;border-radius:0px !important;">
                    <img class="mySlides2" src="{{ asset('frontend/img/bank_4.jpg') }}"
                        style="width:100%;height:400px;border-radius:0px !important;">

                    <img class="mySlides2" src="{{ asset('frontend/img/bank_1.jpg') }}"
                        style="width:100%;height:400px;border-radius:0px !important;"> --}}

                        {{-- <button class="w3-button w3-black w3-display-left"
                        style="border-radius:0px !important;background:blue !important;"
                        onclick="plusDivs(-1)">&#10094;</button>
                    <button class="w3-button w3-black w3-display-right"
                        style="border-radius:0px !important;background:blue !important;" id="autoSlideAs"
                        onclick="plusDivs(1)">&#10095;</button> --}}
                    </div>
                </div>
            </div>
            <!-- Slider -->
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="clearfix">
                <div class="col-md-12 mt-5" style="background-color: #EEE;">

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <input type="hidden" name="id" value="{{ $edit1->id }}">
        <div class="row mt-10" style="display:grid;
            place-content:center;">
            <div class="col-md-12" style="display:flex;justify-content: center;margin-top:4.5rem;">
                {{-- <img src="{{ asset($edit1->image) }}" alt="Forest" style="
                   
                   width:240px;height:100%;
                    border-radius: 0px;
                "> --}}
                @if ($edit1->image)
                    <img src="{{ asset($edit1->image) }} " style="width:240px;height:100%;
border-radius: 0px;">
                @else
                    <img src="{{ asset('assets/img/whou/image/dummy.png') }}"
                        style="width:240px;height:100%;
                    border-radius: 0px;">
                @endif

            </div>                                                                                                         
        </div>
        <div class="container">
            <div class="detail" style="display: flex; justify-content: center;">
                <h4 class="mt-5" style="font-weight: bold;font-size: 20px;">{{ $edit1->name }}
                </h4>
            </div>
            {{-- <div class="detail" style="display: flex; justify-content: center;">
                    <h3 style="
    font-size: 16px;
">F.C.A</h3> --}}
        </div>
        <div class="detail"
            style="display: flex; justify-content: center;font-weight: bold;font-size:18px; text-align: center">
            {{ $edit1->position }} <br> {{ $edit1->roll }}
            {{-- {{ $edit1->address }} --}}
        </div>
        <div class="paira mt-5"
            style="
                background:#87cefa24;
                padding:30px;
                display: flex;
                flex-direction: column-reverse;
                flex-wrap: wrap;
                border-radius: 15px;
                align-content: center;
                ">
            <div class="col-md-12" style="font-size:16px !important ;">
                <p class="mt-3">{!! $edit1->full_description !!}</p>
                <div
                    style="
                    text-align: center;
                    margin-top: 6rem;
                ">
                    <a href="#" class="btn btn-lg tmargin center-block btn-primary"
                        style="width:60%;padding: 15px;font-weight: bold;font-size: 20px;border-radius: 15px;background: rgb(5,73,126);">
                        {{ $edit1->roll }}, {{ $edit1->address }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="homepage-section-4">
        <div class="clearfix" id="capa1"></div>
        <div class="content-container-fluid">
            <div class="container-fluid">
                <div class="" id="join-about-modules">
                    <div class="col-md-12 homepage-join-module">
                        <div class="module  text-center nomargin">

                            <div>
                                <h2
                                    style="font-weight: 700;font-size: 28px;/* margin-bottom:10px; */color: rgb(32, 80, 129);">
                                    Are You
                                    A
                                    Financial Institution Or A Support Service?</h2>
                                <p style="text-align: center;font-size: 16px;margin-left: 17px;margin-right: 17px;">
                                    The Banking industry has changed into significant transformation in the modern
                                    world. We as Bahrain Banks Directory can support you to get easy accessibility and
                                    convenience to meet all your financial needs. However, as there are many options
                                    available, it can be challenging to choose the finest financial institution and its
                                    solutions that suit your needs. With our directory, we'll guide you through the
                                    process of locating and selecting the finest financial institution as per your
                                    requirements.</p>

                            </div>
                            <div class="clearfix"></div>
                            <a href="#" class="btn btn-lg tmargin center-block btn-primary"
                                style="width: fit-content;
                                font-size: large;background:rgb(5, 73, 142);">Join
                                with Bahrain Banks Directory Today</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix clearfix-lg hidden-md hidden-lg"></div>

                </div>
            </div>
        </div>
    </div>

    <style>
        div.col-md-2 img {
            border-radius: 0px;
            height: 217px;
        }
        @media only screen and (max-width: 600px) {
            .instagram-post{
                display: grid;
                gap:8px;
            }
        }
    </style>

    {{-- <div class="content-container-fluid">
        <div class="container-fluid">
            <div class="row" style="">
                <div class="clearfix ">
                    <div class="col-md-12">
                        <h2 class="nomargin text-left streaming-title" style="color:rgb(5, 73, 142)">
                            Instagram Posts</h2><br>
                    </div>
                </div>
                <div class="d-md-flex flex-md-row">
                    <div class="d-md-flex flex-md-row instagram-post">
                        <?php
                    for ($i = 0; $i < 6; $i++) {
                    ?>
                        <div class="col-md-2 instagram" id="instafeed-container">
                            <a target="_blank" href="https://www.instagram.com/bahrainbanksdirectory/">
                                <img src="{{ asset('frontend/img/slider-1.jpg') }}" alt="Forest" width="600"
                                    height="400">
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
    <div class="container clearfix text-center footer-banner-ad">
        <ins class="adsbygoogle" style="display:block height: 11px;" data-ad-client="ca-pub-9975807181018080"
            data-ad-slot="4261699163" data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <div class="clearfix clearfix-lg"></div>
    </div>
@endsection
