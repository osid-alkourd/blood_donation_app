<?php
namespace App\Functions;
use App\Models\DonationOffer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
 class DonationOfferCheck {

     public  function offerCheck ($id_number)
    {
        $exist_offer = DonationOffer::withTrashed()->where('id_number', $id_number)->first();
        if($exist_offer)
        {
          if($exist_offer->status == 'active'){
               return [
                'message' => 'The id number has already been taken'  ,
               ];
          }else{
              $last_donation_time = $exist_offer->deleted_at;
              $current_time = Carbon::now();
              $time_period =  $current_time->diffInDays($last_donation_time);
              if($time_period > 60){
                $exist_offer->restore();
                $exist_offer->update([
                    'status' => 'active' , 
                ]);
                 return Response::json($exist_offer , 201);
              }else{

                 return [
                    'message' => 'Donations are not available for less than 60 days'      
                 ];
              }
          
            }
          // else if the offer is exist and status is inactive
        }

    }
 }