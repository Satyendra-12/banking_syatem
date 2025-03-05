@extends('frontend.layout.app')

@section('extra_css')
    <style>
    </style>
@endsection

<style>
    .custom-select {
        /* appearance: none; */
        /* -webkit-appearance: none; */
        -moz-appearance: none;
        padding-right: 20px;
        /* Adjust as needed */
        background: url('path/to/your-arrow-icon.svg') no-repeat right center;
        background-size: 15px;
        /* Adjust size */
        border: 1px solid #ccc;
        /* Example border */
        border-radius: 5px;
        /* Example border radius */
        padding: 5px 10px;
        /* Example padding */
    }

    .custom-select::after {
        content: '';
        position: absolute;
        top: calc(50% - 5px);
        /* Adjust as needed */
        right: 500px;
        /* Adjust as needed */
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        /* Adjust size */
        border-right: 5px solid transparent;
        /* Adjust size */
        border-top: 5px solid #333;
        /* Adjust color */
    }

    /* $color:#3694d7;



    .dropdown-el {
        margin-top: 20vh;

        padding-top: 10px;
        padding-bottom: 11px;
        min-width: 80em;
        position: relative;
        display: inline-block;
        margin-right: 1em;
        min-height: 4em;
        max-height: 2em;
        overflow: hidden;
        top: .5em;
        cursor: pointer;
        text-align: left;
        white-space: nowrap;
        color: #444;

        outline: none;
        border: .06em solid;
        border-radius: 1em;
        background-color: white;

        transition: $timing all ease-in-out;

        input:focus+label {
            background: #def;
        }

        input {
            width: 1px;
            height: 1px;
            display: inline-block;
            position: absolute;
            opacity: 0.01;
        }

        label {
            border-top: .06em solid #d9d9d9;
            display: block;
            height: 2em;
            line-height: 2em;
            padding-left: 1em;
            padding-right: 1em;
            cursor: pointer;
            position: relative;
            transition: $timing color ease-in-out;

            &:nth-child(2) {
                margin-top: 2em;
                border-top: .06em solid #d9d9d9;
            }
        }

        input:checked+label {
            display: block;
            border-top: none;
            position: absolute;
            top: 0;
            width: 100%;

            &:nth-child(2) {
                margin-top: 0;
                position: relative;
            }
        }

        &::after {
            content: "";
            position: absolute;
            right: 40em;
            top: 0.9em;
            border: .3em solid;
            border-color: black transparent transparent transparent;
            transition: .4s all ease-in-out;
            /* color:black; */
    font-size: 20px;
    }

    &.expanded {
        border: .06em solid;
        background: #fff;
        border-radius: .25em;
        padding: 0;
        box-shadow: rgba(0, 0, 0, 0.1) 3px 3px 5px 0px;
        max-height: 15em;
        color: black;

        label {
            border-top: .06em solid #d9d9d9;

            &:hover {
                color: $color;
            }
        }

        input:checked+label {
            color: $color;
        }

        &::after {
            transform: rotate(-180deg);
            top: .55em;
        }


    }
    

    ::-webkit-input-placeholder {
        /* WebKit browsers */
        color: #999;
        /* Change the color */
        font-weight: 600;
        /* Add italic style */
        font-size: 20px !important;
    }
</style>
<script>
    $('.dropdown-el').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('expanded');
        $('#' + $(e.target).attr('for')).prop('checked', true);
    });
    $(document).click(function() {
        $('.dropdown-el').removeClass('expanded');
    });
</script>
@section('content')
    <div class="container-fluid" style="margin-top:10px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="homepage-sections fr-view">
                    <div class=" w3-display-container">
                        <img class="mySlides2" src="{{ asset('assets\BANNERS\contact-as-Banner08-08.jpg') }}"
                            style="width:100%;position: relative;height:auto !important;border-radius:0px !important;">

                        {{-- <div class="col-md-12 keepInImage" style="margin-bottom:13px; position: absolute;top:38%;">
                            <h2 class="nomargin text-center streaming-title"
                                style="border-radius:15px;color: #205081;padding: 15px;font-weight: 600;">
                                CONTACT US </h2><br>
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
    <div class="container-fluid" style="margin-top:30px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="homepage-sections fr-view mobile-form">
                    <div class=""
                        style="
        background: #fbfdfd;
        text-align: center;border-radius:20px;
    ">


                        <style>
                            input::placeholder {

                                /* Firefox, Chrome, Opera */
                                text-align: left;
                                font-size: 15px;
                                /* padding-left: 10px; */
                                font-weight: 600;
                            }

                            textarea::placeholder {
                                text-align: left;
                                font-size: 15px;
                                font-weight: 600;
                            }

                            select option:checked {
                                text-align: left;
                                font-size: 15px;
                                padding-left: 10px;
                            }

                            .b1 {
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

                            input::-webkit-outer-spin-button,
                            input::-webkit-inner-spin-button {
                                -webkit-appearance: none;
                                margin: 0;
                            }

                            .error-message {
                                color: red;
                                font-size: 14px;
                            }

                            @media screen and (max-width: 600px) {
                                .fr-view img {
                                    margin-left: 0 !important;
                                }
                            }

                            /* span {
                                                        display: none;
                                                    } */
                            @media screen and (max-width: 599px) {
                                .custom-select {
                                    width: 94% !important;
                                }

                                .keepInImage {
                                    left: 20%;
                                }
                            }
                        </style>
                        <?php $admin = DB::table('admins')->first(); ?>
                        <div class="row" style="padding-top: 60px; ">
                            <div class=" col-md-5">
                                <div style="margin-left:20%;margin-bottom:20%;">
                                    <img class="marginContactLogo" src='{{ asset($admin->image) }}' alt=""
                                        style="width: 45%;">
                                    <div style="text-align: left">
                                        <h1
                                            style="
                                              padding-top: 30px;
                                                         font-size: large;
                                                             font-weight: 600;
                                                        ">
                                            Corporate Office</h1>

                                        <p class="width" style="font-size: 14px;color: #202020;">
                                            {{ $admin->address }}

                                        </p>
                                        <h1
                                            style="
                                                 padding-top: 20px;
                                                    font-size: large;
                                                      font-weight: 600;
                                                                 ">
                                            Contact Numbers</h1>
                                        <p class="width" style="font-size: 14px;color: #202020;">

                                            {{ $admin->phone }} (WhatsApp)<br>
                                            {{ $admin->phone1 }}<br>
                                            {{ $admin->phone2 }}<br>
                                        </p>
                                        <h1
                                            style="
                                          padding-top: 15px;
                                               font-size: large;
                                                 font-weight: bolder;
                                                            ">
                                            Email</h1>

                                        <p class="width" style="font-size: 14px;color: #202020;">
                                            {{ $admin->email }}

                                        </p>


                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-6">

                                @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
                                {{-- <form id="addcontact" enctype="multipart/form-data"> --}}
                                    <form action="{{ route('contact.send') }}" method="POST">
                                        @csrf
                                    <div class="row " style="padding-top: 12px;justify-content: center;">
                                        <div class="col-md-10">
                                            {{-- <span class="dropdown-el">
                            <input type="radio" name="sortType" value="Relevance" checked="checked" id="sort-relevance"><label for="sort-relevance">Relevance</label>
                            <input type="radio" name="sortType" value="Popularity" id="sort-best"><label for="sort-best">Product Popularity</label>
                            <input type="radio" name="sortType" value="PriceIncreasing" id="sort-low"><label for="sort-low">Price Low to High</label>
                            <input type="radio" name="sortType" value="PriceDecreasing" id="sort-high"><label for="sort-high">Price High to Low</label>
                            <input type="radio" name="sortType" value="ProductBrand" id="sort-brand"><label for="sort-brand">Product Brand</label>
                            <input type="radio" name="sortType" value="ProductName" id="sort-name"><label for="sort-name">Product Name</label>
                          </span> --}}
                                            <style>
                                                .custom-select {
                                                    /* appearance: none; */
                                                    /* -webkit-appearance: none; */
                                                    -moz-appearance: none;
                                                    padding-right: 20px;
                                                    /* Adjust as needed */
                                                    background: url('path/to/your-arrow-icon.svg') no-repeat right center;
                                                    background-size: 15px;
                                                    /* Adjust size */
                                                    border: 1px solid #ccc;
                                                    /* Example border */
                                                    border-radius: 5px;
                                                    /* Example border radius */
                                                    padding: 5px 10px;
                                                    /* Example padding */
                                                }

                                                .custom-select::after {
                                                    content: '';
                                                    position: absolute;
                                                    top: calc(50% - 5px);
                                                    /* Adjust as needed */
                                                    right: 500px;
                                                    /* Adjust as needed */
                                                    width: 0;
                                                    height: 0;
                                                    border-left: 5px solid transparent;
                                                    /* Adjust size */
                                                    border-right: 5px solid transparent;
                                                    /* Adjust size */
                                                    border-top: 5px solid #333;
                                                    /* Adjust color */
                                                }

                                                /* $color:#3694d7;
                                $timing:.3s; */


                                                .dropdown-el {
                                                    margin-top: 20vh;

                                                    padding-top: 10px;
                                                    padding-bottom: 11px;
                                                    min-width: 80em;
                                                    position: relative;
                                                    display: inline-block;
                                                    margin-right: 1em;
                                                    min-height: 4em;
                                                    max-height: 2em;
                                                    overflow: hidden;
                                                    top: .5em;
                                                    cursor: pointer;
                                                    text-align: left;
                                                    white-space: nowrap;
                                                    color: #444;

                                                    outline: none;
                                                    border: .06em solid;
                                                    border-radius: 1em;
                                                    background-color: white;

                                                    transition: $timing all ease-in-out;

                                                    input:focus+label {
                                                        background: #def;
                                                    }

                                                    input {
                                                        width: 1px;
                                                        height: 1px;
                                                        display: inline-block;
                                                        position: absolute;
                                                        opacity: 0.01;
                                                    }

                                                    label {
                                                        border-top: .06em solid #d9d9d9;
                                                        display: block;
                                                        height: 2em;
                                                        line-height: 2em;
                                                        padding-left: 1em;
                                                        padding-right: 1em;
                                                        cursor: pointer;
                                                        position: relative;
                                                        transition: $timing color ease-in-out;

                                                        &:nth-child(2) {
                                                            margin-top: 2em;
                                                            border-top: .06em solid #d9d9d9;
                                                        }
                                                    }

                                                    input:checked+label {
                                                        display: block;
                                                        border-top: none;
                                                        position: absolute;
                                                        top: 0;
                                                        width: 100%;

                                                        &:nth-child(2) {
                                                            margin-top: 0;
                                                            position: relative;
                                                        }
                                                    }

                                                    &::after {
                                                        content: "";
                                                        position: absolute;
                                                        right: 40em;
                                                        top: 0.9em;
                                                        border: .3em solid;
                                                        border-color: black transparent transparent transparent;
                                                        transition: .4s all ease-in-out;
                                                        /* color:black; */
                                                        font-size: 20px;
                                                    }

                                                    &.expanded {
                                                        border: .06em solid;
                                                        background: #fff;
                                                        border-radius: .25em;
                                                        padding: 0;
                                                        box-shadow: rgba(0, 0, 0, 0.1) 3px 3px 5px 0px;
                                                        max-height: 15em;
                                                        color: black;

                                                        label {
                                                            border-top: .06em solid #d9d9d9;

                                                            &:hover {
                                                                color: $color;
                                                            }
                                                        }

                                                        input:checked+label {
                                                            color: $color;
                                                        }

                                                        &::after {
                                                            transform: rotate(-180deg);
                                                            top: .55em;
                                                        }


                                                    }
                                                }

                                                ::-webkit-input-placeholder {
                                                    /* WebKit browsers */
                                                    color: #999;
                                                    /* Change the color */
                                                    font-weight: 600;
                                                    /* Add italic style */
                                                    font-size: 20px !important;
                                                }
                                            </style>
                                            <script>
                                                $('.dropdown-el').click(function(e) {
                                                    e.preventDefault();
                                                    e.stopPropagation();
                                                    $(this).toggleClass('expanded');
                                                    $('#' + $(e.target).attr('for')).prop('checked', true);
                                                });
                                                $(document).click(function() {
                                                    $('.dropdown-el').removeClass('expanded');
                                                });
                                            </script>
                                            <select class="custom-select" id="purpose_id" name="purpose_id" required
                                                style="width:100%;    margin: 0px 20px 15px 20px;
                                                             
                                                                      border: 2px solid rgb(5,73,142);
                                                                               text-align: left;
                                                                       

                                                                               padding-left: 10px;background:white;
                                                                               font-size: 16px;  font-weight: bolder;color:rgb(128,128,128);
                                                                                   border-radius: 15px;"><i
                                                    class="fa fa-angle-down" aria-hidden="true"></i>
                                                <option value="">SELECT PURPOSE</option>
                                                @foreach ($purpose as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <input class="custom-select" type="text" name="name" id="name"
                                                required
                                                style="
                                                     width: 100%;
                                                     border-radius: 15px;
                                                     margin: 15px 20px;
                                                       padding-left: 10px;
                                                       border: 2px solid rgb(5,73,142);
                                                       text-align: left;font-size:16px;
                                                   background: white;
                                                   font-size: 16px;  font-weight: 600;color:rgb(128,128,128);
"
                                                placeholder="Name">
                                        </div>
                                        <div class="col-md-5">
                                            <input class="custom-select" type="text" name="mobile" id="mobile"
                                                required
                                                style="
                                                                               width: 100%;
                                                                              
                                                                               border: 2px solid rgb(5,73,142);
                                                                               border-radius: 15px;margin:15px 20px;
                                                                           padding-left: 10px;
                                                                            font-size: 16px;
                                                                            background: white
                                                                                    "
                                                placeholder="Mobile">
                                        </div>
                                        <div class="col-md-10">
                                            <input class="custom-select" type="email" name="email" id="email"
                                                placeholder="Email" required
                                                style="
        width: 100%;
       
        border: 2px solid rgb(5,73,142);
        border-radius: 15px;margin:15px 20px;
    padding-left: 10px;
    font-size: 16px;
    background: white
    ">
                                        </div>
                                        <div class="col-md-10">

                                            <textarea class="custom-select" name="message" id="message" required
                                                style="
  width: 100%;
  border: 2px solid rgb(5,73,142);
  height: 130px;
  border-radius: 15px;margin:15px 20px;
    padding-left: 10px;padding-top:10px;
    font-size: 16px;
    background: white
"
                                                placeholder="Message"></textarea>
                                        </div>
                                        <div class="col-md-10"
                                            style="
    padding-top: 25px;text-align:center;padding-bottom:25px;
">
                                            <button type="submit" class="btn btn-primary"
                                                style="background:rgb(5, 73, 142);color:#fff;font-size: 18px;padding: 6px 35px;border-radius: 8px;">SUBMIT</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Add Address model --}}

    <div class="" style="padding-top:50px;text-align:center;">
        <div class="mapouter">
            <div style="width: 100vw" class="gmap_canvas"><iframe width="100%" height="360" id="gmap_canvas"
                    src="https://maps.google.com/maps?width=100%&amp;height=100%&amp;hl=en&amp;q=HG Technology Bahrain 3872 8672&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                    href="https://online.stopwatch-timer.net/">timer stopwatch</a><br><a
                    href="https://textcaseconvert.com/"></a><br>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        height: 360px;
                        width: 100%;

                    }
                </style><a href="https://www.embedmaps.co">google maps on website</a>
                <style>
                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 360px;

                    }
                </style>
            </div>
        </div>
    </div>


    <style>
        @media screen and (max-width: 599px) {
            .width {
                width: 60vw;
            }

        }

        div.col-md-2 img {
            border-radius: 0px;
            height: 217px;
        }


        @media only screen and (max-width: 700px) {}

        @media only screen and (max-width: 600px) {
            .instagram-post {
                display: grid;
                gap: 8px;
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

                <div class="col-md-12">
                    <center> <a title="Bank ABC - View Listing" class="tmargin btn btn-sm btn-primary btn-block"
                            href="https://www.instagram.com/bahrainbanksdirectory/"
                            style="width: fit-content;font-size: 16px;margin-top: 20px;background:rgb(5, 73, 142);"><i
                                style="padding-right: 6px;" class="fa fa-instagram" aria-hidden="true"></i> Follow us on
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
@section('extra_js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script>
        $(function() {
            $('#addcontact').on('submit', function(e) {
                e.preventDefault()
                alert('Your Details are saved!');

                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('savecontact') }}",
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
                                window.location.href = result.location;
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
                        console.log(jqXHR.responseText);
                    }
                });

            })


            // select search dropdown with jquery

            // var $disabledResults = $("#brand_id");
            // $disabledResults.select2();

        });
    </script>
@endsection
