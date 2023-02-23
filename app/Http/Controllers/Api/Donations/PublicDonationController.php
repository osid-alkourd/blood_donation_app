<?php

namespace App\Http\Controllers\Api\Donations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonationOffer;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class PublicDonationController extends Controller
{
    public function index()
    {
        $offers = DonationOffer::where('status' , 'active')->orderByDesc('updated_at')->paginate(15);
        return  Response::json($offers);
    }



    

    public function SearchByLocation(Request $request)
    {
        $request->validate([
            'location' => ['required' , 'string' , 'min:3' , 'max:30'] , 
        ]);
        
        $location = $request->query('location');
        $offers = DonationOffer::where('status' , 'active')->where('location' , $location)->paginate();
        return  Response::json($offers);
    }





    public function SearchByBloodType(Request $request)
    {
       // return base64_decode($type);
       //return $request->input('blood_type');
       if(in_array($request->blood_type , ['A' , 'B' , 'O' , 'AB' , ])){
        $request->merge([
            'blood_type' => $request->blood_type.'+' 
         ]);
       }
        
        $request->validate([
            'blood_type' => ['required' , Rule::in(['A+', 'A-',  'B+', 'B-', 'O+', 'O-',  'AB+', 'AB-'])] , 
        ]);
       $blood_type = $request->input('blood_type');
       $offers = DonationOffer::where('status' , 'active')->where('blood_type' , $blood_type)->paginate();
       return  Response::json($offers);

    }




}
