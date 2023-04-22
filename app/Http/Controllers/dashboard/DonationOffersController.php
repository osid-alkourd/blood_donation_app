<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\DonationOffer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DonationOffersController extends Controller
{
   
    public function index()
    {
        $offers = DB::table('donation_offers')
                ->where('status' , 'active')
                ->whereNull('deleted_at')
                ->get();
        return view('dashboard.donation_offers.index' , compact('offers'));
    }

   
    public function confirm_donation(Request $request)
    {
        $donation_offer_id = $request->donation_offer_id;
        $offer = DonationOffer::findOrFail($donation_offer_id);
        $offer->update([
             'status' => 'inactive' , 
             'deleted_at' => Carbon::now()
        ]);
        return back()->with('donation_confirmed' , 'تم تاكيد واتمام عملية التبرع');
    }

    
    public function destroy(Request $request)
    {
        $donation_offer_id = $request->donation_offer_id;
        $offer = DonationOffer::findOrFail($donation_offer_id);
        $offer->forceDelete();
        return back()->with('donation_deleted' , 'تم حذف عرض التبرع');

    }
}
