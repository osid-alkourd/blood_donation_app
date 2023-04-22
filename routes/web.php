<?php

use App\Http\Controllers\dashboard\AppealsController;
use App\Http\Controllers\dashboard\ArticalController;
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
//return view('welcome');
   return redirect()->route('login');
});

//dashboard
Route::group([
  'as' => 'dashboard.' ,
  'prefix' => 'dashboard/' ,
  'middleware' => ['auth' , 'admin']
] ,function(){

  //donation offers
   Route::get('donation_offers/' , [DonationOffersController::class , 'index'])->name('donation_offers');
   //confirm specific donation offer
   Route::put('donation_offers/confirm/' , [DonationOffersController::class , 'confirm_donation'])->name('donation_offers.confirm');
   Route::delete('donation_offers/' , [DonationOffersController::class , 'destroy'])->name('donation_offers.force-delete');


   // appeals
   Route::get('appeals/' , [AppealsController::class , 'index'])->name('appeals');
   Route::delete('appeals/' , [AppealsController::class , 'destroy'])->name('appeals.force-delete');


   // campaigns
   Route::get('campaigns/' , [CampaignsController::class , 'index'])->name('campaigns');
   Route::post('campaigns/' , [CampaignsController::class , 'store'])->name('campaigns.store');
   Route::get('campaigns/create' , [CampaignsController::class , 'create'])->name('campaigns.create');
   Route::get('campaigns/edit/{id}' , [CampaignsController::class , 'edit'])->name('campaigns.edit');
   Route::put('campaigns/update/{id}' , [CampaignsController::class , 'update'])->name('campaigns.update');
   Route::delete('campaigns/' , [CampaignsController::class , 'destroy'])->name('campaigns.destroy');

   
   // articals
   Route::resource('articals', ArticalController::class)->except(['show' , 'destroy']);
   Route::delete('articals/' , [ArticalController::class , 'destroy'])->name('articals.destroy');

 // statistics
 Route::get('statistics/' , [statisticsController::class , 'index'])->name('statistics');


});

//end of dashboard


// Route::get('/table' , function(){
//   return view('dashboard.table');
// });

require __DIR__.'/auth.php';










