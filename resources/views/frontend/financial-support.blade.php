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
    @media screen and (max-width: 599px) {
        .margin-top{
            margin-top: -19px !important;
        }
        .grid-resp{
            display: grid !important;
        }
        .streaming-title{
            font-size: 12px !important
        }
        .keepInImage{
            left:8%
        }
    }
    @media screen and (min-width: 600px) and (max-width: 1024px) {
        .streaming-title {
            font-size: 21px !important;
            margin-left: 185px;
        }
    }
     @media screen and (min-width: 1440px)  {
      .streaming-title{
        font-size:25px !important;
      }
    }
    .grid-resp{
        display: flex;
         
        align-items: center;
        

    }
    @media screen and (min-width: 600px) and (max-width: 1024px) {
        .pull-left{
            margin-top:-7px !important;
        }
    }
    @media screen and (max-width: 599px) {
    .pull-left{
        padding: 6px !important;
    }
    }
    @media screen and (max-width: 320px) {
        .pull-left{
      margin-top: 2px !important;
    }
    }
    @media screen and (min-width: 1440px)  {
        .streaming-title{
            margin-left: 185px
        }
    }
</style>

@section('content')

<div class="container-fluid" style="margin-top:10px;">
    
    <div class="row">
        <div class="col-lg-12">
            <div class="homepage-sections fr-view">
                <div class=" w3-display-container">
                    <img class="mySlides2" src="{{ asset('assets\BANNERS\Support-service-3-03.jpg') }}"
                    style="width:100%;position: relative;height:auto !important;border-radius:0px !important;">

{{-- 
                    <div class="col-md-12 keepInImage" style="margin-bottom:13px; position: absolute;top:38%;">
                        <h2 class="nomargin text-center streaming-title"
                            style="border-radius:15px;color: #205081;padding: 15px;font-weight: 600;">
                            SUPPORT SERVICES &gt;&gt; {{ $support->sub_category_name }} </h2><br>
                    </div> --}}


                </div>
                   
                   
                    {{-- <img class="mySlides2" src="{{ asset('frontend/img/bank_2.jpg') }}"
                        style="width:100%;height:400px;border-radius:0px !important;">
                    <img class="mySlides2" src="{{ asset('frontend/img/bank_3.jpg') }}"
                        style="width:100%;height:400px;border-radius:0px !important;">
                    <img class="mySlides2" src="{{ asset('frontend/img/bank_4.jpg') }}"
                        style="width:100%;height:400px;border-radius:0px !important;">

                    <img class="mySlides2" src="{{ asset('frontend/img/bank_1.jpg') }}"
                        style="width:100%;height:400px;border-radius:0px !important;"> --}}
{{-- 
                    <button class="w3-button w3-black w3-display-left"
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
<!-- <div id="container" class="content-container fr-view"> -->
    <a href="{{route("admin.support")}}" class="btn " style="display: flex;
    justify-content: center;
    align-items: center;
    width:fit-content;
    margin-top: 5px;
    margin-left: 10px;
    background:#05498E;">
        <i class="fa fa-caret-left" aria-hidden="true" style="font-size: 16px;color:white; font-size: 20px; padding-right: 5px; padding-bottom: 8px; padding-top: 5px;"></i>
        <span style="font-size: 16px;color: white;">Back</span>
    </a>
<div class="container mt-7">
                <div class="row">
                <div class="clearfix">
                    <div class="col-md-12 mt-5"><input type="hidden" name="id" value="{{ $support->id }}">
                       
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="clearfix " style="margin-top:45px;">
                    <div class="col-md-12" style="">
                        <p style="font-size: 18px;" class="mb-5">Showing {{ $supportuser->firstItem() }} - {{ $supportuser->firstItem() }} of {{ $supportuser->firstItem() }} Results</p>
                        <h3 class="nomargin text-left mb-5"
                            style="color:rgb(41, 41, 41); font-size: 25px;font-weight: bold;">
                            {{ $support->sub_category_name }} RESULTS
                        </h3><br>

                    </div>

                </div>
            </div>
            <!-- <div class="grid-container display-featured-members slickFeatured"> -->
                <div class="row" style="margin-right:0px;margin-left:0px">
                    <div class="col-md-9">
                        <div class="filter mb-3" style="padding:15px;padding-top:0px;float: right;display: flex;">
                            
                            <select class="form-select" id="exampleFormControlSelect1" style="
                            border: 2px solid lightgray;
                            border-radius: 5px;
                            padding: 7px;
                            font-size: 15px;
                            width: 123px;
                        ">
                                <option>Sort Results </option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            
                            <i class="fa fa-list" aria-hidden="true" style="padding:10px;background:rgb(5, 73, 142);color:white;font-size: 22px;margin: 0px 10px 0px 10px;"></i>
                            <i class="fa fa-th" aria-hidden="true" style="padding:10px; background:rgb(5, 73, 142);color:white;font-size:22px;" disabled></i>
                        </div>
                        @foreach ($supportuser as $supportdata)
                            
                        
                        <div class="col-xs-12 col-sm-6 col-md-12 member featured-member-info ">
    
                            <div class="well" 
                                style="background: aliceblue;padding:10px !important;border-radius:15px;">
                                <div class="clearfix"></div>
                                <div class="col-xs-3 nopad text-center featured-member-image">
                                    <img src="{{ asset($supportdata->contact_person) }}" width="200" alt=""
                                        style="height:164px;border:1px solid;">
                                    <a title="Bank ABC - View Listing" href="/manama/conventional-banks-wholesale-1/bank-abc">
                                    </a>
                                </div>
                                <div class="col-xs-9 norpad small featured-member-" style="">
                                    <a class="h4 bold" title="Bank ABC - View Listing" href="#" style="font-size:25px;font-weight:600;">
                                        {{$supportdata->username }}
                                    </a>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#"
                                        style="font-size:15px;">
                                        <i class="fa fa-map-marker" aria-hidden="true" style="font-size:16px;padding-top:25px;;color:red"></i>
                                        {{$supportdata->location }},
                                    </p>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#" style="font-size:17px;padding-top:21px;;margin-bottom: 2px;">
                                        <i class="fa fa-phone" aria-hidden="true" style="font-size:17px;"></i>
                                        {{$supportdata->phone_number }}
    
                                    </p>
                                    <div class="col-xs-12 norpad  featured-member-" style="font-size: 17px;padding-left: 30px;">
                                        <span style="margin-left:-15px;">
                                            {{$supportdata->website }}  
                                        </span>
                                    <span>
                                    <a title="Bank ABC - View Listing" class="tmargin btn btn-sm btn-primary btn-block"
                                    href="{{ route('admin.sdetails-page' , $supportdata->id) }}" style="width:fit-content;font-size: 17px;float:right;background:rgb(5,73,142);border-radius:5px;">View
                                    Listing</a>
                                    </span>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="col-xs-12 col-sm-6 col-md-12 member featured-member-info ">
    
                            <div class="well"
                                style="background: aliceblue;padding:10px !important;border-radius:15px;">
                                <div class="clearfix"></div>
                                <div class="col-xs-3 nopad text-center featured-member-image">
                                    <img src="{{ asset('frontend/img/bank_1.jpg') }}" width="200" alt="Bank ABC"
                                        style="height:164px;border:1px solid;">
                                    <a title="Bank ABC - View Listing" href="/manama/conventional-banks-wholesale-1/bank-abc">
                                    </a>
                                </div>
                                <div class="col-xs-9 norpad small featured-member-" style="">
                                    <a class="h4 bold" title="Bank ABC - View Listing" href="#" style="font-size:25px;font-weight:600">
                                        BANK OF BAHRAIN AND KUWAIT BSC
                                    </a>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#"
                                        style="font-size:15px;">
                                        <i class="fa fa-map-marker" aria-hidden="true" style="font-size:16px;padding-top:25px;;color:red"></i>
                                        MANAMA,
                                    </p>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#" style="font-size:17px;padding-top:21px;;margin-bottom: 2px;">
                                        <i class="fa fa-phone" aria-hidden="true" style="font-size: 17px;"></i>
                                        +973 1758 5858
    
                                    </p>
                                    <div class="col-xs-12 norpad  featured-member-" style="font-size: 17px;padding-left: 30px;">
                                        <span style="margin-left:-15px;">
                                            info@ahliunitedbank.com
                                        </span>
                                    <span>
                                    <a title="Bank ABC - View Listing" class="tmargin btn btn-sm btn-primary btn-block"
                                    href="{{ route('admin.event') }}" style="width:35%;font-size: 17px;float:right;background:rgb(5,73,142);border-radius:5px;">View
                                    Listing</a>
                                    </span>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12 member featured-member-info ">
    
                            <div class="well"
                                style="background: aliceblue;padding:10px !important;border-radius:15px;">
                                <div class="clearfix"></div>
                                <div class="col-xs-3 nopad text-center featured-member-image">
                                    <img src="{{ asset('frontend/img/bank_1.jpg') }}" width="200" alt="Bank ABC"
                                        style="height:164px;border:1px solid;">
                                    <a title="Bank ABC - View Listing" href="/manama/conventional-banks-wholesale-1/bank-abc">
                                    </a>
                                </div>
                                <div class="col-xs-9 norpad small featured-member-" style="">
                                    <a class="h4 bold" title="Bank ABC - View Listing" href="#" style="font-size:25px;font-weight:600">
                                        Eskan Bank
                                    </a>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#"
                                        style="font-size:15px;">
                                        <i class="fa fa-map-marker" aria-hidden="true" style="font-size:16px;padding-top:25px;;color:red"></i>
                                        MANAMA,
                                    </p>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#" style="font-size:17px;padding-top:21px;;margin-bottom: 2px;">
                                        <i class="fa fa-phone" aria-hidden="true" style="font-size: 17px;"></i>
                                        +973 1758 5858
    
                                    </p>
                                    <div class="col-xs-12 norpad  featured-member-" style="font-size: 17px;padding-left: 30px;">
                                        <span style="margin-left:-15px;">
                                            info@ahliunitedbank.com
                                        </span>
                                    <span>
                                    <a title="Bank ABC - View Listing" class="tmargin btn btn-sm btn-primary btn-block"
                                    href="{{ route('admin.event') }}" style="width:35%;font-size: 17px;float:right;background:rgb(5,73,142);border-radius:5px;">View
                                    Listing</a>
                                    </span>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12 member featured-member-info ">
    
                            <div class="well"
                                style="background: aliceblue;padding:10px !important;border-radius:15px;">
                                <div class="clearfix"></div>
                                <div class="col-xs-3 nopad text-center featured-member-image">
                                    <img src="{{ asset('frontend/img/bank_1.jpg') }}" width="200" alt="Bank ABC"
                                        style="height:164px;border:1px solid;">
                                    <a title="Bank ABC - View Listing" href="/manama/conventional-banks-wholesale-1/bank-abc">
                                    </a>
                                </div>
                                <div class="col-xs-9 norpad small featured-member-" style="">
                                    <a class="h4 bold" title="Bank ABC - View Listing" href="#" style="font-size:25px;font-weight:600">
                                        First Abu Dhabi Bank
                                    </a>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#"
                                        style="font-size:15px;">
                                        <i class="fa fa-map-marker" aria-hidden="true" style="font-size:16px;padding-top:25px;;color:red"></i>
                                        MANAMA,
                                    </p>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#" style="font-size:17px;padding-top:21px;;margin-bottom: 2px;">
                                        <i class="fa fa-phone" aria-hidden="true" style="font-size: 17px;"></i>
                                        +973 1758 5858
    
                                    </p>
                                    <div class="col-xs-12 norpad  featured-member-" style="font-size: 17px;padding-left: 30px;">
                                        <span style="margin-left:-15px;">
                                            info@ahliunitedbank.com
                                        </span>
                                    <span>
                                    <a title="Bank ABC - View Listing" class="tmargin btn btn-sm btn-primary btn-block"
                                    href="{{ route('admin.event') }}" style="width:35%;font-size: 17px;float:right;background:rgb(5,73,142);border-radius:5px;">View
                                    Listing</a>
                                    </span>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12 member featured-member-info ">
    
                            <div class="well"
                                style="background: aliceblue;padding:10px !important;border-radius:15px;">
                                <div class="clearfix"></div>
                                <div class="col-xs-3 nopad text-center featured-member-image">
                                    <img src="{{ asset('frontend/img/bank_1.jpg') }}" width="200" alt="Bank ABC"
                                        style="height:164px;border:1px solid;">
                                    <a title="Bank ABC - View Listing" href="/manama/conventional-banks-wholesale-1/bank-abc">
                                    </a>
                                </div>
                                <div class="col-xs-9 norpad small featured-member-" style="">
                                    <a class="h4 bold" title="Bank ABC - View Listing" href="#" style="font-size:25px;font-weight:600">
                                        HSBC BANK MIDDLE EAST LIMITED
                                    </a>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#"
                                        style="font-size:15px;">
                                        <i class="fa fa-map-marker" aria-hidden="true" style="font-size:16px;padding-top:25px;;color:red"></i>
                                        MANAMA,
                                    </p>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#" style="font-size:17px;padding-top:21px;;margin-bottom: 2px;">
                                        <i class="fa fa-phone" aria-hidden="true" style="font-size: 17px;"></i>
                                        +973 1758 5858
    
                                    </p>
                                    <div class="col-xs-12 norpad  featured-member-" style="font-size: 17px;padding-left: 30px;">
                                        <span style="margin-left:-15px;">
                                            info@ahliunitedbank.com
                                        </span>
                                    <span>
                                    <a title="Bank ABC - View Listing" class="tmargin btn btn-sm btn-primary btn-block"
                                    href="{{ route('admin.event') }}" style="width:35%;font-size: 17px;float:right;background:rgb(5,73,142);border-radius:5px;">View
                                    Listing</a>
                                    </span>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-6 col-md-12 member featured-member-info ">
    
                            <div class="well"
                                style="background: aliceblue;padding:10px !important;border-radius:15px;">
                                <div class="clearfix"></div>
                                <div class="col-xs-3 nopad text-center featured-member-image">
                                    <img src="{{ asset('frontend/img/bank_1.jpg') }}" width="200" alt="Bank ABC"
                                        style="height:164px;border:1px solid;">
                                    <a title="Bank ABC - View Listing" href="/manama/conventional-banks-wholesale-1/bank-abc">
                                    </a>
                                </div>
                                <div class="col-xs-9 norpad small featured-member-" style="">
                                    <a class="h4 bold" title="Bank ABC - View Listing" href="#" style="font-size:25px;font-weight:600">
                                        National Bank Of Bahrain Bsc
                                    </a>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#"
                                        style="font-size:15px;">
                                        <i class="fa fa-map-marker" aria-hidden="true" style="font-size:16px;padding-top:25px;;color:red"></i>
                                        MANAMA,
                                    </p>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#" style="font-size:17px;padding-top:21px;;margin-bottom: 2px;">
                                        <i class="fa fa-phone" aria-hidden="true" style="font-size:17px;"></i>
                                        +973 1758 5858
    
                                    </p>
                                    <div class="col-xs-12 norpad  featured-member-" style="font-size: 17px;padding-left: 30px;">
                                        <span style="margin-left:-15px;">
                                            info@ahliunitedbank.com
                                        </span>
                                    <span>
                                    <a title="Bank ABC - View Listing" class="tmargin btn btn-sm btn-primary btn-block"
                                    href="{{ route('admin.event') }}" style="width:35%;font-size: 17px;float:right;background:rgb(5,73,142);border-radius:5px;">View
                                    Listing</a>
                                    </span>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
    
                        <div class="col-xs-12 col-sm-6 col-md-12 member featured-member-info ">
    
                            <div class="well"
                                style="background: aliceblue;padding:10px !important;border-radius:15px;">
                                <div class="clearfix"></div>
                                <div class="col-xs-3 nopad text-center featured-member-image">
                                    <img src="{{ asset('frontend/img/bank_1.jpg') }}" width="200" alt="Bank ABC"
                                        style="height:164px;border:1px solid;">
                                    <a title="Bank ABC - View Listing" href="/manama/conventional-banks-wholesale-1/bank-abc">
                                    </a>
                                </div>
                                <div class="col-xs-9 norpad small featured-member-" style="">
                                    <a class="h4 bold" title="Bank ABC - View Listing" href="#" style="font-size:25px;font-weight:600">
                                        National Bank Of Kuwait S.A.K
                                    </a>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#"
                                        style="font-size:15px;">
                                        <i class="fa fa-map-marker" aria-hidden="true" style="font-size:16px;padding-top:25px;;color:red"></i>
                                        MANAMA,
                                    </p>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#" style="font-size:17px;padding-top:21px;;margin-bottom: 2px;">
                                        <i class="fa fa-phone" aria-hidden="true" style="font-size: 17px;"></i>
                                        +973 1758 5858
    
                                    </p>
                                    <div class="col-xs-12 norpad  featured-member-" style="font-size: 17px;padding-left: 30px;">
                                        <span style="margin-left:-15px;">
                                            info@ahliunitedbank.com
                                        </span>
                                    <span>
                                    <a title="Bank ABC - View Listing" class="tmargin btn btn-sm btn-primary btn-block"
                                    href="{{ route('admin.event') }}" style="width:35%;font-size: 17px;float:right;background:rgb(5,73,142);border-radius:5px;">View
                                    Listing</a>
                                    </span>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12 member featured-member-info ">
    
                            <div class="well"
                                style="background: aliceblue;padding:10px !important;border-radius:15px;">
                                <div class="clearfix"></div>
                                <div class="col-xs-3 nopad text-center featured-member-image">
                                    <img src="{{ asset('frontend/img/bank_1.jpg') }}" width="200" alt="Bank ABC"
                                        style="height:164px;border:1px solid;">
                                    <a title="Bank ABC - View Listing" href="/manama/conventional-banks-wholesale-1/bank-abc">
                                    </a>
                                </div>
                                <div class="col-xs-9 norpad small featured-member-" style="">
                                    <a class="h4 bold" title="Bank ABC - View Listing" href="#" style="font-size:25px;font-weight:600">
                                        The Housing Bank For Trade & Finance
                                    </a>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#"
                                        style="font-size:15px;">
                                        <i class="fa fa-map-marker" aria-hidden="true" style="font-size:16px;padding-top:25px;;color:red"></i>
                                        MANAMA,
                                    </p>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#" style="font-size:17px;padding-top:21px;;margin-bottom: 2px;">
                                        <i class="fa fa-phone" aria-hidden="true" style="font-size: 17px;"></i>
                                        +973 1758 5858
    
                                    </p>
                                    <div class="col-xs-12 norpad  featured-member-" style="font-size: 17px;padding-left: 30px;">
                                        <span style="margin-left:-15px;">
                                            info@ahliunitedbank.com
                                        </span>
                                    <span>
                                    <a title="Bank ABC - View Listing" class="tmargin btn btn-sm btn-primary btn-block"
                                    href="{{ route('admin.event') }}" style="width:35%;font-size: 17px;float:right;background:rgb(5,73,142);border-radius:5px;">View
                                    Listing</a>
                                    </span>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-12 member featured-member-info ">
    
                            <div class="well"
                                style="background: aliceblue;padding:10px !important;border-radius:15px;">
                                <div class="clearfix"></div>
                                <div class="col-xs-3 nopad text-center featured-member-image">
                                    <img src="{{ asset('frontend/img/bank_1.jpg') }}" width="200" alt="Bank ABC"
                                        style="height:164px;border:1px solid;">
                                    <a title="Bank ABC - View Listing" href="/manama/conventional-banks-wholesale-1/bank-abc">
                                    </a>
                                </div>
                                <div class="col-xs-9 norpad small featured-member-" style="">
                                    <a class="h4 bold" title="Bank ABC - View Listing" href="#" style="font-size:25px;font-weight:600">
                                        ICICI Bnak Ltd
                                    </a>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#"
                                        style="font-size:15px;">
                                        <i class="fa fa-map-marker" aria-hidden="true" style="font-size:16px;padding-top:25px;;color:red"></i>
                                        MANAMA,
                                    </p>
                                    <p class="h4 mt-10" title="Bank ABC - View Listing" href="#" style="font-size:17px;padding-top:21px;;margin-bottom: 2px;">
                                        <i class="fa fa-phone" aria-hidden="true" style="font-size: 17px;"></i>
                                        +973 1758 5858
    
                                    </p>
                                    <div class="col-xs-12 norpad  featured-member-" style="font-size: 17px;padding-left: 30px;">
                                        <span style="margin-left:-15px;">
                                            info@ahliunitedbank.com
                                        </span>
                                    <span>
                                    <a title="Bank ABC - View Listing" class="tmargin btn btn-sm btn-primary btn-block"
                                    href="{{ route('admin.event') }}" style="width:35%;font-size: 17px;float:right;background:rgb(5,73,142);border-radius:5px;">View
                                    Listing</a>
                                    </span>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                            </div>
                        </div> --}}
    
                                
                    
                    <div class="clearfix"></div>
                    </div>
                    <div class="col-md-3 margin-top" style="margin-top: -75px;">
                        <div class="col-md-12" style="height: 350px; margin: 20px auto;  border-radius: 0px;">
                            <img src="{{asset('assets/sideimages/side-banner-02.jpg')}}" style="width: 100%; height: auto;" alt="Image 1">
                        </div>
                        <div class="col-md-12" style="height: 350px; margin: 20px auto; border-radius: 0px;">
                            <img src="{{asset('assets/sideimages/side-banner-03.jpg')}}" style="width: 100%; height: auto;" alt="Image 2">
                        </div>
                        <div class="col-md-12" style="height: 350px; margin: 20px auto;  border-radius: 0px;">
                            <img src="{{asset('assets/sideimages/side-banner-04.jpg')}}" style="width: 100%; height: auto;" alt="Image 3">
                        </div>
                    </div>
                    
                    {{-- <div class="pagination" style="margin-left:25px;">
                        
                        <a href="#" style="background: rgb(32, 80, 129);color:white;padding: 10px;font-size: 14px;border-radius: 8px 0px 0px 8px;" class="active">1</a>
                        <a href="#" style="padding: 10px;font-size: 14px;border-radius: 0px;">2</a>
                        <a href="#" style="color:rgb(32, 80, 129);padding: 10px;font-size: 14px;border-radius: 0px 8px 8px 0px;">»</a>
                    </div> --}}
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
                        {{ $supportuser->links() }}
                    </div>
    
                    
                </div>
                {{-- <div class="clearfix">
                    <div class="col-md-12">
                        <a href="{{ route('admin.event') }}" class="view-all-btn-desktop hidden-xs btn btn-info"
                            style="background:rgb(5, 73, 142);">
                            View All
                        </a>
                    </div>
                </div> --}}
    
    
            </div>
            
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
        <ins class="adsbygoogle" style="display:block height: 11px;" data-ad-client="ca-pub-9975807181018080"                    data-ad-slot="4261699163" data-ad-format="auto" data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                <div class="clearfix clearfix-lg"></div>
            </div>
        @endsection
