@extends('frontend.layout.app')

<style>
    .sub-category {
        color: red;
        /* font-size:24px; */
    }

    .panel-heading {
        text-align: center;
    }

    .pull-right>a:hover {
        color: white !important;
    }

    .panel-title>a {
        color: rgb(5, 73, 142) !important;
    }
    .top-category-single{
        width: 313px;
    }
 
    .sub-category{
        font-size: 18px
    }

    .clamp-me{
        display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
    /* Number of lines to display before clamping */
    -webkit-line-clamp: 2;
    -moz-line-clamp: 2; /* For Firefox */
    -webkit-line-clamp: 2; /* For WebKit browsers */
    -o-line-clamp: 2; /* For Opera */
    line-clamp: 2; /* Standard property */
    } 
     @media screen and (min-width: 1025px) and (max-width: 1439px) {
       .sub-category{
        width: 260px;
       }
    }
 
   
    @media screen and (max-width: 320px) {
        .panel-title {
       margin-left: 5rem !important;

    }
 
    }
    .panel-title{
        /* margin-left: 5rem */
    }
     .sub-category{
        min-width: 62px;
     } 
    @media screen and (min-width: 1440px)  {
        .sub-category {
            width: 30vw;
            font-size: 18px
        }
    }
    @media screen and (max-width: 599px) {
    .sub-category{
        font-size: 16px;
        
    }
    }
    @media screen and (max-width:320px){
        .sub-category{
            font-size: 12px;
             
        }
    }
   .minWidth{
    min-width: 74px !important;
   }
.content1{
    display: flex;
    align-items: center;
    justify-content: space-between;
}
@media screen and (max-width: 599px) {
    .content1{
    display: flex;
    align-items: center;
    justify-content: space-between;
   
}
.clamp-me{
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

</style>


@section('content')
    <div class="container-fluid" style="margin-top:10px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="homepage-sections fr-view">
                    <div class=" w3-display-container">
                        <img class="mySlides2" src="{{ asset("assets\BANNERS\Banking-and-financial-institution-2-02.jpg") }}"
                        style="width:100%;position: relative;height:auto !important;border-radius:0px !important;">
                    
                        {{-- <div class="col-md-12 keepInImage" style="margin-bottom:13px; position: absolute;top:38%;">
                            <h2 class="nomargin text-center streaming-title"
                                style="border-radius:15px;color: #205081;padding: 15px;font-weight: 600;">
                                 FINANCIAL INSTITUTIONS </h2><br>
                        </div> --}}

                        {{-- <img class="mySlides2" src="{{ asset('frontend/img/bank_2.jpg') }}"
                        style="width:100%;height:400px;border-radius:0px !important;">
                    <img class="mySlides2" src="{{ asset('frontend/img/bank_3.jpg') }}"
                        style="width:100%;height:400px;border-radius:0px !important;">
                    <img class="mySlides2" src="{{ asset('frontend/img/bank_4.jpg') }}"
                        style="width:100%;height:400px;border-radius:0px !important;">

                    <img class="mySlides2" src="{{ asset('frontend/img/bank_1.jpg') }}"
                        style="width:100%;height:400px;border-radius:0px !important;"> --}}

                      
                    </div>
                </div>
            </div>
            <!-- Slider -->
        </div>
    </div>
    <!-- <div id="container" class="content-container fr-view"> -->
    <div class="container mt-7">

        <div class="row">
            <div class="clearfix">
                <div class="col-md-12" style="padding: 0px;">
                    
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="clearfix body-content mt-5"></div>

        <div class="row">

            <div class="col-md-12">
                <div class="row"
                    style="
                             margin-left: -8px;
                             margin-right: -4px;
                         ">
                    
                    
                    @foreach ($subcategories as $bankasubcategory)
                    <div class=" col-md-6">
                    <div class="panel panel-default categories-panel"style="border-radius: 15px;">
                          <div class="panel-heading content1" style="">
                              <div id="panel-title" class="panel-title" style=""> <a
                                      class="sub-category clamp-me" href="{{ route('admin.financial-page-service', $bankasubcategory->id) }}" 
                                      title=""
                                      style="max-height:58px;
                                      color:rgb(5, 73, 142); font-weight:bold; line-height: 122%;
                                   
                                 ">{{ $bankasubcategory->sub_category_name }}</a>
                              </div>

                              <div class="minWidth" style=" background: rgb(5, 73, 142);color: white;padding: 12px;font-size: 12px;margin-right:4px;">
                                  <a href="{{ route('admin.financial-page-service', $bankasubcategory->id) }}" style="color: white;">
                                      
                                      View
                                      All</a>
                              </div>
                          </div>
                      </div>
                  </div>
              
              @endforeach

                </div>
                <script>
                    $(".dynamic_category_search").keyup(function() {
                        var searchValue = $(this).val().toLowerCase();
                        if (searchValue != '') {
                            $('.categories-panel').addClass('searching');
                            $(".sub-category").each(function(index) {
                                if ($(this).text().toLowerCase().indexOf(searchValue) <= 0) {
                                    $(this).parent().removeClass('search');
                                } else {
                                    $(this).parent().addClass('search');
                                }
                            });
                            $(".sub-sub-category").each(function(index) {
                                if ($(this).text().toLowerCase().indexOf(searchValue) <= 0) {
                                    $(this).removeClass('search');
                                } else {
                                    $(this).addClass('search');
                                }
                            });
                            $(".subsubcollapse").each(function(index) {
                                if ($(this).find('.search').length == 0) {
                                    $(this).removeClass('filtering');
                                    $(this).collapse('hide');
                                } else {
                                    $(this).parent().addClass('search');
                                    $(this).collapse('show');
                                    $(this).addClass('filtering');
                                }
                            });
                            $(".categories-panel").each(function(index) {
                                if ($(this).find('.search').length == 0) {
                                    $(this).addClass('hide-container')
                                } else {
                                    $(this).removeClass('hide-container');
                                }
                            });
                        } else {
                            $('.categories-panel').removeClass('searching');
                            $('.categories-panel').removeClass('hide-container');
                            $('.subsubcollapse').collapse('hide');
                        }
                    });
                </script>
                <style>
                    .searching .subsubcollapse .search {
                        display: block;
                    }

                    .searching .subsubcollapse a {
                        display: none;
                    }

                    .searching .panel-body>div {
                        display: none;
                    }

                    .searching .panel-body div.search {
                        display: block;
                    }

                    .searching.hide-container {
                        display: none;
                    }

                    .searching .panel-body div.search .subsubcollapse a {
                        display: block;
                    }

                    .subsubcollapse.filtering a:not(.search) {
                        display: none !important;
                    }

                    form.example button {
                        float: left;
                        width: 20%;
                        padding: 15px;
                        background: rgb(5, 73, 142);
                        color: white;
                        font-size: 17px;
                        border: 1px solid grey;
                        border-left: none;
                        cursor: pointer;
                    }
                    @media screen and (min-width: 1024px) and (max-width: 1440px) {
                    .sub-category{
                        
                       padding: 12px;

                    }
                    }
                    @media screen and (min-width: 600px) and (max-width: 1024px) {
                        .sub-category{
                            
                              font-size: 17px;

                    }
                    }
                </style>
                <!-- <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
                                                                                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
                                                                                            <p><br></p>
                                                                                            <p><br></p>
                                                                                            <p><br></p> -->
            </div>
        </div>

        <div class="row">
            <div class="clearfix">
                <div class="col-md-12 mt-5">
                    <h2 class="nomargin text-center streaming-title"
                        style="color:#205081;padding: 15px; background: lightgray;}">
                         SUPPORT SERVICES
                    </h2>
                </div>
            </div>
           
        </div>

        <div class="row ">

             
               

                <div class="row"
                    style="
                             margin-left: -8px;
                             margin-right: -4px;margin-top:40px;
                         "> 
                          @foreach ($asubcategories as $bankasubcategory)
                          <div class=" col-md-6">
                          <div class="panel panel-default categories-panel"style="border-radius: 15px;">
                                <div class="panel-heading content1" style="">
                                    <div id="panel-title" class="panel-title" style=""> <a
                                            class="sub-category clamp-me" href="{{ route('admin.financial-page-service', $bankasubcategory->id) }}"
                                            title=""
                                            style="
                                            max-height:58px;
                                            color:rgb(5, 73, 142); font-weight:bold; line-height: 122%;
                                         
                                       ">{{ $bankasubcategory->sub_category_name }}</a>
                                    </div>
 
                                    <div class="minWidth" style="background: rgb(5, 73, 142);color: white;padding: 12px;font-size: 12px;margin-right:4px;">
                                        <a href="{{ route('admin.financial-page-service', $bankasubcategory->id) }}" style="color: white;">
                                            
                                            View
                                            All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    @endforeach
                    
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
            {{ $asubcategories->links() }}
        </div>
        
        <script>
            $(".dynamic_category_search").keyup(function() {
                var searchValue = $(this).val().toLowerCase();
                if (searchValue != '') {
                    $('.categories-panel').addClass('searching');
                    $(".sub-category").each(function(index) {
                        if ($(this).text().toLowerCase().indexOf(searchValue) <= 0) {
                            $(this).parent().removeClass('search');
                        } else {
                            $(this).parent().addClass('search');
                        }
                    });
                    $(".sub-sub-category").each(function(index) {
                        if ($(this).text().toLowerCase().indexOf(searchValue) <= 0) {
                            $(this).removeClass('search');
                        } else {
                            $(this).addClass('search');
                        }
                    });
                    $(".subsubcollapse").each(function(index) {
                        if ($(this).find('.search').length == 0) {
                            $(this).removeClass('filtering');
                            $(this).collapse('hide');
                        } else {
                            $(this).parent().addClass('search');
                            $(this).collapse('show');
                            $(this).addClass('filtering');
                        }
                    });
                    $(".categories-panel").each(function(index) {
                        if ($(this).find('.search').length == 0) {
                            $(this).addClass('hide-container')
                        } else {
                            $(this).removeClass('hide-container');
                        }
                    });
                } else {
                    $('.categories-panel').removeClass('searching');
                    $('.categories-panel').removeClass('hide-container');
                    $('.subsubcollapse').collapse('hide');
                }
            });
        </script>
        <style>
            .searching .subsubcollapse .search {
                display: block;
            }

            .searching .subsubcollapse a {
                display: none;
            }

            .searching .panel-body>div {
                display: none;
            }

            .searching .panel-body div.search {
                display: block;
            }

            .searching.hide-container {
                display: none;
            }

            .searching .panel-body div.search .subsubcollapse a {
                display: block;
            }

            .subsubcollapse.filtering a:not(.search) {
                display: none !important;
            }
        </style>
        <!-- <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
                                                                                            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
                                                                                            <p><br></p>
                                                                                            <p><br></p>
                                                                                            <p><br></p> -->
    </div>
    </div>

    <div class="clearfix"></div>
    </div>
    <!-- </div> -->
    <!-- End Content -->
    <div class="clearfix footer-clear-element"></div>


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
