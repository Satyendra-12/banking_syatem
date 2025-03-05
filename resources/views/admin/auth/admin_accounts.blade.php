@extends('admin.layout.app')
@section('extra_css')
    <link rel="stylesheet" href="{{ asset('assets/bundles/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
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
        th {
            border: 1px solid lightgray;
        }
        td {
            border: 1px solid lightgray;
        }

        .form-group .form-control,
        .input-group .form-control {
            font-size: 15px;
            padding: 0.5rem 1.06rem;
            border-color: gray;
            border-radius: 3px;
        }
        .row > * {
            padding-right: 0px !important;
            padding-left: 0px !important;
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
            <div class="row justify-content-end" style="
            margin-bottom: 5px;
            margin-left: 1px;
            margin-right: 26px;
        ">
                
                
                
                
                
                <div class="col" style="
    margin-right: 44px;
">
                    <div class="alert alert-light" role="alert" style="
                        border-left: 5px solid teal;
                        border-radius: 0px;
                        font-size:small;color:gray;font-size: 11.8px !important;
    padding: 10px 5px 9px 5px;
    background: white;
    font-weight: unset;margin-bottom: 0px !important;
                    ">
                        <i class="mdi mdi-information" style="
                          color: cornflowerblue !important;padding-right:0px;padding-left:0px;
                      "></i>
                        <b>Admin Accounts</b> - Add,invite and remove administrator accounts for people who access the website's admin area 
                                        </div>
                </div>
                <div class="col-md-auto" style="
    margin-right: 8px;
">
                    <button type="submit" class="btn btn-primary" style="background: #37393d !important;margin-top:0px !important;
                        border: #37393d !important;border-radius: 0px;padding:7px;
                        "><i class="fa fa-cogs" style="color: white !important;padding-right: 3px !important;"></i>Admin Role Settings</button>
                </div>
                <div class="col col-lg-2" style="
                margin-right:0px !important;
                margin-left: 0px;
                "> 
                <div class="dropdown user-menu">
                   
                    <button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown" aria-expanded="false" style="
                    border: 1px solid black;
                    color: black;
                    padding: 6px;
                    background: white;
                "> 
                       
                                <div class="d-inline-block" style="color: black">
                                    <i class="mdi mdi-account-circle"></i>Add New Administrator
                                    
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
                            <a href="http://localhost/bahraia_bank/admin/log-out"> <i class="mdi mdi-logout"></i> Log Out </a>
                        </li>
                    </ul>
                </div> 
                </div>
                
                

            </div>
            <hr />

            <div class="card-header text-white" style="border-radius: 0px;background:#37393d;padding: 5px !important;">
                <h2><span style="color: #fff !important;font-weight: 200;vertical-align:middle;font-size: 19px;padding-left: 8px !important;"><text>Admin Accounts <small style="
    font-size: 12px;
">(1)</small></text></span></h2>
            </div>

            <div class="table-responsive"
                                           >

                                            <table id="category" class="table"
                                                style="
                                                background: #f2f2f2;
                                            ">
                                                <thead>
                                                    <tr style="
                                                ">
                                                    <th>Actions</th>
                                                    <th>Status</th>
                                                    <th>Account Information</th>
                                                    </tr>
                                                <tbody style="
                                                background: beige;border-top: 1px solid #f3f3f3;
                                            ">
                                                    <tr style="    font-weight: 600;
                                                    color: black;">
                                                        <td style="
                                                        vertical-align: middle;
                                                        text-align: center;
                                                    ">
                                                            <a href="http://localhost/bahraia_bank/admin/edit-page/1" class="h5 btn  edit_page">Edit</a>
              
                <span class="dropdown show" style="margin-left: 20px;">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style=" background: transparent;
  color: black !important;">
    Actions
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 26px, 0px); top: 0px; left: 0px; will-change: transform;">
  <a class="dropdown-item h5 p-0 pl-2 delete_page" data-id="1"><i class="mdi mdi-delete"></i></a>
   
  
  
 </div></span>
                                                        </td>
                                                        <td style="
                                                        vertical-align: middle;
                                                        text-align: center;
                                                    "><a href="#" class="btn btn-sm " id="delete_categroy"
                                                            data-id=""
                                                            style="
                                                                    background: #34ebab;
                                                                    border-color: #34ebab;
                                                                ">
                                                            ACTIVE</a></td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-1" style="
    margin-left: 20px;
    margin-top: 33px;
">
                                                                    <div style="
                                                                position: relative;
                                                                display: block;
                                                                width: 50px;
                                                                height: 50px;
                                                                border-radius: 50%;
                                                                background-color: blue;
                                                                text-align: center;
                                                                transition: .6s;
                                                                ">
                                                                        <text style="
                                                                        color: white;
                                                                        font-size: 25px;
                                                                        line-height: 50px;
                                                                        transition: .3s;
                                                                    ">
                                                                        BT
                                                                        </text>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <text style="
                                                                    font-weight: 100;
                                                                ">
                                                                <i class="mdi mdi-login"></i>info@honestytechnology.com<br>
                                                                <i class="mdi mdi-account"></i>BINU THOS<br>
                                                                <i class="mdi mdi-email"></i>   info@honestytechnology.com<br>
                                                                <i class="mdi mdi-wifi"></i>  Last Active IP:193.188.123.157<br>
                                                                <i class="mdi mdi-login"></i>   Default Login Website:#15191<br>
                                                                <i class="mdi mdi-login"></i>   Logged in 39 Sessions      </text>                                                         </div>
                                                                <div class="col-6">
                                                                    <text  style="
                                                                    font-weight: 100;
                                                                ">
                                                                <i class="mdi mdi-lock"></i>  Primary Admin<br>
                                                                <i class="mdi mdi-phone"></i>    0097338728672<br>
                                                                <i class="fa fa-history" aria-hidden="true"></i>    Last Active Dec 20.2023, 11.21 am</text>
                                                                </div>
                                                            </div>

                                                        </td>
                                                        

                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
            

    </div>


    </div>

    </div>


    </div>
    </div>
@endsection

@section('extra_js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        function chooseFile() {
            document.getElementById('fileInput').click();
        }
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const fileInput = event.target;
            const selectedImage = document.getElementById('selectedImage');

            // Check if a file is selected
            if (fileInput.files.length > 0) {
                const selectedFile = fileInput.files[0];
                const objectURL = URL.createObjectURL(selectedFile);

                // Display the selected image
                selectedImage.src = objectURL;
                selectedImage.style.display = 'block';
            } else {
                // If no file is selected, hide the image
                selectedImage.style.display = 'none';
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 400
            });
        });
    </script>
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
