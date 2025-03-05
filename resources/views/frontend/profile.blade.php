@extends('frontend.layout.app')
<style>
    .pagination {
        display: inline-block;
        margin: 19px 30px;
    }

    .imageclass {
        height: 145px;
        width: 170px;
    }

    @media screen and (min-width: 600px) and (max-width: 1024px) {
        .imageclass {
            height: 120px;
            width: 170px;
        }
    }

    @media screen and (max-width: 599px) {
        .imageclass {
            height: 110px;
            width: 170px;
        }

        .keepInImage {
            left: 30px;
        }
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

    .clamp-me {
        width: 100%;
        display: -webkit-box;
        -webkit-line-clamp: 5;

        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    @media screen and (max-width: 599px) {

        .clamp-me {
            width: 100%;
            display: -webkit-box;
            -webkit-line-clamp: 3;

            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    }

    .clamp-me-2 {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        /* Number of lines to display before clamping */
        -webkit-line-clamp: 2;
        -moz-line-clamp: 2;
        /* For Firefox */
        -webkit-line-clamp: 2;
        /* For WebKit browsers */
        -o-line-clamp: 2;
        /* For Opera */
        line-clamp: 2;
    }

    @media screen and (max-width: 320px) {
        .heightdesc {
            height: 230px !important;
        }
    }

    @media screen and (max-width: 599px) {
        .heightdesc {
            height: 209px;
        }
    }

    @media screen and (min-width: 600px) and (max-width: 1024px) {
        .heightdesc {
            height: 209px;
        }
    }

    @media screen and (min-width: 1025px) and (max-width: 1439px) {
        .heightdesc {
            height: 222px;
        }
    }

    @media screen and (min-width: 1440px) {
        .heightdesc {
            height: 191px;
        }
    }
</style>

@section('content')
    <div class="container-fluid" style="margin-top:10px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="homepage-sections fr-view">
                    <div class=" w3-display-container">
                        <img class="mySlides2" src="{{ asset('assets\BANNERS\Whos-who-004-04.jpg') }}"
                            style="width:100%;position: relative;height:auto !important;border-radius:0px !important;">
                        {{-- <div class="col-md-12 keepInImage" style="margin-bottom:13px; position: absolute;top:38%;">
                            <h2 class="nomargin text-center streaming-title"
                                style="border-radius:15px;color: #205081;padding: 15px;font-weight: 600;">
                                WHO'S WHO PROFILE </h2><br>
                        </div> --}}


                    </div>
                </div>
            </div>
            <!-- Slider -->
        </div>
    </div>

    <div class="container mt-7">
        <div class="row">
            <div class="clearfix">

            </div>
            <div class="clearfix"></div>
        </div>
        @if (request()->is('whos-who'))
            <div class="row">
                <div class="clearfix " style="margin-top:15px;">
                    <div class="col-md-12" style="margin-top: 30px;">
                        @php
                            $totalResults = $profile->count() + $wprofile->count();
                        @endphp

                        <p style="font-size: 18px;" class="">Showing {{ $totalResults }} Results</p>
                        <div class="search-container">
                            <form action="{{ route('profiles.search') }}"
                                style="
                               color: black !important;
                                    ">
                                <input type="text" placeholder="Search Name.." name="search"
                                    style="border: 1px solid lightgray;padding-inline: 30px;padding-left: 8px;font-size: 20px; color: black !important; ">
                                <i class="fa fa-search" style="margin-left: -30px;font-size: 20px;"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="container mt-3">
        <div class="row" style="
        margin-right: 40px;
        margin-left: 40px;
    ">
            @foreach ($wprofile as $wprofiledata)
                <div class="col-xs-12 col-sm-6 col-md-6 member featured-member" style="">
                    <div class="well heightdesc"
                        style="position: relative; padding: 10px 20px 20px 10px;border-left:5px solid rgb(32, 80, 129);  border-right:5px solid rgb(32, 80, 129);">


                        <div class="col-xs-4 nopad text-center featured-member-image">
                            @if ($wprofiledata->image)
                                <img class="imageclass" src="{{ asset($wprofiledata->image) }}"
                                    style="border-radius: 0px !important;" alt="Bank ABC">
                            @else
                                <img class="imageclass" src="{{ asset('assets/img/whou/image/dummy.png') }}"
                                    style="border-radius: 0px !important;" alt="Bank ABC">
                            @endif

                            <a title="Bank ABC - View Listing" href="/manama/conventional-banks-wholesale-1/bank-abc">
                                <!-- <img class="img-rounded lazyloader" loading="lazy" width="200" height="200"
                                                                                                                                                                                                                             alt="Bank ABC" data-src="/case-1.jpg"> -->
                            </a>
                        </div>
                        <div class="col-xs-8 norpad small featured-member-info">
                            <h4 class="bold bmargin inline-block
                        clamp-me-1
                      "
                                title="Bank ABC - View Listing" href="#"
                                style="color: rgb(5, 73, 142);width: 100%;
                            display: -webkit-box;
                            -webkit-line-clamp: 2; 
                            -webkit-box-orient: vertical;
                            font-size:18px;
                            overflow: hidden;">
                                {{ $wprofiledata->name }} </h4>

                            <h3 class=""
                                style="font-size: 15px; padding-top:0px;font: icon; width: 100%;
                        display: -webkit-box;
                        -webkit-line-clamp: 2;
                        
                        -webkit-box-orient: vertical;
                        overflow: hidden;">
                                {{ $wprofiledata->position }}</h3>
                            <h3 style="font-size:13px;" class="clamp-me">
                                {{ $wprofiledata->roll }}
                            </h3>
                            {{-- <h4 style="font-size:15px; overflow:hidden;" class=" clamp-me-3">{{ $profiledata->address }} --}}
                            {{-- </h4> --}}


                        </div>
                        <a href="{{ route('admin.whous_profile_who_page', $wprofiledata->id) }}"
                            class="btn btn-sm btn-primary btn-block"
                            style=" font-size: large;
                        font-size:16px;
                  position:absolute;bottom:5;right:5;   width:fit-content;   background: rgb(5, 73, 142);">
                            Read More</a>

                    </div>
                </div>
            @endforeach

            @foreach ($profile as $profiledata)
            <div class="col-xs-12 col-sm-6 col-md-6 member featured-member" style="">
                <div class="well heightdesc"
                    style="position: relative; padding: 10px 20px 20px 10px;border-left:5px solid rgb(32, 80, 129);  border-right:5px solid rgb(32, 80, 129);">


                    <div class="col-xs-4 nopad text-center featured-member-image">
                        @if ($profiledata->image)
                            <img class="imageclass" src="{{ asset($profiledata->image) }}"
                                style="border-radius: 0px !important;" alt="Bank ABC">
                        @else
                            <img class="imageclass" src="{{ asset('assets/img/whou/image/dummy.png') }}"
                                style="border-radius: 0px !important;" alt="Bank ABC">
                        @endif

                        <a title="Bank ABC - View Listing" href="/manama/conventional-banks-wholesale-1/bank-abc">
                            <!-- <img class="img-rounded lazyloader" loading="lazy" width="200" height="200"
                                                                                                                                                                                                                         alt="Bank ABC" data-src="/case-1.jpg"> -->
                        </a>
                    </div>
                    <div class="col-xs-8 norpad small featured-member-info">
                        <h4 class="bold bmargin inline-block
                        clamp-me-1
                      "
                            title="Bank ABC - View Listing" href="#"
                            style="color: rgb(5, 73, 142);width: 100%;
                            display: -webkit-box;
                            -webkit-line-clamp: 2; 
                            -webkit-box-orient: vertical;
                            font-size:18px;
                            overflow: hidden;">
                            {{ $profiledata->name }} </h4>

                        <h3 class=""
                            style="font-size: 15px; padding-top:0px;font: icon; width: 100%;
                        display: -webkit-box;
                        -webkit-line-clamp: 2;
                        
                        -webkit-box-orient: vertical;
                        overflow: hidden;">
                            {{ $profiledata->position }}</h3>
                        <h3 style="font-size:13px;" class="clamp-me">
                            {{ $profiledata->roll }}
                        </h3>
                        {{-- <h4 style="font-size:15px; overflow:hidden;" class=" clamp-me-3">{{ $profiledata->address }} --}}
                        {{-- </h4> --}}


                    </div>
                    <a href="{{ route('admin.profile_who_page', $profiledata->id) }}"
                        class="btn btn-sm btn-primary btn-block"
                        style=" font-size: large;
                        font-size:16px;
                  position:absolute;bottom:5;right:5;   width:fit-content;   background: rgb(5, 73, 142);">
                        Read More</a>

                </div>
            </div>
        @endforeach

        </div>

        {{-- <div class="row" style="
            margin-right: 40px;
            margin-left: 40px;
        ">
        </div> --}}

    @elseif(request()->is('search'))
        @if ($profile->isEmpty() && $wprofile->isEmpty())
            <div class="" style="background: #EEE;padding:8px;text-align:center; color:blue;font-size:22px;">
                No data found.
            </div>
        @else
            @foreach ($wprofile as $wprofiledata)
                <div class="col-xs-12 col-sm-6 col-md-6 member featured-member" style="margin-top:20px;">
                    <div class="well heightdesc"
                        style="position: relative; padding: 10px 20px 20px 10px;border-left:5px solid rgb(32, 80, 129);  border-right:5px solid rgb(32, 80, 129);">


                        <div class="col-xs-4 nopad text-center featured-member-image">
                            <img class="imageclass" src="{{ asset($wprofiledata->image) }}"
                                style="border-radius:0px !important;" alt="Bank ABC">
                            <a title="Bank ABC - View Listing" href="/manama/conventional-banks-wholesale-1/bank-abc">
                                <!-- <img class="img-rounded lazyloader" loading="lazy" width="200" height="200"
                                                                                                                                                                                                                 alt="Bank ABC" data-src="/case-1.jpg"> -->
                            </a>
                        </div>
                        <div class="col-xs-8 norpad small featured-member-info">
                            <h4 class="bold bmargin inline-block
            clamp-me-2
          "
                                title="Bank ABC - View Listing" href="#" style="color: rgb(5, 73, 142);">
                                {{ $wprofiledata->name }} </h4>



                            <h3 class="" style="font-size: 15px;padding-bottom:5px; padding-top:0px;font: icon;">
                                {{ $wprofiledata->position }}</h3>
                            <text style="font-size:16px; font-weight: 600;" class="">
                                {{ $wprofiledata->roll }}</text>
                            <h4 style="font-size:15px; overflow:hidden;" class=" clamp-me-3">{{ $wprofiledata->address }}
                            </h4>


                        </div>
                        <a href="{{ route('admin.whous_profile_who_page', $wprofiledata->id) }}"
                            class="btn btn-sm btn-primary btn-block"
                            style=" font-size: large;
      position:absolute;bottom:5;right:5;   width:fit-content;   background: rgb(5, 73, 142);">
                            Read More</a>

                    </div>
                </div>
            @endforeach



            @foreach ($profile as $profiledata)
                <div class="col-xs-12 col-sm-6 col-md-6 member featured-member" style="margin-top:20px;">
                    <div class="well heightdesc"
                        style="position: relative; padding: 10px 20px 20px 10px;border-left:5px solid rgb(32, 80, 129);  border-right:5px solid rgb(32, 80, 129);">


                        <div class="col-xs-4 nopad text-center featured-member-image">
                            <img class="imageclass" src="{{ asset($profiledata->image) }}"
                                style="border-radius:0px !important;" alt="Bank ABC">
                            <a title="Bank ABC - View Listing" href="/manama/conventional-banks-wholesale-1/bank-abc">
                                <!-- <img class="img-rounded lazyloader" loading="lazy" width="200" height="200"                                                                                                                                                                                                                     alt="Bank ABC" data-src="/case-1.jpg"> -->
                            </a>
                        </div>
                        <div class="col-xs-8 norpad small featured-member-info">
                            <h4 class="bold bmargin inline-block
                    clamp-me-2
                  "
                                title="Bank ABC - View Listing" href="#" style="color: rgb(5, 73, 142);">
                                {{ $profiledata->name }} </h4>



                            <h3 class="" style="font-size: 15px;padding-bottom:5px; padding-top:0px;font: icon;">
                                {{ $profiledata->position }}</h3>
                            <text style="font-size:16px; font-weight: 600;" class="">
                                {{ $profiledata->roll }}</text>
                            <h4 style="font-size:15px; overflow:hidden;" class=" clamp-me-3">{{ $profiledata->address }}
                            </h4>


                        </div>
                        <a href="{{ route('admin.profile_who_page', $profiledata->id) }}"
                            class="btn btn-sm btn-primary btn-block"
                            style=" font-size: large;
              position:absolute;bottom:5;right:5;   width:fit-content;   background: rgb(5, 73, 142);">
                            Read More</a>

                    </div>
                </div>
            @endforeach
        @endif






        <a href="{{ route('admin.profile_who') }}" class="btn "
            style="display: flex;
    justify-content: center;
    align-items: center;
    width: 6%;
    margin-top: 5px;
    background:#05498E;">
            <i class="fa fa-caret-left" aria-hidden="true"
                style="font-size: 16px;color:white; font-size: 20px; padding-right: 5px; padding-bottom: 8px; padding-top: 5px;"></i>
            <span style="font-size: 16px;color: white;">Back</span>
        </a>
        {{-- <a href="{{ route('admin.profile_who') }}" class="btn btn-primary btn-lg">Back to Profile</a> --}}


        @endif

        <div class="clearfix"></div>
        <div class="col-md-12">

            <style>
                .relative {
                    position: relative;
                    background: rgb(5, 73, 142) !important;
                    color: white !important;
                    font-size: 22px;
                    padding: 15px !important;
                }

                .pagination a {
                    color: white !important;
                }

                .relative active {
                    background: white !important;
                    color: rgb(5, 73, 142) !important;
                }
            </style>

            {{-- @if (request()->is('profile'))
                <div class="pagination" style="margin-left: 34px;">
                    {{ $profile->links() }}
                </div>
            @endif --}}


            {{-- <div class="pagination" style="margin-right: 31px;float: right;">
                        
                        <a href="#" style="background: rgb(32, 80, 129);color:white;padding: 10px;font-size: 14px;border-radius: 8px 0px 0px 8px;" class="active">1</a>
                        <a href="#" style="padding: 10px;font-size: 14px;border-radius: 0px;">2</a>
                        <a href="#" style="color:rgb(32, 80, 129);padding: 10px;font-size: 14px;border-radius: 0px 8px 8px 0px;">»</a>
                    </div> --}}
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

    <style>
        div.col-md-2 img {
            border-radius: 0px;
            height: 217px;
        }

        @media only screen and (max-width: 600px) {
            .instagram-post {
                display: grid;
                gap: 8px;
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
