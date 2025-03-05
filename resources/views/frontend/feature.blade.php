@extends('frontend.layout.app')




@section('content')
    <style>
        .b1{
            float: left;
        width: 20%;
        padding: 10px !important;
        background: rgb(5, 73, 142);
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
        }
       
@media screen and (min-width: 600px) and (max-width: 1024px) {
    .viewlistingbtn{
        margin-top: 51px
    }
    .slickTopCategories{
        font-size: 10px
    }
}
 
 @media screen and (min-width: 1024px) and (max-width: 1440px) {
.viewlistingbtn{
    width: 114%;
} 
}
.well{
    overflow-x: hidden
}
.handleCard{
    display: flex;
    justify-content: center;
    

}
@media screen and (min-width: 600px) and (max-width: 1024px) {
    .viewlistingbtn{
        margin-top: 100px;
        width: 124%;
    }
    .name{
       
        display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
    /* Number of lines to display before clamping */
    -webkit-line-clamp: 1;
    -moz-line-clamp: 1; /* For Firefox */
    -webkit-line-clamp: 1; /* For WebKit browsers */
    -o-line-clamp: 1; /* For Opera */
    line-clamp: 1; /* Standard property */
           
    }
}
.clamp-me-3{
        display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
    /* Number of lines to display before clamping */
    -webkit-line-clamp: 3;
    -moz-line-clamp: 3; /* For Firefox */
    -webkit-line-clamp: 3; /* For WebKit browsers */
    -o-line-clamp: 3; /* For Opera */
    line-clamp: 3; /* Standard property */
    } 

    .clamp-me-1{
        display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    overflow: hidden;
    font-size: 18px;
    }
 .col-9{
    font-size: 16px;
    overflow: hidden;
    
 }
 @media screen and (min-width: 1440px)  {
.cards{
    width:400px;
}
}
@media screen and (min-width: 1025px) and (max-width: 1439px) {
    
.cards{
    width:400px;
}
}

@media screen and (min-width: 600px) and (max-width: 1024px) {
    
.cards{
    width:300px;
}
}
@media screen and (max-width: 599px) {

    .cards{
    width:400px;
}
}


    </style>
    <div class="container-fluid" style="margin-top:10px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="homepage-sections fr-view">
                    <div class=" w3-display-container">
                     
                        <img class="mySlides2" src="{{ asset("assets/BANNERS/feature-Banner1-01.jpg") }}"
                        style="width:100%;position: relative;height:auto !important;border-radius:0px !important;">
                    
                        {{-- <div class="col-md-12 keepInImage" style="margin-bottom:13px; position: absolute;top:38%;">
                            <h2 class="nomargin text-center streaming-title"
                                style="border-radius:15px;color: #205081;padding: 15px;font-weight: 600;">
                                FEATURED MEMBERS </h2><br>
                        </div>
                         --}}

                       
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
    <div class="content-container-fluid">
        <div class="container">
            <div class="row">

                <div class="clearfix"></div>
            </div>

            <!-- <div style="display: flex ; justify-content: center; column-gap:5px; width: 100%; position: relative;"> -->
            <!-- <div style="overflow: hidden;"> -->
            <div class="handleCard row row-cols-1 row-cols-md-3 row-cols-lg-4 " style="margin-top: 38px;" >
                 
               
                @if(isset($fea) && !$fea->isEmpty())
                @foreach ($fea as $member)
                    <div style="height:320px; border-top:5px rgb(5, 73, 142) solid;  border-bottom:5px rgb(5, 73, 142) solid; padding-left:2px; padding-right:2px;" class="cards member featured-member m-3">
                        <div style="display: grid;  position: relative; background-color: #F2F2F2; height:260px;">
                            <div class="image">
                                <a title="National Bank Of Bahrain Bsc - View Listing" href="{{ route('admin.details-page', $member->id) }}">
                                    <img src="{{ asset($member->contact_person) }}" alt="Bank ABC" style="margin-top:8px; display: block; margin-left: auto; margin-right: auto;width: 110px;height: 100px;border: 1px solid black;">
                                </a>
                            </div>
                            <div class="title" style="text-align: center">
                                <h2 class="name clamp-me-1" style="overflow:hidden; font-weight: 600;color: rgb(5, 73, 142); display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; font-size: 18px;"> {{ $member->username }}</h2>
                            </div>
                            <div class="desc clamp-me-3" style="text-align: center">
                                <p class="description" style="width:100%; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; font-size: 13px;"> {!! $member->address !!}</p>
                            </div>
                        </div>
                        <a href="{{ route('admin.details-page', $member->id) }}" style="width: 100%; cursor: pointer;height: 40px; font-size: 15px;background:rgb(5,73,142); padding-top:7px;" class="btn btn-primary">View Listing</a>
                    </div>
                @endforeach
            @else
                <p style="border: 2px solid black;
                height: 62px;
                width: 500px;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: large;
                font-weight: bold;">{{ $message }}</p>
            @endif
            
               

               

            </div>
        </div>
         
        
    </div>

    <div class="container-fluid mt-2" style="padding-bottom: 40px;">
        <div class="row">
            <div class="col-md-12" style="padding: 20px;">
                 
                <h2 class="nomargin text-left streaming-title"
                 style="color: #205081"   >
                    Popular Categories
                </h2>
            </div>
            <div class="clearfix"></div>
            <div class="row" style="">
                <div class="col-md-12 slickTopCategories">
@foreach ($category as $c)


                    <div class="top-category-single col-xs-12 col-sm-6 col-md-6 col-lg-3 " style="">
                        <h3 class="pic-title bmargin">
                             
                            <div class="row"
                                style="background-color: #e5e7eb;align-items:center;display:flex;border-radius: 20px;">

                                <div class="col" style="border-radius: 20px !important;padding:0px;"><img
                                        src="{{ asset($c->category_cover) }}" alt="Mountains"
                                        style="
                                        width: 71px;
                                        height: 70px;
                                        border-radius: 20px;
                                        ">
                                </div>


                                <div class="col-9"
                                    style="
                                    color: rgba(32, 80, 129,0.95);
                                    border-color: rgb(32, 80, 129);
                                    background-color: #e5e7eb;
                                    font-weight: 700;
                                    border-radius: 20px;
                                    ">
                                    {{-- CONVENTIONAL BANKS RETAIL AND WHOLESALE --}}
                                    <a href="{{ route('admin.financial') }}"
                                    style="
                                    color: inherit !important;">
                            {{ $c->category_name }}
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
            <a href="#" class="btn btn-lg btn-info btn-block visible-xs-block">View
                All</a>
        </div>
    </div>

    <div class="homepage-section-4" style="padding:50px 0px 40px;">
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
                            <a href="{{route("admin.contact")}}" class="btn join-btn btn-lg tmargin center-block btn-primary"
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
                    <center> <a title="Bank ABC - View Listing" class="tmargin btn btn-sm btn-primary btn-block" href="https://www.instagram.com/bahrainbanksdirectory/" style="width: fit-content;font-size: 16px;margin-top: 20px;background:rgb(5, 73, 142);"><i style="padding-right: 11px;" class="fa fa-instagram" aria-hidden="true"></i>Follow us on instagram</a></center>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="container clearfix text-center footer-banner-ad">
        <ins class="adsbygoogle" style="display:block height: 11px;" data-ad-client="ca-pub-9975807181018080"            data-ad-slot="4261699163" data-ad-format="auto" data-full-width-responsive="true"></ins>
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
@endsection
