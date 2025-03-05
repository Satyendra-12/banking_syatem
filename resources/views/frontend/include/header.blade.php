 <style>
     @media screen and (max-width: 599px) {
         .widthmobile {
             width: 80%;
         }

         .search-mobile {
             width: 95vw !important;
         }

         .mobile-center {
             display: grid;
             place-content: center;
         }
         .rpad{
    padding-left: 100px;
}
.rwhatapp{
    margin-left: -71px;
}
.next-line-phone{
    display: block
}
     }



     @media screen and (min-width: 1440px) {
         .flexheader {
             display: flex;
             justify-content: space-between;
             align-items: center
         }

         .vpad {
             padding-top: 0px;
         }

     }

     @media screen and (min-width: 1024px) {
         .marginBottom {
             margin-bottom: 15px;
         }
     }
 </style>
 <style>
     @media screen and (min-width: 600px) and (max-width: 1024px) {
         .flexheader {
             display: flex !important;
             justify-content: space-between;
             align-items: center
         }

         .vpad {
             padding-top: 0px;
         }
.rpad{
    padding-left: 55px
}

     }
 </style>
 <?php $admin = DB::table('admins')->first(); ?>
 <div class="header" style="
    background: white;margin-top:10px !important;
">
     <div class="container-fluid">
         <div class=" d-md-flex mobile-center justify-content-between" style="display: grid;">
             <div id="website_logo"
                 class=" section1 tpad xs-nopad xs-hpad sm-text-center xs-bmargin header-left-container">
                 <a style="text-align: -webkit-center;" href="{{ route('admin.index') }}"
                     title="BahrainBanksDirectory.com">
                     <img class="marginBottom" width="300" src="{{ asset($admin->image) }}"
                         alt="BahrainBanksDirectory.com"
                         style="
                    height: 79px !important;
                    width:210px !important;
                ">
                 </a>
                 <div class="clearfix"></div>
             </div>

             <div class="section2 ">
                 <div class="col-lg-7 col-md-5 col-sm-6 col-xs-6 text-center search-mobile noPaddingRight"
                     style="width:50vw">
                     {{-- <form class="example" style="margin:auto;" onkeyup="myFunction()">
                        <input class="widthmobile" type="text" placeholder="Search Name Or Keyword" id="myInput"
                            style="
                    border-radius: 0px;
                ">

                        <button class="b1" type="submit"
                            style="
                    border-radius: 0px;
                    padding: 14.7px;
                    float: left;
                        width: 20%;
                        background: rgb(5, 73, 142);
                        color: white;
                        font-size: 17px;
                        border: 1px solid grey;
                        border-left: none;
                        cursor: pointer;
                        height:47px;
                "><i
                                class="fa fa-search"></i></button>
                    </form> --}}




                     <form action="{{ route('admin.feature') }}" class="example" style="margin:auto;">
                         <div class="input-group">
                             <input type="text" placeholder="search for banks" name="search"
                                 value="{{ Request::get('search') }}" class="widthmobile">

                             <button class="b1" type="submit"
                                 style="
border-radius: 0px;
padding: 14.7px;
float: left;
width: 20%;
background: rgb(5, 73, 142);
color: white;
font-size: 17px;
border: 1px solid grey;
border-left: none;
cursor: pointer;
height:47px;
"><i
                                     class="fa fa-search"></i></button>
                         </div>
                     </form>













                     <div id="searchResults"></div>

                     <div class="rwhatapp" style="
                    margin-top: 0.5rem;
                ">
                         <a href="#" id="link208" class="rpad bmargin rpad"
                             style="
                    color: rgb(5, 73, 142);
                    font-weight: 600;
                    font-size: 17px;
                    display:flow;
                ">Need
                             Help ? Call Or WhatsApp:<span class="next-line-phone"> {{ $admin->phone }}</span></a>
                     </div>
                 </div>
             </div>

             <div class=" section3 text-right sm-text-center header-right-container nolpad xs-hpad">
                 <ul class="mini-nav nobmargin list-inline xs-nopad xs-tmargin vpad"
                     style="
                padding-bottom: 6px;
            "
                     style="display: grid;place-items: center">

                     <li class="bmargin"><a href="{{ route('user.userloginpage') }}"><button
                                 style="background: aliceblue;padding-left: 10px;font-weight: 400;type=;color: black;font-size: small;margin-top: 7px;border: none;border-radius: 20px;"
                                 type="button" class="btn btn-primary btn-sm">Member Login</button></a></li>

                     <li>

                         @php
                             $social = DB::table('socials')->first();
                         @endphp
                         <div class="list-social-links">

                             <a class="network-icon facebook" itemprop="sameAs" href="{{ $social->flink }}"
                                 target="_blank" title="BahrainBanksDirectory.com Facebook" style="margin-top: -7px;">
                                 <i class="fa fa-facebook" style="padding-top: 4px;"></i>
                             </a>
                             <a class="network-icon twitter" itemprop="sameAs" href="{{ $social->tlink }}"
                                 target="_blank" title="BahrainBanksDirectory.com Twitter" style="margin-top: -7px;">
                                 <!-- Adjust margin-left as needed -->
                                 <i class="fa fa-twitter" style="padding-top: 4px;"></i> <!-- Twitter Icon -->
                             </a>

                             <a class="network-icon instagram" itemprop="sameAs"
                                 href="https://www.instagram.com/bahrainbanksdirectory/" target="_blank"
                                 title="BahrainBanksDirectory.com Instagram" style="margin-top: -7px;">
                                 <i class="fa fa-instagram" style="padding-top: 4px;"></i>
                             </a>

                             <a class="network-icon facebook" itemprop="sameAs" href="{{ $social->llink }}"
                                 target="_blank" title="BahrainBanksDirectory.com Facebook" style="margin-top: -7px;">
                                 <i class="fa fa-linkedin" style="padding-top: 4px;" aria-hidden="true"></i>

                             </a>
                             <div class="clearfix"></div>
                         </div>
                     </li>

                 </ul>
                 <div class="clearfix"></div>
                 <div class="new" style="display:flex; gap:5px;font-size:5px; flex-direction: row-reverse; justify-content: center">

                     <li class="bmargin norpad" style="list-style: none !important;"><a
                             href="{{ route('admin.package') }}" id="link210" class="btn btn_get_listed bold"
                             style="
                  background: rgb(217,83,79) !important; width:fit-content; font-size:11px;
                   ">GET
                             LISTED TODAY
                         </a></li>
                     <li class="bmargin norpad" style="list-style: none !important; "><a href="https://heyzine.com/flip-book/57a430ca81.html" id="link210"
                             style="font-size:11px;" class="btn btn_get_listed">LATEST PRINT VERSION
                         </a></li>
                 </div>

             </div>
         </div>
     </div>
     <style>
         li.active {
             background: white !important;
             border-top: 2px solid #2e36e3;
             border-left: 2px solid #2e36e3;
             border-right: 1px solid #2e36e3;
             border-bottom: 2px solid #2e36e3;


             a {
                 font-size: 13px;
                 color: blue !important;
                 font-weight: bolder;
                 background: white !important;
                 border-radius: 0px;
             }
         }

         .list {
             display: flex;
             /* justify-content: space-around; */
             align-content: center;
             margin-left: 42px;

         }

         .navbarnew>ul>li>a {
             color: white;
             /* padding:18px 20px; */
         }

         @media screen and (min-width: 786px) and (max-width: 1024px) {
             .content {
                 background-color: rgb(5, 73, 142);
                 min-height: 40px !important;
                 padding: 0px;
                 border-radius: 0px;
             }

             .navbarnew ul.list li {
                 border-radius: 0px;
                 border-right: 1px solid white;
                 border-left: 1px solid white;
                 padding: 11px !important;
                 list-style: none !important;

             }

             .navbarnew>ul>li>a {
                 color: white;
                 font-size: 10px !important;
             }
         }

         @media screen and (min-width: 601px) and (max-width: 786px) {
             .content {
                 min-height: 28px !important;
             }

             .navbarnew>ul>li>a {
                 color: white;
                 font-size: 9px !important;
                 font-weight: 600;
             }

             .navbarnew ul.list li {
                 padding: 5px !important;
                 list-style: none !important;
             }
         }

         @media screen and (max-width:600px) {
             .list {
                 display: none;
             }

             .mobile-menu {
                 display: block;
             }

             li>a {
                 color: white;
                 font-size: 18px;
             }

             .menu-content {
                 text-align: center;
                 background-color: rgb(5, 73, 142);
                 border-radius: 0px;

             }

             .menu-content>li {
                 padding: 15px;
             }

             hr {
                 margin: 8px 19px;
                 color: inherit;
                 border: 0;
                 border-top: solid white;
                 opacity: 1;
                 width: 36px;
             }

             .content {
                 display: none;
             }
         }

         ul {
             margin-bottom: 0px !important;
         }

         @media screen and (min-width:601px) {
             .mobile-menu {
                 display: none;
             }
         }

         .mobile-menu-content {
             width: 100vw;
             display: grid;
             place-content: center;
         }

         .activemenu {

             display: block !important;


         }

         .navbarnew>ul>li>a {
             color: white;
             font-size: 15px;
         }

         .navbarnew ul.list li {
             border-radius: 0px;
             border-right: 1px solid white;
             border-left: 1px solid white;
             padding: 15px;
             list-style: none !important;
         }

         .content {
             background-color: rgb(5, 73, 142);
             min-height: 55px;
             padding: 0px;
             border-radius: 0px;
         }

         .navbarnew {
             display: flex;
             align-items: center;
             justify-content: center;
         }

         @media screen and (min-width: 600px) and (max-width: 1024px) {
             .navbarnew1 .list {
                 margin-left: -10px !important;
             }
         }

         @media screen and (min-width: 1025px) and (max-width: 1439px) {
             .navbarnew ul.list li {
                 padding-left: 4px !important;
                 padding-right: 4px !important;
             }

         }
     </style>
     <div class="container-fluid content">
         <div class="navbarnew navbarnew1 my-auto">
             <ul class="list " style="display:flex;justify-content:center;align-items:center;">
                 <li class="{{ Request::is('home') ? 'active' : '' }}">
                     <a style="padding-top: 2px;" class="" href="{{ route('admin.index') }}">HOME</a>
                 </li>
                 <li class="{{ Request::is('feature-member') ? 'active' : '' }}">
                     <a style="padding-top: 2px;" href="{{ route('admin.feature') }}">FEATURED MEMBERS</a>
                 </li>
                 <li class="{{ Request::is('financial-services', 'financial-services-support/*') ? 'active' : '' }}">
                     <a style="padding-top: 2px;" href="{{ route('admin.financial') }}">FINANCIAL INSTITUTIONS</a>
                 </li>
                 <li class="{{ Request::is('support-services', 'support/*') ? 'active' : '' }}">
                     <a style="padding-top: 2px;" href="{{ route('admin.support') }}">SUPPORT SERVICES</a>
                 </li>
                 <li class="{{ Request::is('whos-who','whous/profile/*', 'who-profile') ? 'active' : '' }}">
                     <a style="padding-top: 2px;" href="{{ route('admin.profile_who') }}">WHO'S WHO</a>
                 </li>
                 <li class="{{ Request::is('articles-features','articles-features/*', 'news-event') ? 'active' : '' }}">
                     <a style="padding-top: 2px;"href="{{ route('admin.event') }}">ARTICLES & FEATURES</a>
                 </li>
                 <li class="{{ Request::is('events','events/*', 'news-allevent') ? 'active' : '' }}">
                     <a style="padding-top: 2px;" href="{{ route('admin.event1') }}">EVENTS</a>
                 </li>
                 <li class="{{ Request::is('membership-plan') ? 'active' : '' }}">
                     <a style="padding-top: 2px;" href="{{ route('admin.package') }}">MEMBERSHIP PLAN</a>
                 </li>
                 <li class="{{ Request::is('contact-us') ? 'active' : '' }}">
                     <a style="padding-top: 2px;"href="{{ route('admin.contact') }}">CONTACT US</a>
                 </li>
             </ul>
         </div>
     </div>
     <div class="mobile-menu">
         <div class="handleClick" style="background-color: rgb(5, 73, 142);padding:2px;border-radius:0px;">
             <hr />
             <hr />
             <hr />
         </div>
         <div class="menu-content" style="list-style: none; display:none">
             <li class="{{ Request::is('home') ? 'active' : '' }} ">
                 <a class="" href="{{ route('admin.index') }}">HOME</a>
             </li>
             <li class="{{ Request::is('feature-member') ? 'active' : '' }}">
                 <a href="{{ route('admin.feature') }}">FEATURED MEMBERS</a>
             </li>
             <li class="{{ Request::is('financial-services', 'financial-services-support/*') ? 'active' : '' }}">
                 <a href="{{ route('admin.financial') }}">FINANCIAL INSTITUTIONS</a>
             </li>
             <li class="{{ Request::is('support-services', 'support/*') ? 'active' : '' }}">
                 <a href="{{ route('admin.support') }}">SUPPORT SERVICES</a>
             </li>
             <li class="{{ Request::is('whos-who','whous/profile/*', 'who-profile') ? 'active' : '' }}">
                 <a href="{{ route('admin.profile_who') }}">WHO'S WHO</a>
             </li>
             <li class="{{ Request::is('articles-features','articles-features/*','news-event') ? 'active' : '' }}">
                 <a href="{{ route('admin.event') }}">ARTICLES & FEATURES</a>
             </li>
             <li class="{{ Request::is('events','events/*', 'news-allevent') ? 'active' : '' }}">
                 <a href="{{ route('admin.event1') }}">EVENTS</a>
             </li>
             <li class="{{ Request::is('membership-plan') ? 'active' : '' }}">
                 <a href="{{ route('admin.package') }}">MEMBERSHIP PLAN</a>
             </li>
             <li class="{{ Request::is('contact-us') ? 'active' : '' }}">
                 <a href="{{ route('admin.contact') }}">CONTACT US</a>
             </li>
         </div>
     </div>
     <script>
         const handleClick = document.querySelector('.handleClick');

         handleClick.addEventListener('click', function() {
             const menucontent = document.querySelector('.menu-content');

             menucontent.classList.toggle('activemenu');
         });
     </script>

 </div>













 