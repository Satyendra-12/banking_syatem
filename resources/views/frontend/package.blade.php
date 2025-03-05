@extends('frontend.layout.app')


@section('content')
    <style>
        /*--------------------------------------------------------------
        {{ route('admin.comming') }} Pricing
        --------------------------------------------------------------*/
        .pricing .box {
            padding: 20px;
            /* background: #f8f8f8; */
            text-align: center;
            box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.12);
            border-radius: 5px;
            position: relative;
            overflow: hidden;
        }

        .pricing .box h3 {
            font-weight: 400;
            margin: -20px -20px 20px -20px;
            padding: 12px 15px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            background: rgb(5, 73, 142);
        }

        .pricing .box h4 {
            font-size: 36px;
            color: #106eea;
            font-weight: 600;
            font-family: "Poppins", sans-serif;
            margin-bottom: 20px;
        }

        .pricing .box h4 sup {
            font-size: 20px;
            top: -15px;
            left: -3px;
        }

        .pricing .box h4 span {
            color: #bababa;
            font-size: 16px;
            font-weight: 300;
        }

        .pricing .box ul {
            padding: 0;
            list-style: none;
            color: #444444;
            text-align: center;
            line-height: 20px;
            font-size: 14px;
        }

        .pricing .box ul li {
            padding: 15px;
            color: rgb(5, 73, 142);
            border-radius: 0px !important;
        }

        .one {
            background: #dcf5fa;
            border-top: 2px solid #dcf5fa;
            border-bottom: 2px solid #dcf5fa;
        }

        .one1 {
            background: #dcf5fa;
            border-top: 0px solid lightgray;
            border-bottom: 0px solid lightgray;
        }

        .pricing .box ul i {
            color: #106eea;
            font-size: 18px;
            padding-right: 4px;
        }

        .pricing .box ul .na {
            color: #ccc;
            text-decoration: line-through;
        }

        .pricing .btn-wrap {
            margin: 20px;
            padding: 0px;
            background: #f8f8f8;
            text-align: center;
        }

        .pricing .btn-buy {
            background: rgb(5, 73, 142);
            display: inline-block;
            padding: 8px 35px 10px 35px;
            border-radius: 6px;
            color: #fff;
            transition: none;
            font-size: 14px;
            font-weight: 400;
            font-family: "Roboto", sans-serif;
            font-weight: 600;
            transition: 0.3s;
        }

        .pricing .btn-buy:hover {
            background: #3b8af2;
        }

        .pricing .featured h3 {
            color: white;
            background: rgb(5, 73, 142);
        }

        .pricing .advanced {
            width: 200px;
            position: absolute;
            top: 18px;
            right: -68px;
            transform: rotate(45deg);
            z-index: 1;
            font-size: 14px;
            padding: 1px 0 3px 0;
            background: #106eea;
            color: #fff;
        }

        .b1 {
            padding: 10px !important;
        }

        @media screen and (min-width: 600px) and (max-width: 1024px) {}
    </style>



    <div class="container-fluid" style="margin-top:10px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="homepage-sections fr-view">
                    <div class=" w3-display-container">
                        <img class="mySlides2" src="{{ asset("assets\BANNERS\membership-plan-Banner-07-07.jpg") }}"
                        style="width:100%;position: relative;height:auto !important;border-radius:0px !important;">
{{--                     
                        <div class="col-md-12 keepInImage" style="margin-bottom:13px; position: absolute;top:38%;">
                            <h2 class="nomargin text-center streaming-title"
                                style="border-radius:15px;color: #205081;padding: 15px;font-weight: 600;">
                                 PACKAGES </h2><br>
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

    <section id="pricing" class="pricing" style="margin-bottom:15px;">
        <div class="container" data-aos="fade-up">

            <div class="section-title"
                style="text-align: center;
      padding: 13px;
      
      margin-top: 30px;
      
      background: #EEEEEE;
      border-radius: 15px;
      margin-bottom: 30px;
      ">
                <!-- <h2>Pricing</h2> -->
                <h3 style="color: rgb(5, 73, 142);font-size: 32px;
        font-weight: 900;">Choose a Plan to Join Today
                </h3>
                <h3 style="
        font-size: 18px;
        font-weight: 600;
        padding-top: 5px;
    ">List Your
                    Company On Bahrain Bank Directory (Print and Online Directory)</h3>
            </div>

            <div class="row">

                {{-- <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="box" style="
          padding: 0px !important;
          border-radius: 6px 6px 0px 0px !important;
      ">
            <h3 style="
            padding: 21px;
            font-size:26px;
            border-radius: 0px;
            margin: 0px;
        ">FREE</h3>
          </div>
          <div class="box" style="
          padding: 0px !important;
          border-radius: 0px 0px 6px 6px !important;
      ">
            <!-- <h4><sup>$</sup>0<span> / month</span></h4> -->
            <ul>
              <li class="one1">Listed</li>
              <li>In Search Results</li>
              <li class="one">X</li>
              <li>X</li>
              <li class="one">Company Name</li>
              <li>Company Logo</li>
              <li class="one">Address</li>
              <li>Short Descriptions</li>
              <li class="one">Email</li>
              <li>X</li>
              <li class="one">X</li>
              <li>X</li>
              <li class="one">X</li>
              <li>X</li>
              <li class="one">X</li>
              <li>X</li>
              <li class="one">X</li>
              <li>X</li>
              <li class="one">X</li>
              <li>X</li>
              <li class="one1">X</li>
            </ul>
            <div class="btn-wrap">
              <a href="{{ route('admin.comming') }}" class="btn-buy">CONTACT US</a>
            </div>
          </div>
        </div> --}}

                <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="box"
                        style="
          padding: 0px !important;
          border-radius: 6px 6px 0px 0px !important;
      ">
                        <h3
                            style="
            padding: 20px;
            font-size:26px;
            border-radius: 0px;
            margin: 0px;
        ">
                            PREMIUM</h3>

                        <ul style="
            margin-bottom: 0px;
        ">
                            <li class="one1">Best Value & Results</li>
                            <li>Top in Search Results</li>
                            <li class="one">Up to 10 Categories</li>
                            <li>Up to 10 Keywords</li>
                            <li class="one">Color Logo Listing</li>
                            <li>Link To Your Website & Social Media Platforms</li>
                            <li class="one">Unlimited Updates/li>
                            <li>Review Inquiry</li>
                            <li class="one">Display Brochure</li>
                            <li>Display Images (10), Video (1)</li>
                            <li class="one">Receive Rate & Reviews</li>
                            <li>Publish Events(10)</li>
                            <li class="one">Publish Classifieds</li>
                            <li>Publish Blogs</li>
                            <li class="one">Publish Articles</li>
                            <li>Post Jobs</li>
                            {{-- <li class="one">X</li>
              <li>X</li>
              <li class="one">X</li>
              <li>X</li>
              <li class="one1">X</li> --}}
                        </ul>
                        {{-- <div class="btn-wrap">
              <a href="{{ route('admin.comming') }}" class="btn-buy">CONTACT US</a>
            </div> --}}
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                    <div class="box"
                        style="
          padding: 0px !important;
          border-radius: 6px 6px 0px 0px !important;
      ">
                        <h3
                            style="
            padding: 20px;
            font-size:26px;
            border-radius: 0px;
            margin: 0px;
        ">
                            STANDARD</h3>

                        <ul style="
            margin-bottom: 0px;
        ">
                            <li class="one1">Best Value & Results</li>
                            <li>X</li>
                            <li class="one">Up to 5 Categories</li>
                            <li>Up to 5 Keywords</li>
                            <li class="one">Color Logo Listing</li>
                            <li>Link To Your Website & Social Media Platforms</li>
                            <li class="one">Unlimited Updates</li>
                            <li>Review Inquiry</li>
                            <li class="one">Display Brochure</li>
                            <li>Display Images(10), Video(1)</li>
                            <li class="one" style="padding-inline:1px;">Receive Rate & Reviews</li>
                            <li>Publish Events(10)</li>
                            <li class="one">Publish Classifieds</li>
                            <li>X</li>

                            <li class="one">X</li>
                            <li>X</li>

                        </ul>
                        {{-- <div class="btn-wrap">
              <a href="{{ route('admin.comming') }}" class="btn-buy">CONTACT US</a>
            </div> --}}
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                    <div class="box"
                        style="
          padding: 0px !important;
          border-radius: 6px 6px 0px 0px !important;
      ">
                        <h3
                            style="
            padding: 20px;
            font-size:26px;
            border-radius: 0px;
            margin: 0px;
        ">
                            BASIC</h3>

                        <ul style="
            margin-bottom: 0px;
        ">
                            <li class="one1">Best Value & Results</li>
                            <li>X</li>
                            <li class="one">Up to 2 Categories</li>
                            <li>Up to 2 Keywords</li>
                            <li class="one">Color Logo Listing</li>
                            <li>Link To Your Website & Social Media Platforms</li>
                            <li class="one">Unlimited Updates</li>
                            <li>X</li>
                            <li class="one">X</li>
                            <li>X</li>
                            <li class="one">X</li>
                            <li>X</li>
                            <li class="one">X</li>
                            <li>X</li>
                            <li class="one">X</li>
                            <li>X</li>
                            {{-- <li class="one">Publish Events(10)</li>
              <li>Publish Classifieds</li>
              <li class="one">Publish Blogs</li>
              <li>Publish Art icies</li>
              <li class="one1">Postjobs</li>
               --}}
                        </ul>
                        {{-- <div class="btn-wrap">
              <a href="{{ route('admin.comming') }}" class="btn-buy">CONTACT US</a>
            </div> --}}
                    </div>
                </div>
            </div>

            <div class="section-title"
                style="text-align: center;
        
        width:fit-content;margin-right:auto;
        margin-top: 30px;
        margin-left:auto;
        background: rgb(5, 73, 142);
        border-radius: 10px;
        margin-bottom: 30px;
        ">

                <h3
                    style="
                padding: 20px;text-align:center;
                font-size:21px;
                border-radius: 0px;
                margin: 0px;    font-weight: 600;
    color: white;
    
            ">
                    DIGITAL MARKETING ADD-ONS</h3>
            </div>
            <div class="row">


                <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="box"
                        style="
              padding: 0px !important;
              border-radius: 6px 6px 0px 0px !important;
          ">

                        <ul style="
                margin-bottom: 0px;
            ">
                            <li class="one">SociaL Media Marketing 5 Posts</li>
                            <li>1 Bulk Email Broadcast</li>
                            <li class="one">Google Display Ads (100,000 Impressions) </li>
                        </ul>
                        {{-- <div class="btn-wrap">
                  <a href="{{ route('admin.comming') }}" class="btn-buy">CONTACT US</a>
                </div> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="box"
                        style="
              padding: 0px !important;
              border-radius: 6px 6px 0px 0px !important;
          ">

                        <ul style="
                margin-bottom: 0px;
            ">
                            <li class="one">SociaL Media Marketing 3 Posts</li>
                            <li>1 Bulk Email Broadcast</li>
                            <li class="one">Google Display Ads (50,000 Impressions) </li>
                        </ul>
                        {{-- <div class="btn-wrap">
                  <a href="{{ route('admin.comming') }}" class="btn-buy">CONTACT US</a>
                </div> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                    <div class="box"
                        style="
              padding: 0px !important;
              border-radius: 6px 6px 0px 0px !important;
          ">

                        <ul style="
                margin-bottom: 0px;
            ">
                            <li class="one">SociaL Media Marketing 1 Posts</li>
                            <li>1 Bulk Email Broadcast</li>
                            <li class="one">X</li>
                        </ul>
                        {{-- <div class="btn-wrap">
                  <a href="{{ route('admin.comming') }}" class="btn-buy">CONTACT US</a>
                </div> --}}
                    </div>
                </div>

                <div class="section-title"
                    style="text-align: center;
        
        margin-right:auto;
        margin-top: 30px;
        margin-left:auto;
        background: rgb(5, 73, 142);
        border-radius: 10px;
        margin-bottom: 30px;
        ">

                    <h3
                        style="
                padding: 20px;text-align:center;
                font-size:21px;
                border-radius: 0px;
                margin: 0px;    font-weight: 600;
    color: white;
    
            ">
                        PRINT VERSION ADD-ONS</h3>
                </div>
                <div class="row">



                    <div class="box responsive"
                        style="
              padding: 0px !important;
              border-radius: 6px 6px 0px 0px !important;
          ">

                        <ul style="
                margin-bottom: 0px;
            ">
                            <li class="one">Gatefold Double Spread, Book-Mark (1 Side), Book-Mark (2 Sides)</li>
                            <li>Outside Back Cover, Inside Front Cover, Inside Back Cover</li>
                            <li class="one">Section Divider (1 Side), Full Page (Full Color), Half Page Horizontzal /
                                Vertical(Full Color)</li>
                        </ul>
                        {{-- <div class="btn-wrap">
                  <a href="{{ route('admin.comming') }}" class="btn-buy">CONTACT US</a>
                </div> --}}
                    </div>
                </div>
                <div class="section-title"
                    style="text-align: center;
        
            width:fit-content;margin-right:auto;
            margin-top: 50px;
            margin-left:auto;
            background: rgb(5, 73, 142);
            border-radius: 10px;
            margin-bottom: 30px;
            ">
<a href="{{ route('admin.contact') }}">
  <h3 style="
      padding: 20px;
      text-align: center;
      font-size: 21px;
      border-radius: 0px;
      margin: 0px;
      font-weight: 600;
      color: white;
  ">CONTACT US NOW</h3>
</a>

                </div>
            </div>
        </div>

        </div>
        </div>
    </section><!-- End Pricing Section -->
    <style>
        div.col-md-2 img {
            border-radius: 0px;
            height: 217px;
        }


        @media only screen and (max-width: 700px) {
            div.col-md-2 img {
                margin: 6px;
            }
        }

        @media only screen and (max-width: 500px) {
            div.col-md-2 img {
                margin: 6px;
            }

        }
        @media only screen and (max-width: 600px) {
            .instagram-post{
                display: grid;
                gap:8px;
            }
        }
    </style>

    {{-- <div class="content-container-fluid" style="padding-top: 80px;">
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
