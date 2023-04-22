<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Appeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppealsController extends Controller
{
    
    public function index()
    {
        $appeals = DB::table('appeals')->get();
        return view('dashboard.appeals.index' , compact('appeals'));

    }

    
    public function destroy(Request $request)
    {
        $id = $request->appeal_id;
        $appeal = Appeal::findOrFail($id);
        $appeal->forceDelete();
        return back()->with('appeal_deleted' , 'تم حذف مناشدة التبرع');
    }
}
