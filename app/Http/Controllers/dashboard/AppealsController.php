<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppealsController extends Controller
{
    
    public function index()
    {
        return view('dashboard.appeals.index');

    }

    
    public function destroy($id)
    {
        
    }
}
