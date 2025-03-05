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

        .form-group .form-control,
        .input-group .form-control {
            font-size: 15px;
            padding: 0.5rem 1.06rem;
            border-color: gray;
            border-radius: 3px;
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
            <div class="row" style="
            margin-bottom: 20px;
        ">
                {{-- <div> --}}
                {{-- <h1> Change Password</h1> --}}
                {{-- <p class="breadcrumb-item mt-3"><span><a
                            href="{{ route('admin.dashboard') }}">Dashboard</a></span><span><a
                            href="{{ route('admin.categoriesPage') }}"><i class="mdi mdi-chevron-right"> Items

                            </i>
                        </a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span> Add Item

                </p> --}}
                {{-- </div> --}}
                {{-- <div class="row"> --}}
                <div class="col-auto mr-auto">
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
                        <b>Design Settings</b> - Update settings related to the design elements of the website                     </div>
                </div>
                <div class="col-auto"
                    style="margin-right:-20px !important;
                "> 
                <div class="dropdown user-menu">
                   
                    <button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown" aria-expanded="false" style="
                    border: 1px solid black;
                    color: black;
                    padding: 6px;
                "> 
                       
                                <div class="d-inline-block" style="color: black">
                     Design Settings backups (10)
                                    
                                </div>
                        
                    </button>
                   
                    <ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu">
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
                {{-- <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" 
                    style="margin-top:0px !important;background:white !important;color:black !important;border-radius:0px;">
                     Design Settings backups (10)
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                      <button class="dropdown-item" type="button">Action</button>
                      <button class="dropdown-item" type="button">Another action</button>
                      <button class="dropdown-item" type="button">Something else here</button>
                    </div>
                  </div>
                </div> --}}
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary"
                        style="background: teal !important;margin-top:0px !important;
                        border: teal !important;border-radius: 0px;padding:7px;
                        "><i class="mdi mdi-backup-restore" style="color: white !important;padding-left:3px !important;"></i> Restore Backup</button>
                </div>

            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="border-bottom: 0px;">
                <li class="nav-item" role="presentation" style="">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                        role="tab" aria-controls="home" aria-selected="true"
                        style="border-radius: 0px;margin-left: 0px;">General</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false" style="border-radius: 0px;">Homepage</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="social-tab" data-bs-toggle="tab" data-bs-target="#social" type="button"
                        role="tab" aria-controls="social" aria-selected="false" style="border-radius: 0px;">Color Sets</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="local-tab" data-bs-toggle="tab" data-bs-target="#local" type="button"
                        role="tab" aria-controls="local" aria-selected="false"
                        style="border-radius: 0px;">Banner Ads</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="search-tab" data-bs-toggle="tab" data-bs-target="#search" type="button"
                        role="tab" aria-controls="search" aria-selected="false" style="border-radius: 0px;">Custom CSS / HEAD</button>
                </li>
                {{-- <ul class="navbar-right nav "> --}}
                <li class="nav-item"
                    style="
                  margin-left: 15.5rem;
                  border: 7px solid lightgray;
                  padding: 7px;
                  margin-top: -10px;border-radius:6px;
              ">
                    <i class="mdi mdi-magnify"
                        style="
                border-right: 1px solid;
                padding-right: 4px;
                margin-right: 6px;
    color: black !important;
    padding-left: 0px !important;
            "></i><span
                        style="
    padding-left: 0px !important;
">Search by keyword</span>
                </li>
            </ul>
            </ul>

            <div class="tab-content" id="myTabContent" style="
            background: white;
        ">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"
                    style="border: 1px solid lightgray;">
                    {{-- <div class="row">
                        <div class="col-12">
                            <div class="ec-vendor-list card card-default">
                                <div class="card-header">
                                    <h1 style="font-size: 20px;">Change Profile </h1>
                                </div> --}}
                    <div class="card-header text-white"
                        style="border-radius: 0px;background-color:white !important;border-color:white;padding: 5px !important;margin: 15px 15px 0px 15px;">
                        <h2><span
                                style="color: black !important;
                                    font-size: 23px;padding-left:5px;"><i
                                    style="color: black !important;padding-right: 5px;" class="fa fa-paint-brush"
                                    aria-hidden="true"></i></span><span
                                style="color: black !important;
                                    font-weight: 200;
                                    vertical-align:middle;
                                    font-size: 17px;padding-left: 0px !important;"><text>Website Design</text></span></h2>
                                    <hr />
                    </div>
                    <div class="card-body">
                        <form id="updateprofile">
                            <div class="row">
                                <div class="col-6">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item" style="
                                    border-radius: 0px;
                                ">
                                      <h2 class="accordion-header" id="headingMain">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMain" aria-expanded="false" aria-controls="collapseMain" style="
                                        padding: 10px;
                                        font-weight: 500;
                                        color: black;
                                     border-radius: 0px !important;
                                    ">
                                          Main Design
                                        </button>
                                      </h2>
                                      <div id="collapseMain" class="accordion-collapse collapse" aria-labelledby="headingMain" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                          <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item" style="
                                    border-radius: 0px;
                                ">
                                {{-- <div class="dropdown dropdown-mega d-none d-lg-block ms-2">
                                    <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                                        <span key="t-megamenu">Mega Menu</span>
                                        <i class="mdi mdi-chevron-down"></i> 
                                    </button>
                                    <div class="dropdown-menu dropdown-megamenu" style="">
                                        <div class="row">
                                            <div class="col-sm-8">
            
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h5 class="font-size-14" key="t-ui-components">UI Components</h5>
                                                        <ul class="list-unstyled megamenu-list">
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-lightbox">Lightbox</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-range-slider">Range Slider</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-sweet-alert">Sweet Alert</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-rating">Rating</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-forms">Forms</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-tables">Tables</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-charts">Charts</a>
                                                            </li>
                                                        </ul>
                                                    </div>
        
                                                    <div class="col-md-4">
                                                        <h5 class="font-size-14" key="t-applications">Applications</h5>
                                                        <ul class="list-unstyled megamenu-list">
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-ecommerce">Ecommerce</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-calendar">Calendar</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-email">Email</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-projects">Projects</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-tasks">Tasks</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-contacts">Contacts</a>
                                                            </li>
                                                        </ul>
                                                    </div>
        
                                                    <div class="col-md-4">
                                                        <h5 class="font-size-14" key="t-extra-pages">Extra Pages</h5>
                                                        <ul class="list-unstyled megamenu-list">
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-light-sidebar">Light Sidebar</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-compact-sidebar">Compact Sidebar</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-horizontal">Horizontal layout</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-maintenance">Maintenance</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-coming-soon">Coming Soon</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-timeline">Timeline</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-faqs">FAQs</a>
                                                            </li>
                                    
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h5 class="font-size-14" key="t-ui-components">UI Components</h5>
                                                        <ul class="list-unstyled megamenu-list">
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-lightbox">Lightbox</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-range-slider">Range Slider</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-sweet-alert">Sweet Alert</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-rating">Rating</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-forms">Forms</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-tables">Tables</a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0);" key="t-charts">Charts</a>
                                                            </li>
                                                        </ul>
                                                    </div>
        
                                                    <div class="col-sm-5">
                                                        <div>
                                                            <img src="assets/images/megamenu-img.png" alt="" class="img-fluid mx-auto d-block">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        
                                    </div>
                                </div> --}}
                                      <h2 class="accordion-header" id="headingLogo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLogo" aria-expanded="false" aria-controls="collapseLogo"
                                        style="
                                    padding: 10px;
                                            margin-top: 25px;
                                            border-top: 1px solid lightgray;
                                            border-radius: 0px !important;
                                        font-weight: 500;
                                        color: black;
                                                                        ">
                                          Logo Designer
                                        </button>
                                      </h2>
                                      <div id="collapseLogo" class="accordion-collapse collapse" aria-labelledby="headingLogo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                          <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item" style="
                                    border-radius: 0px;
                                ">
                                      <h2 class="accordion-header" id="headingMainMenu">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMainMenu" aria-expanded="false" aria-controls="collapseMainMenu"
                                        style="
                                padding: 10px;
                                 margin-top: 25px;
                                   border-top: 1px solid lightgray;
                                   border-radius: 0px !important;
                                        font-weight: 500;
                                        color: black;
                                        ">
                                         Main Menu Design
                                        </button>
                                      </h2>
                                      <div id="collapseMainMenu" class="accordion-collapse collapse" aria-labelledby="headingMainMenu" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                          <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
<div class="col-6">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item" style="
        border-radius: 0px;
    ">
          <h2 class="accordion-header" id="headingHeader">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHeader" aria-expanded="false" aria-controls="collapseHeader" style="
            padding: 10px;
            font-weight: 500;
            color: black;
border-radius: 0px !important;
        ">
              Header Design
            </button>
          </h2>
          <div id="collapseHeader" class="accordion-collapse collapse" aria-labelledby="headingHeader" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item" style="
        border-radius: 0px;
    ">
          <h2 class="accordion-header" id="headingFooter">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFooter" aria-expanded="false" aria-controls="collapseFooter"
            style="
padding: 10px;
margin-top: 25px;
border-top: 1px solid lightgray;
border-radius: 0px !important;
            font-weight: 500;
            color: black;
">
 Footer Design
            </button>
          </h2>
          <div id="collapseFooter" class="accordion-collapse collapse" aria-labelledby="headingFooter" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item" style="
        border-radius: 0px;
    ">
          <h2 class="accordion-header" id="headingButton">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseButton" aria-expanded="false" aria-controls="collapseButton"
            style="
padding: 10px;
margin-top: 25px;
border-top: 1px solid lightgray;
border-radius: 0px !important;
            font-weight: 500;
            color: black;
">
             Button Colors
            </button>
          </h2>
          <div id="collapseButton" class="accordion-collapse collapse" aria-labelledby="headingButton" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
    </div>
</div>
</div>
</div></form>

              <div class="card-header text-white"
                        style="border-radius: 0px;background-color:white !important;border-color:white;padding: 5px !important;margin: 15px 15px 0px 15px;">
                        <h2><span
                                style="color: black !important;
                                    font-size: 23px;padding-left:5px;"><i
                                    style="color: black !important;padding-right: 5px;" class="fa fa-tasks"
                                    aria-hidden="true"></i></span><span
                                style="color: black !important;
                                    font-weight: 200;
                                    vertical-align:middle;
                                    font-size: 17px;padding-left: 0px !important;"><text>Additional Settings</text></span></h2>
                                    <hr />
                    </div>
                    <div class="card-body">
                        <form id="updateprofile">
                            <div class="row">
<div class="col-6">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item" style="
                                    border-radius: 0px;
                                ">
                                      <h2 class="accordion-header" id="headingMember">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMember" aria-expanded="false" aria-controls="collapseMember" style="
                                        padding: 10px;
                                        font-weight: 500;
                                        color: black;
    border-radius: 0px !important;
                                    ">
                                          Member Profile Pages
                                        </button>
                                      </h2>
                                      <div id="collapseMember" class="accordion-collapse collapse" aria-labelledby="headingMember" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                          <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item" style="
                                    border-radius: 0px;
                                ">
                                      <h2 class="accordion-header" id="headingContent">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseContent" aria-expanded="false" aria-controls="collapseContent"
                                        style="
    padding: 10px;
    margin-top: 25px;
    border-top: 1px solid lightgray;
    border-radius: 0px !important;
                                        font-weight: 500;
                                        color: black;
">
                                          Content Boxes & Backgrounds
                                        </button>
                                      </h2>
                                      <div id="collapseContent" class="accordion-collapse collapse" aria-labelledby="headingContent" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                          <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                      </div>
                                    </div>
                                    
                                </div>
</div>
<div class="col-6">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item" style="
        border-radius: 0px;
    ">
          <h2 class="accordion-header" id="headingSearch">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch" style="
            padding: 10px;
            font-weight: 500;
            color: black;
border-radius: 0px !important;
        ">
              Search Result Pages
            </button>
          </h2>
          <div id="collapseSearch" class="accordion-collapse collapse" aria-labelledby="headingSearch" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item" style="
        border-radius: 0px;
    ">
          <h2 class="accordion-header" id="headingSidebar">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSidebar" aria-expanded="false" aria-controls="collapseSidebar"
            style="
padding: 10px;
margin-top: 25px;
border-top: 1px solid lightgray;
border-radius: 0px !important;
            font-weight: 500;
            color: black;
">
 Sidebar Alignment
            </button>
          </h2>
          <div id="collapseSidebar" class="accordion-collapse collapse" aria-labelledby="headingSidebar" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
        </div>
      </div>
  </div>
</div>
</div>

                                
                            <div
                                style="
                                        background: lightgray;
                                        padding: 9px;
                                        border-radius: 5px;margin-top:20px;
                                    ">
                                <button type="submit" class="btn btn-primary"
                                    style="background: teal !important;
                                            border: teal !important;
                                            width: 100%;">Save
                                    Changes</button>

                                </div></form> 
                    </div>
                    </div>
                
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"
                    style="border: 1px solid lightgray;">

                    {{-- <div class="row">
                        <div class="col-12">
                            <div class="ec-vendor-list card card-default">
                                <div class="card-header">
                                    <h1 style="font-size: 20px;">Change Profile </h1>
                                </div> --}}
                    <div class="card-header text-white"
                        style="border-radius: 0px;background:#37393d;padding: 5px !important;margin: 15px;">
                        <h2><span
                                style="color: #fff !important;
                                    font-size: 23px;padding-left:5px;"><i
                                    style="color: #fff !important;padding-right: 5px;" class="mdi mdi-cloud-upload"
                                    aria-hidden="true"></i></span><span
                                style="color: #fff !important;
        font-weight: 200;
        vertical-align:middle;
        font-size: 17px;padding-left: 0px !important;"><text>Upload
                                    Website Logo, Favicon & More</text></span></h2>
                    </div>
                    <div class="card-body">
                        <form id="updateprofile">
                            <div class="row">

                                {{-- <div class=" col-6 form-group">
                                                <label for=" Location Name">Profile Image</label>{{ Auth::guard('admin')->user()->name }}
                                                <input type="file" class="form-control" name="image">
        
                                            </div> --}}

                                <div class="col-12 form-group">
                                    <div class="col-md-8">
                                        <div class="alert alert-light" role="alert"
                                            style="
                                                    padding: 5px;
                                                    border-left: 5px solid teal;
                                                    border-radius: 0px;
                                                    font-size:small;margin-right: 37px !important;
                                                    color: black;background: lightgray;
                                font-weight: unset;
                                                ">
                                            <i class="mdi mdi-information"
                                                style="
                                                      color: cornflowerblue !important;padding-right:6px;padding-left:6px;
                                                  "></i>NEED
                                            TO CROP OR RESIZE YOUR IMAGES? PLEASE CONSIDER USING THIS <b>FREE ONLINE TOOL<i
                                                    class="mdi mdi-launch"></i></b>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-3 form-group">
                                    <div class="card border-success mb-3"
                                        style="text-align: center;background: #f2f2f0;max-width: 18rem;border-radius:5px !important;">
                                        <div class="card-header bg-transparent border-success"
                                            style="
                                                    color: black;
                                                ">
                                            <b>Website Logo</b>
                                        </div>
                                        <div style="">
                                            {{-- <img src="{{ asset(Auth::guard('admin')->user()->image) }}" alt="error" width="150px" height="150px" class="mt-4"> --}}
                                            {{-- <img src="{{ file_exists(Auth::guard('admin')->user()->image) ? asset(Auth::guard('admin')->user()->image) : asset('assets/img/dashboard/de.PNG') }}" alt="Image" style="display: block;
                                            margin-left: auto;
                                            margin-right: auto;
                                            width: 50%;"></div> --}}
                                            @php
                                                $userImage = Auth::guard('admin')->user()->image;
                                                $imagePath = public_path($userImage);
                                            @endphp

                                            @if (!empty($userImage) && file_exists($imagePath))
                                                <img src="{{ asset($userImage) }}" alt="User Logo"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 50%;">
                                            @else
                                                <img src="{{ asset('assets/img/dashboard/de1.PNG') }}" alt="Default Image"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 65%;">
                                            @endif
                                            <img id="selectedImage"
                                                style="display: none; max-width: 300px; margin-top: 10px;"
                                                alt="Selected Image">

                                            <div class="card-body text-success">
                                                {{-- <h5 class="card-title">Success card title</h5> --}}
                                                <p class="card-text mb-3">450X70px recommended</p>
                                                @if (!empty($userImage) && file_exists($imagePath))
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Replace Image</button>
                                                    <button type="button" id="remove-button" onclick="removeImage()"
                                                        class="btn btn-sm"
                                                        style="
        background: red;
        border: red;
        "><i
                                                            class="mdi mdi-close"
                                                            style="padding-left: 0px;color: white !important;"></i></button>
                                                @else
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Upload Image</button>
                                                @endif
                                            </div>
                                            <input type="file" id="fileInput" style="display: none;">
                                            {{-- <button >Choose File</button> --}}


                                            <div class="input-group"
                                                style="
margin-bottom: 0px;
margin-right: 6px;
margin-left: 6px;
width: 94%;
">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        style="
      padding: 5px;
      font-size: small;background:lightgray;
  ">Display
                                                        Width</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label=""
                                                    style="
    padding: 1px;
">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"
                                                        style="
      padding: 5px;
      font-size: small;
      background:lightgray;
  ">Pixels</span>
                                                </div>
                                            </div>


                                            <div class="card-footer bg-transparent border-success"
                                                style="
                                                    font-size: small;
                                                ">
                                                Leave empty to use inherent width</div>
                                        </div>

                                        {{-- <input type="password" class="form-control" name="Current_Password" placeholder="Enter Current Password"> --}}

                                    </div>
                                </div>




                                <div class="col-3 form-group">
                                    <div class="card border-success mb-3"
                                        style="text-align: center;background: #f2f2f0;max-width: 18rem;border-radius:5px !important;">
                                        <div class="card-header bg-transparent border-success"
                                            style="
                                                        color: black;
                                                    ">
                                            <b>Email Template Logo</b>
                                        </div>
                                        <div style="">
                                            {{-- <img src="{{ asset(Auth::guard('admin')->user()->image) }}" alt="error" width="150px" height="150px" class="mt-4"> --}}
                                            {{-- <img src="{{ file_exists(Auth::guard('admin')->user()->image) ? asset(Auth::guard('admin')->user()->image) : asset('assets/img/dashboard/de.PNG') }}" alt="Image" style="display: block;
                                                margin-left: auto;
                                                margin-right: auto;
                                                width: 50%;"></div> --}}
                                            @php
                                                $userImage = Auth::guard('admin')->user()->image;
                                                $imagePath = public_path($userImage);
                                            @endphp

                                            @if (!empty($userImage) && file_exists($imagePath))
                                                <img src="{{ asset($userImage) }}" alt="User Logo"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 50%;">
                                            @else
                                                <img src="{{ asset('assets/img/dashboard/de1.PNG') }}" alt="Default Image"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 65%;">
                                            @endif
                                            <img id="selectedImage"
                                                style="display: none; max-width: 300px; margin-top: 10px;"
                                                alt="Selected Image">

                                            <div class="card-body text-success">
                                                {{-- <h5 class="card-title">Success card title</h5> --}}
                                                <p class="card-text mb-3">450X70px recommended</p>
                                                @if (!empty($userImage) && file_exists($imagePath))
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Replace Image</button>
                                                    <button type="button" id="remove-button" onclick="removeImage()"
                                                        class="btn btn-sm" style="
background: red;
border: red;
"><i
                                                            class="mdi mdi-close"
                                                            style="padding-left: 0px;color: white !important;"></i></button>
                                                @else
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Upload Image</button>
                                                @endif
                                            </div>
                                            <input type="file" id="fileInput" style="display: none;">
                                            {{-- <button >Choose File</button> --}}


                                            <div class="input-group"
                                                style="
    margin-bottom: 0px;
    margin-right: 6px;
    margin-left: 6px;
    width: 94%;
    ">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        style="
          padding: 5px;
          font-size: small;background:lightgray;
      ">Display
                                                        Width</span>
                                                </div>
                                                <input type="text" class="form-control" aria-label=""
                                                    style="
        padding: 1px;
    ">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"
                                                        style="
          padding: 5px;
          font-size: small;
          background:lightgray;
      ">Pixels</span>
                                                </div>
                                            </div>


                                            <div class="card-footer bg-transparent border-success"
                                                style="
                                                        font-size: small;
                                                    ">
                                                Leave empty to use inherent width</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 form-group">
                                    <div class="card border-success mb-3"
                                        style="height: 298px;text-align: center;background: #f2f2f0;max-width: 18rem;border-radius:5px !important;">
                                        <div class="card-header bg-transparent border-success"
                                            style="
                                                                color: black;
                                                            ">
                                            <b>Favicon </b>
                                        </div>
                                        <div style="">

                                            @php
                                                $userImage = Auth::guard('admin')->user()->image1;
                                                $imagePath = public_path($userImage);
                                            @endphp

                                            @if (!empty($userImage) && file_exists($imagePath))
                                                <img src="{{ asset($userImage) }}" alt="User Logo"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 50%;">
                                            @else
                                                <img src="{{ asset('assets/img/dashboard/de1.PNG') }}" alt="Default Image"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 65%;">
                                            @endif
                                            <img id="selectedImage"
                                                style="display: none; max-width: 300px; margin-top: 10px;"
                                                alt="Selected Image">

                                            <div class="card-body text-success">
                                                {{-- <h5 class="card-title">Success card title</h5> --}}
                                                <p class="card-text mb-3">56X56px recommended</p>
                                                @if (!empty($userImage) && file_exists($imagePath))
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Replace Image</button>
                                                    <button type="button" id="remove-button" onclick="removeImage()"
                                                        class="btn btn-sm"
                                                        style="
        background: red;
        border: red;
        "><i
                                                            class="mdi mdi-close"
                                                            style="padding-left: 0px;color: white !important;"></i></button>
                                                @else
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Upload Image</button>
                                                @endif

                                            </div>
                                            <input type="file" id="fileInput" style="display: none;">
                                            {{-- <button >Choose File</button> --}}



                                        </div>

                                        {{-- <input type="password" class="form-control" name="Current_Password" placeholder="Enter Current Password"> --}}

                                    </div>
                                </div>




                                <div class="col-3 form-group">
                                    <div class="card border-success mb-3"
                                        style="height: 298px;text-align: center;background: #f2f2f0;max-width: 18rem;border-radius:5px !important;">
                                        <div class="card-header bg-transparent border-success"
                                            style="
                                                                    color: black;
                                                                ">
                                            <b>Default Member Photo</b>
                                        </div>
                                        <div style="">
                                            {{-- <img src="{{ asset(Auth::guard('admin')->user()->image) }}" alt="error" width="150px" height="150px" class="mt-4"> --}}
                                            {{-- <img src="{{ file_exists(Auth::guard('admin')->user()->image) ? asset(Auth::guard('admin')->user()->image) : asset('assets/img/dashboard/de.PNG') }}" alt="Image" style="display: block;
                                                            margin-left: auto;
                                                            margin-right: auto;
                                                            width: 50%;"></div> --}}
                                            @php
                                                $userImage = Auth::guard('admin')->user()->image2;
                                                $imagePath = public_path($userImage);
                                            @endphp

                                            @if (!empty($userImage) && file_exists($imagePath))
                                                <img src="{{ asset($userImage) }}" alt="User Logo"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 50%;">
                                            @else
                                                <img src="{{ asset('assets/img/dashboard/de1.PNG') }}" alt="Default Image"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 65%;">
                                            @endif
                                            <img id="selectedImage"
                                                style="display: none; max-width: 300px; margin-top: 10px;"
                                                alt="Selected Image">

                                            <div class="card-body text-success">
                                                {{-- <h5 class="card-title">Success card title</h5> --}}
                                                <p class="card-text mb-3">250X250px recommended</p>
                                                @if (!empty($userImage) && file_exists($imagePath))
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Replace Image</button>
                                                    <button type="button" id="remove-button" onclick="removeImage()"
                                                        class="btn btn-sm"
                                                        style="
            background: red;
            border: red;
            "><i
                                                            class="mdi mdi-close"
                                                            style="padding-left: 0px;color: white !important;"></i></button>
                                                @else
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Upload Image</button>
                                                @endif
                                            </div>
                                            <input type="file" id="fileInput" style="display: none;">
                                            {{-- <button >Choose File</button> --}}





                                        </div>

                                        {{-- <input type="password" class="form-control" name="Current_Password" placeholder="Enter Current Password"> --}}

                                    </div>





                                </div>

                                <div class="col-3 form-group">
                                    <div class="card border-success mb-3"
                                        style="height: 298px;text-align: center;background: #f2f2f0;max-width: 18rem;border-radius:5px !important;">
                                        <div class="card-header bg-transparent border-success"
                                            style="
                                                                    color: black;
                                                                ">
                                            <b>Default Member Logo</b>
                                        </div>
                                        <div style="">
                                            {{-- <img src="{{ asset(Auth::guard('admin')->user()->image) }}" alt="error" width="150px" height="150px" class="mt-4"> --}}
                                            {{-- <img src="{{ file_exists(Auth::guard('admin')->user()->image) ? asset(Auth::guard('admin')->user()->image) : asset('assets/img/dashboard/de.PNG') }}" alt="Image" style="display: block;
                                                            margin-left: auto;
                                                            margin-right: auto;
                                                            width: 50%;"></div> --}}
                                            @php
                                                $userImage = Auth::guard('admin')->user()->image2;
                                                $imagePath = public_path($userImage);
                                            @endphp

                                            @if (!empty($userImage) && file_exists($imagePath))
                                                <img src="{{ asset($userImage) }}" alt="User Logo"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 50%;">
                                            @else
                                                <img src="{{ asset('assets/img/dashboard/de1.PNG') }}"
                                                    alt="Default Image"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 65%;">
                                            @endif
                                            <img id="selectedImage"
                                                style="display: none; max-width: 300px; margin-top: 10px;"
                                                alt="Selected Image">

                                            <div class="card-body text-success">
                                                {{-- <h5 class="card-title">Success card title</h5> --}}
                                                <p class="card-text mb-3">250X250px recommended</p>
                                                @if (!empty($userImage) && file_exists($imagePath))
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Replace Image</button>
                                                    <button type="button" id="remove-button" onclick="removeImage()"
                                                        class="btn btn-sm"
                                                        style="
            background: red;
            border: red;
            "><i
                                                            class="mdi mdi-close"
                                                            style="padding-left: 0px;color: white !important;"></i></button>
                                                @else
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Upload Image</button>
                                                @endif
                                            </div>
                                            <input type="file" id="fileInput" style="display: none;">
                                            {{-- <button >Choose File</button> --}}





                                        </div>

                                        {{-- <input type="password" class="form-control" name="Current_Password" placeholder="Enter Current Password"> --}}

                                    </div>





                                </div>
                                <div class="col-3 form-group">
                                    <div class="card border-success mb-3"
                                        style="height: 298px;text-align: center;background: #f2f2f0;max-width: 18rem;border-radius:5px !important;">
                                        <div class="card-header bg-transparent border-success"
                                            style="
                                                                    color: black;
                                                                ">
                                            <b>Default Social Media Image</b>
                                        </div>
                                        <div style="">
                                            {{-- <img src="{{ asset(Auth::guard('admin')->user()->image) }}" alt="error" width="150px" height="150px" class="mt-4"> --}}
                                            {{-- <img src="{{ file_exists(Auth::guard('admin')->user()->image) ? asset(Auth::guard('admin')->user()->image) : asset('assets/img/dashboard/de.PNG') }}" alt="Image" style="display: block;
                                                            margin-left: auto;
                                                            margin-right: auto;
                                                            width: 50%;"></div> --}}
                                            @php
                                                $userImage = Auth::guard('admin')->user()->image2;
                                                $imagePath = public_path($userImage);
                                            @endphp

                                            @if (!empty($userImage) && file_exists($imagePath))
                                                <img src="{{ asset($userImage) }}" alt="User Logo"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 50%;">
                                            @else
                                                <img src="{{ asset('assets/img/dashboard/de1.PNG') }}"
                                                    alt="Default Image"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 65%;">
                                            @endif
                                            <img id="selectedImage"
                                                style="display: none; max-width: 300px; margin-top: 10px;"
                                                alt="Selected Image">

                                            <div class="card-body text-success">
                                                {{-- <h5 class="card-title">Success card title</h5> --}}
                                                <p class="card-text mb-3">1200X1200px recommended</p>
                                                @if (!empty($userImage) && file_exists($imagePath))
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Replace Image</button>
                                                    <button type="button" id="remove-button" onclick="removeImage()"
                                                        class="btn btn-sm"
                                                        style="
            background: red;
            border: red;
            "><i
                                                            class="mdi mdi-close"
                                                            style="padding-left: 0px;color: white !important;"></i></button>
                                                @else
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Upload Image</button>
                                                @endif
                                            </div>
                                            <input type="file" id="fileInput" style="display: none;">
                                            {{-- <button >Choose File</button> --}}





                                        </div>

                                        {{-- <input type="password" class="form-control" name="Current_Password" placeholder="Enter Current Password"> --}}

                                    </div>





                                </div>
                                <div class="col-3 form-group">
                                    <div class="card border-success mb-3"
                                        style="height: 298px;text-align: center;background: #f2f2f0;max-width: 18rem;border-radius:5px !important;">
                                        <div class="card-header bg-transparent border-success"
                                            style="
                                                                    color: black;
                                                                ">
                                            <b>Member Badge Image</b>
                                        </div>
                                        <div style="">
                                            {{-- <img src="{{ asset(Auth::guard('admin')->user()->image) }}" alt="error" width="150px" height="150px" class="mt-4"> --}}
                                            {{-- <img src="{{ file_exists(Auth::guard('admin')->user()->image) ? asset(Auth::guard('admin')->user()->image) : asset('assets/img/dashboard/de.PNG') }}" alt="Image" style="display: block;
                                                            margin-left: auto;
                                                            margin-right: auto;
                                                            width: 50%;"></div> --}}
                                            @php
                                                $userImage = Auth::guard('admin')->user()->image2;
                                                $imagePath = public_path($userImage);
                                            @endphp

                                            @if (!empty($userImage) && file_exists($imagePath))
                                                <img src="{{ asset($userImage) }}" alt="User Logo"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 50%;">
                                            @else
                                                <img src="{{ asset('assets/img/dashboard/de1.PNG') }}"
                                                    alt="Default Image"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 65%;">
                                            @endif
                                            <img id="selectedImage"
                                                style="display: none; max-width: 300px; margin-top: 10px;"
                                                alt="Selected Image">

                                            <div class="card-body text-success">
                                                {{-- <h5 class="card-title">Success card title</h5> --}}
                                                <p class="card-text mb-3">250X250px recommended</p>
                                                @if (!empty($userImage) && file_exists($imagePath))
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Replace Image</button>
                                                    <button type="button" id="remove-button" onclick="removeImage()"
                                                        class="btn btn-sm"
                                                        style="
            background: red;
            border: red;
            "><i
                                                            class="mdi mdi-close"
                                                            style="padding-left: 0px;color: white !important;"></i></button>
                                                @else
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Upload Image</button>
                                                @endif
                                            </div>
                                            <input type="file" id="fileInput" style="display: none;">
                                            {{-- <button >Choose File</button> --}}





                                        </div>

                                        {{-- <input type="password" class="form-control" name="Current_Password" placeholder="Enter Current Password"> --}}

                                    </div>





                                </div>
                                <div class="col-3 form-group">
                                    <div class="card border-success mb-3"
                                        style="height: 298px;text-align: center;background: #f2f2f0;max-width: 18rem;border-radius:5px !important;">
                                        <div class="card-header bg-transparent border-success"
                                            style="
                                                                    color: black;
                                                                ">
                                            <b>Verified Member Icon</b>
                                        </div>
                                        <div style="">
                                            {{-- <img src="{{ asset(Auth::guard('admin')->user()->image) }}" alt="error" width="150px" height="150px" class="mt-4"> --}}
                                            {{-- <img src="{{ file_exists(Auth::guard('admin')->user()->image) ? asset(Auth::guard('admin')->user()->image) : asset('assets/img/dashboard/de.PNG') }}" alt="Image" style="display: block;
                                                            margin-left: auto;
                                                            margin-right: auto;
                                                            width: 50%;"></div> --}}
                                            @php
                                                $userImage = Auth::guard('admin')->user()->image2;
                                                $imagePath = public_path($userImage);
                                            @endphp

                                            @if (!empty($userImage) && file_exists($imagePath))
                                                <img src="{{ asset($userImage) }}" alt="User Logo"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 50%;">
                                            @else
                                                <img src="{{ asset('assets/img/dashboard/de1.PNG') }}"
                                                    alt="Default Image"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 65%;">
                                            @endif
                                            <img id="selectedImage"
                                                style="display: none; max-width: 300px; margin-top: 10px;"
                                                alt="Selected Image">

                                            <div class="card-body text-success">
                                                {{-- <h5 class="card-title">Success card title</h5> --}}
                                                <p class="card-text mb-3">100X100px recommended</p>
                                                @if (!empty($userImage) && file_exists($imagePath))
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Replace Image</button>
                                                    <button type="button" id="remove-button" onclick="removeImage()"
                                                        class="btn btn-sm"
                                                        style="
            background: red;
            border: red;
            "><i
                                                            class="mdi mdi-close"
                                                            style="padding-left: 0px;color: white !important;"></i></button>
                                                @else
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Upload Image</button>
                                                @endif
                                            </div>
                                            <input type="file" id="fileInput" style="display: none;">
                                            {{-- <button >Choose File</button> --}}





                                        </div>

                                        {{-- <input type="password" class="form-control" name="Current_Password" placeholder="Enter Current Password"> --}}

                                    </div>





                                </div>
                                <div class="col-9 form-group">
                                    <div class="card border-success mb-3"
                                        style="height: 298px;text-align: center;background: #f2f2f0;max-width: 18rem;border-radius:5px !important;">
                                        <div class="card-header bg-transparent border-success"
                                            style="
                                                                    color: black;
                                                                ">
                                            <b>Google Map Pin Drop</b>
                                        </div>
                                        <div style="">
                                            {{-- <img src="{{ asset(Auth::guard('admin')->user()->image) }}" alt="error" width="150px" height="150px" class="mt-4"> --}}
                                            {{-- <img src="{{ file_exists(Auth::guard('admin')->user()->image) ? asset(Auth::guard('admin')->user()->image) : asset('assets/img/dashboard/de.PNG') }}" alt="Image" style="display: block;
                                                            margin-left: auto;
                                                            margin-right: auto;
                                                            width: 50%;"></div> --}}
                                            @php
                                                $userImage = Auth::guard('admin')->user()->image2;
                                                $imagePath = public_path($userImage);
                                            @endphp

                                            @if (!empty($userImage) && file_exists($imagePath))
                                                <img src="{{ asset($userImage) }}" alt="User Logo"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 50%;">
                                            @else
                                                <img src="{{ asset('assets/img/dashboard/de1.PNG') }}"
                                                    alt="Default Image"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 65%;">
                                            @endif
                                            <img id="selectedImage"
                                                style="display: none; max-width: 300px; margin-top: 10px;"
                                                alt="Selected Image">

                                            <div class="card-body text-success">
                                                {{-- <h5 class="card-title">Success card title</h5> --}}
                                                <p class="card-text mb-3">25X42px recommended</p>
                                                @if (!empty($userImage) && file_exists($imagePath))
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Replace Image</button>
                                                    <button type="button" id="remove-button" onclick="removeImage()"
                                                        class="btn btn-sm"
                                                        style="
            background: red;
            border: red;
            "><i
                                                            class="mdi mdi-close"
                                                            style="padding-left: 0px;color: white !important;"></i></button>
                                                @else
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Upload Image</button>
                                                @endif
                                            </div>
                                            <input type="file" id="fileInput" style="display: none;">
                                            {{-- <button >Choose File</button> --}}





                                        </div>

                                        {{-- <input type="password" class="form-control" name="Current_Password" placeholder="Enter Current Password"> --}}

                                    </div>





                                </div>
                                <div class="col-3 form-group">
                                    <div class="card border-success mb-3"
                                        style="height: 298px;text-align: center;background: #f2f2f0;max-width: 18rem;border-radius:5px !important;">
                                        <div class="card-header bg-transparent border-success"
                                            style="
                                                                    color: black;
                                                                ">
                                            <b>Post Search Results Placeholder</b>
                                        </div>
                                        <div style="">
                                            {{-- <img src="{{ asset(Auth::guard('admin')->user()->image) }}" alt="error" width="150px" height="150px" class="mt-4"> --}}
                                            {{-- <img src="{{ file_exists(Auth::guard('admin')->user()->image) ? asset(Auth::guard('admin')->user()->image) : asset('assets/img/dashboard/de.PNG') }}" alt="Image" style="display: block;
                                                            margin-left: auto;
                                                            margin-right: auto;
                                                            width: 50%;"></div> --}}
                                            @php
                                                $userImage = Auth::guard('admin')->user()->image2;
                                                $imagePath = public_path($userImage);
                                            @endphp

                                            @if (!empty($userImage) && file_exists($imagePath))
                                                <img src="{{ asset($userImage) }}" alt="User Logo"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 50%;">
                                            @else
                                                <img src="{{ asset('assets/img/dashboard/de1.PNG') }}"
                                                    alt="Default Image"
                                                    style="display:block;margin-left: auto;margin-right: auto;width: 65%;">
                                            @endif
                                            <img id="selectedImage"
                                                style="display: none; max-width: 300px; margin-top: 10px;"
                                                alt="Selected Image">

                                            <div class="card-body text-success">
                                                {{-- <h5 class="card-title">Success card title</h5> --}}
                                                <p class="card-text mb-3">400X200px recommended</p>
                                                @if (!empty($userImage) && file_exists($imagePath))
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Replace Image</button>
                                                    <button type="button" id="remove-button" onclick="removeImage()"
                                                        class="btn btn-sm"
                                                        style="
            background: red;
            border: red;
            "><i
                                                            class="mdi mdi-close"
                                                            style="padding-left: 0px;color: white !important;"></i></button>
                                                @else
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="chooseFile()" style="font-size: smaller;"> <i
                                                            style="color: #fff !important;padding-left:0px;padding-right: 5px;"
                                                            class="mdi mdi-cloud-upload" aria-hidden="true"></i><input
                                                            type="file" style="display: none">Upload Image</button>
                                                @endif
                                            </div>
                                            <input type="file" id="fileInput" style="display: none;">
                                            {{-- <button >Choose File</button> --}}





                                        </div>

                                        {{-- <input type="password" class="form-control" name="Current_Password" placeholder="Enter Current Password"> --}}

                                    </div>





                                </div>

                                {{-- <input type="password" class="form-control" name="Current_Password" placeholder="Enter Current Password"> --}}

                                {{-- </div> --}}






                            </div>
                            {{-- <div class="row">
                                    <div class="form-group">
                                        <label for=" Location">New Password</span></label>
                                        <input type="password" class="form-control" name="n_password"
                                            placeholder="Enter New Password">
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <div id="subcategory">
                                            <label for="Subcategory Name">Confirm New Password Again</span></label>
                                            <input type="password" class="form-control" name="c_password"
                                                placeholder="Enter Confirm New Password Again">


                                        </div>

                                    </div>


                                </div> --}}






                            <div
                                style="
                                        background: lightgray;
                                        padding: 9px;
                                        border-radius: 5px;
                                    ">
                                <button type="submit" class="btn btn-primary"
                                    style="background: teal !important;
                                            border: teal !important;
                                            width: 100%;">Save
                                    Changes</button>

                            </div>
                        </form>

                    </div>

                </div>




                <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab"
                    style="border: 1px solid lightgray;">

                    <div class="card-header text-white"
                        style="border-radius: 0px;background:#37393d;padding: 5px !important;margin: 15px;">
                        <h2><span
                                style="color: #fff !important;
                                    font-size: 23px;padding-left:5px;"><i
                                    style="color: #fff !important;padding-right: 5px;vertical-align: text-top;"
                                    class="fa fa-comments" aria-hidden="true"></i></span><span
                                style="color: #fff !important;
                                    font-weight: 200;
                                    vertical-align:middle;
                                    font-size: 17px;padding-left: 0px !important;"><text>Social
                                    Media Links</text></span></h2>
                    </div>
                    <div class="card-body">
                        <form id="updateprofile">
                            <div class="row">

                                {{-- <div class=" col-6 form-group">
                                                <label for=" Location Name">Profile Image</label>
                                                <input type="file" class="form-control" name="image">
        
                                            </div> --}}

                                <div class="col-6 form-group">
                                    <label for="Name"><i class="mdi mdi-facebook-box"
                                            style="color: #3b5998 !important;padding-right: 3px;"></i>Facebook</label>
                                    <input type="hidden" name="id" value="{{ Auth::guard('admin')->user()->id }}">
                                    <div
                                        style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                        <input type="text" class="form-control" name="name" placeholder=""
                                            {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                        <span
                                            style="font-size: smaller;">(e.g.https://www.facebook.com/CompanyFacebook)</span>
                                    </div>
                                </div>

                                <div class="col-6 form-group">
                                    <label for="Name"><i class="mdi mdi-twitter-box"
                                            style="color: #00aced !important;padding-right: 3px;"></i>Twitter</label>
                                    <div
                                        style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                        <input type="text" class="form-control" name="name" placeholder=""
                                            {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                        <span
                                            style="font-size: smaller;">(e.g.https://www.twitter.com/CompanyTwitter)</span>
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="Name"><i class="mdi mdi-linkedin-box"
                                            style="color: #007bb6 !important;padding-right: 3px;"></i>Linkedin</label>
                                    <div
                                        style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                        <input type="text" class="form-control" name="name" placeholder=""
                                            {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                        <span
                                            style="font-size: smaller;">(e.g.https://www.linkedin.com/CompanyLinkedin)</span>
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="Name"><i class="mdi mdi-pinterest-box"
                                            style="color: #cb2027 !important;padding-right: 3px;"></i>Pinterest</label>
                                    <div
                                        style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                        <input type="text" class="form-control" name="name" placeholder=""
                                            {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                        <span
                                            style="font-size: smaller;">(e.g.https://www.pinterest.com/CompanyPinterest)</span>
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="Name"><i class="fa fa-instagram"
                                            style="color: #bc2a8d !important;padding-right: 3px;"></i>Instagram</label>
                                    <div
                                        style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                        <input type="text" class="form-control" name="name" placeholder=""
                                            {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                        <span
                                            style="font-size: smaller;">(e.g.https://www.instagram.com/CompanyInstagram)</span>
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="Name"><i class="fa fa-youtube-square"
                                            style="color: #bb0000 !important;padding-right: 3px;"></i>Youtube</label>

                                    <div
                                        style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                        <input type="text" class="form-control" name="name" placeholder=""
                                            {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                        <span
                                            style="font-size: smaller;">(e.g.https://www.youtube.com/CompanyYoutube)</span>
                                    </div>
                                </div>

                                <div class="col-6 form-group">
                                    <label for="Name"><i class="mdi mdi-rss-box"
                                            style="color:  #f26522 !important;padding-right: 3px;"></i>RSS Feed</label>
                                    <div
                                        style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                        <input type="text" class="form-control" name="name" placeholder=""
                                            {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                        <span style="font-size: smaller;">(e.g.https://www.yourwebsite.com/rss)</span>
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="Name"><svg xmlns="http://www.w3.org/2000/svg" height="16"
                                            width="14"
                                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path
                                                d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                                        </svg>
                                        {{-- <i class="fa-brands fa-tiktok"
                                            style="color: #010101 !important;padding-right: 3px;"></i> --}}
                                        Tik Tok
                                    </label>
                                    <div
                                        style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                        <input type="text" class="form-control" name="name" placeholder=""
                                            {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                        <span style="font-size: smaller;">(e.g.https://www.tiktok.com/@name)</span>
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="Name"><i class="mdi mdi-whatsapp"
                                            style="color: #25D366 !important;padding-right: 3px;"></i>Whatsapp</label>
                                    <div
                                        style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                        <input type="text" class="form-control" name="name" placeholder=""
                                            {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                        <span style="font-size: smaller;">(e.g.https://wa.me/1XXXXXXXXXXX)</span>
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="Name"><i class="fa fa-snapchat-square"
                                            style="color: #FFFC00 !important;padding-right: 3px;"></i>Snapchat</label>
                                    <div
                                        style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                        <input type="text" class="form-control" name="name" placeholder=""
                                            {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                        <span
                                            style="font-size: smaller;">(e.g.https://www.snapchat.com/add/username)</span>
                                    </div>
                                </div>

                                <div
                                    style="
                                        background: lightgray;
                                        padding: 9px;
                                        border-radius: 5px;
                                    ">
                                    <button type="submit" class="btn btn-primary"
                                        style="background: teal !important;
                                            border: teal !important;
                                            width: 100%;">Save
                                        Changes</button>

                                </div>
                        </form>

                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="local" role="tabpanel" aria-labelledby="local-tab"
                style="border: 1px solid lightgray;">

                <div class="card-header text-white"
                    style="border-radius: 0px;background:#37393d;padding: 5px !important;margin: 15px;">
                    <h2><span
                            style="color: #fff !important;
                                    font-size: 23px;padding-left:5px;"><i
                                style="color: #fff !important;padding-right: 5px;vertical-align: text-top;"
                                class="fa fa-globe" aria-hidden="true"></i></span><span
                            style="color: #fff !important;
                                    font-weight: 200;
                                    vertical-align:middle;
                                    font-size: 17px;padding-left: 0px !important;"><text>Localization</text></span>
                    </h2>
                </div>
                <div class="card-body">
                    <form id="updateprofile">
                        <div class="row">

                            {{-- <div class=" col-6 form-group">
                                                <label for=" Location Name">Profile Image</label>
                                                <input type="file" class="form-control" name="image">
        
                                            </div> --}}

                            <div class="col-6 form-group">
                                <label for="Name">Primary Country</label>
                                <input type="hidden" name="id" value="{{ Auth::guard('admin')->user()->id }}">
                                <div
                                    style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                    <input type="text" class="form-control" name="name" placeholder=""
                                        {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                    <span style="font-size: smaller;">Default country to fall black on or recommend to
                                        users</span>
                                </div>
                            </div>

                            <div class="col-6 form-group">
                                <label for="Name">Default Website Language</label>
                                <div
                                    style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                    <input type="text" class="form-control" name="name" placeholder=""
                                        {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                    <span style="font-size: smaller;">The language used for Google Maps, Recaptcha and
                                        other integrations where a &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; language can be
                                        specified.</span>
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <label for="Name">Time Format</label>
                                <div
                                    style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                    <input type="text" class="form-control" name="name" placeholder=""
                                        {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                    <span style="font-size: smaller;">Select the format to display time values on the
                                        frontend of the website</span>
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <label for="Name">Date Format</label>
                                <div
                                    style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                    <input type="date" class="form-control" name="name" placeholder=""
                                        {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                    <span style="font-size: smaller;">Select how dates will display on website</span>
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <label for="Name">Website Time Zone</label>
                                <div
                                    style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                    <input type="text" class="form-control" name="name" placeholder=""
                                        {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                    <span style="font-size: smaller;">The time zone your website synchs with May need to
                                        adjust for Daylight Savings &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Time.</span>
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <label for="Name">How of Day to Collect Recurring Payments</label>

                                <div
                                    style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                    <input type="text" class="form-control" name="name" placeholder=""
                                        {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                    <span style="font-size: smaller;">Billing processes will be scheduled within one hour
                                        of this time</span>
                                </div>
                            </div>

                            <div class="col-6 form-group">
                                <label for="Name">Display Website Timezone When Publishing a Post</label>
                                <div
                                    style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                    <input type="text" class="form-control" name="name" placeholder=""
                                        {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                    <span style="font-size: smaller;">Display the timezone of the website below time and
                                        date fields when members &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; publish a
                                        post</span>
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <label for="Name">
                                    Distance Format
                                </label>
                                <div
                                    style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                    <input type="text" class="form-control" name="name" placeholder=""
                                        {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                    <span style="font-size: smaller;">This measurement in which geo-leocation searchesnare
                                        calculated</span>
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <label for="Name">Location Search Suggestions</label>
                                <div
                                    style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                    <input type="text" class="form-control" name="name" placeholder=""
                                        {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                    <span style="font-size: smaller;">Display all location search suggestions or only
                                        locatoins within primary country</span>
                                </div>
                            </div>
                            <div class="card-header"
                                style="border-radius: 0px;background:lightgray;padding: 5px !important;margin: 16px 15px 30px 6px;
                                width: 99%;">
                                <h2><span
                                        style="color: black !important;
                                            font-size: 23px;padding-left:5px;"><i
                                            style="color: black !important;padding-right: 5px;vertical-align: text-top;"
                                            class="fa fa-money" aria-hidden="true"></i></span><span
                                        style="color: black !important;
                                            font-weight: 500;
                                            vertical-align:bottom;
                                            font-size: 19px;padding-left: 0px !important;"><text
                                            style="vertical-align: super;">Currency</text></span></h2>
                            </div>
                            <div class="col-12">
                                <div class="col-4">
                                    <div class="card-header"
                                        style="border-radius: 0px;background:lightgray;padding: 5px !important;margin: 16px 15px 30px 6px;
                                width: 99%;">
                                        <span
                                            style="color: black !important;
                                            
                                            vertical-align:bottom;
                                            font-size: 19px;padding-left: 0px !important;"><text
                                                style="
                                            padding-left: 10px;
                                        ">Currency
                                                Preview:<b>1.234.56</b>
                                                {{-- <span>روبية</span> --}}
                                            </text></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <label for="Name">Website Currency</label>
                                <div
                                    style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                    {{-- <input type="text" class="form-control" name="name" placeholder=""
                                        value="{{ Auth::guard('admin')->user()->name }}"
                                        > --}}
                                    <select class="form-select" id="currency" name="currency">
                                        <option>select currency</option>
                                        <option value="AFN">Afghan Afghani</option>
                                        <option value="ALL">Albanian Lek</option>
                                        <option value="DZD">Algerian Dinar</option>
                                        <option value="AOA">Angolan Kwanza</option>
                                        <option value="ARS">Argentine Peso</option>
                                        <option value="AMD">Armenian Dram</option>
                                        <option value="AWG">Aruban Florin</option>
                                        <option value="AUD">Australian Dollar</option>
                                        <option value="AZN">Azerbaijani Manat</option>
                                        <option value="BSD">Bahamian Dollar</option>
                                        <option selected value="BHD">BHD - Bahraini Dinar()</option>
                                        <option value="BDT">Bangladeshi Taka</option>
                                        <option value="BBD">Barbadian Dollar</option>
                                        <option value="BYR">Belarusian Ruble</option>
                                        <option value="BEF">Belgian Franc</option>
                                        <option value="BZD">Belize Dollar</option>
                                        <option value="BMD">Bermudan Dollar</option>
                                        <option value="BTN">Bhutanese Ngultrum</option>
                                        <option value="BTC">Bitcoin</option>
                                        <option value="BOB">Bolivian Boliviano</option>
                                        <option value="BAM">Bosnia-Herzegovina Convertible Mark</option>
                                        <option value="BWP">Botswanan Pula</option>
                                        <option value="BRL">Brazilian Real</option>
                                        <option value="GBP">British Pound Sterling</option>
                                        <option value="BND">Brunei Dollar</option>
                                        <option value="BGN">Bulgarian Lev</option>
                                        <option value="BIF">Burundian Franc</option>
                                        <option value="KHR">Cambodian Riel</option>
                                        <option value="CAD">Canadian Dollar</option>
                                        <option value="CVE">Cape Verdean Escudo</option>
                                        <option value="KYD">Cayman Islands Dollar</option>
                                        <option value="XOF">CFA Franc BCEAO</option>
                                        <option value="XAF">CFA Franc BEAC</option>
                                        <option value="XPF">CFP Franc</option>
                                        <option value="CLP">Chilean Peso</option>
                                        <option value="CNY">Chinese Yuan</option>
                                        <option value="COP">Colombian Peso</option>
                                        <option value="KMF">Comorian Franc</option>
                                        <option value="CDF">Congolese Franc</option>
                                        <option value="CRC">Costa Rican ColÃ³n</option>
                                        <option value="HRK">Croatian Kuna</option>
                                        <option value="CUC">Cuban Convertible Peso</option>
                                        <option value="CZK">Czech Republic Koruna</option>
                                        <option value="DKK">Danish Krone</option>
                                        <option value="DJF">Djiboutian Franc</option>
                                        <option value="DOP">Dominican Peso</option>
                                        <option value="XCD">East Caribbean Dollar</option>
                                        <option value="EGP">Egyptian Pound</option>
                                        <option value="ERN">Eritrean Nakfa</option>
                                        <option value="EEK">Estonian Kroon</option>
                                        <option value="ETB">Ethiopian Birr</option>
                                        <option value="EUR">Euro</option>
                                        <option value="FKP">Falkland Islands Pound</option>
                                        <option value="FJD">Fijian Dollar</option>
                                        <option value="GMD">Gambian Dalasi</option>
                                        <option value="GEL">Georgian Lari</option>
                                        <option value="DEM">German Mark</option>
                                        <option value="GHS">Ghanaian Cedi</option>
                                        <option value="GIP">Gibraltar Pound</option>
                                        <option value="GRD">Greek Drachma</option>
                                        <option value="GTQ">Guatemalan Quetzal</option>
                                        <option value="GNF">Guinean Franc</option>
                                        <option value="GYD">Guyanaese Dollar</option>
                                        <option value="HTG">Haitian Gourde</option>
                                        <option value="HNL">Honduran Lempira</option>
                                        <option value="HKD">Hong Kong Dollar</option>
                                        <option value="HUF">Hungarian Forint</option>
                                        <option value="ISK">Icelandic KrÃ³na</option>
                                        <option value="INR">Indian Rupee</option>
                                        <option value="IDR">Indonesian Rupiah</option>
                                        <option value="IRR">Iranian Rial</option>
                                        <option value="IQD">Iraqi Dinar</option>
                                        <option value="ILS">Israeli New Sheqel</option>
                                        <option value="ITL">Italian Lira</option>
                                        <option value="JMD">Jamaican Dollar</option>
                                        <option value="JPY">Japanese Yen</option>
                                        <option value="JOD">Jordanian Dinar</option>
                                        <option value="KZT">Kazakhstani Tenge</option>
                                        <option value="KES">Kenyan Shilling</option>
                                        <option value="KWD">Kuwaiti Dinar</option>
                                        <option value="KGS">Kyrgystani Som</option>
                                        <option value="LAK">Laotian Kip</option>
                                        <option value="LVL">Latvian Lats</option>
                                        <option value="LBP">Lebanese Pound</option>
                                        <option value="LSL">Lesotho Loti</option>
                                        <option value="LRD">Liberian Dollar</option>
                                        <option value="LYD">Libyan Dinar</option>
                                        <option value="LTL">Lithuanian Litas</option>
                                        <option value="MOP">Macanese Pataca</option>
                                        <option value="MKD">Macedonian Denar</option>
                                        <option value="MGA">Malagasy Ariary</option>
                                        <option value="MWK">Malawian Kwacha</option>
                                        <option value="MYR">Malaysian Ringgit</option>
                                        <option value="MVR">Maldivian Rufiyaa</option>
                                        <option value="MRO">Mauritanian Ouguiya</option>
                                        <option value="MUR">Mauritian Rupee</option>
                                        <option value="MXN">Mexican Peso</option>
                                        <option value="MDL">Moldovan Leu</option>
                                        <option value="MNT">Mongolian Tugrik</option>
                                        <option value="MAD">Moroccan Dirham</option>
                                        <option value="MZM">Mozambican Metical</option>
                                        <option value="MMK">Myanmar Kyat</option>
                                        <option value="NAD">Namibian Dollar</option>
                                        <option value="NPR">Nepalese Rupee</option>
                                        <option value="ANG">Netherlands Antillean Guilder</option>
                                        <option value="TWD">New Taiwan Dollar</option>
                                        <option value="NZD">New Zealand Dollar</option>
                                        <option value="NIO">Nicaraguan CÃ³rdoba</option>
                                        <option value="NGN">Nigerian Naira</option>
                                        <option value="KPW">North Korean Won</option>
                                        <option value="NOK">Norwegian Krone</option>
                                        <option value="OMR">Omani Rial</option>
                                        <option value="PKR">Pakistani Rupee</option>
                                        <option value="PAB">Panamanian Balboa</option>
                                        <option value="PGK">Papua New Guinean Kina</option>
                                        <option value="PYG">Paraguayan Guarani</option>
                                        <option value="PEN">Peruvian Nuevo Sol</option>
                                        <option value="PHP">Philippine Peso</option>
                                        <option value="PLN">Polish Zloty</option>
                                        <option value="QAR">Qatari Rial</option>
                                        <option value="RON">Romanian Leu</option>
                                        <option value="RUB">Russian Ruble</option>
                                        <option value="RWF">Rwandan Franc</option>
                                        <option value="SVC">Salvadoran ColÃ³n</option>
                                        <option value="WST">Samoan Tala</option>
                                        <option value="SAR">Saudi Riyal</option>
                                        <option value="RSD">Serbian Dinar</option>
                                        <option value="SCR">Seychellois Rupee</option>
                                        <option value="SLL">Sierra Leonean Leone</option>
                                        <option value="SGD">Singapore Dollar</option>
                                        <option value="SKK">Slovak Koruna</option>
                                        <option value="SBD">Solomon Islands Dollar</option>
                                        <option value="SOS">Somali Shilling</option>
                                        <option value="ZAR">South African Rand</option>
                                        <option value="KRW">South Korean Won</option>
                                        <option value="XDR">Special Drawing Rights</option>
                                        <option value="LKR">Sri Lankan Rupee</option>
                                        <option value="SHP">St. Helena Pound</option>
                                        <option value="SDG">Sudanese Pound</option>
                                        <option value="SRD">Surinamese Dollar</option>
                                        <option value="SZL">Swazi Lilangeni</option>
                                        <option value="SEK">Swedish Krona</option>
                                        <option value="CHF">Swiss Franc</option>
                                        <option value="SYP">Syrian Pound</option>
                                        <option value="STD">São Tomé and Príncipe Dobra</option>
                                        <option value="TJS">Tajikistani Somoni</option>
                                        <option value="TZS">Tanzanian Shilling</option>
                                        <option value="THB">Thai Baht</option>
                                        <option value="TOP">Tongan pa'anga</option>
                                        <option value="TTD">Trinidad & Tobago Dollar</option>
                                        <option value="TND">Tunisian Dinar</option>
                                        <option value="TRY">Turkish Lira</option>
                                        <option value="TMT">Turkmenistani Manat</option>
                                        <option value="UGX">Ugandan Shilling</option>
                                        <option value="UAH">Ukrainian Hryvnia</option>
                                        <option value="AED">United Arab Emirates Dirham</option>
                                        <option value="UYU">Uruguayan Peso</option>
                                        <option value="USD">US Dollar</option>
                                        <option value="UZS">Uzbekistan Som</option>
                                        <option value="VUV">Vanuatu Vatu</option>
                                        <option value="VEF">Venezuelan BolÃ­var</option>
                                        <option value="VND">Vietnamese Dong</option>
                                        <option value="YER">Yemeni Rial</option>
                                        <option value="ZMK">Zambian Kwacha</option>
                                    </select>
                                    <span style="font-size: smaller;">The currency that payments are calculated in
                                        throughout the website</span>
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <label for="Name">Website Currency Number Format</label>
                                <div
                                    style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                    <select class="form-select" id="currency_number" name="currency_number">
                                        <option>select currency number format</option>
                                        <option selected value="1,234.56">1,234.56</option>
                                    </select>

                                    <span style="font-size: smaller;">The website currency number format to display
                                        amounts.</span>
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <label for="Name">Currency Prefix</label>
                                <div
                                    style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                    <input type="text" class="form-control" name="name" placeholder=""
                                        {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                    <span style="font-size: smaller;">The currency prefix - Example:-[AU$]1,234.56</span>
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <label for="Name">Currency Suffix</label>
                                <div
                                    style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                    <input type="text" class="form-control" name="name" placeholder=""
                                        {{-- value="{{ Auth::guard('admin')->user()->name }}" --}}>
                                    <span style="font-size: smaller;">The currency suffix - Example:1,234.56[AU$]</span>
                                </div>
                            </div>

                            <div
                                style="
                                        background: lightgray;
                                        padding: 9px;
                                        border-radius: 5px;
                                    ">
                                <button type="submit" class="btn btn-primary"
                                    style="background: teal !important;
                                            border: teal !important;
                                            width: 100%;">Save
                                    Changes</button>

                            </div>
                    </form>

                </div>

            </div>
        </div>

        <div class="tab-pane fade" id="search" role="tabpanel" aria-labelledby="search-tab"
            style="border: 1px solid lightgray;">

            <div class="card-header text-white"
                style="border-radius: 0px;background:#37393d;padding: 5px !important;margin: 15px;">
                <h2><span
                        style="color: #fff !important;
                                    font-size: 23px;padding-left:5px;"><i
                            style="color: #fff !important;padding-right: 5px;vertical-align: text-top;"
                            class="fa fa-search" aria-hidden="true"></i></span><span
                        style="color: #fff !important;
                                    font-weight: 200;
                                    vertical-align:middle;
                                    font-size: 17px;padding-left: 0px !important;"><text>Search
                            Settings</text></span>
                </h2>
            </div>
            <div class="card-body">
                <form id="updateprofile">
                    <div class="row">

                        {{-- <div class=" col-6 form-group">
                                                <label for=" Location Name">Profile Image</label>
                                                <input type="file" class="form-control" name="image">
        
                                            </div> --}}

                        <div class="col-6 form-group">
                            <input type="hidden" name="id" value="{{ Auth::guard('admin')->user()->id }}">
                            <label for="basic-url" class="form-label">Default Member Search URL</label>

                            <label for="basic-url" class="form-label"
                                style="
                                                    display: flex;
                                                    float: right;font-size: 14px;
                                                    color: dodgerblue;
                                                ">View
                                Page<i class="mdi mdi-launch" style="
    color: dodgerblue !important;
"></i></label>
                            <div
                                style="background:lightgray;
                                                                   padding: 10px;
                                                                   border-radius: 4px;">
                                <div class="input-group mb-0">
                                    <span class="input-group-text"
                                        id="basic-addon2">https://www.bahrainbankdirectory.com/</span>

                                    <input type="text" class="form-control" placeholder=""
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">


                                </div>

                                <span style="font-size: smaller;">Default URL used for search result pages
                                    (Default:"search_results")</span>
                            </div>
                        </div>

                        <div class="col-6 form-group">
                            <label for="basic-url" class="form-label">Require Complete Profiles</label>

                            <label for="basic-url" class="form-label"
                                style="
                                            display: flex;
                                            float: right;font-size: 14px;
                                            color: dodgerblue;
                                        ">View
                                Settings<i class="mdi mdi-launch" style="
color: dodgerblue !important;
"></i></label>
                            <div
                                style="background:lightgray;
                                                           padding: 10px;
                                                           border-radius: 4px;">
                                <select class="form-select" id="complete_profile" name="complete_profile">
                                    <option>select complete profiles</option>
                                    <option value="yes">Yes</option>
                                    <option selected value="no">No</option>
                                </select>
                                <span style="font-size: smaller;">Only include members in search results who have filled
                                    in
                                    the information required &nbsp; &nbsp; &nbsp; by the "Complete Profile Fields" setting.
                                </span>
                            </div>
                        </div>
                        <div class="col-6 form-group">
                            <label for="Name">Show Categories with No Members</label>
                            <div
                                style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                <select class="form-select" id="categories" name="categories">
                                    <option>select categories with no members</option>
                                    <option selected value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>

                                <span style="font-size: smaller;">If set to YES, will display categories in search filters
                                    even if they have no members &nbsp; &nbsp; &nbsp; assigned.</span>
                            </div>
                        </div>
                        <div class="col-6 form-group">
                            <label for="Name">Default Category Sort Order</label>
                            <div
                                style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                <select class="form-select" id="category_sort" name="category_sort"
                                    style="margin-left: -3px;width:101%">
                                    <option>select category sort order</option>
                                    <option selected value="a_z">Category Name (A-Z)</option>
                                    <option value="z-a">Category Name (Z-A)</option>
                                </select>

                                <span style="font-size: smaller;padding-left: 0px !important;">Select the order in which
                                    member categories should display on the live website</span>
                            </div>
                        </div>
                        <div class="col-6 form-group">
                            <label for="Name">Default Search & Lead Auto-Match Radius</label>
                            <div
                                style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                <select class="form-select" id="auto_match" name="auto_match"
                                    style="margin-left: -3px;width:101%">
                                    <option>select search & lead auto-match radius</option>
                                    <option selected value="5">5</option>
                                </select>

                                <span style="font-size: smaller;padding-left: 0px !important;">When doing a radius-based
                                    location search (zip codes and cities by default), members within this distance from the
                                    center of the searched location will be returned
                                    as results. This radius is also used when lead auto-matching is enabled to identify
                                    members
                                    that fall within the auto-match perameteters <a href="#"
                                        style="
                                    color: #3366CC !important;
                                ">More
                                        Info >></a></span>
                            </div>
                        </div>
                        <div class="col-6 form-group">
                            <label for="Name">Strict Postal Code Match</label>
                            <div
                                style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                <select class="form-select" id="category_sort" name="category_sort"
                                    style="margin-left: -3px;width:101%">
                                    <option>select strict postal code match</option>
                                    <option value="enabled">Enabled</option>
                                    <option selected value="disabled">Disabled</option>
                                </select>

                                <span style="font-size: smaller;padding-left: 0px !important;">Choose ENABLED to only
                                    include
                                    results within the
                                    searched Postal Code. Choose DISABLED to include areas outside the searched Postal Code
                                    but
                                    are still within the radius limit.</span>
                            </div>
                        </div>
                        <div class="col-6 form-group">
                            <label for="Name">Strict City Match</label>
                            <div
                                style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                <select class="form-select" id="city_match" name="city_match"
                                    style="margin-left: -3px;width:101%">
                                    <option>select strict city match</option>
                                    <option value="enabled">Enabled</option>
                                    <option selected value="disabled">Disabled</option>
                                </select>

                                <span style="font-size: smaller;padding-left: 0px !important;">Choose ENABLED to only
                                    include
                                    results within the searched City. Choose DISABLED to include areas outside the searched
                                    City
                                    but are still within the radius limit.</span>
                            </div>
                        </div>
                        <div class="col-6 form-group">
                            <label for="Name">Strict Country & State Match</label>
                            <div
                                style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                <select class="form-select" id="category_sort" name="category_sort"
                                    style="margin-left: -3px;width:101%">
                                    <option>select strict country & state match</option>
                                    <option value="enabled">Enabled</option>
                                    <option selected value="disabled">Disabled</option>
                                </select>

                                <span style="font-size: smaller;padding-left: 0px !important;"">Choose ENABLED to only
                                    include
                                    results within a searched State/Province & Country. Choose DISABLED to include areas
                                    outside
                                    the searched Postal Code but are still within the radius limit. </span>
                            </div>
                        </div>




                        <div class="col-6 form-group">
                            <label for="Name">Category Keyword Searches</label>
                            <div
                                style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                <select class="form-select" id="city_match" name="city_match"
                                    style="margin-left: -3px;width:101%">
                                    <option>select category keyword searches</option>
                                    {{-- <option value="enabled"></option> --}}
                                    <option selected value="strict_match">Strict Match (include fewer results)</option>
                                </select>

                                <span style="font-size: smaller;padding-left: 0px !important;"">Choose STRICT to only
                                    include
                                    members in a category that exactly matches the searched keyword.
                                    Choose BROAD to include additional related matches.</span>
                            </div>
                        </div>
                        <div class="col-6 form-group">
                            <label for="Name">Google Search Assist</label>
                            <div
                                style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                                <select class="form-select" id="category_sort" name="category_sort"
                                    style="margin-left: -3px;width:101%">
                                    <option>select google search assist</option>
                                    <option selected value="enabled">Enabled</option>
                                    <option value="disabled">Disabled</option>
                                </select>

                                <span style="font-size: smaller;padding-left: 0px !important;"">Choose ENABLED to use
                                    Google
                                    Search Assist on Search Results Pages Without Results.</span>
                            </div>
                        </div>

                        <div
                            style="
                                        background: lightgray;
                                        padding: 9px;
                                        border-radius: 5px;
                                    ">
                            <button type="submit" class="btn btn-primary"
                                style="background: teal !important;
                                            border: teal !important;
                                            width: 100%;">Save
                                Changes</button>

                        </div>
                </form>

            </div>

        </div>
    </div>
    <div class="tab-pane fade" id="int" role="tabpanel" aria-labelledby="int-tab"
        style="border: 1px solid lightgray;">

        <div class="card-header text-white"
            style="border-radius: 0px;background:#37393d;padding: 5px !important;margin: 15px;">
            <h2><span
                    style="color: #fff !important;
                                    font-size: 23px;padding-left:5px;"><i
                        style="color: #fff !important;padding-right: 5px;vertical-align: text-top;" class="fa fa-cogs"
                        aria-hidden="true"></i></span><span
                    style="color: #fff !important;
                                    font-weight: 200;
                                    vertical-align:middle;
                                    font-size: 17px;padding-left: 0px !important;"><text>Website
                        Integrations</text></span>
            </h2>
        </div>
        <div class="card-body">
            <form id="updateprofile">
                <div class="row">

                    {{-- <div class=" col-6 form-group">
                                                <label for=" Location Name">Profile Image</label>
                                                <input type="file" class="form-control" name="image">
        
                                            </div> --}}

                    <div class="col-12 form-group">
                        <input type="hidden" name="id" value="{{ Auth::guard('admin')->user()->id }}">
                        <label for="basic-url" class="form-label" style="font-size:26px;">
                            <img src="{{ asset('assets/img/shield.png') }}" alt="Shield Image" width="40px"
                                height="30px"> Block Spam Keywords</label>


                        <div
                            style="background:lightgray;
                                padding: 10px;
                                border-radius: 4px;">
                            <label for="basic-url" class="form-label">Enter Blocked Keywords</label>

                            <button style="
float: inline-end;
"><label for="basic-url" class="form-label"
                                    style="
                                                          display: flex;
                                                          float: right;
                                                          font-size: 14px;
                                                          background: dodgerblue;
                                                          color:white !important;
                                                          padding: 6px;
                                                          border-radius: 5px;
                                                      "><i
                                        class="fa fa-refresh"
                                        style="
          color: white !important;
          padding: 5px;
      "></i>Restore
                                    Recommended Block List</label></button>
                            <div class="input-group mb-0">

                                <textarea id="message" name="message" rows="5" cols="140"></textarea>

                                


                            </div>

                            <span style="font-size: smaller;padding-left:0px;">Enter a comma separated list of keywords to block from submissions an sign up pages and public forms.</span>
                            <span style="float: inline-end;><a href="#" style="
                                color: #3366CC !important;
                            ">Learn More</a></span><br>
                            <span style="font-size: smaller;padding-left:0px"><b>TIP:</b>Add keywords in "quotes" to target exact matches rather than any partial match (more specific targetting)
                            </span>
                            <hr style="
                            background: gray;
                        "/>
                        <div
                        style="background:lightgray;
                            padding: 10px;
                            border-radius: 4px;">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label for="basic-url" class="form-label">Black Spoof Characters</label>
                        <button style="
float: inline-end;
"><label for="basic-url" class="form-label"
                                style="
                                                      display: flex;
                                                      float: right;
                                                      font-size: 14px;
                                                      background: dodgerblue;
                                                      color:white !important;
                                                      padding: 6px;
                                                      border-radius: 5px;
                                                  "><i
                                    class="fa fa-refresh"
                                    style="
      color: white !important;
      padding: 5px;
  "></i>Restore
                                Spoof List</label></button>
                        <div class="input-group mb-0">

                            <textarea id="message" name="message" rows="3" cols="140"></textarea>

                            


                        </div>

                        <span style="font-size: smaller;padding-left:0px;">Spammers will often submit messages using characters that look like English letters but are not (also called "homoglyphs"). It is recommended to block these characters on sites that use English exclusively.</span>
                        
                    </div>
                        </div>
                        
                    </div>

                    <div class="col-6 form-group">
                       

                        <label for="basic-url" class="form-label" style="font-size:26px;">
                            <img src="{{ asset('assets/img/signal.png') }}" alt="Shield Image" width="40px"
                                height="30px"> Google Analytics</label>
                                <label for="Name">Google Analytics ID 3 (UA-XXXXXXX)</label>        
                                <div style="background:lightgray;
                                padding: 10px;
                                border-radius: 4px;">
                        <text style="
                                font-size: smaller;
                                color: red;font-weight: 600;
                            ">You're using a deprecated versions of Google Analytics 3.</text>
                        <input type="text" class="form-control" name="name" placeholder="UA-105388892-5" disabled="">
                        <span style="font-size: smaller;">Using this version will no longer track traffic analytics.</span>
                            <hr style="background:gray " />
                            

                        <label for="basic-url" class="form-label">Google Analytics ID 4 (G-XXXXXX)</label>

                       
                        <div class="input-group mb-0">
                            <input type="text" class="form-control" placeholder="Enter a G-XXXXXXX ID" aria-label="Recipient's username" aria-describedby="basic-addon2">
                           
                        </div>
                        <span style="font-size: smaller;">Enter Google Analytics 4 ID. Format G-XXXXXX</span>
                            <label for="basic-url" class="form-label" style="
                            display: flex;
                            float: right;
                            color: dodgerblue;font-size: 13px;
                        ">Learn More</label>

                    </div>
                    </div>
                    <div class="col-6 form-group">
                        <label for="basic-url" class="form-label" style="font-size:26px;">
                            <img src="{{ asset('assets/img/maps.png') }}" alt="Shield Image" width="40px"
                                height="30px"> Google Maps</label><br>
                                <label for="Name">Google Maps Javascript API Key</label>
                                 <label for="basic-url" class="form-label" style="
                            display: flex;
                            float: right;
                            color: red;font-size: 13px;
                        ">required</label>
                        <div
                            style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                            <select class="form-select" id="categories" name="categories">
                                <option>select categories with no members</option>
                                <option selected value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>

                            <span style="font-size: smaller;">Enter Google Maps API Key</span>
                             <label for="basic-url" class="form-label" style="
                            display: flex;
                            float: right;
                            color: dodgerblue;font-size: 13px;
                        ">Learn More</label>
                        </div>
                    </div>
                    <div style="padding: 5px;background:#f0eded;margin-bottom:20px;">
                        <hr style="background: darkgray"/>
                    </div>
                    
                        <label for="basic-url" class="form-label" style="font-size:26px;text-transform: none;">
                            <img src="{{ asset('assets/img/re.png') }}" alt="Shield Image" width="40px"
                                height="30px">reCAPTCHA</label><br>
                                <div class="col-6 form-group">
                                <label for="Name">Google ReCaptcha Site Key</label>
                                 <label for="basic-url" class="form-label" style="
                            display: flex;
                            float: right;
                            color: red;font-size: 13px;
                        ">required</label>
                        <div
                            style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                            {{-- <select class="form-select" id="categories" name="categories">
                                <option>select categories with no members</option>
                                <option selected value="yes">Yes</option>
                                <option value="no">No</option>
                            </select> --}}
<input type="text" class="form-control"> 
                            <span style="font-size: smaller;">Enter Google ReCaptcha Site Key</span>
                             <label for="basic-url" class="form-label" style="
                            display: flex;
                            float: right;
                            color: dodgerblue;font-size: 13px;
                        ">Learn More</label>
                        </div>
                    </div>
                    <div class="col-6 form-group">
                       
                                <label for="Name">Google ReCaptcha Secret Key</label>
                                 <label for="basic-url" class="form-label" style="
                            display: flex;
                            float: right;
                            color: red;font-size: 13px;
                        ">required</label>
                        <div
                            style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                        <input type="text" class="form-control"> 
                            <span style="font-size: smaller;">Enter Google ReCaptcha Secret Key</span>
                             <label for="basic-url" class="form-label" style="
                            display: flex;
                            float: right;
                            color: dodgerblue;font-size: 13px;
                        ">Learn More</label>
                        </div>
                    </div>
                    <div style="padding: 5px;background:#f0eded;margin-bottom:20px;">
                        <hr style="background: darkgray"/>
                    </div>
                    
                        <label for="basic-url" class="form-label" style="font-size:26px;text-transform: none;">
                            <img src="{{ asset('assets/img/send.png') }}" alt="Shield Image" width="160px"
                                height="80px"></label><br>
                                <div class="col-6 form-group">
                                <label for="Name">How Do You Want to Connect to SendGrid?</label>
                                 
                        <div
                            style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                            <select class="form-select" id="categories" name="categories">
                                <option>select </option>
                                <option selected value="yes">Use Default Email System (Max Limit 1,500 Emails per Day)</option>
                                {{-- <option value="no">No</option> --}}
                            </select>
                        </div>
                    </div>
                    <div style="padding: 5px;background:#f0eded;margin-bottom:20px;">
                        <hr style="background: darkgray"/>
                    </div>
                    
                        <label for="basic-url" class="form-label" style="font-size:26px;text-transform: none;color:black !important;font-weight: 500;">
                            <i class="fa fa-briefcase" aria-hidden="true" style="
    color: black !important;
    padding-right: 10px;
"></i>Affiliate Program Integrations</label><br>
                            {{-- <img src="{{ asset('assets/img/send.png') }}" alt="Shield Image" width="160px"
                                height="80px"></label><br> --}}
                                <div class="col-6 form-group">
                                <label for="Name">Select Transaction Types to Track</label>
                                 
                        <div
                            style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                            <select class="form-select" id="categories" name="categories">
                                <option  selected>Select Transaction Types</option>
                                <option value="online">Online</option>
                                <option value="cash">Cash</option>
                            </select>
                            <span style="font-size: smaller;">will control when the affiliate tracking code will be triggered</span>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-6 form-group">
                                <label for="Name">ShareaSale Affiliate ID</label>
                                
                        <div
                            style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                            {{-- <select class="form-select" id="categories" name="categories">
                                <option>select categories with no members</option>
                                <option selected value="yes">Yes</option>
                                <option value="no">No</option>
                            </select> --}}
<input type="text" class="form-control" value="12345"> 
                            <span style="font-size: smaller;">Will include your ShareaSale tracking code to successful signups.</span>
                             
                        </div>
                    </div>
                    <div class="col-6 form-group">
                       
                                <label for="Name">PostAffiliatePro URL</label>
                                 
                        <div
                            style="background:lightgray;
                                                padding: 10px;
                                                border-radius: 4px;">
                        <input type="text" class="form-control" placeholder="mysite.postaffiliattepro.com"> 
                            <span style="font-size: smaller;">will include your PostAffiliatePro tracking code to successful signups </span><br />
                            <span style="font-size: smaller;"><b>IMPORTANT:</b>Do not include http or www</span>
                          
                        </div>
                    </div>
                    </div>
                    
                    <div
                        style="
                                        background: lightgray;
                                        padding: 9px;
                                        border-radius: 5px;
                                    ">
                        <button type="submit" class="btn btn-primary"
                            style="background: teal !important;
                                            border: teal !important;
                                            width: 100%;">Save
                            Changes</button>

                    </div>
            </form>

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
$(function() {

            $('#updateprofile').on('submit', function(e) {
                // alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.changeProfile') }}",
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
                                window.location.reload();
                            }, 2000);

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
            $('#update').on('submit', function(e) {
                // alert('hello');
                e.preventDefault()
                let fd = new FormData(this)
                fd.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('admin.resetpasword') }}",
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
                                window.location.reload();
                            }, 2000);

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


        });
    </script>
@endsection
