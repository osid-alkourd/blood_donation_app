<?php

use App\Http\Controllers\dashboard\AppealsController;
use App\Http\Controllers\dashboard\CampaignsController;
use App\Http\Controllers\dashboard\DonationOffersController;
use App\Http\Controllers\dashboard\statisticsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});





Route::group([
  'as' => 'dashboard.' ,
  'prefix' => 'dashboard/' ,
] ,function(){

  //donation offers
   Route::get('donation_offers/' , [DonationOffersController::class , 'index'])->name('donation_offers');
   //confirm specific donation offer
   Route::put('donation_offers/confirm/{id}' , [DonationOffersController::class , 'confirm_donation'])->name('donation_offers.confirm');
   Route::delete('donation_offers/{id}' , [DonationOffersController::class , 'destroy'])->name('donation_offers.force-delete');


   // appeals
   Route::get('appeals/' , [AppealsController::class , 'index'])->name('appeals');
   Route::delete('appeals/{id}' , [AppealsController::class , 'destroy'])->name('appeals.force-delete');


   // campaigns
   Route::get('campaigns/' , [CampaignsController::class , 'index'])->name('campaigns');
   Route::post('campaigns/' , [CampaignsController::class , 'store'])->name('campaigns.store');
   Route::get('campaigns/create' , [CampaignsController::class , 'create'])->name('campaigns.create');
   Route::get('campaigns/edit/{id}' , [CampaignsController::class , 'edit'])->name('campaigns.edit');
   Route::put('campaigns/update/{id}' , [CampaignsController::class , 'update'])->name('campaigns.update');


 // statistics
 Route::get('statistics/' , [statisticsController::class , 'index'])->name('statistics');


});

// Route::get('/table' , function(){
//   return view('dashboard.table');
// });
