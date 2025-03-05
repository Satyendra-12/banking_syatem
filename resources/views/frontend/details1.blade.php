@extends('frontend.layout.app')


@section('content')
    <style>
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
    </style>

    <div class="container-fluid" style="margin-top:10px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="homepage-sections fr-view">
                    <div class=" w3-display-container">
                        <img class="mySlides2" src="{{ asset('frontend/img/bank_1.jpg') }}" style="width: 86.4%;height: 400px;display: block;margin-left: auto;margin-right: auto;border-radius: 0px !important;">
                        

                        
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
                    <div id="home-slider" class="owl-carousel owl-theme">
                        <!-- <div class="item">
                                                                                                <img src="bank_3.jpg" alt="slide-1" class="img-responsive" style="height:500px;">
                                                                                            </div> -->
                        <div class="item">
                            <img src="bank_4.jpg" alt="slide-2" class="img-responsive" stle="height:500px;">
                        </div>
                        <div class="item">
                            <img src="bank_1.jpg" alt="slide-2" class="img-responsive" stle="height:500px;">
                        </div>
                        <div class="item">
                            <img src="bank_2.jpg" alt="slide-2" class="img-responsive" stle="height:500px;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slider -->

        </div>
    </div>
   


    <div class="container" style="
    width: 87%;
">
        <div class="row" style="margin-top: 35px;">
            <div class="col-sm-4">
                <div class="" style="margin-top: -15px;"> <img src="http://localhost/bahraia_bank/public/frontend/img/logo.png" alt="" style="" class="img-fluid"></div>

            </div>
            <div class="col-sm-4">

                <h3 style="font-size: 2.5rem;">Bank ABC</h3>
                <p style="
                padding-top: 35px;
                font-size: 17px;
                font-weight: 600;
            ">
                    <i class="fa fa-map-marker" aria-hidden="true" style="font-size:16px;color:red"></i>
                    ABC Tower, Building 152<br>
                    Road 1703, Block 317, Diplomatic Area<br>
                    MANAMA, 5698
                </p>
            </div>
            <div class="col-sm-4">




                <div class="" style="
                                padding:10px 0px 50px 20px;
                                border-radius: 13px;
                                background-color:rgb(237, 236, 232);
                            ">
                    <h1 class="" style="font-size: 2rem;"><b style="
                                    font-size: 2rem;
                                    font-weight: 600;
                                    color:rgb(32, 80, 129);
                                    ">CATEGORY</b>
                    </h1>
                    <div style="
                            
                                width: 76%;
                                margin-left: 37px;
                            ">
                    </div>

                    <p class="text-bold">
                        </p><li style="padding-top: 5px;list-style: none;">
                            <b> CONVENTIONAL BANKS - RETAIL</b>
                            
                        </li>
                    <p></p>


                </div>
            </div>



        </div>
    </div>
    
    <style>
        .w3-black {}
        .w3-bar .w3-bar-item {
    padding: 8px 25px !important;
        }
    </style>
    <div class="container pt-5 mt-7" style="padding:15px;background:lightgray;">
        <div class="w3-bar"
            style="color: #000;
            border: 2px solid rgb(32, 80, 129);
        background-color: lightgray;
        /* padding:15px; */
        font-weight: bold;border-radius:0px;">
            <button class="w3-bar-item w3-button" onclick="openCity('London')"
                style="border-right: 2px solid rgb(32, 80, 129); border-radius: 0px;">Overview</button>
            <button class="w3-bar-item w3-button" onclick="openCity('Paris')"
                style="border-right: 2px solid rgb(32, 80, 129); border-radius: 0px;">Management</button>
            <button class="w3-bar-item w3-button" onclick="openCity('Tokyo')"
                style="border-right: 2px solid rgb(32, 80, 129); border-radius: 0px;">Feature</button>
            <button class="w3-bar-item w3-button" onclick="openCity('Whos')"
                style="border-right: 2px solid rgb(32, 80, 129); border-radius: 0px;">Who's Who</button>
            <button class="w3-bar-item w3-button" onclick="openCity('Product')"
                style="border-right: 2px solid rgb(32, 80, 129); border-radius: 0px;">Products & Services</button>
            <button class="w3-bar-item w3-button" onclick="openCity('Breanch')"
                style="border-right: 2px solid rgb(32, 80, 129); border-radius: 0px;">Brances $ ATMs</button>
            <button class="w3-bar-item w3-button" onclick="openCity('Careers')"
                style="border-right: 2px solid rgb(32, 80, 129); border-radius: 0px;">Careers</button>
            <button class="w3-bar-item w3-button" onclick="openCity('Offers')"
                style="border-right: 2px solid rgb(32, 80, 129); border-radius: 0px;">Offers</button>
            <button class="w3-bar-item w3-button" onclick="openCity('Reviews')"
                style="border-radius: 0px;">Reviews</button>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div id="London" class="w3-container city" style="padding:10px;">
                    <div class="row" style="margin: 0px;padding-top: 24px;">
                        <div class="col-12">
                            <h1 class="btn btn-light" style="font-size:20px;"><b>Overview</b></h1>
                            <div class="btn" style="float:right;" >
                                <button type="button" class="btn btn-primary"
                                    style="background:rgb(5, 73, 142);color:#fff;margin-right:25px;">Send
                                    Enquiry</button>
                                <button type="button" class="btn btn-primary"
                                    style="background:rgb(5, 73, 142);color:#fff;margin-right:25px;">Post
                                    Review</button>
                                {{-- <button type="button" class="btn btn-primary"
                                    style="background:hsl(210, 84%, 66%);color:#fff; border:none;"><i class="fa fa-print"
                                        aria-hidden="true"></i>
                                </button> --}}
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row justify-center mt-7">
                        <div class="w-[100%]">
                            <h1 class="text-justify text-lg font-normal text-slate-600"
                                style="font-size:15px;line-height: 2.75rem;">Lorem,
                                ipsum dolor sit amet consectetur
                                adipisicing elit. Rerum
                                fugiat, ducimus placeat neque voluptas, animi nemo
                                quo voluptatum non
                                suscipit, quas adipisci at labore? Corporis neque
                                aliquam culpa
                                suscipit doloribus reiciendis exercitationem. Beatae
                                eveniet esse
                                deleniti id reiciendis reprehenderit possimus
                                temporibus. Earum, atque
                                in esse sequi aliquid cupiditate, totam iste illo
                                dolores quisquam est
                                fugit laudantium pariatur nisi facilis dolorum
                                quidem at repudiandae
                                molestiae provident? Quos tempora hic autem
                                consequuntur aut
                                praesentium pariatur vitae quo eveniet id,
                                perferendis sit molestiae
                                magni ipsa quam corrupti nulla rem, repudiandae
                                incidunt mollitia
                                numquam optio. Vel quisquam expedita ipsa maxime
                                suscipit, iure fugiat
                                nesciunt a amet eaque nam dolorem nisi est, officia
                                hic non. Vero
                                illum magni id. Quod, quae? repudiandae incidunt
                                mollitia
                                numquam optio. Vel quisquam expedita ipsa maxime
                                suscipit, iure fugiat
                                nesciunt a amet eaque nam dolorem nisi est, officia
                                hic non. Vero
                                illum magni id. Quod, quae? </h1>


                            <h1 class="mt-10 font-semibold text-xl text-slate-900 font-bold">Media
                                Gallery</h1>
                            <div class="flex mt-7 gap-3">
                                <img src="{{ asset('frontend/img/case-7.jpg') }}" alt class="rounded-xl"
                                    style="width:170px;">
                                <img src="{{ asset('frontend/img/case-4.jpg') }}" alt class="rounded-md"
                                    style="width:170px;">
                                <img src="{{ asset('frontend/img/case-1.jpg') }}" alt class="rounded-md"
                                    style="width:170px;">
                                <img src="{{ asset('frontend/img/case-7.jpg') }}" alt class="rounded-md"
                                    style="width:170px;">
                            </div>
                        </div>


                    </div>
                </div>

                <div id="Paris" class="w3-container city" style="display:none">
                    <div class="col-12" style="margin-top:30px; ">
                        <h1 class="btn btn-light" style="font-size:20px;"><b>Management</b></h1>
                        <div class="btn" style="float:right;">
                            <button type="button" class="btn btn-primary"
                                style="background:rgb(5, 73, 142);color:#fff;margin-right:25px;">Send
                                Enquiry</button>
                            <button type="button" class="btn btn-primary"
                                style="background:rgb(5, 73, 142);color:#fff;margin-right:25px;">Post
                                Review</button>
                            {{-- <button type="button" class="btn btn-primary"
                                style="background:hsl(210, 84%, 66%);color:#fff; border:none;"><i class="fa fa-print"
                                    aria-hidden="true"></i>
                            </button> --}}
                        </div>
                    </div>
                    <div>

                        <div style="display: flex; justify-content: start; align-items: center;">
                            {{-- <i class="fa fa-angle-right" aria-hidden="true"
                                style=" font-size: 30px;color: blue;"></i> --}}

                            <h5 style="padding: 10px;font-weight: 600;font-size: 2rem;">
                                Saddek Omar El Kaber</h5>
                        </div>
                        <div style="padding-left:10px;">
                            Group Head of Islamic Banking & Managing Director
                            {{-- <span class="text-right">ghj</span> --}}
                            <p style="font-weight:bold; display: flex;flex-direction: row-reverse;">+973 1754 3200</p>
                        </div>
                        <div style="display: flex; justify-content: start; align-items: center;">
                            {{-- <i class="fa fa-angle-right" aria-hidden="true"
                                style="
                    font-size: 30px;
                    color: blue;
                "></i> --}}

                            <h5 style="padding: 10px;
                                font-weight: 600;font-size: 2rem;">
                                Mohammad Abdulredha Saleem</h5>

                        </div>
                        <div style="
                            padding-left:10px;
                        ">
                            Deputy Head of Islamic Banking & Deputy Managing Director
                            <p style=" font-weight:bold; display: flex;flex-direction: row-reverse;">+973 1754 3200</p>

                        </div>
                        <div style="display: flex; justify-content: start; align-items: center;">
                            {{-- <i class="fa fa-angle-right" aria-hidden="true"
                                style="
                    font-size: 30px;
                    color: blue;
                "></i> --}}

                            <h5 style="padding: 10px;
                                font-weight: 600;font-size: 2rem;">
                                Sael Al Waary
                            </h5>

                        </div>
                        <div style="padding-left:10px;">
                            Risk & Credit Support
                            <p style="font-weight:bold; display: flex;flex-direction: row-reverse;">+973 1754 3224</p>

                        </div>
                        <div style="display: flex; justify-content: start; align-items: center;">
                            {{-- <i class="fa fa-angle-right" aria-hidden="true"
                                style="
                    font-size: 30px;
                    color: blue;
                "></i> --}}

                            <h5 style="padding: 10px;
                                font-weight: 600;font-size: 2rem;">
                                Fouad Salame
                            </h5>

                        </div>
                        <div style="
                            padding-left:10px;
                        ">
                            Financial Control
                            <p style="font-weight:bold; display: flex;flex-direction: row-reverse;">+973 1754 3776</p>

                        </div>
                        <div style="display: flex; justify-content: start; align-items: center;">
                            {{-- <i class="fa fa-angle-right" aria-hidden="true"
                                style="
                    font-size: 30px;
                    color: blue;
                "></i> --}}

                            <h5 style="padding: 10px;
                                font-weight: 600;font-size: 2rem;">
                                Sami Bengharsa</h5>

                        </div>
                        <div style="
                            padding-left:10px;">
                            Compliance & MLRO
                            <p style="font-weight:bold; display: flex;flex-direction: row-reverse;">+973 1754 3359</p>

                        </div>
                        <div style="display: flex; justify-content: start; align-items: center;">
                            {{-- <i class="fa fa-angle-right" aria-hidden="true"
                                style="
                    font-size: 30px;
                    color: blue;
                "></i> --}}

                            <h5 style="padding: 10px;
                                font-weight: 600;font-size: 2rem;">
                                Jeremy R.M. Dixon</h5>
                        </div>
                        <div style="padding-left:10px;">
                            Sharia Compliance 1
                            <p style="font-weight:bold; display: flex;flex-direction: row-reverse;">+973 1754 3637</p>

                        </div>
                        <div style="display: flex; justify-content: start; align-items: center;">
                            {{-- <i class="fa fa-angle-right" aria-hidden="true"
                                style="
                    font-size: 30px;
                    color: blue;
                "></i> --}}

                            <h5 style="padding: 10px;
                                font-weight: 600;font-size: 2rem;">
                                Mohamed Almaraj
                            </h5>

                        </div>
                        <div style="padding-left:10px;">
                            Sharia Compliance 2
                            <p style="font-weight:bold; display: flex;flex-direction: row-reverse;">+973 1754 3118</p>

                        </div>
                        <div style="display: flex; justify-content: start; align-items: center;">
                            {{-- <i class="fa fa-angle-right" aria-hidden="true"
                                style="
                    font-size: 30px;
                    color: blue;
                "></i> --}}

                            <h5 style="padding: 10px;
                                font-weight: 600;font-size: 2rem;">
                                Mazen Ladki
                            </h5>
                        </div>
                        <div style="padding-left:10px; ">
                            <p> Sharia Compliance 3</p>
                            <p style="font-weight:bold; display: flex;flex-direction: row-reverse;">+973 1754 3155</p>

                        </div>

                        <h1 class="mt-10 font-semibold text-xl text-slate-900 font-bold">Media
                            Gallery</h1>
                        <div class="flex mt-7 gap-3">
                            <img src="{{ asset('frontend/img/case-7.jpg') }}" alt class="rounded-xl"
                                style="width:170px;">
                            <img src="{{ asset('frontend/img/case-4.jpg') }}" alt class="rounded-md"
                                style="width:170px;">
                            <img src="{{ asset('frontend/img/case-1.jpg') }}" alt class="rounded-md"
                                style="width:170px;">
                            <img src="{{ asset('frontend/img/case-7.jpg') }}" alt class="rounded-md"
                                style="width:170px;">
                        </div>
                    </div>
                </div>

                <div id="Tokyo" class="w3-container w3-border city" style="display:none">
                    <div class="col-12" style="margin-top:30px; ">
                        <h1 class="btn btn-light" style="font-size:20px;"><b>Feature</b></h1>
                        <div class="btn" style="float:right;">
                            <button type="button" class="btn btn-primary"
                                style="background:rgb(5, 73, 142);color:#fff;margin-right:25px;">Send
                                Enquiry</button>
                            <button type="button" class="btn btn-primary"
                                style="background:rgb(5, 73, 142);color:#fff;margin-right:25px;">Post
                                Review</button>
                            {{-- <button type="button" class="btn btn-primary"
                                style="background:hsl(210, 84%, 66%);color:#fff; border:none;"><i class="fa fa-print"
                                    aria-hidden="true"></i>
                            </button> --}}
                        </div>
                    </div>
                    <div>
                        <div class="card mt-5" style="border: none;">
                            <div class="card-body"
                                style="border:1px solid rgb(5, 73, 142);
                                    border-radius: 22px;">
                                <h5 class="card-title" style="font-weight: bold;padding: 15px;">Caption - Lorem
                                    Ipsum</h5>
                                <p class="card-text" style="padding: 15px;padding-top: 2px;">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna
                                    aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
                                    lacus vel facilisis. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua.
                                    Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus
                                    vel facilisis.<a href="#" style=" color: deepskyblue;">Read More...</a></p>
                            </div>
                        </div>
                        <div class="card" style="margin-top: 40px;border: none;">
                            <div class="card-body"
                                style="border:1px solid rgb(5, 73, 142);
                                    border-radius: 22px;">
                                <h5 class="card-title" style="font-weight: bold;padding: 15px;">Caption - Lorem
                                    Ipsum</h5>
                                <p class="card-text" style="padding: 15px;padding-top: 2px;">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna
                                    aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
                                    lacus vel facilisis. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua.
                                    Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus
                                    vel facilisis.<a href="#" style=" color: deepskyblue;">Read More...</a></p>

                            </div>


                        </div>
                        <div class="card" style="margin-top: 40px;border: none;">
                            <div class="card-body"
                                style="border:1px solid rgb(5, 73, 142);
                                    border-radius: 22px;">
                                <h5 class="card-title" style="font-weight: bold;padding: 15px;">Caption - Lorem
                                    Ipsum</h5>
                                <p class="card-text" style="padding: 15px;padding-top: 2px;">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna
                                    aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan
                                    lacus vel facilisis. Lorem
                                    ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua.
                                    Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus
                                    vel facilisis.<a href="#" style=" color: deepskyblue;">Read More...</a></p>

                            </div>
                        </div>
                    </div>

                    <h1 class="mt-10 font-semibold text-xl text-slate-900 font-bold">Media
                        Gallery</h1>
                    <div class="flex mt-7 gap-3">
                        <img src="{{ asset('frontend/img/case-7.jpg') }}" alt class="rounded-xl" style="width:170px;">
                        <img src="{{ asset('frontend/img/case-4.jpg') }}" alt class="rounded-md" style="width:170px;">
                        <img src="{{ asset('frontend/img/case-1.jpg') }}" alt class="rounded-md" style="width:170px;">
                        <img src="{{ asset('frontend/img/case-7.jpg') }}" alt class="rounded-md" style="width:170px;">
                    </div>
                </div>
                <div id="Whos" class="w3-container city" style="display:none">
                    <div class="col-12" style="margin-top:30px; ">
                        <h1 class="btn btn-light" style="font-size:20px;"><b>Who's Who</b></h1>
                        <div class="btn" style="float:right;">
                            <button type="button" class="btn btn-primary"
                                style="background:rgb(5, 73, 142);color:#fff;margin-right:25px;">Send
                                Enquiry</button>
                            <button type="button" class="btn btn-primary"
                                style="background:rgb(5, 73, 142);color:#fff;margin-right:25px;">Post
                                Review</button>
                            {{-- <button type="button" class="btn btn-primary"
                                style="background:hsl(210, 84%, 66%);color:#fff; border:none;"><i class="fa fa-print"
                                    aria-hidden="true"></i>
                            </button> --}}
                        </div>
                    </div>


                    <div class="row mt-5">
                        <div class="col-md-12 mt-5"
                            style="    display: flex;
                        flex-direction: column-reverse;
                        flex-wrap: wrap;
                        align-content: center;">
                            <div class="col-xs-12 col-sm-6 col-md-8 member featured-member">
                                <div class="well"
                                    style="border-left:5px solid rgb(32, 80, 129); height:200px; border-right:5px solid rgb(32, 80, 129);">
                                    <a class="h4 bold bmargin inline-block" title="Bank ABC - View Listing"
                                        href="#">
                                        DR. A.S. ELAVARASAN SOUNDARAJAN (PRINCE) </a>
                                    <div class="clearfix"></div>
                                    <div class="col-xs-4 nopad text-center featured-member-image">
                                        <img src="{{ asset('frontend/img/case-4.jpg') }}" width="200" height="200"
                                            alt="Bank ABC">
                                        <a title="Bank ABC - View Listing"
                                            href="/manama/conventional-banks-wholesale-1/bank-abc">
                                            <!-- <img class="img-rounded lazyloader" loading="lazy" width="200" height="200"
                                                                                                                                                                                                                                         alt="Bank ABC" data-src="/case-1.jpg"> -->
                                        </a>
                                    </div>
                                    <div class="col-xs-8 norpad small featured-member-info">
                                        {{-- <p>
                                            Lorem ipsum is placeholder text commonly used in the graphic, print,
                                            and
                                            publishing industries for previewing layouts and visual mockups.
                                        </p> --}}
                                        <h3
                                            style="font-size:15px;
                                            /* font-weight: 700; */
                                            /* color: blue; */
                                            padding-bottom:5px;
                                            padding-top:3px;
                                        ">
                                            FOUNDER
                                        </h3>
                                        <text
                                            style="font-size:15px;
                                            font-weight: 600;
                                        ">
                                            ASP AUDITING</text>
                                        <h4
                                            style="font-size:15px;
                                            /* font-weight: 600; */
                                        ">

                                            BAHRAIN
                                        </h4>
                                        <a title="Bank ABC - View Listing"
                                            class="tmargin btn btn-sm btn-primary btn-block"
                                            href="/manama/conventional-banks-wholesale-1/bank-abc"
                                            style="width:50%;float:right;padding:4px;">View
                                            More</a>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-8 member featured-member">
                                <div class="well"
                                    style="border-left:5px solid rgb(32, 80, 129); height:200px; border-right:5px solid rgb(32, 80, 129);">
                                    <a class="h4 bold bmargin inline-block" title="Bank ABC - View Listing"
                                        href="#">
                                        DR. A.S. ELAVARASAN SOUNDARAJAN (PRINCE)</a>
                                    <div class="clearfix"></div>
                                    <div class="col-xs-4 nopad text-center featured-member-image">
                                        <img src="{{ asset('frontend/img/case-4.jpg') }}" width="200" height="200"
                                            alt="Bank ABC">
                                        <a title="Bank ABC - View Listing"
                                            href="/manama/conventional-banks-wholesale-1/bank-abc">
                                            <!-- <img class="img-rounded lazyloader" loading="lazy" width="200" height="200"
                                                                                                                                                                                                                                         alt="Bank ABC" data-src="/case-1.jpg"> -->
                                        </a>
                                    </div>
                                    <div class="col-xs-8 norpad small featured-member-info">
                                        {{-- <p>
                                            Lorem ipsum is placeholder text commonly used in the graphic, print,
                                            and
                                            publishing industries for previewing layouts and visual mockups.
                                        </p> --}}
                                        <h3
                                            style="font-size:15px;
                                            /* font-weight: 700; */
                                            /* color: blue; */
                                            padding-bottom:5px;
                                            padding-top:3px;
                                        ">
                                            FOUNDER
                                        </h3>
                                        <text
                                            style="font-size:15px;
                                            font-weight: 600;
                                        ">
                                            ASP AUDITING</text>
                                        <h4
                                            style="font-size:15px;
                                            /* font-weight: 600; */
                                        ">

                                            BAHRAIN
                                        </h4>
                                        <a title="Bank ABC - View Listing"
                                            class="tmargin btn btn-sm btn-primary btn-block"
                                            href="/manama/conventional-banks-wholesale-1/bank-abc"
                                            style="width:50%;float:right;padding:4px;">View
                                            More</a>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-8 member featured-member">
                                <div class="well"
                                    style="border-left:5px solid rgb(32, 80, 129); height:200px; border-right:5px solid rgb(32, 80, 129);">
                                    <a class="h4 bold bmargin inline-block" title="Bank ABC - View Listing"
                                        href="#">
                                        DR. A.S. ELAVARASAN SOUNDARAJAN (PRINCE) </a>
                                    <div class="clearfix"></div>
                                    <div class="col-xs-4 nopad text-center featured-member-image">
                                        <img src="{{ asset('frontend/img/case-4.jpg') }}" width="200" height="200"
                                            alt="Bank ABC">
                                        <a title="Bank ABC - View Listing"
                                            href="/manama/conventional-banks-wholesale-1/bank-abc">
                                            <!-- <img class="img-rounded lazyloader" loading="lazy" width="200" height="200"
                                                                                                                                                                                                                                         alt="Bank ABC" data-src="/case-1.jpg"> -->
                                        </a>
                                    </div>
                                    <div class="col-xs-8 norpad small featured-member-info">
                                        {{-- <p>
                                            Lorem ipsum is placeholder text commonly used in the graphic, print,
                                            and
                                            publishing industries for previewing layouts and visual mockups.
                                        </p> --}}
                                        <h3
                                            style="font-size:15px;
                                            /* font-weight: 700; */
                                            /* color: blue; */
                                            padding-bottom:5px;
                                            padding-top:3px;
                                        ">
                                            FOUNDER
                                        </h3>
                                        <text
                                            style="font-size:15px;
                                            font-weight: 600;
                                        ">
                                            ASP AUDITING</text>
                                        <h4
                                            style="font-size:15px;
                                            /* font-weight: 600; */
                                        ">

                                            BAHRAIN
                                        </h4>

                                        <a title="Bank ABC - View Listing"
                                            class="tmargin btn btn-sm btn-primary btn-block"
                                            href="/manama/conventional-banks-wholesale-1/bank-abc"
                                            style="width:50%;float:right;padding:4px;">View
                                            More</a>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <h1 class="mt-10 font-semibold text-xl text-slate-900 font-bold">Media
                        Gallery</h1>
                    <div class="flex mt-7 gap-3">
                        <img src="{{ asset('frontend/img/case-7.jpg') }}" alt class="rounded-xl" style="width:170px;">
                        <img src="{{ asset('frontend/img/case-4.jpg') }}" alt class="rounded-md" style="width:170px;">
                        <img src="{{ asset('frontend/img/case-1.jpg') }}" alt class="rounded-md" style="width:170px;">
                        <img src="{{ asset('frontend/img/case-7.jpg') }}" alt class="rounded-md" style="width:170px;">
                    </div>
                </div>
                <div id="Product" class="w3-container city" style="display:none">
                    <div class="col-12" style="margin-top:30px; ">
                        <h1 class="btn btn-light" style="font-size:20px;"><b>Products & Services</b></h1>
                        <div class="btn" style="float:right;">
                            <button type="button" class="btn btn-primary"
                                style="background:rgb(5, 73, 142);color:#fff;margin-right:25px;">Send
                                Enquiry</button>
                            <button type="button" class="btn btn-primary"
                                style="background:rgb(5, 73, 142);color:#fff;margin-right:25px;">Post
                                Review</button>
                            {{-- <button type="button" class="btn btn-primary"
                                style="background:hsl(210, 84%, 66%);color:#fff; border:none;"><i class="fa fa-print"
                                    aria-hidden="true"></i>
                            </button> --}}
                        </div>
                    </div>
                    <div>
                        <div class="card mt-5" style="border: none;">
                            <div class="card-body"
                                style="border:2px solid rgb(5, 73, 142);
                                    border-radius: 22px;">
                                <h5 class="card-title" style="font-weight: bold;padding: 15px;">Caption - Lorem
                                    Ipsum</h5>
                                <p class="card-text" style="padding: 15px;padding-top: 2px;">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa
                                    aspernatur voluptate corporis qui provident placeat deserunt distinctio
                                    assumenda totam ex. <a href="#" style=" color: deepskyblue;">Read More..</a></p>
                            </div>
                        </div>
                        <div class="card" style="margin-top: 40px;border: none;">
                            <div class="card-body"
                                style="border:2px solid rgb(5, 73, 142);
                                    border-radius: 22px;">
                                <h5 class="card-title" style="font-weight: bold;padding: 15px;">Caption - Lorem
                                    Ipsum</h5>
                                <p class="card-text"
                                    style="
                                        padding: 15px; padding-top: 2px;">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa
                                    aspernatur voluptate corporis qui provident placeat deserunt distinctio
                                    assumenda totam ex. <a href="#" style=" color: deepskyblue;">Read More..</a></p>

                            </div>
                        </div>
                        <div class="card" style="margin-top: 40px;border: none;">
                            <div class="card-body"
                                style="border:2px solid rgb(5, 73, 142);
                                    border-radius: 22px;">
                                <h5 class="card-title" style="font-weight: bold;padding: 15px;">Caption - Lorem
                                    Ipsum</h5>
                                <p class="card-text"
                                    style="
                                        padding: 15px; padding-top: 2px;">
                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa
                                    aspernatur voluptate corporis qui provident placeat deserunt distinctio
                                    assumenda totam ex. <a href="#" style=" color: deepskyblue;">Read More..</a></p>

                            </div>
                        </div>
                    </div>

                    <h1 class="mt-10 font-semibold text-xl text-slate-900 font-bold">Media
                        Gallery</h1>
                    <div class="flex mt-7 gap-3">
                        <img src="{{ asset('frontend/img/case-7.jpg') }}" alt class="rounded-xl" style="width:170px;">
                        <img src="{{ asset('frontend/img/case-4.jpg') }}" alt class="rounded-md" style="width:170px;">
                        <img src="{{ asset('frontend/img/case-1.jpg') }}" alt class="rounded-md" style="width:170px;">
                        <img src="{{ asset('frontend/img/case-7.jpg') }}" alt class="rounded-md" style="width:170px;">
                    </div>
                </div>
                <div id="Breanch" class="w3-container city" style="display:none">
                    {{-- <div>
                        <h1
                            style="color: deepskyblue;font-size: 2.125rem;padding-top: 25px;font-weight: 700;padding-bottom: 15px;line-height: 4.75rem;">
                            Branches & ATMs</h1>
                        <div style="display: flex; justify-content: center;">
                            <div style="display: flex; flex-direction: row;">
                                <div class="col-lg-6">
                                    <div class="card" style="border: none;">
                                        <div class="card-body"
                                            style="border: 13px solid lightgray;
                                            border-radius: 22px;">
                                            <h5 class="card-title"
                                                style="font-weight: bold;    padding: 15px;
                                                font-size: 2rem;
                                            ">
                                                Branches</h5>

                                            <div class="dropdown">
                                                <button class="dropbtn"><b>Branch 1</b><i class="fa fa-caret-down"
                                                        style="padding-left: 24px;"></i></button>
                                                <div class="dropdown-content">
                                                    <a href="#">Action</a>
                                                    <a href="#">Another action</a>
                                                    <a href="#">Something else here</a>
                                                </div>
                                            </div><br>
                                            <div class="dropdown">
                                                <button class="dropbtn"><b>Branch 2</b><i class="fa fa-caret-down"
                                                        style="padding-left: 24px;"></i></button>
                                                <div class="dropdown-content">
                                                    <a href="#">Action</a>
                                                    <a href="#">Another action</a>
                                                    <a href="#">Something else here</a>
                                                </div>
                                            </div><br>
                                            <div class="dropdown">
                                                <button class="dropbtn">
                                                    <b>Branch 3</b><i class="fa fa-caret-down"
                                                        style="padding-left: 24px;"></i></button>
                                                <div class="dropdown-content">
                                                    <a href="#">Action</a>
                                                    <a href="#">Another action</a>
                                                    <a href="#">Something else here</a>
                                                </div>
                                            </div><br>
                                            <div class="dropdown">
                                                <button class="dropbtn"><b>Branch 4</b><i class="fa fa-caret-down"
                                                        style="padding-left: 24px;"></i></button>
                                                <div class="dropdown-content">
                                                    <a href="#">Action</a>
                                                    <a href="#">Another action</a>
                                                    <a href="#">Something else here</a>
                                                </div>
                                            </div><br>
                                            <div class="dropdown">
                                                <button class="dropbtn"><b>Branch 5</b><i class="fa fa-caret-down"
                                                        style="padding-left: 24px;"></i></button>
                                                <div class="dropdown-content">
                                                    <a href="#">Action</a>
                                                    <a href="#">Another action</a>
                                                    <a href="#">Something else here</a>
                                                </div>
                                            </div><br>
                                            <div class="dropdown">
                                                <button class="dropbtn">
                                                    <b>Branch 6</b><i class="fa fa-caret-down"
                                                        style="padding-left: 24px;"></i></button>
                                                <div class="dropdown-content">
                                                    <a href="#">Action</a>
                                                    <a href="#">Another action</a>
                                                    <a href="#">Something else here</a>
                                                </div>
                                            </div><br>
                                            <div class="dropdown">
                                                <button class="dropbtn"><b>Branch 7</b><i class="fa fa-caret-down"
                                                        style="padding-left: 24px;"></i></button>
                                                <div class="dropdown-content">
                                                    <a href="#">Action</a>
                                                    <a href="#">Another action</a>
                                                    <a href="#">Something else here</a>
                                                </div>
                                            </div><br>
                                            <div class="dropdown">
                                                <button class="dropbtn"
                                                    style="border-bottom: 1px solid;margin-bottom: 24px;"><b>Branch
                                                        8</b><i class="fa fa-caret-down"
                                                        style="padding-left: 24px;"></i></button>
                                                <div class="dropdown-content">
                                                    <a href="#">Action</a>
                                                    <a href="#">Another action</a>
                                                    <a href="#">Something else here</a>
                                                </div>
                                            </div><br>



                                        </div>
                                    </div>


                                </div>
                                <div class="col-lg-6">
                                    <div class="card" style="border: none;">
                                        <div class="card-body"
                                            style="border: 13px solid lightgray;
                                            border-radius: 22px;">
                                            <h5 class="card-title"
                                                style="font-weight: bold;    padding: 15px;
                                                 font-size: 2rem;
                                             ">
                                                ATMs</h5>

                                            <div class="dropdown">
                                                <button class="dropbtn"><b>ATM 1</b><i class="fa fa-caret-down"
                                                        style="padding-left: 24px;"></i></button>
                                                <div class="dropdown-content">
                                                    <a href="#">Action</a>
                                                    <a href="#">Another action</a>
                                                    <a href="#">Something else here</a>
                                                </div>
                                            </div><br>
                                            <div class="dropdown">
                                                <button class="dropbtn"><b>ATM 2</b><i class="fa fa-caret-down"
                                                        style="padding-left: 24px;"></i></button>
                                                <div class="dropdown-content">
                                                    <a href="#">Action</a>
                                                    <a href="#">Another action</a>
                                                    <a href="#">Something else here</a>
                                                </div>
                                            </div><br>
                                            <div class="dropdown">
                                                <button class="dropbtn">
                                                    <b>ATM 3</b><i class="fa fa-caret-down"
                                                        style="padding-left: 24px;"></i></button>
                                                <div class="dropdown-content">
                                                    <a href="#">Action</a>
                                                    <a href="#">Another action</a>
                                                    <a href="#">Something else here</a>
                                                </div>
                                            </div><br>
                                            <div class="dropdown">
                                                <button class="dropbtn"><b>ATM 4</b><i class="fa fa-caret-down"
                                                        style="padding-left: 24px;"></i></button>
                                                <div class="dropdown-content">
                                                    <a href="#">Action</a>
                                                    <a href="#">Another action</a>
                                                    <a href="#">Something else here</a>
                                                </div>
                                            </div><br>
                                            <div class="dropdown">
                                                <button class="dropbtn"><b>ATM 5</b><i class="fa fa-caret-down"
                                                        style="padding-left: 24px;"></i></button>
                                                <div class="dropdown-content">
                                                    <a href="#">Action</a>
                                                    <a href="#">Another action</a>
                                                    <a href="#">Something else here</a>
                                                </div>
                                            </div><br>
                                            <div class="dropdown">
                                                <button class="dropbtn">
                                                    <b>ATM 6</b><i class="fa fa-caret-down"
                                                        style="padding-left: 24px;"></i></button>
                                                <div class="dropdown-content">
                                                    <a href="#">Action</a>
                                                    <a href="#">Another action</a>
                                                    <a href="#">Something else here</a>
                                                </div>
                                            </div><br>
                                            <div class="dropdown">
                                                <button class="dropbtn"
                                                    style="border-bottom: 1px solid;margin-bottom: 61px;"><b>ATM
                                                        7</b><i class="fa fa-caret-down"
                                                        style="padding-left: 24px;"></i></button>
                                                <div class="dropdown-content">
                                                    <a href="#">Action</a>
                                                    <a href="#">Another action</a>
                                                    <a href="#">Something else here</a>
                                                </div>
                                            </div><br>




                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div
                            style="display: flex; justify-content: center;padding-top: 40px;
                                    
                                    ">
                            <div style="display: flex; flex-direction: row;">
                                <div class="mapouter">
                                    <div class="gmap_canvas"><iframe
                                            src="https://maps.google.com/maps?q=Bahrain&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                            frameborder="0" scrolling="no" style="width: 620px; height: 360px;"></iframe>
                                        <style>
                                            .mapouter {
                                                position: relative;
                                                height: 360px;
                                                width: 620px;
                                                background: #fff;
                                            }

                                            .maprouter a {
                                                color: #fff !important;
                                                position: absolute !important;
                                                top: 0 !important;
                                                z-index: 0 !important;
                                            }
                                        </style><a href="https://blooketjoin.org/">blooket</a>
                                        <style>
                                            .gmap_canvas {
                                                overflow: hidden;
                                                height: 360px;
                                                width: 620px
                                            }

                                            .gmap_canvas iframe {
                                                position: relative;
                                                z-index: 2
                                            }
                                        </style>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div> --}}

                    <div class="col-12" style="margin-top:30px; ">
                        <h1 class="btn btn-light" style="font-size:20px;"><b>Branch & ATMs</b></h1>
                        <div class="btn" style="float:right;">
                            <button type="button" class="btn btn-primary"
                                style="background:rgb(5, 73, 142);color:#fff;margin-right:25px;">Send
                                Enquiry</button>
                            <button type="button" class="btn btn-primary"
                                style="background:rgb(5, 73, 142);color:#fff;margin-right:25px;">Post
                                Review</button>
                            {{-- <button type="button" class="btn btn-primary"
                                style="background:hsl(210, 84%, 66%);color:#fff; border:none;"><i class="fa fa-print"
                                    aria-hidden="true"></i>
                            </button> --}}
                        </div>
                    </div>
                    <div>
                        {{-- <h1
                            style="color: deepskyblue;font-weight: 700;padding-top: 25px;padding-bottom: 15px; font-size: 3.125rem;line-height: 4.75rem;">
                            Careers</h1> --}}
                        <!-- <div style="display: flex; justify-content: start; align-items: center;"> -->

                        <div class="card mt-5" style="border: none;">
                            <div class="card-body mt-5"
                                style="border:2px solid rgb(5, 73, 142); border-radius: 22px; padding:10px;">
                                <h2 class="card-title" style="font-weight: bold;padding: 15px;">BRANCH LOCATION NAME-1
                                </h2>
                                <h6 class="card-title" style="padding-left: 15px;">ABC Tower, Building 152 Today!</h6>
                                <h6 class="card-title mt-3" style="padding-left: 15px;">Road 1703, Block 317, Diplomatic
                                    Area</h6>
                                <h6 class="card-title mt-3" style="padding-left: 15px;">MANAMA, 5698</h6>

                                <div class="new mb-5" style="display:flex;">
                                    <div class="border w-20 h-20 rounded-full bg-blue-900 flex items-center justify-center mt-10"
                                        style="margin-left: 15px;">
                                        {{-- <img src="{{('frontend/img/phone.png')}}" alt class="w-8"> --}}
                                        <i class="fa fa-phone" aria-hidden="true"
                                            style="color:#fff; font-size:20px;"></i>
                                    </div>
                                    <h6 class="card-title mt-5" style="padding-left: 15px; margin-top: 40px;">+9731254521
                                    </h6>
                                    <input type="text" id="fname" name="fname" value="Google Map Location Pin Link" style="border: 1px solid;width:72%; padding-top: -43px;margin-top: 30px;margin-bottom: 5px; background: lightgray;margin-left:10px;"><br>

                                </div>
                            </div>
                        </div>
                        <div class="card mt-5" style="border: none;">
                            <div class="card-body mt-5"
                                style="border:2px solid rgb(5, 73, 142); border-radius: 22px; padding:10px;">
                                <h2 class="card-title" style="font-weight: bold;padding: 15px;">BRANCH LOCATION NAME-2
                                </h2>
                                <h6 class="card-title" style="padding-left: 15px;">ABC Tower, Building 152 Today!</h6>
                                <h6 class="card-title mt-3" style="padding-left: 15px;">Road 1703, Block 317, Diplomatic
                                    Area</h6>
                                <h6 class="card-title mt-3" style="padding-left: 15px;">MANAMA, 5698</h6>

                                <div class="new mb-5" style="display:flex;">
                                    <div class="border w-20 h-20 rounded-full bg-blue-900 flex items-center justify-center mt-10"
                                        style="margin-left: 15px;">
                                        {{-- <img src="{{('frontend/img/phone.png')}}" alt class="w-8"> --}}
                                        <i class="fa fa-phone" aria-hidden="true"
                                            style="color:#fff; font-size:20px;"></i>
                                    </div>
                                    <h6 class="card-title mt-5" style="padding-left: 15px; margin-top: 40px;">+9731254521
                                    </h6>
                                    <input type="text" id="fname" name="fname" value="Google Map Location Pin Link" style="border: 1px solid;width:72%; padding-top: -43px;margin-top: 30px;margin-bottom: 5px; background: lightgray;margin-left:10px;"><br>

                                </div>
                            </div>
                        </div>
                        <div class="card mt-5" style="border: none;">
                            <div class="card-body mt-5"
                                style="border:2px solid rgb(5, 73, 142); border-radius: 22px; padding:10px;">
                                <h2 class="card-title" style="font-weight: bold;padding: 15px;">BRANCH LOCATION NAME-3
                                </h2>
                                <h6 class="card-title" style="padding-left: 15px;">ABC Tower, Building 152 Today!</h6>
                                <h6 class="card-title mt-3" style="padding-left: 15px;">Road 1703, Block 317, Diplomatic
                                    Area</h6>
                                <h6 class="card-title mt-3" style="padding-left: 15px;">MANAMA, 5698</h6>

                                <div class="new mb-5" style="display:flex;">
                                    <div class="border w-20 h-20 rounded-full bg-blue-900 flex items-center justify-center mt-10"
                                        style="margin-left: 15px;">
                                        {{-- <img src="{{('frontend/img/phone.png')}}" alt class="w-8"> --}}
                                        <i class="fa fa-phone" aria-hidden="true"
                                            style="color:#fff; font-size:20px;"></i>
                                    </div>
                                    <h6 class="card-title mt-5" style="padding-left: 15px; margin-top: 40px;">+9731254521
                                    </h6> 
                                     <input type="text" id="fname" name="fname" value="Google Map Location Pin Link" style="border: 1px solid;width:72%; padding-top: -43px;margin-top: 30px;margin-bottom: 5px; background: lightgray;margin-left:10px;"><br>


                                </div>
                            </div>
                        </div>
                        <h1 class="btn btn-light mt-5" style="font-size:20px;"><b>ATMs</b></h1>

                        <div class="card mt-5" style="border: none;">
                            <div class="card-body mt-5"
                                style="border:2px solid rgb(5, 73, 142); border-radius: 22px; padding:10px;">
                                <h2 class="card-title" style="font-weight: bold;padding: 15px;">BRANCH LOCATION NAME-2
                                </h2>
                                <h6 class="card-title" style="padding-left: 15px;">ABC Tower, Building 152 Today!</h6>
                                <h6 class="card-title mt-3" style="padding-left: 15px;">Road 1703, Block 317, Diplomatic
                                    Area</h6>
                                <h6 class="card-title mt-3" style="padding-left: 15px;">MANAMA, 5698</h6>

                                <input type="text" id="fname" name="fname" value="Google Map Location Pin Link" style="border: 1px solid; padding-top: -43px;margin-top: 10px;margin-bottom: 5px; background: lightgray;margin-left:15px;padding:8px;width:95%;"><br>


                            </div>
                        </div>
                        <div class="card mt-5" style="border: none;">
                            <div class="card-body mt-5"
                                style="border:2px solid rgb(5, 73, 142); border-radius: 22px; padding:10px;">
                                <h2 class="card-title" style="font-weight: bold;padding: 15px;">BRANCH LOCATION NAME-3
                                </h2>
                                <h6 class="card-title" style="padding-left: 15px;">ABC Tower, Building 152 Today!</h6>
                                <h6 class="card-title mt-3" style="padding-left: 15px;">Road 1703, Block 317, Diplomatic
                                    Area</h6>
                                <h6 class="card-title mt-3" style="padding-left: 15px;">MANAMA, 5698</h6>

                                <input type="text" id="fname" name="fname" value="Google Map Location Pin Link" style="border: 1px solid;padding-inline: 140px; padding-top: -43px;margin-top: 10px;margin-bottom: 5px; background: lightgray;margin-left:15px;padding:8px; width:95%;"><br>
                            </div>
                        </div>

                        <h1 class="mt-10 font-semibold text-xl text-slate-900 font-bold">Media
                            Gallery</h1>
                        <div class="flex mt-7 gap-3">
                            <img src="{{ asset('frontend/img/case-7.jpg') }}" alt class="rounded-xl"
                                style="width:170px;">
                            <img src="{{ asset('frontend/img/case-4.jpg') }}" alt class="rounded-md"
                                style="width:170px;">
                            <img src="{{ asset('frontend/img/case-1.jpg') }}" alt class="rounded-md"
                                style="width:170px;">
                            <img src="{{ asset('frontend/img/case-7.jpg') }}" alt class="rounded-md"
                                style="width:170px;">
                        </div>
                    </div>
                </div>
                <div id="Careers" class="w3-container city" style="display:none">
                    <div class="col-12" style="margin-top:30px; ">
                        <h1 class="btn btn-light" style="font-size:20px;"><b>Products & Services</b></h1>
                        <div class="btn" style="float:right;">
                            <button type="button" class="btn btn-primary"
                                style="background:rgb(5, 73, 142);color:#fff;margin-right:25px;">Send
                                Enquiry</button>
                            <button type="button" class="btn btn-primary"
                                style="background:rgb(5, 73, 142);color:#fff;margin-right:25px;">Post
                                Review</button>
                            {{-- <button type="button" class="btn btn-primary"
                                style="background:hsl(210, 84%, 66%);color:#fff; border:none;"><i class="fa fa-print"
                                    aria-hidden="true"></i>
                            </button> --}}
                        </div>
                    </div>
                    <div>
                        {{-- <h1
                            style="color: deepskyblue;font-weight: 700;padding-top: 25px;padding-bottom: 15px; font-size: 3.125rem;line-height: 4.75rem;">
                            Careers</h1> --}}
                        <!-- <div style="display: flex; justify-content: start; align-items: center;"> -->

                        <div class="card mt-5" style="border: none;">
                            <div class="card-body mt-5" style="border:2px solid rgb(5, 73, 142); border-radius: 22px;">
                                <h2 class="card-title" style="font-weight: bold;padding: 15px;">Looking for a Promising
                                       Career Path?</h2>
                                <h6 class="card-title" style="padding-left: 15px;">Join Our Team
                                    Today!</h6>
                                <h5 class="card-title"
                                    style="    padding-top: 15px;
                               margin-left: 15px; font-weight:bold; border-bottom: 1px solid rgb(5, 73, 142);width:95%; border-radius:0px; padding-bottom: 10px;">
                                    VACANCIES AVAILABLE</h5>
                                <p class="card-text" style="padding-inline:35px;"> <text
                                        style="padding-bottom: 10px;">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit, sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra
                                        maecenas accumsan lacus vel
                                        facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et
                                        dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra
                                        maecenas accumsan
                                        lacus vel facilisis.<a href="#"> Read</a>
                                </p>
                                <p class="card-text"
                                    style="
                                   padding-bottom: 15px;
                               ">
                                    <!-- <i class='fa fa-angle-right' style="
                                    font-weight: bold;
                                    font-size: 2rem;
                                    padding-left: 16px;
                                    padding-top: 10px;"> -->
                                </p>
                                <p class="card-text" style="padding-inline: 35px; margin-bottom:10px;"></i> <text
                                        style="padding-bottom: 10px;">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit, sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra
                                        maecenas accumsan lacus vel
                                        facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et
                                        dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra
                                        maecenas accumsan
                                        lacus vel facilisis.<a href="#"> Read</a></p>

                            </div>
                        </div>
                        <div class="card" style="margin-top: 40px;border: none;">
                            <div class="card-body" style="border: 2px solid rgb(5, 73, 142); border-radius: 22px;">
                                <h5 class="card-title"
                                    style="font-weight: bold; padding-top: 15px; margin-left:20px;padding-bottom: 10px;">
                                    HOW TO APPLY
                                </h5>
                                <p class="card-text" style="padding-inline:20px; margin-bottom:10px;"></i> <text
                                        style="padding-bottom: 10px;">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit, sed do eiusmod tempor incididunt ut labore et dolore
                                        magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra
                                        maecenas accumsan lacus vel
                                        facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et
                                        dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra
                                        maecenas accumsan
                                        lacus vel facilisis. <a href="#"> Read</a>
                                </p>
                            </div>
                        </div>
                        <h1 class="mt-10 font-semibold text-xl text-slate-900 font-bold">Media
                            Gallery</h1>
                        <div class="flex mt-7 gap-3">
                            <img src="{{ asset('frontend/img/case-7.jpg') }}" alt class="rounded-xl"
                                style="width:170px;">
                            <img src="{{ asset('frontend/img/case-4.jpg') }}" alt class="rounded-md"
                                style="width:170px;">
                            <img src="{{ asset('frontend/img/case-1.jpg') }}" alt class="rounded-md"
                                style="width:170px;">
                            <img src="{{ asset('frontend/img/case-7.jpg') }}" alt class="rounded-md"
                                style="width:170px;">
                        </div>
                    </div>
                </div>
                <div id="Offers" class="w3-container city" style="display:none">
                    <div class="col-12" style="margin-top:30px; ">
                        <h1 class="btn btn-light" style="font-size:20px;"><b>Offer</b></h1>
                        <div class="btn" style="margin-left:310px;">
                            <button type="button" class="btn btn-primary"
                                style="background:rgb(5, 73, 142);color:#fff;margin-right:25px;">Send
                                Enquiry</button>
                            <button type="button" class="btn btn-primary"
                                style="background:rgb(5, 73, 142);color:#fff;margin-right:25px;">Post
                                Review</button>
                            {{-- <button type="button" class="btn btn-primary"
                                style="background:hsl(210, 84%, 66%);color:#fff; border:none;"><i class="fa fa-print"
                                    aria-hidden="true"></i>
                            </button> --}}
                        </div>
                    </div>
                    <div>

                        <div class="mt-5" style="display: flex; justify-content: center;">
                            <div style="display: flex; flex-direction: row;">
                                <div class="col-lg-6">
                                    <div class="card" style="border: none;">
                                        <div class="card-body"
                                            style="border: 13px solid lightgray;
                                        border-radius: 22px;">
                                            <div
                                                style="text-align: -webkit-center;
                                        padding-top: 30px;
                                    ">
                                                <img class="card-img-top" src="{{ 'public/frontend/img/of1.png' }}"
                                                    alt="Card image cap">
                                            </div>
                                            <p class="card-text" style="padding: 15px;text-align: center;"><b>Enjoy 10%
                                                    discount when using your abc cards at black square cafe on all food
                                                    & beverages</b></p>
                                            <p class="card-text" style="text-align: center;"><b>*Terms and conditions
                                                    apply.</b></p>
                                            <p class="card-text" style="padding: 15px;text-align: center;"><b>Valid till
                                                    23-4-2023</b></p>




                                        </div>
                                    </div>


                                </div>
                                <div class="col-lg-6">
                                    <div class="card" style="border: none;">
                                        <div class="card-body"
                                            style="border: 13px solid lightgray;
                                        border-radius: 22px;">
                                            <div
                                                style="text-align: -webkit-center;
                                            padding-top: 30px;
                                        ">
                                                <img class="card-img-top" src="{{ 'public/frontend/img/of-2.png' }}"
                                                    alt="Card image cap">
                                            </div>
                                            <p class="card-text" style="padding: 15px;text-align: center;"><b>Enjoy 20%
                                                    discount when using your abc cards at black square cafe on all food
                                                    & beverages</b></p>
                                            <p class="card-text" style="text-align: center;"><b>*Terms and conditions
                                                    apply.</b></p>
                                            <p class="card-text" style="padding: 15px;text-align: center;"><b>Valid till
                                                    5-4-2023</b></p>




                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            style="display: flex; justify-content: center;padding-top: 40px;
                                
                                ">
                            <div style="display: flex; flex-direction: row;">
                                <div class="col-lg-6">
                                    <div class="card" style="border: none;">
                                        <div class="card-body"
                                            style="border: 13px solid lightgray;
                                            border-radius: 22px;">
                                            <div
                                                style="text-align: -webkit-center;
                                            padding-top: 30px;
                                        ">
                                                <img class="card-img-top" src="{{ 'public/frontend/img/of1.png' }}"
                                                    alt="Card image cap">
                                            </div>
                                            <p class="card-text" style="padding: 15px;text-align: center;"><b>Enjoy 10%
                                                    discount when using your abc cards at black square cafe on all food
                                                    & beverages</b></p>
                                            <p class="card-text" style="text-align: center;"><b>*Terms and conditions
                                                    apply.</b></p>
                                            <p class="card-text" style="padding: 15px;text-align: center;"><b>Valid till
                                                    2-7-2023</b></p>




                                        </div>
                                    </div>


                                </div>
                                <div class="col-lg-6">
                                    <div class="card" style="border: none;">
                                        <div class="card-body"
                                            style="border: 13px solid lightgray;
                                            border-radius: 22px;">
                                            <div
                                                style="text-align: -webkit-center;
                                            padding-top: 30px;
                                        ">
                                                <img class="card-img-top" src="{{ 'public/frontend/img/of3.png' }}"
                                                    alt="Card image cap">
                                            </div>
                                            <p class="card-text" style="padding: 15px;text-align: center;"><b>Enjoy 20%
                                                    discount when using your abc cards at black square cafe on all food
                                                    & beverages</b></p>
                                            <p class="card-text" style="text-align: center;"><b>*Terms and conditions
                                                    apply.</b></p>
                                            <p class="card-text" style="padding: 15px;text-align: center;"><b>Valid till
                                                    6-4-2023</b></p>




                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>

                    </div>
                </div>
                <div id="Reviews" class="w3-container city" style="display:none">
                    <h2>Reviews</h2>
                    <p>Tokyo is the capital of Japan.</p>
                </div>


            </div>
            <div class="col-sm-4">




                <div class=""
                    style="
                                padding: 8px;
                                border-radius: 13px;
                                /* background-color:rgb(237, 236, 232); */ ">
                    <h1 class='' style="text-align: center;font-size: 2rem;"><b
                            style="font-size: 1.4rem;
                                    font-weight: 600;">Connect
                            Digitally</b></h1>
                    {{-- <div
                        style=" /* border: 1px solid lightgray; */ width: 76%; padding:5px margin-left: 37px;">
                    </div> --}}

                    <p>
                        <li style="padding-top: 5px;list-style: none;text-align: center; padding:15px;">
                            <div class="">

                                <a class="network-icon facebook" itemprop="sameAs"
                                    href="https://www.facebook.com/profile.php?id=100076479276353" target="_blank"
                                    title="BahrainBanksDirectory.com Facebook" style="margin-top: -7px;">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a class="network-icon twitter" itemprop="sameAs"
                                    href="https://www.facebook.com/profile.php?id=100076479276353" target="_blank"
                                    title="BahrainBanksDirectory.com twitter" style="margin-top: -7px;">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a class="network-icon youtube" itemprop="sameAs"
                                    href="https://www.facebook.com/profile.php?id=100076479276353" target="_blank"
                                    title="BahrainBanksDirectory.com youtube" style="margin-top: -7px;">
                                    <i class="fa fa-youtube"></i>
                                </a>



                                <a class="network-icon instagram" itemprop="sameAs"
                                    href="https://www.instagram.com/bahrainbanksdirectory/" target="_blank"
                                    title="BahrainBanksDirectory.com Instagram" style="margin-top: -7px;">
                                    <i class="fa fa-instagram"></i>
                                </a>

                                <a class="network-icon linkedin" itemprop="sameAs"
                                    href="https://www.instagram.com/bahrainbanksdirectory/" target="_blank"
                                    title="BahrainBanksDirectory.com linkedin" style="margin-top: -7px;">
                                    <i class="fa fa-linkedin"></i>
                                </a>

                                <a class="network-icon whatsapp" itemprop="sameAs"
                                    href="https://www.instagram.com/bahrainbanksdirectory/" target="_blank"
                                    title="BahrainBanksDirectory.com whatsapp" style="margin-top: -7px;">
                                    <i class="fa fa-whatsapp"></i>
                                </a>
                            </div>
                        </li>
                    </p>


                </div>




                <!-- </div>
                                                                            </div> -->
            </div>

            <div class="col-lg-4" style="padding:15px; margin-bottom:10px;">

                <div class=" bg-slate-100 rounded-md" style="border-radius:15px;">
                    <div class="flex flex-col justify-center items-center">
                        <h1 class="font-bold text-lg mt-6" style="font-size:18px;">Contact
                            details</h1>
                        {{-- <div class="border w-20 h-20 rounded-full bg-blue-900 flex items-center justify-center"
                            style="margin-top:40px; margin-bottom:30px;">
                            <img src="./images/location.png" alt class="w-" style="height:25px;">
                        </div> --}}
                        {{-- <h1 class="text-2xl font-normal h-auto text-center text-slate-900 mt-2"
                            style="margin-bottom:10px; font-size: 15px;">Lorem
                            ipsum
                            dolor sit, amet consectetur adipisicing elit.
                            Vero, eligendi!</h1>
                        <div class="w-[230px] h-14 bg-blue-900 mt-2">
                            <h1 class="text-white font-normal text-base text-center mt-3">Open
                                in Google Map</h1>
                        </div> --}}
                        <div class="border w-20 h-20 rounded-full bg-blue-900 flex items-center justify-center mt-10">
                            {{-- <img src="{{('frontend/img/phone.png')}}" alt class="w-8"> --}}
                            <i class="fa fa-phone" aria-hidden="true" style="color:#fff; font-size:20px;"></i>
                        </div>
                        <h1 class="text-2xl font-medium text-slate-900 mt-2">+973
                            1245 4521</h1>
                        <h1 class="text-2xl font-medium text-slate-900">+973
                            1245 4521</h1>

                        <div class="border w-20 h-20 rounded-full bg-blue-900 flex items-center justify-center mt-10">
                            {{-- <img src="./images/mail.png" alt class="w-8"> --}}
                            <i class="fa fa-envelope-o" aria-hidden="true"style="color:#fff; font-size:20px;"></i>
                        </div>
                        <h1 class="text-2xl font-medium text-slate-900 mt-2">Lorem.psum@gmail.com</h1>
                        <h1 class="text-2xl font-medium text-slate-900">Lorem.psum@gmail.com</h1>

                        <div class="border w-20 h-20 rounded-full bg-blue-900 flex items-center justify-center mt-10">
                            {{-- <img src="./images/website.png" alt class="w-8"> --}}
                            <i class="fa fa-globe" aria-hidden="true" style="color:#fff; font-size:20px;"></i>

                        </div>
                        <h1 class="text-2xl font-medium text-slate-900 mt-7" style="margin-bottom:20px;">
                            www.lorempsum.com</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <div class="flex mt-10">
                <div class=" w-[85%]">
                    <h1 class="font-semibold text-2xl  text-slate-900" style="font-weight:bold;">Working
                        Hours</h1>

                    <div class="flex mt-5 gap-x-5">
                        <div class=" h-50 bg-blue-900" style="width:95%;
                        padding:10px;">
                            <div class="text-center">
                                <h1 class="text-2xl font-semibold text-white">Sunday</h1>
                                <p class="text-lg font-medium text-white">08:30 AM - 03:30 PM</p>
                            </div>

                        </div>

                        <div class=" h-30 bg-blue-900" style="width:95%;
                        padding: 10px;">
                            <div class="text-center">
                                <h1 class="text-2xl font-semibold text-white">Monday</h1>
                                <p class="text-lg font-medium text-white">08:30 AM - 03:30 PM</p>
                            </div>

                        </div>

                        <div class=" h-30 bg-blue-900"
                            style="width:95%;
                        padding: 10px;
                    ">
                            <div class="text-center">
                                <h1 class="text-2xl font-semibold text-white">Tuesday</h1>
                                <p class="text-lg font-medium text-white">08:30 AM - 03:30 PM</p>
                            </div>

                        </div>

                        <div class=" h-20 bg-blue-900"
                            style="width:95%;
                        padding: 10px;
                    ">
                            <div class="text-center">
                                <h1 class="text-2xl font-semibold text-white">Wednesday</h1>
                                <p class="text-lg font-medium text-white">08:30 AM - 03:30 PM</p>
                            </div>

                        </div>
                    </div>

                    <div class="flex gap-x-5 mt-3">
                        <div class=" h-20 bg-blue-900" style="width:24%;
                        padding: 10px;">
                            <div class="text-center">
                                <h1 class="text-2xl font-semibold text-white">Thrusday</h1>
                                <p class="text-lg font-medium text-white">08:30 AM - 03:30 PM</p>
                            </div>

                        </div>
                        <div class=" h-20 bg-blue-900" style="width:24%;
                        padding: 10px;">
                            <div class="text-center">
                                <h1 class="text-2xl font-semibold text-white">Friday</h1>
                                <p class="text-sm font-medium text-white">closed</p>
                            </div>

                        </div>

                        <div class=" h-20 bg-blue-900" style="width:24%;
                        padding: 10px;">
                            <div class="text-center">
                                <h1 class="text-2xl font-semibold text-white">Saturday</h1>
                                <p class="text-lg font-medium text-white">closed</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>

    <div class="clearfix footer-clear-element "></div>

    <div class="container mt-5"
        style="display: flex ;flex-direction: column-reverse;flex-wrap: wrap;align-content: center;">
        <div class="col-sm-4 mt-5">
            <div class=""
                style="
                            padding: 8px;
                            border-radius: 13px;
                            background-color:rgb(237, 236, 232);
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

                            <a class="network-icon facebook" itemprop="sameAs"
                                href="https://www.facebook.com/profile.php?id=100076479276353" target="_blank"
                                title="BahrainBanksDirectory.com Facebook" style="margin-top: -7px;">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a class="network-icon twitter" itemprop="sameAs"
                                href="https://www.facebook.com/profile.php?id=100076479276353" target="_blank"
                                title="BahrainBanksDirectory.com twitter" style="margin-top: -7px;">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a class="network-icon youtube" itemprop="sameAs"
                                href="https://www.facebook.com/profile.php?id=100076479276353" target="_blank"
                                title="BahrainBanksDirectory.com youtube" style="margin-top: -7px;">
                                <i class="fa fa-youtube"></i>
                            </a>



                            <a class="network-icon instagram" itemprop="sameAs"
                                href="https://www.instagram.com/bahrainbanksdirectory/" target="_blank"
                                title="BahrainBanksDirectory.com Instagram" style="margin-top: -7px;">
                                <i class="fa fa-instagram"></i>
                            </a>

                            <a class="network-icon linkedin" itemprop="sameAs"
                                href="https://www.instagram.com/bahrainbanksdirectory/" target="_blank"
                                title="BahrainBanksDirectory.com linkedin" style="margin-top: -7px;">
                                <i class="fa fa-linkedin"></i>
                            </a>

                            <a class="network-icon whatsapp" itemprop="sameAs"
                                href="https://www.instagram.com/bahrainbanksdirectory/" target="_blank"
                                title="BahrainBanksDirectory.com whatsapp" style="margin-top: -7px;">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                        </div>
                    </li>
                </p>


            </div>




            <!-- </div>
                                                                    </div> -->
        </div>
    </div>

    
    <!--
                                                                        
                                                                        IMPORTANT: This widget contains real Adsense code as a sample to show how this widget functions.  Please replace the current Adsense code below with your own code in order to generate revenue from this ad space.
                                                                        
                                                                        -->
    <div class="container clearfix text-center footer-banner-ad">
        <ins class="adsbygoogle" style="display:block height: 11px;" data-ad-client="ca-pub-9975807181018080"            data-ad-slot="4261699163" data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <div class="clearfix clearfix-lg"></div>
    </div>
    <style type='text/css'>
        .newsletter_row input[type="email"] {
            float: none;
            margin-left: auto;
            margin-right: auto;
            width: 62% !important;
        }
    </style>
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
    <script src="js/library.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.raty.js"></script>
    <script src="js/ui.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.selectbox-0.2.js"></script>
    <script src="js/theme-script.js"></script>







    
    <script> 
       function openCity(cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
//   tablinks = document.getElementsByClassName("tablink");
//   for (i = 0; i < x.length; i++) {
//     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
//   }
  document.getElementById(cityName).style.display = "block";
//   evt.currentTarget.className += " w3-red";
}
    </script>
    
    <script defer src="https://www.optimizecdn.com/directory/cdn/assets/bootstrap/js/websiteScripts.min.js?v=0.6"></script>
    </body>

    </html>
@endsection
