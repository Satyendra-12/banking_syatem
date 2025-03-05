@extends('admin.layout.app')
@section('extra_css')
    <link rel="stylesheet" href="{{ asset('assets/bundles/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        thead,
        tbody,
        tfoot,
        tr,
        td,
        th {
            border: 1px solid lightgray !important;
            vertical-align: middle;
        }
        li, span {
    letter-spacing: 0.02rem;
    color: blue !important;
        }

        thead th,
        tbody tr td:first-child {
            font-weight: 600;
            color: black;
        }

        .nav-tabs .nav-item .nav-link.active {
            color: #88aaf3;
            border-top: 4px solid #3e6db8;
            background: white;
        }

        .nav-tabs .nav-item .nav-link {
            color: #56606e;
            font-weight: 500;
            background: #d9dbcc;
            padding: 8px 20px;
            margin-left: 6px;
        }

        .card {
            border: 0px solid darkgray !important;
        }

        p,
        span,
        a,
        i {
            color: gray !important;
            padding-left: 6px;

        }

        .form-group label,
        .input-group label {
            /* color: gray !important; */
            font-size: 16px;
            font-weight: 500;
        }

        .form-group .form-control,
        .input-group .form-control {
            font-size: 15px;
            padding: 0.5rem 1.06rem;
            border-color: gray;
            border-radius: 3px;
        }
        .container {
	width: 50%;
	margin: 0 auto;
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
@endsection

@section('content')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}

    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-contacts">
                
                <div class="col-md-7">
                    <div class="alert alert-light" role="alert"
                        style="
                        padding: 5px;
                        border-left: 5px solid teal;
                        border-radius: 0px;
                        font-size:small;color:gray;
    background: white;
    font-weight: unset;
                    ">
                        <i class="mdi mdi-information"
                            style="
                          color: cornflowerblue !important;padding-right:0px;padding-left:0px;
                      "></i>
                        <b>Domain Manager</b> - Update settings related to the domain name, SSL and email deliverability
                    </div>
                </div>
              

            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="border-bottom: 0px;">
                <li class="nav-item" role="presentation" style="">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true"
                        style="border-radius: 0px;margin-left: 0px;">Domain Name</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false" style="border-radius: 0px;">SSL
                        Security</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social" type="button"
                        role="tab" aria-controls="social" aria-selected="false" style="border-radius: 0px;">Email
                        Deliverability</button>
                </li>
                
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"
                    style="">
                    
                </div>
                <div class="">
                    <form id="updateprofile">
                        
                                        <div class="table-responsive"
                                            style="
                                            margin-left: 1px;
                                            border: 1px solid white;
                                            background: white;
                                            box-shadow: 0px 1px 3px 2px lightgray;
                                        ">

                                            <table id="category" class="table"
                                                style="
                                                width: 97%;
                                                border: 1px solid lightgray;
                                                margin-left: 15px;
                                                background: #f2f2f2;
                                            ">
                                                <thead>
                                                    <div class="card-header text-white"
                                                        style="border-radius: 0px;background:#37393d;padding: 5px !important;margin: 15px 15px 0px 15px;">
                                                        <h2><span
                                                                style="color: #fff !important;
                                    font-size: 23px;padding-left:5px;"><i
                                                                    style="color: #fff !important;padding-right: 5px;"
                                                                    class="fa fa-plug" aria-hidden="true"></i></span><span
                                                                style="color: #fff !important;
                                    font-weight: 200;
                                    vertical-align:middle;
                                    font-size: 17px;padding-left: 0px !important;"><text>Domain
                                                                    Information</text></span>
                                                            <span
                                                                style="
                                                                float: right;
                                                            "><a
                                                                    href="{{ route('admin.domain') }}" class="btn btn-sm"
                                                                    style="
    border-color: white;
"><i
                                                                        class="fa fa-refresh" aria-hidden="true"
                                                                        style="
    color: white !important;
    padding-left: 0px !important;
    padding-right: 6px;
    border-color: white;
"></i>Refresh</a></span>
                                                        </h2>
                                                </thead>
                                                <tbody>
                                                    <tr style="    font-weight: 600;
                                                    color: black;">
                                                        <td rowspan="4" style="width: 33%;text-align: center;"> <img
                                                                src="{{ asset('assets/img/dashboard/2.png') }}"
                                                                style="width:100%;border: 2px solid #34ebab;">
                                                            <div
                                                                style="
                                                            background: white;
                                                            padding: 10px;
                                                        ">
                                                                <text>https://www.bahrainbanksdirectory.com</text></div>
                                                            <a href="#" class="btn btn-sm" id="delete_categroy"
                                                                data-id=""
                                                                style="
                                                                    background: #34ebab;
                                                                    padding-left: 29px;padding-right: 28px;border-color: #34ebab;margin: 10px 21px 0px 0px;
                                                                ">
                                                                Visit Website <i class="mdi mdi-launch"
                                                                    style="
color: white !important;
font-size: 13px;
padding-left: 0px !important;
"></i></a><a
                                                                href="#" class="btn btn-sm " id="delete_categroy"
                                                                data-id=""
                                                                style="background: transparent;
                                                            border-color: blue;
                                                            margin-top: 10px;padding-left: 29px;padding-right: 28px;
                                                            color: blue !important;
                                                                ">
                                                                Change Domain</a>
                                                        </td>
                                                        <td>Domain Registar</td>
                                                        <td colspan="4"><text
                                                                style="vertical-align: sub;">Godaddy</text>

                                                            <a href="{{ route('admin.profile') }}" class="btn btn-sm"
                                                                style="
                                                                        background: transparent;
                                                                        color: black !important;
                                                                        float:right;
                                                                    ">View
                                                                Who is <i class="mdi mdi-launch"
                                                                    style="
                                                                color: black !important;
                                                                "></i></a>
                                                        </td>
                                                        <td
                                                            style="
                                                        text-align: center;
                                                    ">
                                                            <a href="#" class="btn btn-sm " id="delete_categroy"
                                                                data-id=""
                                                                style="
                                                                        background: #34ebab;
                                                                        border-color: #34ebab;
                                                                    "><i
                                                                    class="mdi mdi-check"
                                                                    style="
    color: white !important;
    font-size: 13px;
    padding-left: 0px !important;
"></i>
                                                                ALL GOOD</a>
                                                        </td>

                                                    </tr>
                                                    <tr
                                                        style="
                                                    background: white;
                                                ">
                                                        <td>Domain Expires</td>
                                                        <td colspan="4"><text style="vertical-align: sub;">February 24,
                                                                2024</text>

                                                            {{-- <a href="{{ route('admin.profile') }}" class="btn btn-sm"
                                                                style="
                                                                        background: transparent;
                                                                        color: black !important;
                                                                        float:right;
                                                                    ">View
                                                                Who is <i class="mdi mdi-launch"
                                                                    style="
                                                                color: black !important;
                                                                "></i></a> --}}
                                                        </td>
                                                        <td
                                                            style="
                                                        text-align: center;
                                                    ">
                                                            <a href="#" class="btn btn-sm " id="delete_categroy"
                                                                data-id=""
                                                                style="
                                                                        background: #34ebab;
                                                                        border-color: #34ebab;
                                                                    "><i
                                                                    class="mdi mdi-check"
                                                                    style="
    color: white !important;
    font-size: 13px;
    padding-left: 0px !important;
"></i>
                                                                ALL GOOD</a>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Connection Method</td>
                                                        <td colspan="4"><text style="vertical-align: sub;">Nameserver
                                                                Method</text>

                                                            <a href="{{ route('admin.profile') }}" class="btn btn-sm"
                                                                style="
                                                                    background: transparent;
                                                                    color: black !important;
                                                                    float:right;
                                                                ">View
                                                                DNS<i class="mdi mdi-launch"
                                                                    style="
                                                            color: black !important;
                                                            "></i></a>
                                                        </td>
                                                        <td
                                                            style="
                                                    text-align: center;
                                                ">
                                                            <a href="#" class="btn btn-sm " id="delete_categroy"
                                                                data-id=""
                                                                style="
                                                                    background: #34ebab;
                                                                    border-color: #34ebab;
                                                                "><i
                                                                    class="mdi mdi-check"
                                                                    style="
color: white !important;
font-size: 13px;
padding-left: 0px !important;
"></i>
                                                                ALL GOOD</a>
                                                        </td>

                                                    </tr>
                                                    <tr style="
background: white;
">
                                                        <td>Nameservers
                                                        </td>
                                                        <td colspan="4">
                                                            <div style="margin-bottom: -40px;"><text
                                                                    style="vertical-align: sub;">ns2.directorysecure.com<br>
                                                                    ns1.directorysecure.com</text></div>

                                                            <a href="{{ route('admin.profile') }}" class="btn btn-sm"
                                                                style="
                                                                background: transparent;
                                                                color: black !important;
                                                                float:right;
                                                            ">View
                                                                DNS<i class="mdi mdi-launch"
                                                                    style="
                                                        color: black !important;
                                                        "></i></a>
                                                        </td>
                                                        <td
                                                            style="
                                                    text-align: center;
                                                ">
                                                            <a href="#" class="btn btn-sm " id="delete_categroy"
                                                                data-id=""
                                                                style="
                                                                background: #34ebab;
                                                                border-color: #34ebab;
                                                            "><i
                                                                    class="mdi mdi-check"
                                                                    style="
color: white !important;
font-size: 13px;
padding-left: 0px !important;
"></i>
                                                                ALL GOOD</a>
                                                        </td>

                                                    </tr>
                                                </tbody>

                                            </table>
                                        {{-- </div> --}}
                                    {{-- </div>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="row">
                                            <div class="form-group">
                                                <div id="subcategory">
                                                    <label for="Subcategory Name">Confirm New Password Again</span></label>
                                                    <input type="password" class="form-control" name="c_password"
                                                        placeholder="Enter Confirm New Password Again">
        
        
                                                </div>
        
                                            </div>
        
        
                                        </div> --}}

                                        {{-- <div class="table-responsive"
                                        style="
                                        margin-left: 1px;
                                        border: 1px solid white;
                                        background: white;
                                        box-shadow: 0px 1px 3px 2px lightgray;
                                    "> --}}

                                        <table id="category" class="table"
                                            style="
                                            width: 97%;
                                            border: 1px solid lightgray;
                                            margin-left: 15px;
                                            background: #f2f2f2;
                                        ">
                                            <thead>
                                                <div class="card-header text-white"
                                                    style="border-radius: 0px;background:#37393d;padding: 5px !important;margin: 40px 15px 0px 15px;">
                                                    <h2><span
                                                            style="color: #fff !important;
                                font-size: 23px;padding-left:5px;"><i
                                                                style="color: #fff !important;padding-right: 5px;"
                                                                class="fa fa-info-circle" aria-hidden="true"></i></span><span
                                                            style="color: #fff !important;
                                font-weight: 200;
                                vertical-align:middle;
                                font-size: 17px;padding-left: 0px !important;"><text>How to Connect Domain</text></span>
                                                        
                                                    </h2>
                                            </thead>
                                            <tbody>
                                                <tr style="
                                                background: white;
                                            ">
                                                    <td style="vertical-align: text-top;">
                                                        <div>
                                                                <!-- video -->
                                                               
                                                                
                                                                
                                                                <!-- video -->
                                                                <div class="youtubers__row">
                                                                    
                                                                        <div class="videoWrapper"  style="
                                                                        width: 270px;
                                                                        height: 150px;
                                                                    ">
                                                                            <div class="video-preview-image" style="background-image:url(https://www.huhmagazine.co.uk/images/uploaded/index/caseyneistat_app_01.jpg)"></div>
                                                                            <iframe width="" height="480" src="https://www.youtube.com/embed/0-xQtISyAl0?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                                                        </div>
                                                                    <b>Remember: </b><text style="
                                                                    font-weight: 400;
                                                                    color: gray;
                                                                ">It can take up to 48 hours for<br> new domains to connect.</text><br>
                                                            <b>Check if your website is online here:</b>  
                                                            <div style="padding-left: 0px">
                                                                <li style="
                                                                font-weight: 300;
                                                            ">https://geopeeker.com</li>
                                                                <li style="
                                                                font-weight: 300;
                                                            ">https://downforeveryoneorjustme.com</li>
                                                            </div>     
                                                            </div>
                                                                
                                                                
                                                            {{-- </div> <!-- youtubers --> --}}
                                                        </div> <!-- container -->
                                                    </td>
                                                    <td style="vertical-align: top;"><h4 style="color:black;text-align: center"><b style="font-size:larger">Nameserver Method</b></h4><br>
                                                        <h6 style="color:black">EASIEST</h6>
                                                            <text>This is the recommended method to update your domain. Connect your domain by updating its Nameserver records to the following:
                                                                <div style="padding-left: 20px">
                                                                    <li style="
                                                                    color: gray !important;
                                                                    font-weight: 300;
                                                                ">NS1.DIRECTORYSECURE.COM</li>
                                                                    <li style="
                                                                    color: gray !important;
                                                                    font-weight: 300;
                                                                ">NS2.DIRECTORYSECURE.COM</li>
                                                                </div><br>
                                                                <h6 style="color:black">RECOMMENDED WHEN</h6>
                                                                <div style="padding-left: 20px">
                                                                    <li style="
                                                                    color: gray !important;
                                                                    font-weight: 300;
                                                                ">Domain is not already connected to a live website.</li>
                                                                    <li style="
                                                                    color: gray !important;
                                                                    font-weight: 300;
                                                                ">You have not yet setup email addresses for this domain. </li>
                                                                <li style="
                                                                color: gray !important;
                                                                font-weight: 300;
                                                            ">You are not going to use as a sub-domain.</li>
                                                                </div><br>
                                                                <h6 style="color:black">PLEASE NOTE</h6>
                                                                Any email accounts currently set up for the domain will need to be updated after modifying the domain's Nameserver recods.<br>
                                                                <h6 style="color:black">HELPFUL LINKS</h6>
                                                                <div style="padding-left: 20px">
                                                                    <li style="
                                                                    font-weight: 300;
                                                                ">GoDaddy: how to update nameservers.</li>
                                                                    <li style="
                                                                    font-weight: 300;
                                                                ">Network Solutions: how to update nameservers.</li>
                                                                <li style="
                                                                font-weight: 300;
                                                            ">Namecheap:how to update nameservers</li>
                                                            <li style="
                                                            font-weight: 300;
                                                        ">Bluehost: how to update nameservers</li>
                                                                </div><br>  
                                                            </text></td>
                                                                <td style="vertical-align: top;"><h4 style="color:black;text-align: center"><b style="">A Record Method</b></h4><br>
                                                                    <h6 style="color:black">ADVANCED</h6>
                                                                        <text>This method is popular when using a sub-domain. Connect your domain by pointing your domain by pointing your domain's A Record to the following IP Address:
                                                                            <div style="padding-left: 20px">
                                                                                <li style="
                                                                                color: gray !important;
                                                                                font-weight: 300;
                                                                            ">66.147.230.95</li>
                                                                            </div>  </text>
                                                                            <h6 style="color:black">RECOMMENDED WHEN:</h6>
                                                                                <div style="padding-left: 20px">
                                                                                    <li style="
                                                                                    color: gray !important;
                                                                                    font-weight: 300;
                                                                                ">Root domain is already connected to a live website.</li>
                                                                                <li style="
                                                                                color: gray !important;                     
                                                                                font-weight: 300;
                                                                            ">You have already setup email addresses for this domain.</li>
                                                                            <li style="
                                                                            color: gray !important;                     
                                                                            font-weight: 300;
                                                                        ">You will be using a sub-domain.</li>
                                                                                </div>  </text><br>
                                                                                <h6 style="color:black">HELPFUL LINKS</h6>
                                                                <div style="padding-left: 20px">
                                                                    <li style="
                                                                    font-weight: 300;
                                                                ">GoDaddy: how to update A record</li>
                                                                    <li style="
                                                                    font-weight: 300;
                                                                ">Network Solutions: how to update A record</li>
                                                                <li style="
                                                                font-weight: 300;
                                                            ">Namecheap:How to update A record</li>
                                                            
                                                                </div>
                                                                <hr style="
                                                                background: darkgray;
                                                            "/>
                                                                <br>
                                                                                <h6 style="color:black">IF you need assistance connecting your domain. send an email to:support@brilliantdirectories.com</h6><br>
                                                                                <h6 style="color:black"> Subject:Help With Domain</h6>
                                                                        </td>

                                                </tr>
                                                
                                            </tbody>

                                        </table>
                                    </div>






                        
                    </form>

                </div>

            </div>
            {{-- </div>
                    </div>
                </div> --}}
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"
                style="border: 1px solid lightgray;">

               
            </div>




            <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab"
                style="border: 1px solid lightgray;">

                
        </div>
       
    </div>

    </div>


    </div>
    </div>
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
