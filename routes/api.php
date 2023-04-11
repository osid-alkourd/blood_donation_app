<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\Donations\DonationOffersController;
use App\Http\Controllers\Api\Donations\PublicDonationController;
use App\Http\Controllers\Api\Appeals\AppealsController;
use App\Http\Controllers\Api\Appeals\PublicAppealController;
use App\Http\Controllers\Api\Articles\ArticleController;
use App\Http\Controllers\Api\Authentication\EmailVerifyCodeController;
use App\Http\Controllers\Api\DonationCampaigns\DonationCampaignsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication
Route::post('user/create', [AuthenticationController::class , 'register'])->middleware('guest:sanctum');
Route::post('user/login', [AuthenticationController::class , 'login'])->middleware('guest:sanctum');
Route::delete('user/logout' , [AuthenticationController::class , 'logout'])->middleware('auth:sanctum');
Route::get('user/verification/code' ,[EmailVerifyCodeController::class , 'checkCode'])->middleware('auth:sanctum');

// Route::post('email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
 
// })->middleware(['auth' , 'throttle:6,1']);

// Make Offer Donation
Route::apiResource('donations' , DonationOffersController::class)->middleware('is.verify.email');
//Route::get('donations/test/{id}', [DonationOffersController::class , 'test'])->middleware('auth:sanctum');


// view Offer Donation 
Route::get('public-donation/', [PublicDonationController::class , 'index'])->name('public-donation.index');
Route::get('donation/location' ,  [PublicDonationController::class , 'SearchByLocation'])->name('donation.location');
Route::get('donation/type' , [PublicDonationController::class , 'SearchByBloodType'])->name('donation.blood-type');


// Make Appeals 
Route::apiResource('appeals' , AppealsController::class)->middleware('is.verify.email');

// View Appeals 
Route::get('public-appeals/', [PublicAppealController::class , 'index'])->name('public-appeals.index');
Route::get('public-appeals/blood-type/' , [PublicAppealController::class , 'SearchByBloodType'])->name('public-appeals.blood-type');
Route::get('public-appeals/location/' , [PublicAppealController::class , 'SearchByLocation'])->name('public-appeals.location');

// view cdonation campaigns 
Route::get('donation-campaigns/' , [DonationCampaignsController::class , 'index']);

// view articels 
Route::get('articles/' , [ArticleController::class , 'index']);