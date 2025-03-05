<?php

// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\User\AuthController as UserAuthController;

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ManagementController;
use App\Http\Controllers\User\FeatureController;
use App\Http\Controllers\User\MediaController;
use App\Http\Controllers\User\WorkinghourController;
use App\Http\Controllers\User\WhouController;
use App\Http\Controllers\User\CarrerController;
use App\Http\Controllers\User\OfferController;
use App\Http\Controllers\User\BranchController;
use App\Http\Controllers\User\ATMController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\ServicesController;
use App\Http\Controllers\User\ProfileController;
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

Route::get('/', [AuthController::class, 'userLoginPage'])->name('user.userloginpage');
Route::post('/login', [AuthController::class, 'userSubmit'])->name('user.userlogin');
Route::get('/login/{id}', [AuthController::class, 'userid'])->name('user.userloginid');
Route::get('/register-page', [AuthController::class, 'registerPage'])->name('user.registerpage');
Route::post('/register', [AuthController::class, 'register'])->name('user.register');
Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('user.forgetpassword');
Route::post('/forget-paaswords', [AuthController::class, 'forgetPasswords'])->name('user.forgetpasswords');
Route::get('/otp/{id}', [AuthController::class, 'otp'])->name('user.otp');
Route::post('/otp-verify', [AuthController::class, 'otpVerify'])->name('user.otpverify');
Route::get('/new-password/{id}', [AuthController::class, 'newPassword'])->name('user.newpassword');
Route::post('/store-new-password',[AuthController::class,'storeNewPassword'])->name('user.storenewpassword');

// Route::group(['middleware' => 'user'], function () {
    Route::get('/sell-page', [FrontendController::class, 'sellPage'])->name('sellpage.data');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/review', [DashboardController::class, 'review'])->name('user.review');
    Route::post('/review-ajax-list',[DashboardController::class,'reviewAjaxList'])->name('user.reviewajaxlist');
    Route::get('/log-out', [AuthController::class, 'logOut'])->name('user.logout');
    // Route::post('branch-ajax-list', [BranchController::class, 'branchAjaxList'])->name('user.branchajaxlist');
   
  



    // profile Route
       Route::get('/profile', [ProfileController::class, 'address'])->name('user.profile');
       Route::get('profile-page',[ProfileController::class,'profilePage'])->name('user.profilepage');
       Route::post('profile-update',[ProfileController::class,'profileUpdate'])->name('user.profileUpdate');
       Route::get('profile-edit/{id}',[ProfileController::class,'profileEdit'])->name('user.profileU');
       Route::post('/reset-password', [ProfileController::class, 'resetPasword'])->name('user.resetpasword');

    // route for post/List
  

    Route::get('/list', [PostController::class, 'listPage'])->name('user.listPage');
    Route::get('/approvedlist', [PostController::class, 'listPage'])->name('user.applistPage');
    Route::get('/rejectedlist', [PostController::class, 'listPage'])->name('user.rejlistPage');
    Route::get('/add-list', [PostController::class, 'addlist'])->name('user.addlist');
    Route::post('/save-list', [PostController::class, 'savelist'])->name('user.savelist');
    Route::get('/edit-list/{id}', [PostController::class, 'editlist'])->name('user.editlist');
    Route::post('/update-list', [PostController::class, 'updatelist'])->name('user.updatelist');
    Route::post('/delete-list', [PostController::class, 'deletelist'])->name('user.deletelist');
    Route::post('list-ajax-list', [PostController::class, 'listAjaxList'])->name('user.listajaxlist');
    Route::post('/model-onchange', [PostController::class, 'modelOnchange'])->name('user.modelonchange');
    Route::post('list-changestatus',[PostController::class,'list_changestatus'])->name('user.list.change.status');
    Route::post('change_manu_status',[PostController::class,'change_manu_status'])->name('user.list.change.manu_status');
    Route::post('/onchange-select-state', [PostController::class, 'getDistrict'])->name('onchangeselectstate.data');
    Route::post('/onchange-select-district', [PostController::class, 'getCity'])->name('onchangeselectdistrict.data');

    Route::get('/product', [ProductController::class, 'productPage'])->name('user.product');
    Route::get('/add-product', [ProductController::class, 'addproduct'])->name('user.addproduct');
    Route::post('/save-product', [ProductController::class, 'saveproduct'])->name('user.saveproduct');
    Route::get('/edit-product/{id}', [ProductController::class, 'editproduct'])->name('user.editproduct');
    Route::post('/update-product', [ProductController::class, 'updateproduct'])->name('user.updateproduct');
    Route::post('/delete-product', [ProductController::class, 'deleteproduct'])->name('user.deleteproduct');
    Route::post('product-ajax-list', [ProductController::class, 'productAjaxList'])->name('user.productajaxlist');
    Route::post('product-changestatus',[ProductController::class,'statusproduct'])->name('user.statusproduct');

    //management route
    Route::get('/management', [ManagementController::class, 'managementPage'])->name('user.management');
    Route::get('/add-management', [ManagementController::class, 'addmanagement'])->name('user.addmanagement');
    Route::post('/save-management', [ManagementController::class, 'savemanagement'])->name('user.savemanagement');
    Route::get('/edit-management/{id}', [ManagementController::class, 'editmanagement'])->name('user.editmanagement');
    Route::post('/update-management', [ManagementController::class, 'updatemanagement'])->name('user.updatemanagement');
    Route::post('/delete-management', [ManagementController::class, 'deletemanagement'])->name('user.deletemanagement');
    Route::post('management-ajax-list', [ManagementController::class, 'managementAjaxList'])->name('user.managementajaxlist');
    Route::post('management-changestatus',[ManagementController::class,'statusmanagement'])->name('user.statusmanagement');

     //feature route
     Route::get('/feature', [FeatureController::class, 'featurePage'])->name('user.feature');
     Route::get('/add-feature', [FeatureController::class, 'addfeature'])->name('user.addfeature');
     Route::post('/save-feature', [FeatureController::class, 'savefeature'])->name('user.savefeature');
     Route::get('/edit-feature/{id}', [FeatureController::class, 'editfeature'])->name('user.editfeature');
     Route::post('/update-feature', [FeatureController::class, 'updatefeature'])->name('user.updatefeature');
     Route::post('/delete-feature', [FeatureController::class, 'deletefeature'])->name('user.deletefeature');
     Route::post('feature-ajax-list', [FeatureController::class, 'featureAjaxList'])->name('user.featureajaxlist');
     Route::post('feature-changestatus',[FeatureController::class,'statusfeature'])->name('user.statusfeature');

      //carrer route
    Route::get('/career', [CarrerController::class, 'carrerPage'])->name('user.carrer');
    Route::get('/add-career', [CarrerController::class, 'addcarrer'])->name('user.addcarrer');
    Route::post('/save-career', [CarrerController::class, 'savecarrer'])->name('user.savecarrer');
    Route::get('/edit-career/{id}', [CarrerController::class, 'editcarrer'])->name('user.editcarrer');
    Route::post('/update-career', [CarrerController::class, 'updatecarrer'])->name('user.updatecarrer');
    Route::post('/delete-career', [CarrerController::class, 'deletecarrer'])->name('user.deletecarrer');
    Route::post('career-ajax-list', [CarrerController::class, 'carrerAjaxList'])->name('user.carrerajaxlist');
    Route::post('career-changestatus',[CarrerController::class,'statuscarrer'])->name('user.statuscarrer');

     //branch route
     Route::get('/branch', [BranchController::class, 'branchPage'])->name('user.branch');
     Route::get('/add-branch', [BranchController::class, 'addbranch'])->name('user.addbranch');
     Route::post('/save-branch', [BranchController::class, 'savebranch'])->name('user.savebranch');
     Route::get('/edit-branch/{id}', [BranchController::class, 'editbranch'])->name('user.editbranch');
     Route::post('/update-branch', [BranchController::class, 'updatebranch'])->name('user.updatebranch');
     Route::post('/delete-branch', [BranchController::class, 'deletebranch'])->name('user.deletebranch');
     Route::post('branch-ajax-list', [BranchController::class, 'branchAjaxList'])->name('user.branchajaxlist');
     Route::post('branch-changestatus',[BranchController::class,'statusbranch'])->name('user.statusbranch');

     //atm route
     Route::get('/atm', [ATMController::class, 'atmPage'])->name('user.atm');
     Route::get('/add-atm', [ATMController::class, 'addatm'])->name('user.addatm');
     Route::post('/save-atm', [ATMController::class, 'saveatm'])->name('user.saveatm');
     Route::get('/edit-atm/{id}', [ATMController::class, 'editatm'])->name('user.editatm');
     Route::post('/update-atm', [ATMController::class, 'updateatm'])->name('user.updateatm');
     Route::post('/delete-atm', [ATMController::class, 'deleteatm'])->name('user.deleteatm');
     Route::post('atm-ajax-list', [ATMController::class, 'atmAjaxList'])->name('user.atmajaxlist');
     Route::post('atm-changestatus',[ATMController::class,'statusatm'])->name('user.statusatm');


      //offer route
    Route::get('/offer', [OfferController::class, 'offerPage'])->name('user.offer');
    Route::get('/add-offer', [OfferController::class, 'addoffer'])->name('user.addoffer');
    Route::post('/save-offer', [OfferController::class, 'saveoffer'])->name('user.saveoffer');
    Route::get('/edit-offer/{id}', [OfferController::class, 'editoffer'])->name('user.editoffer');
    Route::post('/update-offer', [OfferController::class, 'updateoffer'])->name('user.updateoffer');
    Route::post('/delete-offer', [OfferController::class, 'deleteoffer'])->name('user.deleteoffer');
    Route::post('offer-ajax-list', [OfferController::class, 'offerAjaxList'])->name('user.offerajaxlist');
    Route::post('offer-changestatus',[OfferController::class,'statusoffer'])->name('user.statusoffer');

    Route::get('/who', [WhouController::class, 'whouPage'])->name('user.who');
    Route::get('/add-who', [WhouController::class, 'addwhou'])->name('user.addwho');
    Route::post('/save-who', [WhouController::class, 'savewhou'])->name('user.savewho');
    Route::get('/edit-who/{id}', [WhouController::class, 'editwhou'])->name('user.editwho');
    Route::post('/update-who', [WhouController::class, 'updatewhou'])->name('user.updatewho');
    Route::post('/delete-who', [WhouController::class, 'deletewhou'])->name('user.deletewho');
    Route::post('who-ajax-list', [WhouController::class, 'whouAjaxList'])->name('user.whoajaxlist');
    Route::post('who-changestatus',[WhouController::class,'whou_changestatus'])->name('user.who.change.status');

     //review route
    //  Route::get('/review', [ReviewController::class, 'reviewPage'])->name('user.review');
    //  Route::get('/add-review', [ReviewController::class, 'addreview'])->name('user.addreview');
    //  Route::post('/save-review', [ReviewController::class, 'savereview'])->name('user.savereview');
    //  Route::get('/edit-review/{id}', [ReviewController::class, 'editreview'])->name('user.editreview');
    //  Route::post('/update-review', [ReviewController::class, 'updatereview'])->name('user.updatereview');
    //  Route::post('/delete-review', [ReviewController::class, 'deletereview'])->name('user.deletereview');
    //  Route::post('review-ajax-list', [ReviewController::class, 'reviewAjaxList'])->name('user.reviewajaxlist');
    //  Route::post('review-changestatus',[ReviewController::class,'statusreview'])->name('user.statusreview');

    Route::get('/services', [ServicesController::class, 'servicePage'])->name('user.services');
    Route::get('/add-services', [ServicesController::class, 'addservice'])->name('user.addservices');
    Route::post('/save-services', [ServicesController::class, 'saveservice'])->name('user.saveservices');
    Route::get('/edit-services/{id}', [ServicesController::class, 'editservice'])->name('user.editservices');
    Route::post('/update-services', [ServicesController::class, 'updateservice'])->name('user.updateservices');
    Route::post('/delete-services', [ServicesController::class, 'deleteservice'])->name('user.deleteservices');
    Route::post('services-ajax-list', [ServicesController::class, 'serviceAjaxList'])->name('user.servicesajaxlist');
    Route::post('services-changestatus',[ServicesController::class,'statusservice'])->name('user.statusservices');

    Route::get('/media', [MediaController::class, 'mediaPage'])->name('user.media');
    Route::get('/add-media', [MediaController::class, 'addmedia'])->name('user.addmedia');
    Route::post('/save-media', [MediaController::class, 'savemedia'])->name('user.savemedia');
    Route::get('/edit-media/{id}', [MediaController::class, 'editmedia'])->name('user.editmedia');
    Route::post('/update-media', [MediaController::class, 'updatemedia'])->name('user.updatemedia');
    Route::post('/delete-media', [MediaController::class, 'deletemedia'])->name('user.deletemedia');
    Route::post('media-ajax-list', [MediaController::class, 'mediaAjaxList'])->name('user.mediaajaxlist');
    Route::post('media-changestatus',[MediaController::class,'statusmedia'])->name('user.statusmedia');

    Route::get('/workinghour', [WorkinghourController::class, 'workinghourPage'])->name('user.workinghour');
    Route::get('/opening-hours/create',[WorkinghourController::class,'create'])->name('opening_hours.create');
    Route::post('/save-workinghour', [WorkinghourController::class, 'store'])->name('opening_hours.store');
    Route::get('/edit/{id}',[WorkinghourController::class,'edit'])->name('opening_hours.edit');
    Route::post('/update-workinghour', [WorkinghourController::class, 'updateworkinghour'])->name('user.updateworkinghour');
    Route::post('/delete-workinghour', [WorkinghourController::class, 'deleteworkinghour'])->name('user.deleteworkinghour');
    Route::post('workinghour-ajax-list', [WorkinghourController::class, 'workinghourAjaxList'])->name('user.workinghourajaxlist');
    // Route::post('workinghour-changestatus',[WorkinghourController::class,'statusworkinghour'])->name('user.statusworkinghour');

     // Route::get('/add-workinghour', [WorkinghourController::class, 'addworkinghour'])->name('user.addworkinghour');
    // Route::post('/save-workinghour', [WorkinghourController::class, 'saveworkinghour'])->name('user.saveworkinghour');
    // Route::get('/edit-workinghour/{id}', [WorkinghourController::class, 'editworkinghour'])->name('user.editworkinghour');
    // Route::put('/opening-hours/update',[WorkinghourController::class,'update'])->name('opening_hours.update');
   





// });
