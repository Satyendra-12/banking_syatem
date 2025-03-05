<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PrivacyPoliciesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsermanagementController;

use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\User\WhouController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AuthController;


/*
|--------------------------------------------------------------------------
| Web Route
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/home', [FrontendController::class, 'index'])->name('admin.index');
Route::get('/feature-member/{title?}', [FrontendController::class, 'feature'])->name('admin.feature');
Route::get('/financial-services', [FrontendController::class, 'financial'])->name('admin.financial');
Route::get('/support/{id}', [FrontendController::class, 'financial_page'])->name('admin.support-page');
Route::get('/financial-services-support/{id}', [FrontendController::class, 'financial_service'])->name('admin.financial-page-service');

Route::post('/contact/send', [FrontendController::class, 'send'])->name('contact.send');


Route::get('/details/{id}', [FrontendController::class, 'detail_Page'])->name('admin.details-page');
Route::get('/fdetails/{id}', [FrontendController::class, 'fdetail_Page'])->name('admin.fdetails-page');
Route::get('/sdetails/{id}', [FrontendController::class, 'sdetail_Page'])->name('admin.sdetails-page');

Route::get('/details1', [FrontendController::class, 'detail_Page1'])->name('admin.details-page1');

Route::get('/support-services', [FrontendController::class, 'support'])->name('admin.support');
Route::get('/whos-who', [FrontendController::class, 'profile'])->name('admin.profile_who');
Route::get('/who-profile/{id}', [FrontendController::class, 'who_profile'])->name('admin.profile_who_page');

Route::get('/whous/profile/{id}', [FrontendController::class, 'whous_profile'])->name('admin.whous_profile_who_page');

Route::get('/articles-features', [FrontendController::class, 'event'])->name('admin.event');
Route::get('/events', [FrontendController::class, 'event1'])->name('admin.event1');
Route::get('/articles-features/{id}', [FrontendController::class, 'news_event'])->name('admin.news_and-event');
Route::get('/event/{id}', [FrontendController::class, 'news_event1'])->name('admin.news_event');

Route::get('/membership-plan', [FrontendController::class, 'package'])->name('admin.package');
Route::get('/coming', [FrontendController::class, 'comming'])->name('admin.comming');
Route::get('/contact-us', [FrontendController::class, 'contact'])->name('admin.contact');
Route::get('/privacy', [FrontendController::class, 'privacy'])->name('admin.privacy');
Route::get('/terms', [FrontendController::class, 'terms'])->name('admin.terms');
Route::post('/store/{id}', [FrontendController::class, 'store'])->name('admin.ratingstore');

Route::get('/who/{id}', [WhouController::class, 'whodetails'])->name('user.who_details');

Route::post('/save-contact', [ContactUsController::class, 'store'])->name('savecontact');
// Route::get('/fetch-data', [UsermanagementController::class, 'fetchData'])->name('admin.fetchData');
Route::prefix('admin')->group(base_path('routes/admin_route.php'));
Route::prefix('user')->group(base_path('routes/user.php'));

// Route::get('/', [AuthController::class, 'loginPage'])->name('admin.loginpage');
// Route::post('/login', [AuthController::class, 'loginSubmit'])->name('admin.loginsubmit');
Route::get('/search',[FrontendController::class, 'search'])->name('profiles.search');
// Route::post('search-filter-data',[FrontendController::class,'search'])->name('search.filter_data');
// Route::get('/sub-category/{subcategory}',[FrontendController::class, 'subcategory'])->name('subcategory');
// Route::get('/contact-view', [FrontendController::class, 'contact_view'])->name('contact.view');

// //route for search omprakashh

// Route::post('Search-input-data',[FrontendController::class,'Search_input_data'])->name('search.input.data');

// Route::post('/add-favourite', [FrontendController::class, 'addFavourite'])->name('addfav.data');



// Route::get('/privacy-policies',[FrontendController::class,'privacypolicies'])->name('privacy.show');
// Route::get('/contact-us',[FrontendController::class,'contactus'])->name('contactus.show');

// Route::get('/about-up',[FrontendController::class,'aboutup'])->name('aboutup.show');



use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

Route::get('/test-email', function () {
    try {
        Mail::raw('This is a test email', function ($message) {
            $message->to('info@bahrainbanksdirectory.com')
                    ->subject('Test Email');
        });
        return 'Test email sent successfully!';
    } catch (\Exception $e) {
        Log::error('Error sending test email: ' . $e->getMessage());
        return 'Failed to send test email.';
    }
});
