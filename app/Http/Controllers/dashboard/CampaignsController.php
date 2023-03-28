<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CampaignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $campaigns = DB::table('campaigns')->get();
      $campaigns = DB::table('campaigns as c')
                    ->leftJoin('users as u', 'c.user_id', '=', 'u.id')
                    ->select('c.*', 'u.name as admin_name')
                    ->get();
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
            'image' => ['required' , 'mimes:jpg,png'] , 
        ]);
        $data = $request->except('image');
        $data['user_id'] = Auth::user()->id;
        $file = $request->file('image');
        if($file){
            $path = $file->store('campaigns' , 'public'); 
            $data['image_url'] = $path;
        }
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
            'image' => ['required' , 'image'] , 
        ]);
        $campaign = Campaign::findOrFail($id);
        $old_image_path = $campaign->image_url;
        $data = $request->except('image');
        $data['user_id'] = Auth::user()->id;
        $file = $request->file('image');
        if($file) {
            $path = $file->store('campaigns' , 'public'); 
            $data['image_url'] = $path;
        }
        $campaign->update($data);
        if($old_image_path && $file){
            Storage::disk('public')->delete($old_image_path);
        } 
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
        if($campaign->image_url){
            Storage::disk('public')->delete( $campaign->image_url);
        }
        return back()->with('campaign_deleted' , 'تم حذف حملة التبرع');
    }
}
