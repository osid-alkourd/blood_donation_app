<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class CampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = DB::table('campaigns')->get();
        return view('dashboard.campaigns.index' , compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.campaigns.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => ['required' , 'string' ,'min:10'] , 
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Campaign::create($data);
        return redirect()->route('dashboard.campaigns')
                ->with('campaign_created' , 'تم نشر حملة التبرع');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('dashboard.campaigns.edit' , compact('campaign'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => ['required' , 'string' ,'min:10'] , 
        ]);
        $campaign = Campaign::findOrFail($id);
        $campaign->update([
            'description' => $request->description
        ]);
        return redirect()->route('dashboard.campaigns')
               ->with('campaign_updated' , 'تم تحديث وصف الحملة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();
        return back()->with('campaign_deleted' , 'تم حذف حملة التبرع');
    }
}
