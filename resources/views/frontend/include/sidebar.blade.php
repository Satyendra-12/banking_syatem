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
        margin-top:20px;
    }
</style>
<!-- LEFT MAIN SIDEBAR -->
<div class="ec-left-sidebar ec-bg-sidebar">
    <div id="sidebar" class="sidebar ec-sidebar-footer">
        <div class="side-header">
            <a href="{{ route('user.dashboard')}}" title="UP Hello">
                <img src="{{ asset('assets/img/logo/1.png') }}" alt="" />
                {{-- <span class="side-header-name text-truncate">UP Hello</span> --}}
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="ec-navigation" data-simplebar>
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <!-- Dashboard -->
                <li class="{{ Request::is('user/dashboard') ? 'active' : '' }}">
                    <a class="sidenav-item-link" href="{{ route('user.dashboard')}}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text" style="color: #fff !important;">{{ __('lang.dashboard')}} </span>
                    </a>
                    {{-- <hr> --}}
                </li>
                <li class="has-sub {{ Request::is('user/list','user/add-list','user/approvedlist','user/sub-rejectedlist') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="javascript:void(0)">
                        <i class="mdi mdi-palette-advanced"></i>
                        <span class="nav-text" style="color: #fff !important;">Lisiting</span>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('user.listPage') }}">
                                    <span class="nav-text" style="color:#000;">All lisiting</span>
                                    {{-- <i class="mdi mdi-account-group-outline"></i>
                                          <span class="nav-text">Categories</span> --}}
                                </a>
                            </li>
                            {{-- <li class="">
                                <a class="sidenav-item-link" href="{{ route('user.applistPage') }}">
                                    <span class="nav-text" style="color:#000;">Approved</span>
                                   
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="{{ route('user.rejlistPage') }}">
                                    <span class="nav-text" style="color:#000;">Rejected</span>
                                    
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                <li class="has-sub {{ Request::is('user/product','user/add-product') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('user.product') }}">
                        <i class="mdi mdi-folder"></i>
                        <span class="nav-text" style="color: #fff !important;">Product</span>
                        <b></b>
                    </a>
                </li>
                <li class="has-sub {{ Request::is('user/services','user/add-services') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="{{ route('user.services') }}">
                        <i class="mdi mdi-folder"></i>
                        <span class="nav-text" style="color: #fff !important;">Service</span>
                        <b></b>
                    </a>
                </li>
                {{-- <li class="has-sub {{ Request::is('admin/change-password','admin/contact-us','admin/privacy_policies','admin/about-us') ? 'active' : '' }}">
                    <a class="sidenav-item-link" style="color: #fff !important;" href="javascript:void(0)">
                        <i class="mdi mdi-settings"></i>
                        <span class="nav-text"style="color: #fff !important;" >Setting</span>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">

                            <li class="">
                                <a class="sidenav-item-link" style="color:#000;" href="{{ route('admin.changepassword') }}">
                                    <span class="nav-text" style="color:#000;">Change Password</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" style="color:#000;" href="{{ route('contact-us.index') }}">

                                    <span class="nav-text" style="color:#000;">Contact Us</span>
                                    <b></b>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" style="color:#000;" href="{{ route('privacy-policies.index') }}">

                                    <span class="nav-text" style="color:#000;">Privacy & Policy</span>
                                    <b></b>
                                </a>
                            </li><li class="">
                                <a class="sidenav-item-link" style="color:#000;" href="{{ route('about-up.index') }}">

                                    <span class="nav-text" style="color:#000;">About Bahrain Bank</span>
                                    <b></b>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li> --}}
                <!-- Vendors -->
                <li class="has-sub">
                    {{-- <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-account-group-outline"></i>
                        <span class="nav-text">Category</span>
                        <b class="caret"></b>
                    </a> --}}
                    {{-- <div class="collapse">
                        <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">Categories</span>
                                     <i class="mdi mdi-account-group-outline"></i> 
                                          <span class="nav-text">Categories</span> 
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">SubCategories</span>
                                    <i class="mdi mdi-account-group-outline"></i>
                                          <span class="nav-text">Sub Categories</span> 
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                </li>
                {{-- <li class="has-sub">
                    <a class="sidenav-item-link" href="#">
                        <i class="mdi mdi-image-area"></i>
                        <span class="nav-text">Add Slider</span>
                        <b></b>
                    </a>
                </li>
                <li class="has-sub">
                    <a class="sidenav-item-link" href="#">
                        <i class="mdi mdi-image-area"></i>
                        <span class="nav-text">Banner one</span>
                        <b></b>
                    </a>
                </li> --}}
                {{-- <li class="">
                    <a class="sidenav-item-link" href="#">
                         <span class="nav-text">Coupon</span> 
                        <i class="mdi mdi-account-group-outline"></i>
                        <span class="nav-text">Coupon</span>
                    </a>
                </li>
                <li class="">
                    <a class="sidenav-item-link" href="#">
                      <span class="nav-text">Packages</span> 
                        <i class="mdi mdi-account-group-outline"></i>
                        <span class="nav-text">Packages</span>
                    </a>
                </li>
                <li class="has-sub">
                    <a class="sidenav-item-link" href="#">
                        <span class="nav-text">Shorts Video </span> 
                        <i class="mdi mdi-account-group-outline"></i>
                        <span class="nav-text">Shorts Video</span>
                    </a>
                </li>
                <li class="has-sub">
                    <a class="sidenav-item-link" href="#">
                         <span class="nav-text">Shorts Video </span>
                        <i class="mdi mdi-account-group-outline"></i>
                        <span class="nav-text">Favorites Module </span>
                    </a>
                </li> 
                <li class="has-sub">
                    {{-- <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-account-group-outline"></i>
                        <span class="nav-text">Items</span>
                        <b class="caret"></b>
                    </a> --}}
                    <div class="collapse">
                        {{-- <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu"> --}}
                            <li class="">
                                {{-- <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">Item </span>
                                    <i class="mdi mdi-account-group-outline"></i> 
                                          <span class="nav-text">Item</span> 
                                </a> --}}

                            <li class="">
                                {{-- <a class="sidenav-item-link" href="#"> --}}
                                    {{-- <span class="nav-text">Paid Listing Item</span> --}}
                                    {{-- <i class="mdi mdi-account-group-outline"></i>
                                                <span class="nav-text">Item Conditions</span> --}}
                                </a>
                            </li>
                            <li class="">
                                {{-- <a class="sidenav-item-link" href="#"> --}}
                                    {{-- <span class="nav-text">Item Conditions</span> --}}
                                    {{-- <i class="mdi mdi-account-group-outline"></i>
                                              <span class="nav-text">Item Conditions</span> --}}
                                </a>
                            </li>
                            {{-- <li class="">
                                          <a class="sidenav-item-link" href="{{route('admin.registeruser')}}"> <span class="nav-text">User Management</span>
                </a>
          </li> --}}
                        </ul>
                    </div>
                </li>
                {{-- <li class="">
                    <a class="sidenav-item-link" href="#">
                        <span class="nav-text">Blog</span>
                        <i class="mdi mdi-account-group-outline"></i>
                        <span class="nav-text">Blog</span>
                    </a>
                </li>
                <li class="">
                    <a class="sidenav-item-link" href="#">
                        <span class="nav-text">Blog</span>
                        <i class="mdi mdi-account-group-outline"></i>
                        <span class="nav-text">Get Review</span>
                    </a>
                </li> --}}
                <li class="has-sub">
                    {{-- <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-account-group-outline"></i>
                        <span class="nav-text">Setting</span>
                        <b class="caret"></b>
                    </a> --}}
                    <div class="collapse">
                        <ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
                            {{-- <li class="">
                                          <a class="sidenav-item-link" href="vendor-list.html">
                                              <span class="nav-text">Location Townships</span>
                                          </a>
                                      </li> --}}
                            {{-- <li class="">
                                          <a class="sidenav-item-link" href="{{route('admin.pricepage')}}"> <span class="nav-text">Item Price</span>
            </a>
      </li>
      <li class="">
        <a class="sidenav-item-link" href="{{route('admin.itemtype')}}">
          <span class="nav-text">Item Type</span>
        </a>
      </li> --}}
                            {{-- <li class="">
                                <a class="sidenav-item-link" href="{{ route('admin.locationpage') }}">
                                    <span class="nav-text">Location</span>
                                </a>
                            </li> --}}
                            {{-- <li class="">
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">Change Password</span>
                                </a>
                            </li> --}}
                            {{-- <li class="">
                                <a class="sidenav-item-link" href="{{ route('admin.registeruser') }}"> <span
                                        class="nav-text">User Management</span>
                                </a>
                            </li> --}}
                        {{-- </ul> --}}
                    {{-- </div> --}}
                {{-- </li> --}}
                {{-- <li class="has-sub">
                    <a class="sidenav-item-link" href="#">
                        <i class="mdi mdi-palette-advanced"></i>
                        <span class="nav-text">User Management</span>
                        <b class=""></b>
                    </a>
                    <div class="collapse">
                                  <ul class="sub-menu" id="products" data-parent="#sidebar-menu">
                                      <li class="">
                                          <a class="sidenav-item-link" href="product-add.html">
                                              <span class="nav-text">Add Product</span>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a class="sidenav-item-link" href="product-list.html">
                                              <span class="nav-text">List Product</span>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a class="sidenav-item-link" href="product-grid.html">
                                              <span class="nav-text">Grid Product</span>
                                          </a>
                                      </li>
                                      <li class="">
                                          <a class="sidenav-item-link" href="product-detail.html">
                                              <span class="nav-text">Product Detail</span>
                                          </a>
                                      </li>
                                  </ul>
                              </div>
                </li> --}}
                {{-- <li class="has-sub">
                    <a class="sidenav-item-link" href="#">
                        <i class="mdi mdi-palette-advanced"></i>
                        <span class="nav-text">Sold Item</span>
                        <b></b>
                    </a>
                </li> --}}
                <!-- Users -->

                {{-- <li class="has-sub">
                    <a class="sidenav-item-link" href="#">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">Boost Requests</span>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="users" data-parent="#sidebar-menu">
                            <li>
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">Pending Request</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">Approved Requests</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="#">
                                    <span class="nav-text">Rejected Request</span>
                                </a>
                            </li>
                            <li class="">
                                          <a class="sidenav-item-link" href="user-profile.html">
                                              <span class="nav-text">Disable item</span>
                                          </a>
                                      </li>
                        </ul>
                    </div>
                    <hr>
                </li> --}}
                {{-- <li class="has-sub">
                    <a class="sidenav-item-link" href="#">
                        <i class="mdi mdi-palette-advanced"></i>
                        <span class="nav-text">Contact Message</span>
                        <b></b>
                    </a>
                </li> --}}
                <!-- Category -->
                {{-- <li class="has-sub">
                                  <a class="sidenav-item-link" href="javascript:void(0)">
                                      <i class="mdi mdi-dns-outline"></i>
                                      <span class="nav-text">Report</span>
                                      <b class="caret"></b>
                                  </a>
                                  <div class="collapse">
                                      <ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
                                          <li class="">
                                              <a class="sidenav-item-link" href="main-category.html">
                                                  <span class="nav-text">Main Category</span>
                                              </a>
                                          </li>
                                          <li class="">
                                              <a class="sidenav-item-link" href="sub-category.html">
                                                  <span class="nav-text">Sub Category</span>
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                              </li> --}}
                <!-- Products -->
                {{-- <li class="has-sub">
                                  <a class="sidenav-item-link" href="javascript:void(0)">
                                      <i class="mdi mdi-palette-advanced"></i>
                                      <span class="nav-text">User Management</span>
                                      <b class="caret"></b>
                                  </a>
                                  <div class="collapse">
                                      <ul class="sub-menu" id="products" data-parent="#sidebar-menu">
                                          <li class="">
                                              <a class="sidenav-item-link" href="product-add.html">
                                                  <span class="nav-text">Add Product</span>
                                              </a>
                                          </li>
                                          <li class="">
                                              <a class="sidenav-item-link" href="product-list.html">
                                                  <span class="nav-text">List Product</span>
                                              </a>
                                          </li>
                                          <li class="">
                                              <a class="sidenav-item-link" href="product-grid.html">
                                                  <span class="nav-text">Grid Product</span>
                                              </a>
                                          </li>
                                          <li class="">
                                              <a class="sidenav-item-link" href="product-detail.html">
                                                  <span class="nav-text">Product Detail</span>
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                              </li> --}}
                <!-- Orders -->
                {{-- <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)">
                        <i class="mdi mdi-cart"></i>
                        <span class="nav-text">Miscellaneous</span>
                        <b class="caret"></b>
                    </a>
                    <div class="collapse">
                        <ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
                            <li class="">
                                <a class="sidenav-item-link" href="new-order.html">
                                    <span class="nav-text">New Order</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="order-history.html">
                                    <span class="nav-text">Order History</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="order-detail.html">
                                    <span class="nav-text">Order Detail</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="sidenav-item-link" href="invoice.html">
                                    <span class="nav-text">Invoice</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <!-- Setting -->
                {{-- <li>
                                  <a class="sidenav-item-link" href="review-list.html">
                                      <i class="mdi mdi-star-half"></i>
                                      <span class="nav-text">Setting</span>
                                  </a>
                              </li> --}}
                {{-- <!-- Brands -->
                              <li>
                                  <a class="sidenav-item-link" href="brand-list.html">
                                      <i class="mdi mdi-tag-faces"></i>
                                      <span class="nav-text">Brands</span>
                                  </a>
                                  <hr>
                                  </li>
                                  <!-- Authentication -->
                                  <li class="has-sub">
                                      <a class="sidenav-item-link" href="javascript:void(0)">
                                          <i class="mdi mdi-login"></i>
                                          <span class="nav-text">Authentication</span>
                                          <b class="caret"></b>
                                      </a>
                                      <div class="collapse">
                                          <ul class="sub-menu" id="authentication" data-parent="#sidebar-menu">
                                              <li class="">
                                                  <a href="sign-in.html">
                                                      <span class="nav-text">Sign In</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a href="sign-up.html">
                                                      <span class="nav-text">Sign Up</span>
                                                  </a>
                                              </li>
                                          </ul>
                                      </div>
                                  </li>
                                  <!-- Icons -->
                                  <li class="has-sub">
                                      <a class="sidenav-item-link" href="javascript:void(0)">
                                          <i class="mdi mdi-diamond-stone"></i>
                                          <span class="nav-text">Icons</span>
                                          <b class="caret"></b>
                                      </a>
                                      <div class="collapse">
                                          <ul class="sub-menu" id="icons" data-parent="#sidebar-menu">
                                              <li class="">
                                                  <a class="sidenav-item-link" href="material-icon.html">
                                                      <span class="nav-text">Material Icon</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a class="sidenav-item-link" href="font-awsome-icons.html">
                                                      <span class="nav-text">Font Awsome Icon</span>
                                                  </a>
                                              </li>
                                              <li class="">
                                                  <a class="sidenav-item-link" href="flag-icon.html">
                                                      <span class="nav-text">Flag Icon</span>
                                                  </a>
                                              </li>
                                          </ul>
                                      </div>
                                  </li>
                                  <!-- Other Pages -->
                                  <li class="has-sub">
                                      <a class="sidenav-item-link" href="javascript:void(0)">
                                          <i class="mdi mdi-image-filter-none"></i>
                                          <span class="nav-text">Other Pages</span>
                                          <b class="caret"></b>
                                      </a>
                                      <div class="collapse">
                                          <ul class="sub-menu" id="otherpages" data-parent="#sidebar-menu">
                                              <li class="has-sub">
                                                  <a href="404.html">404 Page</a>
                                              </li>
                                          </ul>
                                      </div>
                                  </li> --}}
            </ul>
        </div>
    </div>
</div>
