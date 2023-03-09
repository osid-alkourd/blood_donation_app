<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DonationOffersController extends Controller
{
   
    public function index()
    {
        return view('dashboard.donation_offers.index');
    }

   
    public function confirm_donation(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
