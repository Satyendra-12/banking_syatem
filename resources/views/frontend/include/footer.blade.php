<style>
@media screen and (min-width: 600px) and (max-width: 1024px) {
.footer_menu{
    display: contents;
    
}
}
 @media screen and (min-width: 1441px)  {
.width1{
    width: 280px;
} 
}
 @media screen and (min-width: 600px) and (max-width: 1024px) {
    .padding{
padding-right: 140px
    }
    .gridclass{
        display: grid;
        margin-top: 45px !important;
    }
 }
 @media screen and (max-width: 599px) {
    .well1{
        overflow-x: scroll
    }
    .width1{
        margin-left: 0 !important;
    }
    .display-mobiil{
        display: block
    }
 }
 @media screen and (min-width: 1024px) and (max-width: 1439px) {
  .slide_viewer_right{
    width: 459px;
  }  
  .slide_viewer {
    width: 433px;
}
 
}
 
</style>
<div class="footer" style="border-radius:0px;padding-top: 20px;">
     <div class="container">
        <div class="row">
            <ul class="footer_menu sm-text-center" style="
                                                                 font-size: 20px;
                           ">
                 <li class="col-md-3" style="list-style: none !important;">
                    
                     <ul style="display:grid; place-content: center">
                         <li class="" style="list-style: none !important;">
                             <a href="https://bahrainbanksdirectory.com/" title="BahrainBanksDirectory.com">
                                 <img width="210" height="80" src="{{ asset('assets/Logow.png')}}" alt="BahrainBanksDirectory.com" style="">
                             </a>
                             @php
                             $social = DB::table('socials')->first();
                             @endphp
                             <div itemscope="" itemtype="http://schema.org/WebSite">
                                 <meta itemprop="name" content="BahrainBanksDirectory.com" id="sitename">
                                 <link href="//www.bahrainbanksdirectory.com" itemprop="url" id="sitelink">
                                 <div class=" mt-7" style="display: flex;
                                 justify-content: center;
                                 align-items: center;">
                                     <a class="network-icon contact" href="{{ route('admin.contact')}}" title="Contact Us BahrainBanksDirectory.com">
                                         <i class="fa fa-envelope" style="padding-top: 6px;"></i>
                                     </a>
                                     <a class="network-icon facebook" itemprop="sameAs" href="{{ $social->flink }}" target="_blank" title="BahrainBanksDirectory.com Facebook">
                                         <i class="fa fa-facebook" style="
                                                  padding-top: 8px;
                                                      padding-right: 2px;
                                                     "></i>
                                                                </a>



                                     <a class="network-icon instagram" itemprop="sameAs" href="https://www.instagram.com/bahrainbanksdirectory/" target="_blank" title="BahrainBanksDirectory.com Instagram">
                                         <i class="fa fa-instagram" style="
                                                padding-top: 7px;
                                                          padding-right: 2px;
                                                           "></i>
                                     </a>
                                     <a class="network-icon twitter" itemprop="sameAs" href="{{ $social->tlink }}" target="_blank" title="BahrainBanksDirectory.com Twitter">
                                        <i class="fa fa-twitter" style="padding-top: 8px; padding-left: 1px;"></i>
                                    </a>
                                    
                                 </div>
                             </div>
                         </li>
                     </ul>
                 </li>
                 <li class="col-md-4" style="
                 margin-right: 13px;list-style: none !important;
             "><span id="" class="" style="
    font-size: 30px;
    font-weight: 100;
"> About</span>
                    <div>
                        <?php $about=DB::table('abouts')->first(); ?> 
                        <p style="font-size:15px !important; text-align:justify">                
                       {!! $about->description !!}
                        </p>
                     
                    </div>
                    
                 </li> 
                 <li class="col-md-3 width1" style="
                  list-style: none !important; margin-left: 39px;

             "><span id="link159" class="" style="
    font-size: 29px;font-weight: 100;
">Quick Links</span>
                     <ul style="
                     font-size:18px;
                 ">
                         <li class="" style="list-style: none !important;"><a href="{{ route('admin.index')}}" id="link160">Home</a></li>
                         <li class="" style="list-style: none !important;"><a href="{{ route('admin.feature')}}" id="link161">Featured Members</a>
                         </li>
                         <li class="" style="list-style: none !important;"><a href="{{ route('admin.financial')}}" id="link160">Financial
                                 Institutions</a></li>
                         <li class="" style="list-style: none !important;"><a href="{{ route('admin.support')}}" id="link161">Support Services</a>
                         </li>
                         <li class="" style="list-style: none !important;"><a href="{{ route('admin.profile_who')}}" id="link160">Who's Who
                                 Profile</a></li>
                         <li class="" style="list-style: none !important;"><a href="{{ route('admin.event')}}" id="link161">Articles &amp; Features 
                                 </a></li>
                        <li class="" style="list-style: none !important;"><a href="{{ route('admin.event1')}}" id="link161">Events
                                </a></li>
                     </ul>
                 </li>
                 <ul class="gridclass" style="list-style: none !important;">
                      <div class=" " style="margin-top:46px;">
                         <a href="{{ route('admin.package')}}">
                         <li class="" style="
                          
                         font-size: 18px !important;list-style: none !important;
                     ">Register Now</li></a>
                          <a href="{{ route('admin.package')}}">
                         <li class=" " style="
                         font-size: 18px !important;list-style: none !important;
                     ">Membership plan</li></a>
                         <a href="{{ route('admin.contact')}}">
                             <li class="" style="
                             font-size: 18px !important;list-style: none !important;
                         "> Contact Us</li>
                         </a>
                      </div>
                  
                 </ul>
                </ul>
               


             
         </div>
        
         
          </div>  
          <div style="
          margin-top:16px;
         
          text-align:center;
          ">
           
            <a href="{{ route('admin.package')}}" id="link212" class="btn btn_footer_get_listed btn-lg btn-block bold center sm-block" style="width: 27%; display:inline; font-weight: 100;font-size: large;background-color: rgba(217, 83, 79,0.95);border: 1px solid rgb(217, 83, 79);color: rgb(255, 255, 255)!important;padding: 12px;"> GET LISTED TODAY <i class="fa fa-chevron-right lmargin align-middle hidden-xs" style="
margin-left: 43px;        
                  "></i></a>    
          
         <div class="col-md-12 text-center footer_terms" style="
    font-size: small;padding-top:22px;
">
             © <span>{{now()->year;}}</span><a title="BahrainBanksDirectory.com" href="https://xcrinogroup.com/bahraia/home" style="
    padding-left: 6px;
    padding-right: 12px;
">
                 BahrainBanksDirectory.com </a>
             <span class="display-mobiil">All Rights Reserved.</span>
             <div class="inline-block">
                 <a title="Terms of Use - BahrainBanksDirectory.com" href="{{ route('admin.terms')}}" style="
    padding-left: 3px;
    padding-right: 3px;
">
                     Terms of Use
                 </a>
                 |
                 <a title="Privacy Policy - BahrainBanksDirectory.com" href="{{ route('admin.privacy')}}" style="
    padding-left: 3px;
">
                     Privacy Policy
                 </a>
             </div>
         </div>
     </div>
 </div> 
