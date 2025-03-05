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
        .toggle {
  position: relative;
  /* height: 32px;
  display: flex;
  align-items: center; */
  box-sizing:border-box;
}
.toggle input[type="checkbox"] {
  position: absolute;
  left: 0;
  top: 0;
  z-index: 10;
  width: 100%;
  height: 100%;
  cursor: pointer;
  opacity: 0;
}
.toggle label {
  position: relative;
  display: flex;
  /* height: 100%; */
  align-items: center;
  box-sizing:border-box;
}
.toggle label:before {
  content: '';
  background: #ffa3a3;
  height: 42px;
  width: 75px;
  border-radius: 20px;
  box-shadow: inset 0 0.1em 0.03em #0002, 
    inset 0 0.1em 0.3em #0003;
  position: relative;
  display: inline-block;
  box-sizing:border-box;
  transition: 0.2s ease-in;
}
.toggle label:after {
  content: 'OFF';
  position: absolute;
  top: 2px;
  left: 2px;
  width: 38px;
  height: 38px;
  border-radius: 50%;
  z-index: 2;
  display: grid;
  place-content: center;
  font-size: 15px;
  font-family: arial;
  font-weight: bold;
  box-sizing:border-box;
  color:#FFF;
  background: #ef3434;
  box-shadow: -2px 2px 4px #0004;
  transition: 0.25s ease-in-out;
}
.toggle input[type="checkbox"]:checked + label:before {
  background: #c0e7e3;
}
.toggle input[type="checkbox"]:checked + label:after {
  content: 'ON';
  background: #21bf73;
  transform: translatex(35px);
  /* right:35px; */
}
#drop::after {
    border-right: 5px solid transparent;
    border-bottom: 0px;
    border-top: 6px solid;
    border-left: 5px solid transparent;
    vertical-align: middle;
    margin-left: 122px !important;
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
            <div class="breadcrumb-wrapper breadcrumb-contacts" style="margin-bottom: 0px !important;">
                
                
                
                
                
                <div class="col-md-6">
                    <div class="alert alert-light" role="alert" style="
                        padding: 5px;
                        border-left: 5px solid teal;
                        border-radius: 0px;
                        font-size:small;color:gray;
    background: white;
    font-weight: unset;
                    ">
                        <i class="mdi mdi-information" style="
                          color: cornflowerblue !important;padding-right:0px;padding-left:0px;
                      "></i>
                        <b>Advanced Settings</b> - Manage more specific settings that control website behavior 
                    </div>
                </div>
                <div class="col-md-5" style="
                    display: contents;
                    float: inline-end;
                ">
<button type="submit" class="btn" style="    background: #34ebab;
border-color: #34ebab;
   border-radius: 0px;
    ">Save Settings</button>
                </div>
                

            </div>
            
            <hr />

            <div class="card-header text-white" style="border-radius: 0px;background:#37393d;padding: 5px !important;">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <h2><span style="color: #fff !important;font-weight: 200;vertical-align:middle;font-size: 19px;padding-left: 16px !important;"><text>Advanced Settings</text></span></h2>
                    </div>
                    <div class="col-2" style="
                    margin: 5px 17px 5px 0px;
                    ">
                        <div class="" style="
                        background:white;
                        padding: 7px;
                    ">
                          <i class="mdi mdi-magnify" style="
                      border-right: 1px solid;
                      padding-right: 4px;
                      margin-right: 6px;
                        color: black !important;
                        padding-left: 0px !important;
                  "></i><span style="
                    padding-left: 0px !important;
                    ">Search by keyword</span>
                      </div>
                    </div>
                  </div>
                
               
            </div>
            <div style="background: white">
                <div class="row container" style="
    padding-top: 2rem;
">
                    <div class="col" style="text-align:end;">
                <h3 style="
                color: black;
                padding-right: 15px;
                padding-top: 2rem;
            ">Allow Live Links in Member About Me Text</h3>
                    </div>
                    <div class="col-9" style="
">
                <div class="card" style="
    border-radius:  !important;
    margin: 10px;
">
                    <div class="card-body" style="
                    background: #f3f3f3;
                    border-radius: 5px;
                ">
                    <div class="toggle">
                        <input type="checkbox"/>
                        <label></label>
                    </div>
                    <text>If set to ON, members will be allowed to include additional limks in their ABOUT ME section. This setting is only available for the Bootstrap
                        Version of the software using the default "Bootstrap Theme - Member Profile - Overview Tab" widget NOTE:Allowing members to post live
                        links means they will be able to post links to any URLs they choose, including nefarious or dangerous websites.

                    </text><br>
                    <i class="fa fa-file-text-o" aria-hidden="true" style="
                    color: #42c9eb !important;
                "></i> <text style="color: black;padding-left:6px;"> System Variable<text>
                    <button type="submit" class="btn" style="    background: #646363;margin-top:10px;
                        border-color: #646363;margin-left:10px !important;border-radius:3px !important;
                           border-radius: 0px;padding:7px;
                            ">about_live_links</button><br>
    
    <i class="fa fa-refresh" aria-hidden="true" style="
    color: #42c9eb !important;
    "></i> <text style="color: black;padding-left:6px;">Default Value<text>
    <button type="submit" class="btn" style="    background: #54a6dd;
        border-color: #54a6dd;margin-left:28px !important;border-radius:3px !important;margin-top:5px;
           border-radius: 0px;padding:7px;
            ">OFF</button>
               </div> 
                </div>
                    </div>
                </div>
            
            <hr style="
            margin-top: 26px;
        "/>

            <div class="row container" style="
            padding-top: 1rem;
        ">
                            <div class="col" style="text-align:end;">
                        <h3 style="
                        color: black;
                        padding-right: 15px;
                        padding-top: 2rem;
                    ">Administrative Area Level 1
                    Search Method</h3>
                            </div>
                            <div class="col-9" style="
        ">
                        <div class="card" style="
            border-radius:  !important;
            margin: 10px;
        ">
                            <div class="card-body" style="
                            background: #f3f3f3;
                            border-radius: 5px;
                        ">
                            <div class="dropdown user-menu">
                   
                                <button class="dropdown-toggle nav-link ec-drop" id="drop" data-bs-toggle="dropdown" aria-expanded="false" style="
                                border: 1px solid black;
                                color: black;
                                padding: 6px;
                                background: white;width: 200px;
    text-align: left;
}
                            "> 
                                   
                                            <div class="d-inline-block" style="color: black">
                                                bounds
                                                
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
                            <text>Select how results will be returned when a user searches for an "Administrative Area Level 1" location (typically a state or province). Selecting 
                                "Bounds" (default) will return results that are within the bounds of the searched location Selecting "Radius" will results
                                within the "Default Search Radius" of the center of the searched location.
                            </text><br>
                        <i class="fa fa-file-text-o" aria-hidden="true" style="
                        color: #42c9eb !important;
                    "></i> <text style="color: black;padding-left:6px;"> System Variable<text>
                        <button type="submit" class="btn" style="    background: #646363;
                            border-color: #646363;margin-left:10px !important;border-radius:3px !important;
                               border-radius: 0px;padding:7px;
                                ">adm_area_M_1_search_method</button><br>
        
        <i class="fa fa-refresh" aria-hidden="true" style="
        color: #42c9eb !important;
        "></i> <text style="color: black;padding-left:6px;">Default Value<text>
        <button type="submit" class="btn" style="    background: #54a6dd;
            border-color: #54a6dd;margin-left:28px !important;border-radius:3px !important;margin-top:5px;
               border-radius: 0px;padding:7px;
                ">bounds</button>
                            </text></text></text></text></div> 
                        </div>
                            </div>
                        </div>


          
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