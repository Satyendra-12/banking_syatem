<style>
    .side-header {
        position: relative;
        display: block;
        background-color: white;
        padding-bottom: 10px;
        text-align: center;


      a {
            display: flex;
            flex-direction: row;
            align-items: center;
            height: 70px;
            line-height: 75px;
            width: 250px;
            border-bottom: 1px solid $border-color;
            padding-left: 1.56rem;

            img {
                max-width: 30px;
                vertical-align: middle;
            }
        }

        .side-header-name {
            color: #56606e;
            font-size: 30px;
            margin-left: 5px;
            max-width: 170px;
            font-size: 30px;
            font-weight: 700;
        }
    }
    .has-sub{
        list-style: none !important;
    }
    

.sidebar .sidenav-item-link .nav-text .nav > li.active {
    margin-right: auto;
    overflow: hidden;
    max-width: 130px;
    text-overflow: ellipsis;
    white-space: nowrap;
    color: #fff !important;
}

    .side-header a img {
        max-width: 100% !important;
        height: 100% !important;
        vertical-align: middle;
        /* border-radius: 50px; */
        margin-top: 20px;
    }
    .sidebar li.expand > a .caret:before, .sidebar li.expanding > a .caret:before {
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
    padding-right: 20px;
    }
</style>
<!-- LEFT MAIN SIDEBAR -->
<div class="ec-left-sidebar ec-bg-sidebar" style="background: #37393d; color: #fff !important;">
    <div id="sidebar" class="sidebar ec-sidebar-footer">
        <div class="side-header">
            <a href="#" title="Bahrain Bank" >
                <img src="{{ asset(Auth::guard('admin')->user()->image) }}" alt="" />
                {{-- <span class="side-header-name text-truncate">UP Hello</span> --}}
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="ec-navigation" data-simplebar>
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <!-- Dashboard -->
                <li class="has-sub {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('admin.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text" style="color: #fff !important;">Dashboard</span>
                    </a>
                    <hr>
                </li>
                <li class="has-sub {{ Request::is('admin/slider','admin/add-slider') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('admin.slider') }}">
                        <i class="mdi mdi-image-area"></i>
                        <span class="nav-text" style="color: #fff !important;">Slider</span>
                        <b></b>
                    </a>
                </li>
                <li class="has-sub {{ Request::is('admin/categories','admin/add-category') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('admin.categoriesPage') }}">
                        <i class="mdi mdi-image-area"></i>
                        <span class="nav-text" style="color: #fff !important;overflow: visible;">Popular Categories</span>
                        <b></b>
                    </a>
                </li>
                <li class="has-sub {{ Request::is('admin/banking-sub-category','admin/ancillary-sub-category','admin/support-sub-category') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="javascript:void(0)">
                        <i class="mdi mdi-palette-advanced"></i>
                        <span class="nav-text" style="color: #fff !important;overflow: visible;">Category Management</span>
                        <b class="caret" style="padding-left: 21px;"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('admin.addCategory') }}">
                                    <span class="nav-text" style="color:#000;">Add SubCategory</span>
                                    {{-- <i class="mdi mdi-account-group-outline"></i>
                                          <span class="nav-text">Categories</span> --}}
                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('admin.subCategory') }}">
                                    <span class="nav-text" style="color:#000;white-space: normal;">BANKING & FINANCIAL SERVICES SubCategory</span>
                                    {{-- <i class="mdi mdi-account-group-outline"></i>
                                          <span class="nav-text">Categories</span> --}}
                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('admin.subCategory1') }}">
                                    <span class="nav-text" style="color:#000;white-space: normal;">ANCILLARY AND SUPPORT SERVICES SubCategory</span>
                                    {{-- <i class="mdi mdi-account-group-outline"></i>
                                          <span class="nav-text">Sub Categories</span> --}}
                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('admin.subCategory2') }}">
                                    <span class="nav-text" style="color:#000;white-space: normal;">SUPPORT SERVICES SubCategory</span>
                                    {{-- <i class="mdi mdi-account-group-outline"></i>
                                          <span class="nav-text">Sub Categories</span> --}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="has-sub {{ Request::is('admin/register-user','admin/add-register-user','admin/register-member') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="javascript:void(0)">
                        <i class="mdi mdi-palette-advanced"></i>
                        <span class="nav-text" style="color: #fff !important;overflow: visible;">All Members</span>
                        <b class="caret" style="padding-left: 21px;"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('admin.addregisteruser') }}">
                                    <span class="nav-text" style="color:#000;">Add Member</span>
                                    {{-- <i class="mdi mdi-account-group-outline"></i>
                                          <span class="nav-text">Categories</span> --}}
                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('admin.registeruser') }}">
                                    <span class="nav-text" style="color:#000;">Featured Member</span>
                                    {{-- <i class="mdi mdi-account-group-outline"></i>
                                          <span class="nav-text">Categories</span> --}}
                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('admin.registermember') }}">
                                    <span class="nav-text" style="color:#000;">Other Member</span>
                                    {{-- <i class="mdi mdi-account-group-outline"></i>
                                          <span class="nav-text">Sub Categories</span> --}}
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                <li class="has-sub {{ Request::is('admin/add-member','admin/member') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="javascript:void(0)">
                        <i class="mdi mdi-palette-advanced"></i>
                        <span class="nav-text" style="color: #fff !important;overflow: visible;">Members Settings</span>
                        <b class="caret" style="padding-left: 21px;"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('admin.addmember') }}">
                                    <span class="nav-text" style="color:#000;">Add Member Options</span>
                                    {{-- <i class="mdi mdi-account-group-outline"></i>
                                          <span class="nav-text">Categories</span> --}}
                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('admin.memberpage') }}">
                                    <span class="nav-text" style="color:#000;">Show Member Options</span>
                                    {{-- <i class="mdi mdi-account-group-outline"></i>
                                          <span class="nav-text">Categories</span> --}}
                                </a>
                            </li>
                           
                            
                        </ul>
                    </div>
                </li>
                {{-- <li class="has-sub {{ Request::is('admin/register-user','admin/add-register-user') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('admin.registeruser') }}">
                        <i class="mdi mdi-account-group-outline"></i>
                        <span class="nav-text" style="color: #fff !important;">Featured Members</span>
                        <b class=""></b>
                    </a>
                    
                </li> --}}
                <li class="has-sub {{ Request::is('admin/banner','admin/add-banner') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('admin.banner') }}">
                        <i class="mdi mdi-file-image"></i>
                        <span class="nav-text" style="color: #fff !important;">Left Banners</span>
                        <b class=""></b>
                    </a>
                    
                </li>
                <li class="has-sub {{ Request::is('admin/rbanner','admin/add-rbanner') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('admin.rbanner') }}">
                        <i class="mdi mdi-file-image"></i>
                        <span class="nav-text" style="color: #fff !important;">Right Banners</span>
                        <b class=""></b>
                    </a>
                    
                </li>
                <li class="has-sub {{ Request::is('admin/who','admin/add-who') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('admin.whoPage') }}">
                        <i class="mdi mdi-account-group-outline"></i>
                        <span class="nav-text" style="color: #fff !important;">Who's Who Profile</span>
                        <b class=""></b>
                    </a>
                    
                </li>
                <li class="has-sub {{ Request::is('admin/ad','admin/add-ad') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('admin.adpage') }}">
                        {{-- <span class="nav-text">Coupon</span> --}}
                        <i class="mdi mdi-file-image"></i>
                        <span class="nav-text" style="color: #fff !important;">Ad List</span>
                    </a>
                </li>
                <li class="has-sub {{ Request::is('admin/news','admin/add-news') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('admin.newspage') }}">
                        {{-- <span class="nav-text">Coupon</span> --}}
                        <i class="mdi mdi-file-image"></i>
                        <span class="nav-text" style="color: #fff !important;overflow: visible;">Articles & Features Lists</span>
                    </a>
                </li>
                <li class="has-sub {{ Request::is('admin/articles','admin/add-articles') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('admin.articlespage') }}">
                        {{-- <span class="nav-text">Coupon</span> --}}
                        <i class="mdi mdi-file-image"></i>
                        <span class="nav-text" style="color: #fff !important;">Events List</span>
                    </a>
                </li>
                 <li class="has-sub {{ Request::is('admin/purpose','admin/add-purpose','admin/contact-us') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="javascript:void(0)">
                        <i class="mdi mdi-palette-advanced"></i>
                        <span class="nav-text" style="color: #fff !important;">Contact US</span>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('admin.purposepage') }}">
                                    <span class="nav-text" style="color:#000;">Purpose List</span>
                                    {{-- <i class="mdi mdi-account-group-outline"></i>
                                          <span class="nav-text">Categories</span> --}}
                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('admin.contactus') }}">
                                    <span class="nav-text" style="color:#000;">Contact us lists</span>
                                    {{-- <i class="mdi mdi-account-group-outline"></i>
                                          <span class="nav-text">Sub Categories</span> --}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="has-sub {{ Request::is('admin/social','admin/add-social') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('admin.socialpage') }}">
                        <i class="mdi mdi-cellphone"></i>
                        <span class="nav-text" style="color: #fff !important;">Social Link</span>
                        <b></b>
                    </a>
                </li>
                {{-- <li class="has-sub">
                    <a class="sidenav-item-link" style="color: black;" href="{{ route('admin.banner') }}">
                        <i class="mdi mdi-image-area"></i>
                        <span class="nav-text">Banner one</span>
                        <b></b>
                    </a>
                </li> --}}
                {{-- <li class="has-sub">
                    <a class="sidenav-item-link" style="color: black;" href="{{ route('admin.brands') }}">
                        <i class="mdi mdi-library"></i>

                        <span class="nav-text">Add Brand</span>
                        <b></b>
                    </a>
                </li> --}}
                <!-- Vendors -->
                
                {{-- <li class="has-sub {{ Request::is('admin/list','admin/approvedlist','admin/sub-rejectedlist') ? 'active' : '' }}" style="display:none">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="javascript:void(0)">
                        <i class="mdi mdi-palette-advanced"></i>
                        <span class="nav-text" style="color: #fff !important;">Lisiting</span>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('admin.listPage') }}">
                                    <span class="nav-text" style="color:#000;">All lisiting</span>
                                 
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="{{ route('admin.applistPage') }}">
                                    <span class="nav-text" style="color:#000;">Approved</span>
                               
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="{{ route('admin.rejlistPage') }}">
                                    <span class="nav-text" style="color:#000;">Rejected</span>
                                
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="has-sub {{ Request::is('admin/plans','admin/add-plans') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('admin.planspage') }}">
                 
                        <i class="mdi mdi-dns-outline"></i>
                        <span class="nav-text" style="color: #fff !important;">Plans</span>
                    </a>
                </li>
                
                <li class="has-sub {{ Request::is('admin/menu','admin/add-menu') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('admin.menupage') }}">
                       
                        <i class="mdi mdi-menu"></i>
                        <span class="nav-text" style="color: #fff !important;">Menu List</span>
                    </a>
                </li>

                <li class="has-sub {{ Request::is('admin/page','admin/add-page') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('admin.pagepage') }}">
              
                        <i class="mdi mdi-forum"></i>
                        <span class="nav-text" style="color: #fff !important;">Page List</span>
                    </a>
                </li> --}}
                <li class="has-sub {{ Request::is('admin/bottomslider','admin/add-bottomslider') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('admin.bottomslider') }}">
                        {{-- <span class="nav-text">Coupon</span> --}}
                        <i class="mdi mdi-forum"></i>
                        <span class="nav-text" style="color: #fff !important;">Bottom Slider</span>
                    </a>
                </li>
                
               
                <li class="has-sub {{ Request::is('admin/change-password','admin/privacy_policies','admin/about-us') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="javascript:void(0)">
                        <i class="mdi mdi-settings"></i>
                        <span class="nav-text"style="color: #fff !important;" >Setting</span>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">

                            {{-- <li class="">
                                <a class="sidenav-item-link" style="color:#000;" href="{{ route('admin.changepassword') }}">
                                    <span class="nav-text" style="color:#000;">Change Password</span>
                                </a>
                            </li> --}}
                            {{-- <li class="hide"> --}}
                                {{-- <a class="sidenav-item-link" style="color:#000;" href="{{ route('contact-us.index') }}">

                                    <span class="nav-text" style="color:#000;">Contact Us</span>
                                    <b></b>
                                </a> --}}
                            {{-- </li> --}}
                            <li class="has-sub">
                                <a class="sidenav-item-link" style="color:#000;" href="{{ route('privacy-policies.index') }}">

                                    <span class="nav-text" style="color:#000;">Privacy & Policy</span>
                                    <b></b>
                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="sidenav-item-link" style="color:#000;" href="{{ route('terms.index') }}">

                                    <span class="nav-text" style="color:#000;">Terms of Use</span>
                                    <b></b>
                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="sidenav-item-link" style="color:#000;" href="{{ route('about-up.index') }}">

                                    <span class="nav-text" style="color:#000;">About Bahrain Bank</span>
                                    <b></b>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                

               
            </ul>
        </div>
    </div>
</div>
