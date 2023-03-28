<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class statisticsController extends Controller
{
   
    public function index()
    {
        $appeals_count = DB::table('appeals')->count();
        $donation_offers_count = DB::table('donation_offers')->where('status', '=', 'active')->count();
        $campaigns_count = DB::table('campaigns')->count();
        $users_count = DB::table('users')->where('is_admin', '=', false)->count();
       //return $appeals_count;
        return view('dashboard.statistics' , compact('appeals_count' , 'donation_offers_count' , 
                    'campaigns_count' , 'users_count'));
    }

   
}
