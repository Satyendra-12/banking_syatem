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
    margin-right: 107px;
">
                    <div class="alert alert-light" role="alert" style="
                        border-left: 5px solid teal;
                        border-radius: 0px;
                        color:gray;font-size: 13.8px !important;
    padding: 6px 5px 6px 5px;
    background: white;
    font-weight: unset;margin-bottom: 0px !important;
                    ">
                        <i class="mdi mdi-information" style="
                          color: cornflowerblue !important;padding-right:0px;padding-left:0px;
                      "></i>
                        <b>Text Lables</b> - Directly update website text and phrases without needing to edit HTML code or widgets. 
                                        </div>
                </div>
                <div class="col-md-auto" style="
                margin-right: 31px !important;
                margin-left: 0px;
                "> 
                <div class="dropdown user-menu">
                   
                    <button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown" aria-expanded="false" style="
                    border: 1px solid black;
                    color: black;
                    padding: 6px;
                    background: white;
                "> 
                       
                                <div class="d-inline-block" style="color: black;padding-right: 67px;">
                              English
                                    
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
                <div class="col col-lg-2" style="
    margin-right: -94px;
">
                    <button type="submit" class="btn" style="    background: #34ebab;
                    border-color: #34ebab;margin-top:0px !important;
                       border-radius: 0px;padding:7px;
                        ">Save Settings</button>
                </div>
                
                
                

            </div>
            <hr />

            <div class="card-header text-white" style="border-radius: 0px;background:#37393d;padding: 5px !important;">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <h2><span style="color: #fff !important;font-weight: 200;vertical-align:middle;font-size: 19px;padding-left: 16px !important;"><text>Text Lables</text></span></h2>
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
            ">About Me</h3>
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
                    <textarea style="
                    color: gray;
                    background: #faf9f7;
                    width: 100%;
                    padding: 5px;
                ">About Me </textarea>
                <i class="fa fa-file-text-o" aria-hidden="true" style="
                color: #42c9eb !important;
            "></i> <text style="color: black;padding-left:6px;"> System Variable<text>
                <button type="submit" class="btn" style="    background: #646363;
                    border-color: #646363;margin-left:10px !important;border-radius:3px !important;
                       border-radius: 0px;padding:7px;
                        ">about_me</button><br>

<i class="fa fa-refresh" aria-hidden="true" style="
color: #42c9eb !important;
"></i> <text style="color: black;padding-left:6px;"> Default Value<text>
<button type="submit" class="btn" style="    background: #54a6dd;
    border-color: #54a6dd;margin-left:28px !important;border-radius:3px !important;margin-top:5px;
       border-radius: 0px;padding:7px;
        ">About Me</button>
                    </text></text></text></text></div> 
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
                    ">Account Created</h3>
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
                            <textarea style="
                            color: gray;
                            background: #faf9f7;
                            width: 100%;
                            padding: 5px;
                        ">Your account has been created successfully!</textarea>
                        <i class="fa fa-file-text-o" aria-hidden="true" style="
                        color: #42c9eb !important;
                    "></i> <text style="color: black;padding-left:6px;"> System Variable<text>
                        <button type="submit" class="btn" style="    background: #646363;
                            border-color: #646363;margin-left:10px !important;border-radius:3px !important;
                               border-radius: 0px;padding:7px;
                                ">account_created</button><br>
        
        <i class="fa fa-refresh" aria-hidden="true" style="
        color: #42c9eb !important;
        "></i> <text style="color: black;padding-left:6px;">Default Value<text>
        <button type="submit" class="btn" style="    background: #54a6dd;
            border-color: #54a6dd;margin-left:28px !important;border-radius:3px !important;margin-top:5px;
               border-radius: 0px;padding:7px;
                ">Your account has been created successfully!</button>
                            </text></text></text></text></div> 
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
                    ">Account Default Sub Category</h3>
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
                            <textarea style="
                            color: gray;
                            background: #faf9f7;
                            width: 100%;
                            padding: 5px;
                        ">Select top category first</textarea>
                        <i class="fa fa-file-text-o" aria-hidden="true" style="
                        color: #42c9eb !important;
                    "></i> <text style="color: black;padding-left:6px;"> System Variable<text>
                        <button type="submit" class="btn" style="    background: #646363;
                            border-color: #646363;margin-left:10px !important;border-radius:3px !important;
                               border-radius: 0px;padding:7px;
                                ">account_default_sub_category</button><br>
        
        <i class="fa fa-refresh" aria-hidden="true" style="
        color: #42c9eb !important;
        "></i> <text style="color: black;padding-left:6px;">Default Value<text>
        <button type="submit" class="btn" style="    background: #54a6dd;
            border-color: #54a6dd;margin-left:28px !important;border-radius:3px !important;margin-top:5px;
               border-radius: 0px;padding:7px;
                ">Select top category first</button>
                            </text></text></text></text></div> 
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
                    ">User Full Name - Profile Page</h3>
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
                            <textarea style="
                            color: gray;
                            background: #faf9f7;
                            width: 100%;
                            padding: 5px;
                        ">user_full_name</textarea>
                        {{-- "><?php echo user[full_name]; ?></textarea> --}}
                        <i class="fa fa-file-text-o" aria-hidden="true" style="
                        color: #42c9eb !important;
                    "></i> <text style="color: black;padding-left:6px;"> System Variable<text>
                        <button type="submit" class="btn" style="    background: #646363;
                            border-color: #646363;margin-left:10px !important;border-radius:3px !important;
                               border-radius: 0px;padding:7px;
                                ">about_me_user_full_name</button><br>
        
        <i class="fa fa-refresh" aria-hidden="true" style="
        color: #42c9eb !important;
        "></i> <text style="color: black;padding-left:6px;">Default Value<text>
        <button type="submit" class="btn" style="    background: #54a6dd;
            border-color: #54a6dd;margin-left:28px !important;border-radius:3px !important;margin-top:5px;
               border-radius: 0px;padding:7px;
                ">user_full_name</button>
                {{-- "><?php echo user[full_name]; ?></button> --}}
                            </text></text></text></text></div> 
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
                    ">Terms Page URL</h3>
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
                            <textarea style="
                            color: gray;
                            background: #faf9f7;
                            width: 100%;
                            padding: 5px;
                        ">/about/terms</textarea>
                        <i class="fa fa-file-text-o" aria-hidden="true" style="
                        color: #42c9eb !important;
                    "></i> <text style="color: black;padding-left:6px;"> System Variable<text>
                        <button type="submit" class="btn" style="    background: #646363;
                            border-color: #646363;margin-left:10px !important;border-radius:3px !important;
                               border-radius: 0px;padding:7px;
                                ">about_terms_url</button><br>
        
        <i class="fa fa-refresh" aria-hidden="true" style="
        color: #42c9eb !important;
        "></i> <text style="color: black;padding-left:6px;">Default Value<text>
        <button type="submit" class="btn" style="    background: #54a6dd;
            border-color: #54a6dd;margin-left:28px !important;border-radius:3px !important;margin-top:5px;
               border-radius: 0px;padding:7px;
                ">/about/terms</button>
                            </text></text></text></text></div> 
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
                    ">Accept Label</h3>
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
                            <textarea style="
                            color: gray;
                            background: #faf9f7;
                            width: 100%;
                            padding: 5px;
                        ">Accept</textarea>
                        <i class="fa fa-file-text-o" aria-hidden="true" style="
                        color: #42c9eb !important;
                    "></i> <text style="color: black;padding-left:6px;"> System Variable<text>
                        <button type="submit" class="btn" style="    background: #646363;
                            border-color: #646363;margin-left:10px !important;border-radius:3px !important;
                               border-radius: 0px;padding:7px;
                                ">accept_button_new_leads_module</button><br>
        
        <i class="fa fa-refresh" aria-hidden="true" style="
        color: #42c9eb !important;
        "></i> <text style="color: black;padding-left:6px;">Default Value<text>
        <button type="submit" class="btn" style="    background: #54a6dd;
            border-color: #54a6dd;margin-left:28px !important;border-radius:3px !important;margin-top:5px;
               border-radius: 0px;padding:7px;
                ">Accept</button>
                            </text></text></text></text></div> 
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
                    ">Accept Delete Review Main Title - Review Module</h3>
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
                            <textarea style="
                            color: gray;
                            background: #faf9f7;
                            width: 100%;
                            padding: 5px;
                        ">"Accept" or "Delete" %%recommendation%% visitors write about you. Accepted 
                        %%recommendation%% are displayed on your lisiting. Deleted %%recommendation%% are erased.</textarea>
                        <i class="fa fa-file-text-o" aria-hidden="true" style="
                        color: #42c9eb !important;
                    "></i> <text style="color: black;padding-left:6px;"> System Variable<text>
                        <button type="submit" class="btn" style="    background: #646363;
                            border-color: #646363;margin-left:10px !important;border-radius:3px !important;
                               border-radius: 0px;padding:7px;
                                ">accept_delete_review_main_title</button><br>
        
        <i class="fa fa-refresh" aria-hidden="true" style="
        color: #42c9eb !important;
        "></i> <text style="color: black;padding-left:6px;">Default Value<text>
        <button type="submit" class="btn" style="    background: #54a6dd;
            border-color: #54a6dd;margin-left:28px !important;border-radius:3px !important;margin-top:5px;
               border-radius: 0px;padding:7px;    width: 64%;
    text-align: left;
                ">"Accept" or "Delete" %%recommendation%% visitors write about you. Accept %%recommendation%% 
                are displayed on your lisiting. Deleted %%recommendation%% are erased.</button>
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
