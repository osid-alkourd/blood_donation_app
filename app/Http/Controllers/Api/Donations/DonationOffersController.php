<?php

namespace App\Http\Controllers\Api\Donations;

use App\Http\Controllers\Controller;
use App\Models\DonationOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\DonationOfferRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DonationOfferUpdateRequest;
use App\Functions\DonationOfferCheck;
class DonationOffersController extends Controller
{

    // public $user = Auth::guard('sanctum')->user();

    public  function __construct()
    {
          $this->middleware('auth:sanctum');
    }
   
    


    public function index()
    {
       $user_id = Auth::guard('sanctum')->user()->id;
       $offers = DonationOffer::where('status' , 'active')->where('user_id' , $user_id)->paginate();
        return  Response::json($offers);
    }

    



    public function store(DonationOfferRequest $request)
    {
       
        $id_number = $request->post('id_number');
        $offerCheck = new DonationOfferCheck();
        $exist_offer  =  $offerCheck->offerCheck($id_number);
        if($exist_offer){
            return $exist_offer;
        }
        $data = $request->all();
        $data['status'] = 'active' ;
        $data['user_id'] = Auth::guard('sanctum')->user()->id; 
        $offer = DonationOffer::create($data);
        return Response::json($offer , 201);
    }

    


    
    public function show($id)
    {
        $user_id = Auth::guard('sanctum')->user()->id;
        $offer = DonationOffer::where('id' , $id)->where('user_id' , $user_id)->first();
        if($offer){
            return $offer;
        }
        return [
            'message' => 'The Offer Is Not Exist' , 
        ];
    }

    




    public function update(DonationOfferUpdateRequest $request, $id)
    {
        $user_id = Auth::guard('sanctum')->user()->id;
        $offer = DonationOffer::where('id' , $id)->where('user_id' , $user_id)->first();
        if($offer){
        $offer->update($request->all());
        return Response::json($offer , 201);
        }
    }

   



    public function destroy($id)
    {
        $user_id = Auth::guard('sanctum')->user()->id;
        $offer = DonationOffer::where('id' , $id)->where('user_id' , $user_id)->first();
        $offer->forceDelete();
        return [
            'message' => 'your offer are deleted' 
        ];
    }

    // public function test($id)
    // {
    //     $user_id = Auth::guard('sanctum')->user()->id;
    //     $offer = DonationOffer::where('id' , $id)->where('user_id' , $user_id)->first();
    //     if($offer){
    //         return $offer;

    //     }
    //     return [
    //         'message' => 'The Offer Is Not Exist' , 
    //     ];
    // }
}
