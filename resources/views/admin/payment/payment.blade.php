@extends('admin.layout.app')
@section('extra_css')
@section('content')
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="card" style="border-radius: 2px !important;border: 2px solid lightgray;">
                <div class="card-header">
                    <div class="text-center">
                    <h2 style="color: black;margin-top:1rem;font-size: 27px;font-weight: 600;">Setup Parment Processing</h2>
                    <h6 style="color:black;padding-top:5px;">Select A Payment Gateway To Activate Payment Processing</h6>

                    


                    

                    <div class="card-body">

                        <div class="nav justify-content-center">

                            <div class="nav-item dropdown user-menu">

                                <button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                    style="
                    border: 1px solid black;
                    color: black;
                    padding: 6px;
                    background: white;
                    ">

                                    <div class="d-inline-block" style="color: black">
                                        Add New Payment Gateway

                                    </div>

                                </button>

                                <ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu" style="">
                                    <!-- User image -->
                                    <li class="dropdown-header">

                                        <div class="d-inline-block">
                                            Admin <small class="pt-1">admin@gmail.com</small>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="http://localhost/bahraia_bank/admin/profile">
                                            <i class="mdi mdi-account"></i> My Profile
                                        </a>
                                    </li>


                                    <li class="dropdown-footer">
                                        <a href="http://localhost/bahraia_bank/admin/log-out"> <i
                                                class="mdi mdi-logout"></i> Log Out </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="nav-item" style="
                margin: 6px 15px;color: blue"><i
                                    class="mdi mdi-information" style="
                color: blue !important;
                                    "></i>
                                Learn More</div>

                        </div>
                    </div>

                    </div>
                <div class="card" style="
                border-radius: 5px;
                border-color: dodgerblue;
                margin: 20px 5px;
                    ">
                    <div class="card-header" style="
                    background: dodgerblue;
                    color: white;font-size:16px;
                        ">
                      Need a Gateway? <small style="font-size: 11px;">Choose a preferred option below:</small>
                    </div>
                    <div class="card-body">
                    <div class="row" style="
                    color:black !important;
                        ">
                        <div class="col">
                            <img src="{{ asset('assets/payment/1.PNG') }}" style="
                            border-radius: 10px;
                        ">
                        </div>
                        <div class="col">
                            <h5>The Most Stable Option</h5>
                            <h7>Go to:</h7><a style="
                            color: #0000EE !important;
                        ">http://www.stripe.com</a>
                        </div>
                        <div class="col">
                            <text>Free sign up</text>
                            <text>No monthly fees</text>
                            <text>Low transaction rates</text>
                        </div>
                        <div class="col">
                            <h5>Currency Options:</h5>
                            <text>USD,AUD,CAD,EUR,GBP & <a style="
                                color: #0000EE !important;
                            ">100+ More.</a></text>
                        </div>
                    </div>
                     
                      {{-- <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                  </div>


            

            <div class="card" style="
                border-radius: 5px;
                border-color: lightgray;
                margin: 20px 5px;
                    ">
                    <div class="card-header" style="
                    background: lightgray;
                    color: black;font-size:16px;
                        ">
                      <h5>Additional Gateway Options</h5>
                    </div>
                    <div class="card-body">
                    <div class="row" style="
                    color:black !important;margin-left: 40px;margin-right: 40px;
                        ">
                        <div class="col">
                            <img src="{{ asset('assets/payment/2.PNG') }}" style="
                            border-radius: 10px;height:93px;width:151px;
                        ">
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/payment/3.PNG') }}" style="
                            border-radius: 10px;height:93px;width:151px;
                        ">
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/payment/4.PNG') }}" style="
                            border-radius: 10px;height:93px;width:151px;
                        ">
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/payment/5.PNG') }}" style="
                            border-radius: 10px;height:93px;width:151px;
                        ">
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/payment/6.PNG') }}" style="
                            border-radius: 10px;height:93px;width:151px;
                        ">
                    </div>
                        </div>
                        <div class="row" style="
                    color:black !important;margin-left: 40px;margin-right: 40px;margin-top:20px;
                        ">
                        <div class="col">
                            <img src="{{ asset('assets/payment/7.PNG') }}" style="
                            border-radius: 10px;height:93px;width:151px;
                        ">
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/payment/8.PNG') }}" style="
                            border-radius: 10px;height:93px;width:151px;
                        ">
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/payment/9.PNG') }}" style="
                            border-radius: 10px;height:93px;width:151px;
                        ">
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/payment/10.PNG') }}" style="
                            border-radius: 10px;height:93px;width:151px;
                        ">
                        </div>
                        <div class="col">
                            <img src="{{ asset('assets/payment/11.PNG') }}" style="
                            border-radius: 10px;height:93px;width:151px;
                        ">
                    </div>
                        </div>
                     
                      {{-- <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                  </div>


            </div>


        </div>
        </div>
    </div>
@endsection

                          