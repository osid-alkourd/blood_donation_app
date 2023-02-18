<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\Donations\DonationOffersController;
use App\Http\Controllers\Api\Donations\PublicDonationController;

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

// Make Offer Donation
Route::apiResource('donations' , DonationOffersController::class);
Route::get('donations/test/{id}', [DonationOffersController::class , 'test'])->middleware('auth:sanctum');


// view Offer Donation 
Route::get('public-donation/', [PublicDonationController::class , 'index'])->name('public-donation.index');
Route::get('donation/location' ,  [PublicDonationController::class , 'SearchByLocation'])->name('donation.location');
Route::get('donation/type' , [PublicDonationController::class , 'SearchByBloodType'])->name('donation.blood-type');



