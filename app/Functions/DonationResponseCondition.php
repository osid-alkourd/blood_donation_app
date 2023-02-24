<?php
namespace App\Functions;

use App\Models\DonationOffer;
use Illuminate\Support\Facades\Auth;

class DonationResponseCondition {

    public static function ownDonationOffers(){
      $user = Auth::user();
      if($user){
        $user_ids = DonationOffer::where('status' , 'active')->where('user_id' , $user->id)
        ->get('user_id')->toArray();
        if(in_array($user->id , $user_ids))
              return true;           
      }
      return false;

    }

}