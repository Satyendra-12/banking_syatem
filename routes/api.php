<?php

use App\Http\Controllers\api\GetDataController;
use App\Http\Controllers\api\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('response', function () {
    return response()->json(['status' => false, 'message' => "Not Authorized"], 401);
})->name('api.error');

// Api for Signup User by Mahender Singh
Route::POST('signup', [UserAuthController::class, 'signup']);
Route::POST('login', [UserAuthController::class, 'login']);

// Route for Forgot password 
Route::post('send-otp', [UserAuthController::class, 'sendOTP']);
Route::post('submit-otp', [UserAuthController::class, 'submitOtp']);

Route::group(['middleware' =>  ['auth:sanctum']], function () {
    // change password
    Route::post('change-password', [UserAuthController::class, 'changePassword']);

    // user update profile
    Route::post('update-profile', [UserAuthController::class, 'updateProfile']);
    Route::get('get-profile', [UserAuthController::class, 'getProfile']);

    // email verification
    Route::post('email-verification', [UserAuthController::class, 'emailVarification']);
    Route::post('email-verify-otp', [UserAuthController::class, 'verifyEmailOtp']);
    Route::get('logout', [UserAuthController::class, 'logout']);
    
});


