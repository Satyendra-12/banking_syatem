<?php
use Illuminate\Http\Request;


use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\RBannerController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\WhoController;
use App\Http\Controllers\Admin\ListController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ManagePostController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PurposeController;
use App\Http\Controllers\Admin\PaymentContoller;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PlansController;
use App\Http\Controllers\Admin\BottomSliderController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\UsermanagementController;
// use App\Models\ContactUs;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [AuthController::class, 'loginPage'])->name('admin.loginpage');
Route::post('/login', [AuthController::class, 'loginSubmit'])->name('admin.loginsubmit');



Route::group(['middleware' => 'admin'], function () {

    // dashboard route

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/dashboard-ajax-list', [DashboardController::class, 'dashboardAjaxList'])->name('admin.dashboardajaxlist');
    // Route::post('/dashboard-ajax-list',[DashboardController::class,'dashboardAjaxList'])->name('admin.dashboardajaxlist');
    Route::get('/change-password', [DashboardController::class, 'changePassword'])->name('admin.changepassword');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('admin.profile');
    Route::get('/design', [DashboardController::class, 'design'])->name('admin.design');
    Route::get('/domain', [DashboardController::class, 'domain'])->name('admin.domain');
    Route::get('/admin-accounts', [DashboardController::class, 'admin_accounts'])->name('admin.accounts');
    Route::get('/text', [DashboardController::class, 'text'])->name('admin.text');
    Route::get('/advanceSettings', [DashboardController::class, 'advance'])->name('admin.advance');
    Route::post('/change-profile', [DashboardController::class, 'changeProfile'])->name('admin.changeProfile');
    Route::post('/reset-password', [DashboardController::class, 'resetPasword'])->name('admin.resetpasword');
    Route::get('/log-out', [AuthController::class, 'logout'])->name('admin.logout');


    //payment route
    Route::get('/payment', [PaymentContoller::class, 'payment'])->name('admin.payment');
    
    Route::get('/developer', [PaymentContoller::class, 'deve'])->name('admin.developer');
    

    

    //categories route
    Route::get('/categories', [CategoriesController::class, 'categoriesPage'])->name('admin.categoriesPage');
    Route::get('/add-category', [CategoriesController::class, 'addCategories'])->name('admin.addcategories');
    Route::post('/save-category', [CategoriesController::class, 'saveCategory'])->name('admin.saveCategory');
    Route::get('/edit-category/{id}', [CategoriesController::class, 'editCategory'])->name('admin.editCategory');
    Route::post('/update-category', [CategoriesController::class, 'updateCategory'])->name('admin.updatecategory');
    Route::post('/delete-categroy', [CategoriesController::class, 'deleteCategroy'])->name('admin.deletecategroy');
    Route::post('category-ajax-list', [CategoriesController::class, 'categoryAjaxList'])->name('admin.categoryajaxlist');
    Route::post('category-changestatus',[CategoriesController::class,'category_changestatus'])->name('admin.category.change.status');
    Route::post('change_manu_status',[CategoriesController::class,'change_manu_status'])->name('admin.category.change.manu_status');

    Route::get('/who', [WhoController::class, 'whoPage'])->name('admin.whoPage');
    Route::get('/add-who', [WhoController::class, 'addwho'])->name('admin.addwho');
    Route::post('/save-who', [WhoController::class, 'savewho'])->name('admin.savewho');
    Route::get('/edit-who/{id}', [WhoController::class, 'editwho'])->name('admin.editwho');
    Route::post('/update-who', [WhoController::class, 'updatewho'])->name('admin.updatewho');
    Route::post('/delete-who', [WhoController::class, 'deletewho'])->name('admin.deletewho');
    Route::post('who-ajax-list', [WhoController::class, 'whoAjaxList'])->name('admin.whoajaxlist');
    Route::post('who-changestatus',[WhoController::class,'who_changestatus'])->name('admin.who.change.status');

    //list route
    Route::get('/list', [ListController::class, 'listPage'])->name('admin.listPage');
    Route::get('/approvedlist', [ListController::class, 'listPage'])->name('admin.applistPage');
    Route::get('/rejectedlist', [ListController::class, 'listPage'])->name('admin.rejlistPage');
    Route::get('/add-list', [ListController::class, 'addlist'])->name('admin.addlist');
    Route::post('/save-list', [ListController::class, 'savelist'])->name('admin.savelist');
    Route::get('/edit-list/{id}', [ListController::class, 'editlist'])->name('admin.editlist');
    Route::post('/update-list', [ListController::class, 'updatelist'])->name('admin.updatelist');
    Route::post('/delete-list', [ListController::class, 'deletelist'])->name('admin.deletelist');
    Route::post('list-ajax-list', [ListController::class, 'listAjaxList'])->name('admin.listajaxlist');
    Route::post('/model-onchange', [ListController::class, 'modelOnchange'])->name('admin.modelonchange');
    Route::post('list-changestatus',[ListController::class,'list_changestatus'])->name('admin.list.change.status');
    Route::post('change_manu_status',[ListController::class,'change_manu_status'])->name('admin.list.change.manu_status');
    // Route::post('/onchange-select-state', [ListController::class, 'getDistrict'])->name('onchangeselectstate.data');
    // Route::post('/onchange-select-district', [ListController::class, 'getCity'])->name('onchangeselectdistrict.data');

     //page route
     Route::get('/page', [PageController::class, 'pagePage'])->name('admin.pagepage');
     Route::get('/add-page', [PageController::class, 'addpage'])->name('admin.addpage');
     Route::post('/save-page', [PageController::class, 'savepage'])->name('admin.savepage');
     Route::get('/edit-page/{id}', [PageController::class, 'editpage'])->name('admin.editpage');
     Route::post('/update-page', [PageController::class, 'updatepage'])->name('admin.updatepage');
     Route::post('/delete-page', [PageController::class, 'deletepage'])->name('admin.deletepage');
     Route::post('page-ajax-list', [PageController::class, 'pageAjaxList'])->name('admin.pageajaxlist');
     Route::post('page-changestatus',[PageController::class,'page_changestatus'])->name('admin.page.change.status');


     //post route
     Route::get('/post', [PageController::class, 'postpage'])->name('admin.postpage');
     Route::get('/add-post', [PageController::class, 'addpost'])->name('admin.addpost');
     Route::post('/save-post', [PageController::class, 'savepost'])->name('admin.savepost');
     Route::get('/edit-post/{id}', [PageController::class, 'editpost'])->name('admin.editpost');
     Route::post('/update-post', [PageController::class, 'updatepost'])->name('admin.updatepost');
     Route::post('/delete-post', [PageController::class, 'deletepost'])->name('admin.deletepost');
     Route::post('post-ajax-list', [PageController::class, 'postAjaxList'])->name('admin.postajaxlist');
     Route::post('post-changestatus',[PageController::class,'post_changestatus'])->name('admin.post.change.status');

      //menu route
      Route::get('/menu', [MenuController::class, 'menuPage'])->name('admin.menupage');
      Route::get('/add-menu', [MenuController::class, 'addmenu'])->name('admin.addmenu');
      Route::post('/save-menu', [MenuController::class, 'savemenu'])->name('admin.savemenu');
      Route::get('/edit-menu/{id}', [MenuController::class, 'editmenu'])->name('admin.editmenu');
      Route::post('/update-menu', [MenuController::class, 'updatemenu'])->name('admin.updatemenu');
      Route::post('/delete-menu', [MenuController::class, 'deletemenu'])->name('admin.deletemenu');
      Route::post('menu-ajax-list', [MenuController::class, 'menuAjaxList'])->name('admin.menuajaxlist');
      Route::post('menu-changestatus',[MenuController::class,'menu_changestatus'])->name('admin.menu.change.status');

       //purpose route
       Route::get('/purpose', [PurposeController::class, 'purposePage'])->name('admin.purposepage');
       Route::get('/add-purpose', [PurposeController::class, 'addpurpose'])->name('admin.addpurpose');
       Route::post('/save-purpose', [PurposeController::class, 'savepurpose'])->name('admin.savepurpose');
       Route::get('/edit-purpose/{id}', [PurposeController::class, 'editpurpose'])->name('admin.editpurpose');
       Route::post('/update-purpose', [PurposeController::class, 'updatepurpose'])->name('admin.updatepurpose');
       Route::post('/delete-purpose', [PurposeController::class, 'deletepurpose'])->name('admin.deletepurpose');
       Route::post('purpose-ajax-list', [PurposeController::class, 'purposeAjaxList'])->name('admin.purposeajaxlist');
       Route::post('purpose-changestatus',[PurposeController::class,'purpose_changestatus'])->name('admin.purpose.change.status');


      //social route
      Route::get('/social', [SocialController::class, 'socialPage'])->name('admin.socialpage');
      Route::get('/add-social', [SocialController::class, 'addsocial'])->name('admin.addsocial');
      Route::post('/save-social', [SocialController::class, 'savesocial'])->name('admin.savesocial');
      Route::get('/edit-social/{id}', [SocialController::class, 'editsocial'])->name('admin.editsocial');
      Route::post('/update-social', [SocialController::class, 'updatesocial'])->name('admin.updatesocial');
      Route::post('/delete-social', [SocialController::class, 'deletesocial'])->name('admin.deletesocial');
      Route::post('social-ajax-list', [SocialController::class, 'socialAjaxList'])->name('admin.socialajaxlist');
      Route::post('social-changestatus',[SocialController::class,'social_changestatus'])->name('admin.social.change.status');

      //ad route
      Route::get('/ad', [AdController::class, 'adPage'])->name('admin.adpage');
      Route::get('/add-ad', [AdController::class, 'addad'])->name('admin.addad');
      Route::post('/save-ad', [AdController::class, 'savead'])->name('admin.savead');
      Route::get('/edit-ad/{id}', [AdController::class, 'editad'])->name('admin.editad');
      Route::post('/update-ad', [AdController::class, 'updatead'])->name('admin.updatead');
      Route::post('/delete-ad', [AdController::class, 'deletead'])->name('admin.deletead');
      Route::post('ad-ajax-list', [AdController::class, 'adAjaxList'])->name('admin.adajaxlist');
      Route::post('ad-changestatus',[AdController::class,'ad_changestatus'])->name('admin.ad.change.status');

      //articles route
      Route::get('/articles', [ArticlesController::class, 'articlesPage'])->name('admin.articlespage');
      Route::get('/add-articles', [ArticlesController::class, 'addarticles'])->name('admin.addarticles');
      Route::post('/save-articles', [ArticlesController::class, 'savearticles'])->name('admin.savearticles');
      Route::get('/edit-articles/{id}', [ArticlesController::class, 'editarticles'])->name('admin.editarticles');
      Route::post('/update-articles', [ArticlesController::class, 'updatearticles'])->name('admin.updatearticles');
      Route::post('/delete-articles', [ArticlesController::class, 'deletearticles'])->name('admin.deletearticles');
      Route::post('articles-ajax-list', [ArticlesController::class, 'articlesAjaxList'])->name('admin.articlesajaxlist');
      Route::post('articles-changestatus',[ArticlesController::class,'articles_changestatus'])->name('admin.articles.change.status');


      //news route
      Route::get('/news', [NewsController::class, 'newsPage'])->name('admin.newspage');
      Route::get('/add-news', [NewsController::class, 'addnews'])->name('admin.addnews');
      Route::post('/save-news', [NewsController::class, 'savenews'])->name('admin.savenews');
      Route::get('/edit-news/{id}', [NewsController::class, 'editnews'])->name('admin.editnews');
      Route::post('/update-news', [NewsController::class, 'updatenews'])->name('admin.updatenews');
      Route::post('/delete-news', [NewsController::class, 'deletenews'])->name('admin.deletenews');
      Route::post('news-ajax-list', [NewsController::class, 'newsAjaxList'])->name('admin.newsajaxlist');
      Route::post('news-changestatus',[NewsController::class,'news_changestatus'])->name('admin.news.change.status');

       //member route
       Route::get('/member', [MemberController::class, 'memberPage'])->name('admin.memberpage');
       Route::get('/add-member', [MemberController::class, 'addmember'])->name('admin.addmember');
       Route::post('/save-member', [MemberController::class, 'savemember'])->name('admin.savemember');
       Route::get('/edit-member/{id}', [MemberController::class, 'editmember'])->name('admin.editmember');
       Route::post('/update-member', [MemberController::class, 'updatemember'])->name('admin.updatemember');
       Route::post('/delete-member', [MemberController::class, 'deletemember'])->name('admin.deletemember');
       Route::post('member-ajax-list', [MemberController::class, 'memberAjaxList'])->name('admin.memberajaxlist');
       Route::post('member-changestatus',[MemberController::class,'member_changestatus'])->name('admin.member.change.status');

    //sub categories route
    Route::get('/banking-sub-category', [SubcategoryController::class, 'subCategory'])->name('admin.subCategory');
    Route::get('/ancillary-sub-category', [SubcategoryController::class, 'subCategory1'])->name('admin.subCategory1');
    Route::get('/support-sub-category', [SubcategoryController::class, 'subCategory2'])->name('admin.subCategory2');
    Route::get('/add-sub-category', [SubcategoryController::class, 'addSubcategory'])->name('admin.addCategory');
    Route::post('/save-sub-category', [SubcategoryController::class, 'saveSubcategory'])->name('admin.savesubcategory');
    Route::post('/banking-subcategory-ajax', [SubcategoryController::class, 'subCategoryAjax'])->name('admin.dataTableajax');
    Route::post('/ancillary-subcategory-ajax', [SubcategoryController::class, 'subCategoryAjax1'])->name('admin.dataTableajax1');
    Route::post('/support-subcategory-ajax', [SubcategoryController::class, 'subCategoryAjax2'])->name('admin.dataTableajax2');
    Route::get('/subcategory-edit/{id}', [SubcategoryController::class, 'editSubcategroy'])->name('admin.editsubcategroy');
    Route::post('/subcategory-update', [SubcategoryController::class, 'subCategoryUpdate'])->name('admin.subcategoryupdate');
    Route::post('/subcategory-delete', [SubcategoryController::class, 'subcategoryDelete'])->name('admin.subcategoryelete');
    Route::post('/subcategory-active-inactive', [SubcategoryController::class, 'subcategoryActiveInactive'])->name('admin.subcategoryactiveinactive');


   
    //User Management

    Route::get('/register-user', [UsermanagementController::class, 'registerUser'])->name('admin.registeruser');
    Route::get('/register-member', [UsermanagementController::class, 'registerMember'])->name('admin.registermember');
    Route::get('/add-register-user', [UsermanagementController::class, 'addRegisterUser'])->name('admin.addregisteruser');
    Route::post('/store-register-user', [UsermanagementController::class, 'storeRegisterUser'])->name('admin.storeregisteruser');
    Route::post('register-user-ajax-list', [UsermanagementController::class, 'registerUserAjaxList'])->name('admin.registeruserajaxlist');
    Route::post('register-member-ajax-list', [UsermanagementController::class, 'registerMemberAjaxList'])->name('admin.registermemberajaxlist');
    Route::get('/edit-register-user/{id}', [UsermanagementController::class, 'editRegisterUser'])->name('admin.editregisteruser');
    Route::post('/update-register-user', [UsermanagementController::class, 'updateRegisterUser'])->name('admin.updateregisteruser');
    Route::post('/delete-register-user', [UsermanagementController::class, 'deleteRegisterUser'])->name('admin.deleteregisteruser');
    Route::post('/register-user-active-Inactive', [UsermanagementController::class, 'registerUserActiveInactive'])->name('admin.registerUseractiveinactive');
    Route::post('/category-onchange', [UsermanagementController::class, 'categoryOnchange'])->name('admin.categoryonchange');
    Route::post('/service-onchange', [UsermanagementController::class, 'serviceOnchange'])->name('admin.serviceonchange');
    Route::post('/export', [UsermanagementController::class, 'export'])->name('export');
    Route::post('members/import', [UsermanagementController::class, 'import'])->name('members.import');
    Route::get('/edit-password/{id}', [UsermanagementController::class, 'editpasswordregisteruser'])->name('admin.editpasswordregisteruser');
    Route::post('/update-password', [UsermanagementController::class, 'updatepasswordregisteruser'])->name('admin.updatepasswordregisteruser');
  
  
   
    // Route::get('/fetch-data', 'UsermanagementController@fetchData');


   
    // Route for Add Slider

    Route::get('/slider', [SliderController::class, 'slider'])->name('admin.slider');
    Route::get('/add-slider', [SliderController::class, 'addSlider'])->name('admin.addslider');
    Route::post('/store-slider', [SliderController::class, 'storeSlider'])->name('admin.storeSlider');
    Route::post('/slider-ajax-list', [SliderController::class, 'sliderAjaxList'])->name('admin.sliderajaxlist');
    Route::get('/edit-slider/{id}', [SliderController::class, 'editSlider'])->name('admin.editSlider');
    Route::post('/update-slider', [SliderController::class, 'updateSlider'])->name('admin.updateSlider');
    Route::post('/delete-slider', [SliderController::class, 'deleteSlider'])->name('admin.deleteslider');
    Route::post('/status-slider', [SliderController::class, 'statusSlider'])->name('admin.satausslider');

    // Route for Add Slider Second

    Route::get('/bottomslider', [BottomSliderController::class, 'bottomslider'])->name('admin.bottomslider');
    Route::get('/add-bottomslider', [BottomSliderController::class, 'addbottomslider'])->name('admin.addbottomslider');
    Route::post('/store-bottomslider', [BottomSliderController::class, 'storebottomslider'])->name('admin.storebottomslider');
    Route::post('/bottomslider-ajax-list', [BottomSliderController::class, 'bottomsliderAjaxList'])->name('admin.bottomsliderajaxlist');
    Route::get('/edit-bottomslider/{id}', [BottomSliderController::class, 'editbottomslider'])->name('admin.editbottomslider');
    Route::post('/update-bottomslider', [BottomSliderController::class, 'updatebottomslider'])->name('admin.updatebottomslider');
    Route::post('/delete-bottomslider', [BottomSliderController::class, 'deletebottomslider'])->name('admin.deletebottomslider');
    Route::post('/status-bottomslider', [BottomSliderController::class, 'statusbottomslider'])->name('admin.satausbottomslider');

    //Routre for banner1

    Route::get('/banner', [BannerController::class, 'banner'])->name('admin.banner');
    Route::get('/add-banner', [BannerController::class, 'addBanner'])->name('admin.addbanner');
    Route::post('/store-banner', [BannerController::class, 'storeBanner'])->name('admin.storebanner');
    Route::post('/banner-ajax-list', [BannerController::class, 'bannerAjaxList'])->name('admin.bannerajaxlist');
    Route::get('/banner-edit/{id}', [BannerController::class, 'bannerEdit'])->name('admim.banneredit');
    Route::post('/update-baaner', [BannerController::class, 'updateBanner'])->name('admin.updateBanner');
    Route::post('/delete-banner', [BannerController::class, 'deleteBanner'])->name('admin.deletebanner');
    Route::post('/banner-status', [BannerController::class, 'bannerStatus'])->name('admin.bannerstatus');

    //Routre for banner1

    Route::get('/rbanner', [RBannerController::class, 'banner'])->name('admin.rbanner');
    Route::get('/add-rbanner', [RBannerController::class, 'addBanner'])->name('admin.addrbanner');
    Route::post('/store-rbanner', [RBannerController::class, 'storeBanner'])->name('admin.storerbanner');
    Route::post('/rbanner-ajax-list', [RBannerController::class, 'bannerAjaxList'])->name('admin.rbannerajaxlist');
    Route::get('/rbanner-edit/{id}', [RBannerController::class, 'bannerEdit'])->name('admim.rbanneredit');
    Route::post('/update-rbanner', [RBannerController::class, 'updateBanner'])->name('admin.updaterBanner');
    Route::post('/delete-rbanner', [RBannerController::class, 'deleteBanner'])->name('admin.deleterbanner');
    Route::post('/rbanner-status', [RBannerController::class, 'bannerStatus'])->name('admin.rbannerstatus');

   
    

    // plans route
     
    Route::get('plans',[PlansController::class,'plansPage'])->name('admin.planspage');
    Route::get('add-plans',[PlansController::class,'addPlans'])->name('admin.addplans');
    Route::post('store-plans',[PlansController::class,'storePlans'])->name('admin.storeplans');
    Route::post('plans-ajax-list',[PlansController::class,'plansAjaxList'])->name('admin.plansajaxlist');
    Route::get('edit-plans/{id}',[PlansController::class,'editPlans'])->name('admin.editplans');
    Route::post('update-plans',[PlansController::class,'updatePlans'])->name('admin.updateplans');
    Route::post('delete-plans',[PlansController::class,'deletePlans'])->name('admin.deleteplans');
    Route::post('status-change-plans',[PlansController::class,'status_change_plans'])->name('admin.status.change_plans');

    //contact us
    
    Route::get('/contact-us', [ContactUsController::class,'index'])->name('admin.contactus');
    Route::post('/contact-ajax-list', [ContactUsController::class, 'contactUsAjaxList'])->name('admin.contactusajaxlist');
    Route::post('/delete-contact', [ContactUsController::class, 'destroy'])->name('contact-us.destroy');
    Route::post('update-contact/{id}',[ContactUsController::class, 'update'])->name('contact.update');
    Route::any('contactus-changestatus',[ContactUsController::class,'contactus_changestatus'])->name('contact.change.status');
    

    // privacy &policy
    Route::get('privacy_policies',[ContactUsController::class,'privacy_policies'])->name('privacy-policies.index');
    Route::post('privacy-save-update',[ContactUsController::class,'privacy_save_update'])->name('privacy.save.update');

    // terms of use
    Route::get('terms',[ContactUsController::class,'terms'])->name('terms.index');
    Route::post('terms-save-update',[ContactUsController::class,'terms_save_update'])->name('terms.save.update');
    
    //about bahrain bank
    Route::get('about-us',[ContactUsController::class,'aboutus'])->name('about-up.index');
    Route::post('aboutus-save-update',[ContactUsController::class,'aboutus_save_update'])->name('aboutus.save.update');

   
 
});
