<?php

namespace App\Http\Controllers\Api\DonationCampaigns;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class DonationCampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donation_campaigns = DB::table('campaigns')->paginate(15 , ['id' , 'updated_at' , 'image_url']);
        return  Response::json($donation_campaigns , 200);
    }

  
    
    public function show($id)
    {
        //
    }

    
   
}
