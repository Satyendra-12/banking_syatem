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
    </style>

@section('content')
<div class="container-fluid" style="margin-top:10px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="homepage-sections fr-view">
                <div class=" w3-display-container">
                    @foreach ($slide as $slider)
                    <img class="mySlides2" src="{{ asset($slider->image) }}"
                    style="width:100%;height:400px;border-radius:0px !important;">
                    @endforeach
                   
                    {{-- <img class="mySlides2" src="{{ asset('frontend/img/bank_2.jpg') }}"
                        style="width:100%;height:400px;border-radius:0px !important;">
                    <img class="mySlides2" src="{{ asset('frontend/img/bank_3.jpg') }}"
                        style="width:100%;height:400px;border-radius:0px !important;">
                    <img class="mySlides2" src="{{ asset('frontend/img/bank_4.jpg') }}"
                        style="width:100%;height:400px;border-radius:0px !important;">

                    <img class="mySlides2" src="{{ asset('frontend/img/bank_1.jpg') }}"
                        style="width:100%;height:400px;border-radius:0px !important;"> --}}

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
        <div class="container">
            <div class="row">
                <div class="clearfix">
                    <div class="col-md-12 mt-5">
                        <h2 class="nomargin text-center streaming-title"
                            style="padding-right:100px !important; color:rgb(41, 41, 41);color: rgb(41, 41, 41);padding: 12px; background: lightgray;border-radius:17px;">
                            WHO’S WHO PROFILES
                            <a href="{{ route('admin.details-page' ,$edit->user_id) }}"><span class="pull-left btn" style="background: rgb(5, 73, 142);color: white;font-size: 20px;margin-top: -11px;border-radius: 15px;margin-left: -16px;padding: 12px;">
                                <i class="fa fa-caret-left" aria-hidden="true" style="color:white;font-size: 20px;padding-right: 5px;padding-bottom:8px;padding-top: 5px;"></i><span>Back</span></span></a>
                         </h2>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <input type="hidden" name="id" value="{{ $edit->id }}">
            <div class="row mt-10">
                <div class="col-md-12" style="display:flex;justify-content: center;margin-top:4.5rem;">
                    <img src="{{ asset($edit->image) }}" alt="Forest" style="
                    width: 220px;
                    height: 220px;
                    border-radius: 0px;
                ">
                </div>
            </div>
            <div class="container">
                <div class="detail" style="display: flex; justify-content: center;">
                    <h4 class="mt-5" style="font-weight: bold;font-size: 25px;">{{ $edit->name }}
                    </h4>
                </div>
                <div class="detail" style="display: flex; justify-content: center;">
                    <h3 style="
    font-size: 20px;
">F.C.A</h3>
                </div>
                <div class="detail" style="display: flex; justify-content: center;font-weight: bold;font-size:2rem;text-align: center;">
                    {{ $edit->position }} <br> {{ $edit->roll }} 
                </div>
                <div class="paira mt-5" style="
                background:#87cefa24;
                padding:30px;
                display: flex;
                flex-direction: column-reverse;
                flex-wrap: wrap;
                border-radius: 15px;
                align-content: center;
                font-size:25px !important;
                ">
                <div class="col-md-10">
                    <p  class="mt-5" style="font-size: 25px !important;">{!! $edit->description !!}</p>
                    <div style="
                    text-align: center;
                    margin-top: 6rem;
                ">
                                    <a href="#" class="btn btn-lg tmargin center-block btn-primary" style="width:60%;padding: 15px;font-weight: bold;font-size: 20px;border-radius: 15px;background: rgb(5,73,126);">
                                        {{ $edit->roll }}, {{ $edit->address }}
                                </a>
                                </div>
                </div>
            </div>
    </div>
    </div></div>

    <div class="homepage-section-4">
        <div class="clearfix" id="capa1"></div>
        <div class="content-container-fluid">
            <div class="container-fluid">
                <div class="" id="join-about-modules">
                    <div class="col-md-12 homepage-join-module">
                        <div class="module  text-center nomargin">

                            <div>
                                <h2 style="font-weight: 700;font-size: 28px;/* margin-bottom:10px; */color: rgb(32, 80, 129);">
                                    Are You
                                    A
                                    Financial Institution Or a Support Service?</h2>
                                <p style="text-align: center;font-size: 16px;margin-left: 17px;margin-right: 17px;">
                                    Lorem ipsum is placeholder text commonly
                                    used
                                    in
                                    the graphic, print, and publishing industries for previewing layouts and
                                    visual
                                    mockups.Lorem ipsum is placeholder text commonly used in the graphic,
                                    print,
                                    and
                                    publishing industries for previewing layouts and visual mockups.</p>

                            </div>
                            <div class="clearfix"></div>
                            <a href="#" class="btn btn-lg tmargin center-block btn-primary" style="width: 32%;
                                font-size: large;background:rgb(5, 73, 142);">Join
                               with Bahrain Bank Directory Today</a>
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


        @media only screen and (max-width: 700px) {
           
        }

        @media only screen and (max-width: 600px) {
            .instagram-post{
                display: grid;
                gap:8px;
            }
        }
    </style>

<div class="content-container-fluid">
    <div class="container-fluid">
        <div class="row" style="">
            <div class="clearfix ">
                <div class="col-md-12">
                    <h2 class="nomargin text-left streaming-title instagram-post" style="color:rgb(5, 73, 142)">
                        Instagram Posts</h2><br>
                </div>
            </div>
            <div class="" style="
                "> 
                <div class="col-md-2">
                    <a target="_blank" href="img_forest.jpg">
                        <img src="{{ asset('frontend/img/slider-1.jpg') }}" alt="Forest" width="600"
                            height="400">
                    </a>
            </div>

            <div class="col-md-2">
                    <a target="_blank" href="img_lights.jpg">
                        <img src="{{ asset('frontend/img/slider-2.jpg') }}" alt="Northern Lights" width="600"
                            height="400">
                    </a>
            </div>

            <div class="col-md-2">
                    <a target="_blank" href="img_forest.jpg">
                        <img src="{{ asset('frontend/img/slider-1.jpg') }}" alt="Forest" width="600"
                            height="400">
                    </a>
            </div>

            <div class="col-md-2">
                    <a target="_blank" href="img_forest.jpg">
                        <img src="{{ asset('frontend/img/slider-1.jpg') }}" alt="Forest" width="600"
                            height="400">
                    </a>
            </div>

            <div class="col-md-2">
                    <a target="_blank" href="img_forest.jpg">
                        <img src="{{ asset('frontend/img/slider-1.jpg') }}" alt="Forest" width="600"
                            height="400">
                    </a>
            </div>


            <div class="col-md-2">
                    <a target="_blank" href="img_mountains.jpg">
                        <img src="{{ asset('frontend/img/slider-1.jpg') }}" alt="Mountains" width="600"
                            height="400">
                    </a>
            </div>
            </div> 

            @php
            $social = DB::table('socials')->first();
            @endphp
            <div class="col-md-12">
                <center> <a title="Bank ABC - View Listing" class="tmargin btn btn-sm btn-primary btn-block" href="{{ $social->ilink }}" style="width: fit-content;font-size: 16px;margin-top: 20px;background:rgb(5, 73, 142);"><i style="padding-right: 11px;" class="fa fa-instagram" aria-hidden="true"></i>Follow us on instagram</a></center>
            </div>
        </div>
    </div>
</div>
    <div class="container clearfix text-center footer-banner-ad">
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-9975807181018080"
            data-ad-slot="4261699163" data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <div class="clearfix clearfix-lg"></div>
    </div>
@endsection
