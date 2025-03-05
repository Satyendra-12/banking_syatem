<style>
    .side-header {
        position: relative;
        display: block;
        background-color: transparent;
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


    .sidebar .sidenav-item-link .nav-text .nav>li.active {
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
        margin-top: 20px;
    }

    .has-sub {
        list-style: none !important;
    }
</style>
<!-- LEFT MAIN SIDEBAR -->
<div class="ec-left-sidebar ec-bg-sidebar">
    <div id="sidebar" class="sidebar ec-sidebar-footer">
        <div class="side-header">
            <a href="{{ route('user.dashboard') }}" title="Bahrain Bank">
                <img src="{{ url('/public') }}/{{ Auth::user()->contact_person }}" alt="" style="width: 88%" />
                {{-- <span class="side-header-name text-truncate">UP Hello</span> --}}
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="ec-navigation" data-simplebar>
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <!-- Dashboard -->
                {{-- <li class="{{ Request::is('user/dashboard') ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ route('user.dashboard')}}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text" style="color: #fff !important;">{{ __('lang.dashboard')}} </span>
                    </a>
                  
                </li> --}}
                <?php
                $id = Auth::guard('web')->user()->id;
                // dd($id);
                $option = DB::table('memberoptions')->where('user_id', $id)->latest('updated_at')->first();
                // dd($option);
                ?>
                <li
                    class="has-sub {{ Request::is('user/list', 'user/add-list', 'user/approvedlist', 'user/sub-rejectedlist', 'user/profile') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="javascript:void(0)">
                        <i class="mdi mdi-palette-advanced"></i>
                        <span class="nav-text" style="color: #fff !important;">Company Profile</span>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('user.profile') }}">
                                    <span class="nav-text" style="color:#000;">Basic Details</span>
                                    {{-- <i class="mdi mdi-account-group-outline"></i>
                                          <span class="nav-text">Categories</span> --}}
                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('user.media') }}">
                                    <span class="nav-text" style="color:#000;">Media gallery</span>

                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('user.workinghour') }}">
                                    <span class="nav-text" style="color:#000;">Working Hours</span>

                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @if ($option !== null && $option->management == 1)
                    <li class="has-sub {{ Request::is('user/management', 'user/add-management') ? 'active' : '' }}">
                        <a class="sidenav-item-link" style="color: #fff !important;"
                            href="{{ route('user.management') }}">
                            <i class="mdi mdi-layers"></i>
                            <span class="nav-text" style="color: #fff !important;">Management</span>
                            <b class=""></b>
                        </a>

                    </li>
                @endif
                @if ($option !== null && $option->feature == 1)
                    <li class="has-sub {{ Request::is('user/feature', 'user/add-feature') ? 'active' : '' }}">
                        <a class="sidenav-item-link" style="color: #fff !important;"
                            href="{{ route('user.feature') }}">
                            <i class="mdi mdi-panorama-wide-angle"></i>
                            <span class="nav-text" style="color: #fff !important;">Feature</span>
                            <b class=""></b>
                        </a>

                    </li>
                @endif


                @if ($option !== null && $option->who == 1)
                    <li class="has-sub {{ Request::is('user/who', 'user/add-who') ? 'active' : '' }}">
                        <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('user.who') }}">
                            <i class="mdi mdi-account-group-outline"></i>
                            <span class="nav-text" style="color: #fff !important;">Who's Who Profile</span>
                            <b class=""></b>
                        </a>

                    </li>
                @endif


                @if ($option !== null && $option->product == 1)
                    <li class="has-sub {{ Request::is('user/services', 'user/add-services') ? 'active' : '' }}">
                        <a class="sidenav-item-link" style="color: #fff !important;"
                            href="{{ route('user.services') }}">
                            <i class="mdi mdi-cash"></i>
                            <span class="nav-text" style="color: #fff !important;">Services</span>
                            <b class=""></b>
                        </a>

                    </li>
                @endif
                @if ($option !== null && $option->branch == 1)
                    <li class="has-sub {{ Request::is('user/branch', 'user/add-branch') ? 'active' : '' }}">
                        <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('user.branch') }}">
                            <i class="mdi mdi-crosshairs"></i>
                            <span class="nav-text" style="color: #fff !important;">Branches</span>
                            <b class=""></b>
                        </a>

                    </li>
                @endif


                @if ($option !== null && $option->branch == 1)
                    <li
                        class="has-sub {{ Request::is('user/atm', 'user/add-atm', 'user/edit-atm/*') ? 'active' : '' }}">
                        <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('user.atm') }}">
                            <i class="mdi mdi-desktop-tower"></i>
                            <span class="nav-text" style="color: #fff !important;">ATMS</span>
                            <b class=""></b>
                        </a>

                    </li>
                @endif
                @if ($option !== null && $option->career == 1)
                    <li class="has-sub {{ Request::is('user/career', 'user/add-career') ? 'active' : '' }}">
                        <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('user.carrer') }}">
                            <i class="mdi mdi-library"></i>
                            <span class="nav-text" style="color: #fff !important;">Careers</span>
                            <b class=""></b>
                        </a>

                    </li>
                @endif
                @if ($option !== null && $option->offer == 1)
                    <li class="has-sub {{ Request::is('user/offer', 'user/add-offer') ? 'active' : '' }}">
                        <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('user.offer') }}">
                            <i class="mdi mdi-message-image"></i>
                            <span class="nav-text" style="color: #fff !important;">Offers</span>
                            <b class=""></b>
                        </a>

                    </li>
                @endif
                @if ($option !== null && $option->review == 1)
                    <li class="has-sub {{ Request::is('user/review') ? 'active' : '' }}">
                        <a class="sidenav-item-link" style="color: #fff !important;"
                            href="{{ route('user.review') }}">
                            <i class="mdi mdi-account-star"></i>
                            <span class="nav-text" style="color: #fff !important;">Reviews</span>
                            <b class=""></b>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
