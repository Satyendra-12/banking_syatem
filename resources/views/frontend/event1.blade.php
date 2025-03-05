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
    @media screen and (max-width: 599px) {
        .clamp-me {
        width: 100%;
                            display: -webkit-box;
                            -webkit-line-clamp: 3;
                            
                            -webkit-box-orient: vertical;
                            overflow: hidden;
    }
    }
    .clamp-me {
        width: 100%;
                            display: -webkit-box;
                            -webkit-line-clamp: 5;
                            
                            -webkit-box-orient: vertical;
                            overflow: hidden;
    }
    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }
    .news-card{
        width: 48% !important;
     }
     @media screen and (max-width: 599px) {
        .news-card{
        width: 85% !important;
     }
     .smallnomargin{
        margin-left: 30px !important;
     }
     .keepInImage{
        left:85px;
     }
     }
</style>

@section('content')
<div class="container-fluid" style="margin-top:10px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="homepage-sections fr-view">
                <div class=" w3-display-container">
                    <img class="mySlides2" src="{{ asset('assets\BANNERS\Events-Banner-06-06.jpg') }}"
                    style="width:100%;position: relative;height:auto !important;border-radius:0px !important;">

                {{-- <div class="col-md-12 keepInImage" style="margin-bottom:13px; position: absolute;top:38%;">
                    <h2 class="nomargin text-center streaming-title"
                        style="border-radius:15px;color: #205081;padding: 15px;font-weight: 600;">
                        ALL EVENTS</h2><br>
                </div>
                    --}}
                     

                     
                </div>
            </div>
        </div>
        <!-- Slider -->
    </div>
</div>
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="clearfix " style="margin-top:15px;">
                        <div class="col-md-12">
                           
                            <p style="font-size: 18px; font-size: 18px;margin-bottom: 20px;" class=" mt-5 mb-5">Showing {{ $events->firstItem() }} - {{ $events->lastItem() }} of {{ $events->total() }} Results</p>

                        </div>

                    </div>

                </div>

                <!-- <div class="grid-container display-featured-members slickFeatured"> -->
                    <div class="row smallnomargin" style="
                    margin-left: 20px;
                    margin-right: 20px;
                ">
                <style>
                    .card-height{
        height: 300px;
     }

     @media only screen and (max-width: 1240px) {

        .card-height{
        height: 460px;
     }
}
@media only screen and (max-width: 800px) {

.card-height{
height: 580px;
}
}

                </style>
                @foreach ($events as $e)
                    
                
                    <div class="col-xs-12 col-sm-6 col-md-6 member featured-member-info news-card" style="margin-right: 15px;">
                        <div class="well card-height" style="position:relative;padding: 11px 20px 15px 20px;border-left:5px solid rgb(32, 80, 129);border-right:5px solid rgb(32, 80, 129); overflow:hidden;">
 
                            <a class="h4 bold" title="Bank ABC - View Listing" href="#" style="
                                    font-size: 25px;
                                          font-weight: 700;
                                          display: -webkit-box;
                                    -webkit-line-clamp: 2;
                                    -webkit-box-orient: vertical;
                                    overflow: hidden;
                                                     ">
                               {{$e->name}}</a>
                               <p class="h4 bold" title="Bank ABC - View Listing" href="#" style="font-size: 17px;color:#204d74;padding-top: 5px;">
                                {{ date('d-m-Y', strtotime($e->date)) }}
                            </p>
                            

                            <div class="col-xs-4 nopad text-center featured-member-image">
                                <img src="{{ asset($e->image) }}" width="200" alt="Bank ABC" style="height:168px;border-radius: 0px;">
                                <a title="Bank ABC - View Listing" href="/manama/conventional-banks-wholesale-1/bank-abc">

                                </a>
                               </div>
                            <div class="col-xs-8 norpad small featured-member-">
                                
                                <div class="col-xs-12 norpad  featured-member-">
                                    <p class="clamp-me" style="margin-left:-13px;font-size: 16px;margin-left:-13px; ">
                                     {!! $e->description !!}  
                                </div>
                            </div>
                            <a title="Bank ABC - View Listing" class=" tmargin btn btn-sm btn-primary btn-block" href="{{ route('admin.news_event', $e->id) }}" style=" position: absolute;bottom:5px;right:5px;  width:fit-content;float:right;font-size: 16px;padding: 7px;    background-color: rgba(32, 80, 129,0.95) !important;
                            border-color: rgb(32, 80, 129) !important;">Read More</a>
                            
                        </div>
                    </div>
                    @endforeach
     
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <style>
                .relative{
    position: relative;background: rgb(5, 73, 142) !important;color: white !important;
    font-size: 22px;
    padding: 15px !important;
}
.pagination a {
        color: white !important;
}
.relative active {
    background: white !important;color: rgb(5, 73, 142) !important;
}
                </style>
            <div class="pagination" style="margin-left:34px;">
                {{ $events->links() }}
            </div>
            {{-- <div class="pagination" style="margin-left:50px;">
                        
                <a href="#" style="background: rgb(32, 80, 129);color:white;padding: 10px;font-size: 14px;border-radius: 8px 0px 0px 8px;" class="active">1</a>
                <a href="#" style="padding: 10px;font-size: 14px;border-radius: 0px;">2</a>
                <a href="#" style="color:rgb(32, 80, 129);padding: 10px;font-size: 14px;border-radius: 0px 8px 8px 0px;">»</a>
            </div> --}}
            
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
        
        
                @media only screen and (max-width: 700px) {
                   
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
