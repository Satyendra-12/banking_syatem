@extends('admin.layout.app')
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
{{-- @section('extra_css')
    <link href="{{ asset('assets/plugins/data-tables/datatables.bootstrap5.min.css') }}" rel='stylesheet'>
    <link href="{{ asset('assets/plugins/data-tables/responsive.datatables.min.css') }}" rel='stylesheet'>
@endsection --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
    .card-mini .card-body {
        padding: 1.63rem 1rem !important;
    }

    .card-header1 {
        background: #bdecf0;
        text-align: center !important;
        border-radius: 6px 6px 0px 0px;
        color: black;
        padding: 3px;
        font-weight: 500;

    }

    .lbl-card1:hover .card-header1 {

        background: #37393d;
        color: white;
    }

   

    tr {
        border-color: white !important;
    }

    .rt:hover {
        background: #ebf6f7;

    }

    .rt {
        border-right: 1px solid lightgray;
        color: #56606e;
        font-weight: 500;
    }
    .videoWrapper {
	position: relative;
	padding-bottom: 56.25%;
	/* 16:9 */
	height: 0;
}

.videoWrapper iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}

.video-preview-image {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background-size: cover;
	background-position: top left;
	background-repeat: no-repeat;
	z-index: 2;
	cursor: pointer;
	&:after {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		content: "";
		width: 50px;
		height: 50px;
		background-image: url("https://www.nova1069.com.au/sites/all/themes/custom/nova_evo_skin/dist/images/icon/icon-play.svg");
		background-position: top left;
		background-repeat: no-repeat;
	}
	&:hover {
		&:after {
			background-position: bottom left;
		}
	}
}
    </style>
@section('content')
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper" style="background: #ebf6f7;">
        <div class="content">


            <div class="row">



                <div class="col-xl-12 col-md-12">
                    <!-- Sales Graph -->
                    <div id="user-acquisition" class="card card-default" style="border: none;background: transparent;">
                        <div class="card-header text-white" style="border-radius: 0px;background:#37393d;">
                            <h2><span style="color: #fff !important;
								font-size: 28px;"><i
                                        style="color: #fff !important;padding-right: 5px;"
                                        class="mdi mdi-checkbox-marked-outline"></i>Start Here</span><span
                                    style="color: #fff !important;
    font-weight: 200;
    padding-left: 7px;
    font-size: 17px;"><text>-
                                        &nbsp;Complete the one-time steps below to ensure
                                        your site runs smoothly.</text></span></h2>
                        </div>
                        <div style="
						background: white;margin-bottom: 25px;
					">
                            <div class="row">
                                <div class="col-xl-4 col-md-12"><div class="youtubers__row" style="
                                    margin: 21px 28px 28px 28px;
                                ">
                                                                    
                                    <div class="videoWrapper"  style="
                                    width: 327px;
                                    height: 208px;

                                ">
                                        <div class="video-preview-image" style="background-image:url(https://www.huhmagazine.co.uk/images/uploaded/index/caseyneistat_app_01.jpg)"></div>
                                        <iframe width="" height="480" src="https://www.youtube.com/embed/0-xQtISyAl0?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div></div>
                                <div class="col-xl-8 col-md-12">

                                    <div class="row" style="margin: 20px">
                                        <div class="col-xl-4 col-sm-6 lbl-card" style="padding-bottom: 7px;">

                                            <div class="card text-center"
                                                style="border: none;border-radius:8px !important;">
                                                <div class="card-header1" style="">
                                                    1. General Settings <i class="mdi  mdi-checkbox-marked-circle"
                                                        style="    padding-left: 0px;
										  font-size: 20px;vertical-align: middle;
										  color: green !important;"></i>
                                                </div>

                                                <div class="card-body"
                                                    style="background:#ebf6f7;padding-bottom: 10px !important;padding: 3px;border-radius: 0px 0px 6px 6px;">
                                                    {{-- <i class="mdi mdi-folder-plus" style="font-size: 100px"></i> --}}
                                                    <img src="{{ asset('assets/img/dashboard/i1.webp') }}"
                                                        style="display: block;
											margin-left: auto;
											margin-right: auto;
											width: 60px;" />
                                                    <h5 class="card-title" style="color: #a66451;font-size: small;margin-top: 8px;margin-bottom: 8px;">Read Tutorial</h5>
                                                    <a href="{{ route('admin.profile') }}" class="btn"
                                                        style="    background: #7bdae3;
										   border: cyan;
										   border-radius: 24px;
										   font-weight: 700;
										   font-size: 13px;
                                           width: 75%;
									   ">Let's
                                                        Begin!</a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6 lbl-card" style="padding-bottom: 7px;">

                                            <div class="card text-center"
                                                style="border: none;border-radius:8px !important;">
                                                <div class="card-header1" style="padding:3px;">
                                                    2. Design Elements <i class="mdi  mdi-checkbox-marked-circle"
                                                        style="    padding-left: 0px;
										  font-size: 20px;vertical-align: middle;
										  color: green !important;"></i>
                                                </div>

                                                <div class="card-body"
                                                    style="background:#ebf6f7;padding-bottom: 10px !important;padding: 3px;border-radius: 0px 0px 6px 6px;">
                                                    {{-- <i class="mdi mdi-folder-plus" style="font-size: 100px"></i> --}}
                                                    <img src="{{ asset('assets/img/dashboard/i4.webp') }}"
                                                        style="display: block;
											margin-left: auto;
											margin-right: auto;
											width: 60px;" />
                                                    <h5 class="card-title" style="color: #a66451;font-size: small;margin-top: 8px;margin-bottom: 8px;">Read Tutorial</h5>
                                                    <a href="{{ route('admin.design') }}" class="btn"
                                                        style="    background: #7bdae3;
										   border: cyan;
										   border-radius: 24px;
										   font-weight: 700;
										   font-size: 13px;
                                           width: 75%;
									   ">Colors
                                                        & Styles</a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6 p-b-15 lbl-card" style="padding-bottom: 7px;">

                                            <div class="card text-center"
                                                style="border: none;border-radius:8px !important;">
                                                <div class="card-header1" style="">
                                                    3. Connect Domain <i class="mdi  mdi-checkbox-marked-circle"
                                                        style="    padding-left: 0px;
										  font-size: 20px;vertical-align: middle;
										  color: green !important;"></i>
                                                </div>

                                                <div class="card-body"
                                                    style="background:#ebf6f7;padding:0px;padding-bottom:20px;border-radius: 0px 0px 6px 6px;">
                                                    {{-- <i class="mdi mdi-folder-plus" style="font-size: 100px"></i> --}}
                                                    <img src="{{ asset('assets/img/dashboard/i2.webp') }}"
                                                        style="display: block;
											margin-left: auto;
											margin-right: auto;
											width: 60px;" />
                                                   <h5 class="card-title" style="color: #a66451;font-size: small;margin-top: 8px;margin-bottom: 8px;">Read Tutorial</h5>
                                                   <a href="{{ route('admin.domain') }}" class="btn"
                                                       style="    background: #7bdae3;
                                          border: cyan;
                                          border-radius: 24px;
                                          font-weight: 700;
                                          font-size: 13px;
                                          width: 75%;
                                      ">Update
                                                        Domain</a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6 lbl-card1" style="padding-bottom: 7px;">

                                            <div class="card text-center"
                                                style="border: none;border-radius:8px !important;">
                                                <div class="card-header1" style="padding: 7px">
                                                    4. Payment Gateway 
                                                    {{-- <i class="mdi  mdi-checkbox-marked-circle"
                                                        style="    padding-left: 0px;
										  font-size: 20px;
										  color: green !important;"></i> --}}
                                                </div>

                                                <div class="card-body"
                                                    style="background:#ebf6f7;padding-bottom: 10px !important;padding: 3px;border-radius: 0px 0px 6px 6px;">
                                                    {{-- <i class="mdi mdi-folder-plus" style="font-size: 100px"></i> --}}
                                                    <img src="{{ asset('assets/img/dashboard/i5.webp') }}"
                                                        style="display: block;
											margin-left: auto;
											margin-right: auto;
											width: 60px;" />
                                                  <h5 class="card-title" style="color: #a66451;font-size: small;margin-top: 8px;margin-bottom: 8px;">Read Tutorial</h5>
                                                  <a href="{{ route('admin.payment') }}" class="btn"
                                                      style="    background: #37393d;;
                                         border: cyan;
                                         border-radius: 24px;
                                         font-weight: 700;
                                         font-size: 13px;
                                         width: 75%;
                                     ">Connect
                                                        Gateway</a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6 lbl-card1" style="padding-bottom:7px;">

                                            <div class="card text-center"
                                                style="border: none;border-radius:8px !important;">
                                                <div class="card-header1" style="padding:7px;">
                                                    5. Spam Protection
                                                    {{-- <i class="mdi  mdi-checkbox-marked-circle"
                                                        style="    padding-left: 0px;
										  font-size: 20px;
										  color: green !important;"></i> --}}
                                                </div>

                                                <div class="card-body"
                                                    style="background:#ebf6f7;padding-bottom: 10px !important;padding: 3px;border-radius: 0px 0px 6px 6px;">
                                                    {{-- <i class="mdi mdi-folder-plus" style="font-size: 100px"></i> --}}
                                                    <img src="{{ asset('assets/img/dashboard/i3.webp') }}"
                                                        style="display: block;
											margin-left: auto;
											margin-right: auto;
											width: 60px;" />
                                                   <h5 class="card-title" style="color: #a66451;font-size: small;margin-top: 8px;margin-bottom: 8px;">Read Tutorial</h5>
                                                   <a href="#" class="btn"
                                                       style="    background: #37393d;;
                                          border: cyan;
                                          border-radius: 24px;
                                          font-weight: 700;
                                          font-size: 13px;
                                          width: 75%;
                                      ">View
                                                        Instructions</a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6 lbl-card1" style="padding-bottom: 7px;">

                                            <div class="card text-center"
                                                style="border: none;border-radius:8px !important;">
                                                <div class="card-header1" style="padding:7px;">
                                                    6. Google Maps
                                                     {{-- <i class="mdi  mdi-checkbox-marked-circle"
                                                        style="    padding-left: 0px;
										  font-size: 20px;
										  color: green !important;"></i> --}}
                                                </div>

                                                <div class="card-body"
                                                    style="background:#ebf6f7;padding-bottom: 10px !important;padding: 3px;border-radius: 0px 0px 6px 6px;">
                                                    {{-- <i class="mdi mdi-folder-plus" style="font-size: 100px"></i> --}}
                                                    <img src="{{ asset('assets/img/dashboard/i5.webp') }}"
                                                        style="display: block;
											margin-left: auto;
											margin-right: auto;
											width: 60px;" />
                                                   <h5 class="card-title" style="color: #a66451;font-size: small;margin-top: 8px;margin-bottom: 8px;">Read Tutorial</h5>
                                                   <a href="#" class="btn"
                                                       style="    background: #37393d;;
                                          border: cyan;
                                          border-radius: 24px;
                                          font-weight: 700;
                                          font-size: 13px;
                                          width: 75%;
                                      ">View
                                                        Instructions</a>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Section 2 start --}}
            <div class="row">

                <div class="col-xl-8 col-md-12 p-b-15">

                    <table class="table" style="
						border: 1px solid lightgray;
					">
                        <thead class="table">
                            <tr style="--bs-table-bg:#37393d !important;">
                                <th scope="col" style="color: white;padding:20px;text-align:center;">Member
                                    Database</th>
                                <th scope="col" style="color: white;padding:20px;text-align:center">Web Pages &
                                    Posts</th>
                                <th scope="col" style="color: white;padding:20px;text-align:center">Toolbox</th>
                            </tr>
                        </thead>
                        <tbody style="background: white;">
                            <tr>
                                <td style="text-align: center" class="rt"><i class="mdi mdi-magnify-plus"
                                        style="font-size:50px"></i><br>View Members</td>
                                <td style="text-align: center" class="rt"><i class="mdi mdi-file-document"
                                        style="font-size:50px"></i><br>View Web Pages</td>
                                <td style="text-align: center" class="rt"><i class="mdi mdi-view-list"
                                        style="font-size:50px"></i><br>Menu Manager</td>
                            </tr>
                            <tr>
                                <td style="text-align: center" class="rt"><i class="mdi mdi-account-plus"
                                        style="font-size:50px"></i><br>Add New Members</td>
                                <td style="text-align: center" class="rt"><i class="mdi mdi-pencil-box-outline"
                                        style="font-size:50px"></i><br>Create Web Page</td>
                                <td style="text-align: center" class="rt"><img
                                        src="{{ asset('assets/img/dashboard/sidebar.png') }}"
                                        style="width: 50px;" /><br>Sidebar Manager</td>
                            </tr>
                            <tr>
                                <td style="text-align: center" class="rt"><i class="fa fa-address-card"
                                        style="font-size:50px"></i><br>Edit Membership Plans</td>
                                <td style="text-align: center" class="rt"><i class="mdi mdi-format-list-bulleted"
                                        style="font-size:50px"></i><br>Manage Posts</td>
                                <td style="text-align: center" class="rt"><i class="mdi mdi-checkbox-marked-outline"
                                        style="font-size: 50px;"></i><br>Form
                                    Manager</td>
                            </tr>
                            <tr>
                                <td style="text-align: center" class="rt"><i class="mdi mdi-chart-bar"
                                        style="font-size:50px"></i><br>View Member Revenue</td>
                                <td style="text-align: center" class="rt"><i class="mdi mdi-image-area"
                                        style="font-size:50px"></i><br>Media Manager</td>
                                <td style="text-align: center" class="rt"><i class="mdi mdi-arrange-send-to-back"
                                        style="font-size: 50px;"></i><br>Custom Code Widgets</td>
                            </tr>
                        </tbody>
                    </table>

                </div>


                <div class="col-xl-4 col-md-12 p-b-15">

                    <div class="box"
                        style="
						background: white;
						padding: 13px;
						border-top: 5px solid darkcyan;
						height: 140px;
						border-radius: 0px 0px 6px 6px;
					">
                        <h6 style="
    padding-bottom: 10px;
"><i class="mdi mdi-credit-card"
                                style="
								font-size: 23px;
								padding-right: 5px;
							"></i> <text
                                style="
    /* padding-bottom: 76px; */
">FINANCE SNAPSHOT</text></h6>

                        <text style="
    font-size: 16px;
">Payments Received</text>
                        <div class="no" style="float:right;padding-top: 13px;font-weight:600;">
                            <h8>Upcoming .0.00<br>
                                Post Due .0.00<br>
                                Refunded .0.00</h8>
                        </div>

                    </div>
                    <div class="box"
                        style="
						background: white;
						padding: 13px;
						border-top: 5px solid rgb(95, 76, 221);margin-top:20px;height: 103px;border-radius: 0px 0px 6px 6px;
					">
                        <h6 style="
					padding-bottom: 10px;
				"><i class="mdi mdi-account-circle"
                                style="
												font-size: 23px;
												padding-right: 5px;
											"></i>
                            <text style="
					/* padding-bottom: 76px; */
				">MEMBER SNAPSHOT</text>
                        </h6>
                        {{-- <h5><i class="mdi mdi-account-circle"
                                    style="
								font-size: 23px;
								padding-right: 5px;
							"></i>
                                <text>PENDING ITEMS</text></h5> --}}
                        {{-- <div class="row"> --}}
                        {{-- <text>Payments Received</text> --}}
                        <div class="row">
                            <div class="col">
                                <div class="no">
                                    <h5>954</h5>
                                    <text>Total Members</text>
                                </div>
                            </div>
                            <div class="col" style="padding-right: 0px !important">
                                <div class="no" style="
							font-weight: 600;
						">
                                    <div>Joined Last 7 Days 0</div>
                                    <div>Joined Last 30 Days 0</div>
                                </div>
                            </div>
                        </div>
                        {{-- </div> --}}
                    </div>
                    <div class="box"
                        style="
						background: white;
						padding: 13px;border-radius: 0px 0px 6px 6px;
						border-top: 5px solid goldenrod;margin-top:20px;height: 122px;
					">
                        <h6 style="
					padding-bottom: 10px;
				"><i class="mdi mdi-calendar-check"
                                style="
												font-size: 23px;
												padding-right: 5px;
											"></i>
                            <text style="
					/* padding-bottom: 76px; */
				">PENDING ITEMS</text>
                        </h6>

                        {{-- <div class="row"> --}}
                        {{-- <text>Payments Received</text> --}}
                        <div class="row" style="
							text-align: center;
							font-size: 15px;
						">
                            <div class="col">322<br>INQUIRIES</div>
                            <div class="col">0<br>LEADS</div>
                            <div class="col">0<br>REVIEWS</div>
                            <div class="col">0<br><text style="font-size:11px">PAST DUE</text></div>
                        </div>
                        {{-- </div> --}}
                    </div>
                </div>






            </div>


            {{-- section 2 end --}}



            {{-- Section 3 start --}}

            <div class="row">

                <div class="col-xl-8 col-md-12 p-b-15">
                    <div id="user-acquisition" class="card card-default" style="border: none;background:#37393d;">
                        <div class="card-header text-white"
                            style="border-radius: 0px;background:#37393d;padding:12px !important;">
                            <h2><span style="color: #fff !important;
								font-size: 28px;"><i
                                        style="color: #fff !important;padding-right: 5px;vertical-align:middle;"
                                        class="mdi mdi-arrow-right-bold-circle-outline"></i></span><span
                                    style="color: #fff !important;
    font-weight: 200;
    vertical-align:middle
    font-size: 17px;"><text>Recent
                                        Member Logins</text></span></h2>
                        </div>
                        <div style="
						background: white;
					">
                            <div class="row">
                                <div class="col" style="
						padding: 10px 10px 10px 20px;
					">
                                    <div class="row">
                                        <div class="col-3"> <img src="{{ asset('assets/img/dashboard/profile.png') }}"
                                                style="
				width: 60px;" /></div>
                                        <div class="col-9" style="padding-top: 6px"><text
                                                style="
    padding-left: 15px;
    color: darkblue;
    margin-top: !important;
    ">Login:28/12/2023</text><br><text
                                                style="padding-left: 14px">AADITYA JAISWAL</text></div>
                                    </div>
                                </div>
                                <div class="col" style="
	padding: 10px 10px 10px 20px;
">
                                    <div class="row">
                                        <div class="col-3"> <img src="{{ asset('assets/img/dashboard/profile.png') }}"
                                                style="
width: 60px;" /></div>
                                        <div class="col-9" style="padding-top: 6px"><text
                                                style="
padding-left: 15px;
color: darkblue;
margin-top: !important;
">Login:28/12/2023</text><text
                                                style="padding-left: 15px">AADITYA JAISWAL</text></div>
                                    </div>
                                </div>
                                <div class="col" style="
padding: 10px 10px 10px 20px;
">
                                    <div class="row">
                                        <div class="col-3"> <img src="{{ asset('assets/img/dashboard/profile.png') }}"
                                                style="
width: 60px;" /></div>
                                        <div class="col-9" style="padding-top: 6px"><text
                                                style="
padding-left: 15px;
color: darkblue;
margin-top: !important;
">Login:28/12/2023</text><text
                                                style="padding-left: 15px">AADITYA JAISWAL</text></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" style="
						padding: 20px 10px 10px 20px;
					">
                                    <div class="row">
                                        <div class="col-3"> <img src="{{ asset('assets/img/dashboard/profile.png') }}"
                                                style="
				width: 60px;" /></div>
                                        <div class="col-9" style="padding-top: 6px"><text
                                                style="
    padding-left: 15px;
    color: darkblue;
    margin-top: !important;
    ">Login:28/12/2023</text><br><text
                                                style="padding-left: 14px">AADITYA JAISWAL</text></div>
                                    </div>
                                </div>
                                <div class="col" style="
	padding: 20px 10px 10px 20px;
">
                                    <div class="row">
                                        <div class="col-3"> <img src="{{ asset('assets/img/dashboard/profile.png') }}"
                                                style="
width: 60px;" /></div>
                                        <div class="col-9" style="padding-top: 6px"><text
                                                style="
padding-left: 15px;
color: darkblue;
margin-top: !important;
">Login:28/12/2023</text><text
                                                style="padding-left: 14px">AADITYA JAISWAL</text></div>
                                    </div>
                                </div>
                                <div class="col" style="
padding: 20px 10px 10px 20px;
">
                                    <div class="row">
                                        <div class="col-3"> <img src="{{ asset('assets/img/dashboard/profile.png') }}"
                                                style="
width: 60px;" /></div>
                                        <div class="col-9" style="padding-top: 6px"><text
                                                style="
padding-left: 15px;
color: darkblue;
margin-top: !important;
">Login:28/12/2023</text><text
                                                style="padding-left: 14px">AADITYA JAISWAL</text></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col" style="
						padding: 20px 10px 20px 20px;
					">
                                    <div class="row">
                                        <div class="col-3"> <img src="{{ asset('assets/img/dashboard/profile.png') }}"
                                                style="
				width: 60px;" /></div>
                                        <div class="col-9" style="padding-top: 6px"><text
                                                style="
    padding-left: 15px;
    color: darkblue;
    margin-top: !important;
    ">Login:28/12/2023</text><br><text
                                                style="padding-left: 14px">AADITYA JAISWAL</text></div>
                                    </div>
                                </div>
                                <div class="col" style="
	padding: 20px 10px 20px 20px;
">
                                    <div class="row">
                                        <div class="col-3"> <img src="{{ asset('assets/img/dashboard/profile.png') }}"
                                                style="
width: 60px;" /></div>
                                        <div class="col-9" style="padding-top: 6px"><text
                                                style="
padding-left: 15px;
color: darkblue;
margin-top: !important;
">Login:28/12/2023</text><text
                                                style="padding-left: 14px">AADITYA JAISWAL</text></div>
                                    </div>
                                </div>
                                <div class="col" style="
padding: 20px 10px 20px 20px;
">
                                    <div class="row">
                                        <div class="col-3"> <img src="{{ asset('assets/img/dashboard/profile.png') }}"
                                                style="
width: 60px;" /></div>
                                        <div class="col-9" style="padding-top: 6px"><text
                                                style="
padding-left: 15px;
color: darkblue;
margin-top: !important;
">Login:28/12/2023</text><text
                                                style="padding-left: 14px">AADITYA JAISWAL</text></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="user-acquisition" class="card card-default"
                        style="border: none;background:#37393d;margin-top:20px;">
                        <div class="card-header text-white"
                            style="border-radius: 0px;background:#37393d;padding:12px !important;">
                            <h2><span style="color: #fff !important;
							font-size: 23px;padding-right:5px;"><i
                                        style="color: #fff !important;padding-right: 5px;vertical-align:middle;"
                                        class="fa fa-heartbeat" aria-hidden="true"></i></span><span
                                    style="color: #fff !important;
font-weight: 200;
vertical-align:middle;
font-size: 17px;"><text>My
                                        Website Resources</text></span></h2>
                        </div>
                        <div style="
						background: white;
					">
                            <div class="alert" role="alert"
                                style="margin: 20px;background:lightcyan;border-color:lightcyan;font-size:13px !important;font-weight:normal;">
                                If resources are running high, contact us to help you optimize:<br> <span
                                    style="font-weight: 500;">support@brilliantdirectories.com</span>
                                <button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false" style="background: white;float:right;margin-top: -18px;">

                                    <div class="d-inline-block" style="color: black">
                                        Cleanup Tools
                                    </div>
                                    {{-- <imgsrc="asset('assets/img/user/user.png') " class="user-image" alt="User Image" /> --}}
                                </button>

                                <ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu">
                                    <!-- User image -->

                                    <li class="text-center">
                                        <a href="{{ route('admin.profile') }}">
                                            My Profile
                                        </a>
                                    </li>

                                    <li class="dropdown-footer text-center">
                                        <a href="{{ route('admin.logout') }}">Log Out </a>
                                    </li>
                                </ul>
                                {{-- <div class="dropdown" style="float: right;margin-top:-20px;">
							<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  Dropdown button
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							  <a class="dropdown-item" href="#">Action</a>
							  <a class="dropdown-item" href="#">Another action</a>
							  <a class="dropdown-item" href="#">Something else here</a>
							</div>
						  </div> --}}
                            </div>
                            {{-- <div class="w-25 p-3" style="background-color: #eee;">Width 25%</div>
<div class="w-50 p-3" style="background-color: #eee;">Width 50%</div>
<div class="w-75 p-3" style="background-color: #eee;">Width 75%</div>
<div class="w-100 p-3" style="background-color: #eee;">Width 100%</div>
<div style="height: 100px; background-color: rgba(255,0,0,0.1);">
	<div class="mh-100" style="width: 100px; height: 200px; background-color: rgba(0,0,255,0.1);">Max-height 100%</div>
  </div> --}}
                            <div class="row" style="padding:10px">
                                <div class="col-xl-4 col-md-12" style="
					padding: 10px 10px 10px 10px;
				">
                                    <div class="text-center">
                                        <i class="mdi mdi-account-circle" style="font-size: 42px;" /></i><br>
                                        <text style="color: black;font-weight:600;">Member Count</text>

                                        <div class="w-100 p-3"
                                            style="background-color: #4bd1e3;color:white;margin-top:10px;padding:8px !important;">
                                            954 Members</div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-12" style="
					padding: 10px 10px 10px 10px;
				">
                                    <div class="text-center">
                                        <i class="mdi mdi-chart-pie" style="font-size: 42px;" /><br></i>
                                        <text style="color: black;font-weight:600;">Available Storage Space</text>
                                        <div style="height: 37px;margin-top: 10px;background-color: #37393d;"><text
                                                style="color: white">0.64/10.0GB - 6.44% Used</text>
                                            <div class="mh-100"
                                                style="width: 30px; height: 100px; background-color: #4bd1e3;margin-top: -21px !important;">
                                            </div>
                                        </div>
                                        {{-- <div class="w-100 p-3" style="background-color: #4bd1e3;color:white;margin-top:10px;padding:8px !important;">0.64/10.0GB - 6.44% Used</div> --}}
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-12" style="
					padding: 10px 10px 10px 10px;
				">
                                    <div class="text-center">
                                        <i class="mdi mdi-speedometer" style="font-size: 42px;" /><br></i>
                                        <text style="color: black;font-weight:600;">Monthly Bandwidth(December)</text>
                                        <div style="height: 37px;margin-top: 10px;background-color: #37393d;"><text
                                                style="color: white">0.87/10.0GB - 8.70% Used</text>
                                            <div class="mh-100"
                                                style="width: 30px; height: 100px; background-color: #4bd1e3;margin-top: -21px !important;">
                                            </div>
                                        </div>
                                        {{-- <div class="w-100 p-3" style="background-color: #4bd1e3;color:white;margin-top:10px;padding:8px !important;">0.64/10.0GB - 6.44% Used</div> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="padding:10px">
                                <div class="col-xl-4 col-md-12" style="
					padding: 10px 10px 10px 10px;
				">
                                    <div class="text-center">
                                        <i class="mdi mdi-email" style="font-size: 42px;" /></i><br>
                                        <text style="color: black;font-weight:600;">Emails Sent Today</text>

                                        <div class="w-100 p-3"
                                            style="background-color: #37393d;color:white;margin-top:10px;padding:8px !important;">
                                            0/1,500-0% Used</div>
                                    </div>
                                    <a class="btn"
                                        style="margin-top: 10px;
margin-left: 37px;
background: white;
color: black !important;">View
                                        Last 30 Days</a>
                                </div>
                                <div class="col-xl-4 col-md-12" style="
					padding: 10px 10px 10px 10px;
				">
                                    <div class="text-center">
                                        <i class="fa fa-exclamation-circle"
                                            style="font-size: 42px;padding-top: 10px;padding-bottom: 11px;"></i><br>
                                        <text style="color: black;font-weight:600;">Emails Address is Blocked</text>
                                        <div class="w-100 p-3"
                                            style="background-color: lightsalmon;color:white;margin-top:10px;padding:8px !important;">
                                            Click to Unblock Email Address</div>
                                        {{-- </div>
   <div style="height: 37px;margin-top: 10px;background-color: #37393d;"><text style="color: white">Click to Unblock Email Address</text>
	<div class="mh-100" style="width: 30px; height: 100px; background-color: #4bd1e3;margin-top: -21px !important;"></div>
  </div> --}}
                                        {{-- <div class="w-100 p-3" style="background-color: #4bd1e3;color:white;margin-top:10px;padding:8px !important;">0.64/10.0GB - 6.44% Used</div> --}}
                                    </div>
                                    <a style="margin-top: 10px;
									margin-left: 37px;">info@samplesite.com</a>
                                </div>

                                <div class="col-xl-4 col-md-12" style="
					padding: 10px 10px 10px 10px;
				">
                                    <div class="text-center">
                                        <i class="mdi mdi-map-marker" style="font-size: 42px;" /><br></i>
                                        <text style="color: black;font-weight:600;">Google Maps API Status</text>
                                        <div class="w-100 p-3"
                                            style="background-color: lightsalmon;color:white;margin-top:10px;padding:8px !important;">
                                            Google API Key Not Found!</div>
                                        {{-- <div style="height: 37px;margin-top: 10px;background-color: #37393d;"><text style="color: white"></text> --}}
                                        {{-- <div class="mh-100" style="width: 30px; height: 100px; background-color: #4bd1e3;margin-top: -21px !important;"></div> --}}
                                        {{-- </div> --}}
                                        {{-- <div class="w-100 p-3" style="background-color: #4bd1e3;color:white;margin-top:10px;padding:8px !important;">0.64/10.0GB - 6.44% Used</div> --}}
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12 p-b-15">
                    <div class="box"
                        style="
					background:antiquewhite;
					padding: 13px;
					height: 122px;
				">
                        <h6 style="
				padding-bottom: 10px;border-bottom: 2px solid lightgray;
			"><i
                                class="mdi mdi-bell-circle-outline"
                                style="
											font-size: 23px;
											padding-right: 5px;
											vertical-align:middle;
										"></i>
                            <text style="
				color:black;vertical-align:middle;
			">INSTALL NEW UPDATES</text>
                            <i class="mdi  mdi-checkbox-marked-circle"
                                style="padding-left: 82px;
										  font-size: 20px;
										  color: green !important;"></i>
                        </h6>


                        {{-- <div class="row"> --}}
                        {{-- <text>Payments Received</text> --}}
                        <button type="button" class="btn btn-primary btn-lg btn-block"
                            style="
					margin-top: 10px;
					background: #5cdbc4 !important;border: #5cdbc4;
				"><i
                                class="mdi mdi-sync"
                                style="
    color: white !important;
    padding-right: 12px;
"></i>Check For
                            Updates</button>
                        {{-- </div> --}}
                    </div>
                    <div style="margin-top:20px;padding:20px;background:white;">
                        <img src="{{ asset('assets/img/dashboard/facebook.PNG') }}" />
                    </div>
                    <div class="box"
                        style="
				background:white;
				padding: 13px;
				height: 122px;margin-top:20px;
			">

                        <i class="mdi mdi-forum"
                            style="
										font-size: 23px;
										padding-right: 5px;
										vertical-align:middle;
									"></i>
                        <text style="
			color:black;vertical-align:middle;
		">Social Media Quick Links</text>
                        <hr style="
		margin-top: 1px;
	">
                        </h8>


                        {{-- <div class="row"> --}}
                        {{-- <text>Payments Received</text> --}}
                        <div class="justify-content-center" style="display: flex">
                            <div class="rounded-circle"
                                style="
					background-color: #37393d;

					width: 14%;border-radius: 63% !important;
				">
                                <i class="fa fa-facebook"
                                    style="font-size: 18px;padding: 15px;color: white !important;"></i>
                            </div>
                            <div class="rounded-circle"
                                style="
					background: #37393d;margin-left:10px;
					width: 14%;border-radius: 63% !important;
				">
                                <i class="fa fa-instagram"
                                    style="font-size: 22px;padding: 12px;color: white !important;"></i>
                            </div>
                        </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>

            {{-- Section 3 end --}}
            {{-- Section 3 start --}}

            <div class="row">

                <div class="col-xl-8 col-md-12 p-b-15">
                    <i class="fa fa-question-circle" aria-hidden="true" style="
		font-size: 26px;
	"></i><text
                        style="
    font-size: 21px;
    padding: 7px;
">Help Resources</text>
                    <input class="form-control mr-sm-2" type="search"
                        placeholder="Need Help? Search Topics by Keywords..." aria-label="Search"
                        style="border-radius:0px;margin-top: 15px;">
                    <div class="row" style="padding: 10px;
					margin-top: 20px;
					border-radius: 5px;
					background: white;
					--bs-gutter-x: 0;
					border: 2px solid lightgray;
				">
                        <div class="col-md-4" style="
padding: 10px 10px 10px 10px;
">
                            <div class="" style="
							display: flex;
						">
								<i class="fa fa-book" aria-hidden="true" style="
								font-size: 32px;
								background: lightgray;
								padding: 10px;
								border-radius: 5px;height: max-content;
								color: gray !important;
							"></i>
							<div style="
							padding-left: 10px;
						">
                                <text style="color: aqua;font-weight: 600;">Documentation</text><br />
                                <text style="color: lightgray;">Search the BD knowledgebase to quickly find answers.</text>
							</div>
							</div>
                        </div>
						<div class="col-md-4" style="
padding: 10px 10px 10px 10px;
">
                            <div class="" style="display:flex;
						">
								<i class="fa fa-comments" aria-hidden="true" style="
								font-size: 32px;
								background: lightgray;
								padding: 10px;
								border-radius: 5px;height: max-content;
								color: gray !important;
							"></i>
							<div  style="
							padding-left: 10px;
						">
                                <text style="color: aqua;font-weight: 600;">Community Forums</text><br />
                                <text style="color: lightgray;">Start discussions and receive help from fellow BD users.</text>
							</div>
							</div>
                        </div>
						<div class="col-md-4" style="
padding: 10px 10px 10px 10px;
">
                            <div class="" style="display:flex;
						">
								<i class="fa fa-facebook-official" aria-hidden="true" style="
								font-size: 32px;
								background: lightgray;
								padding: 10px;
								border-radius: 5px;height: max-content;
								color: gray !important;
							"></i>
							<div  style="
							padding-left: 10px;
						">
                                <text style="color: aqua;font-weight: 600;">Facebook Group</text><br />
                                <text style="color: lightgray;">Improve your skills and connect with fellow BD users.</text>
							</div>
							</div>
                        </div>

                       
                   
				
                        <div class="col-md-4" style="
padding: 10px 10px 10px 10px;
">
                            <div class="" style="
							display: flex;
						">
								<i class="fa fa-magic" aria-hidden="true" style="
								font-size: 32px;
								background: lightgray;
								padding: 10px;
								border-radius: 5px;height: max-content;
								color: gray !important;
							"></i>
							<div style="
							padding-left: 10px;
						">
                                <text style="color: aqua;font-weight: 600;">Training Webinars</text><br />
                                <text style="color: lightgray;">Expert tips, live examples and see how others use BD.</text>
							</div>
							</div>
                        </div>
						<div class="col-md-4" style="
padding: 10px 10px 10px 10px;
">
                            <div class="" style="display:flex;
						">
								<i class="fa fa-address-book" aria-hidden="true" style="
								font-size: 32px;
								background: lightgray;
								padding: 10px;
								border-radius: 5px;height: max-content;
								color: gray !important;
							"></i>
							<div  style="
							padding-left: 10px;
						">
                                <text style="color: aqua;font-weight: 600;">Partner Marketplace</text><br />
                                <text style="color: lightgray;">Hire pros for customizations<br/>,SEO,marketing and more.</text>
							</div>
							</div>
                        </div>
						<div class="col-md-4" style="
padding: 10px 10px 10px 10px;
">
                            <div class="" style="display:flex;
						">
								<i class="fa fa-ambulance" aria-hidden="true" style="
								font-size: 32px;
								background: lightgray;
								padding: 10px;
								border-radius: 5px;height: max-content;
								color: gray !important;
							"></i>
							<div  style="
							padding-left: 10px;
						">
                                <text style="color: aqua;font-weight: 600;">View / Submit Tickets</text><br />
                                <text style="color: lightgray;">Need help troubleshooting an issue? Create a support ticket.</text>
							</div>
							</div>
                        </div>

                       
                    </div>
                </div>
                <div class="col-xl-4 col-md-12 p-b-15">
					<div id="user-acquisition" class="card card-default" style="border: none;background:#37393d;margin-top:46px;">
                        <div class="card-header text-white" style="border-radius: 0px;background:#37393d;padding:12px !important;">
                            <h2><span style="color: #fff !important;
							font-size: 23px;padding-right:5px;"><i style="color: #fff !important;padding-right: 5px;vertical-align:middle;" class="mdi mdi-calendar-check" aria-hidden="true"></i></span><span style="color: #fff !important;
font-weight: 200;
vertical-align:middle;
font-size: 17px;"><text>Monthly Changelog Updates</text></span></h2>
                        </div>
                        <div class="box" style="
				background:white;
				padding: 13px;
				height: 100px;margin-top:20px;
			">

                        
                        <span class="badge badge-primary" style="color: white !important;padding: 10px;
						margin: 25px;">ALL CHANGELOG HISTORY <i class="mdi mdi-launch" style="
							font-size: 14px;color:white !important;
							padding-right: 5px;
							vertical-align:middle;
						"></i> </span>
                        


                        
                        
                       
                        
                    </div>
                    </div>
					
				</div>
			
            </div>
	<div style="float:right;">
				<i class="mdi mdi-lightbulb" style="font-size: 42px;
				color: yellow !important;
				background: black;
				border-radius: 40px;
				vertical-align: middle;
			"></i><span class="badge badge-primary" style="color: white !important;
    padding: 10px;
    margin: 0px 0px 0px 19px;border-radius: 18px 7px 18px 18px"> <i class="fa fa-question-circle" style="
	font-size: 22px;
    color: white !important;
    padding-right: 5px;
    vertical-align: middle;
						"></i> HELP CENTER</span></div>

        </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->
@endsection

@section('extra_js')
    
    <script>
        function getMobileOperatingSystem() {
    var userAgent = navigator.userAgent || navigator.vendor || window.opera;


    if (userAgent.match(/iPad/i) || userAgent.match(/iPhone/i) || userAgent.match(/iPod/i) || userAgent.match(/Android/i) || userAgent.match(/Windows Phone/i) || userAgent.match(/PlayBook/i) || userAgent.match(/BB10/i) || userAgent.match(/BlackBerry/i) || userAgent.match(/BlackBerry9000/i)) {
        $("html").addClass("mobile-user-agent")
    }
};
getMobileOperatingSystem();

if($("html:not(.mobile-user-agent)")) {
    $(".video-preview-image").unbind("click").bind("click", function() {
        $(".youtubers").find(".playing .video-preview-image").show();
        if($(".playing").length) {
            var PlayingVideoSrc = $(".youtubers").find(".playing iframe").attr("src").replace('&autoplay=1','');
            $(".youtubers").find(".playing iframe").attr("src",PlayingVideoSrc);
        }

        $(this).closest(".youtubers__row").addClass("playing").siblings().removeClass("playing");
        $(this).hide();
        $(this).parent().find("iframe")[0].src += "&autoplay=1";
    });
}
    </script>


@endsection

