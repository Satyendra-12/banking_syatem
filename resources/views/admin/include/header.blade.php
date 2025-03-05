<style>
    .has-sub{
        list-style: none !important;
    }
</style>
 

<!-- Header -->
<header class="ec-main-header" id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg" style="background: #37393d;">
        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle"></button>
        <!-- search form -->
        <div class="search-form d-lg-inline-block">
            <div class="input-group">
                {{-- <input type="text" name="query" id="search-input" class="form-control"
                    placeholder="search.." autofocus autocomplete="off" /> --}}
                {{-- <button type="button" name="search" id="search-btn" class="btn btn-flat">
                    <i class="mdi mdi-magnify"></i>
                </button> --}}
            </div>
            <div id="search-results-container">  
                <ul id="search-results"></ul>
            </div>
        </div>

        <!-- navbar right -->
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- User Account -->
                <li class="dropdown user-menu" style="list-style: none !important;">
                   
                    <button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown"
                        aria-expanded="false"> 
                        <img src="{{ url('/public') }}/{{Auth::guard('admin')->user()->image}}" class="img-circle" alt="User Image" style="
                        width: 45px;
                        border-radius: 25px;
        background:white;
    height: 42px;

                    " />
                                <div class="d-inline-block" style="color: #fff">
                                    {{-- {{Auth::guard('admin')->user()->name}} --}}
                                    My Account
                                </div>
                        {{-- <imgsrc="asset('assets/img/user/user.png') " class="user-image" alt="User Image" /> --}}
                    </button>
                   
                    <ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu">
                        <!-- User image -->
                        <li class="dropdown-header"  style="list-style: none !important;">
                            <img src="{{ url('/public') }}/{{Auth::guard('admin')->user()->image}}" class="img-circle" alt="User Image" style="
                            height: 42px;
                        "/>
                            <div class="d-inline-block">
                                {{Auth::guard('admin')->user()->name}} <small class="pt-1">{{Auth::guard('admin')->user()->email}}</small>
                            </div>
                        </li>
                         <li style="list-style: none !important;">
                            <a href="{{route('admin.profile')}}">
                                <i class="mdi mdi-account"></i> My Profile
                            </a>
                        </li> 
                        {{-- <li>
                            <a href="#">
                                <i class="mdi mdi-email"></i> Message
                            </a>
                        </li>
                        <li>
                            <a href="#"> <i class="mdi mdi-diamond-stone"></i> Projects </a>
                        </li> --}}
                        {{-- <li class="right-sidebar-in">
                            <a href="javascript:0"> <i class="mdi mdi-settings-outline"></i> Setting </a>
                        </li> --}}
                        <li class="dropdown-footer" style="list-style: none !important;">
                            <a href="{{route('admin.logout')}}"> <i class="mdi mdi-logout"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </nav>
</header>