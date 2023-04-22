<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Artical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articals = DB::table('articals')->get();
        return view('dashboard.articals.index' , compact('articals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.articals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = Artical::validateRules();
        $request->validate($rules);
        $data = $request->except('image');
        $data['user_id'] = Auth::user()->id;
        $file = $request->file('image');
        if($file){
            $path = $file->store('articals' , 'public'); 
            $data['image_url'] = $path;
        }
             
        Artical::create($data);
        return redirect()->route('dashboard.articals.index')
                ->with('created_artical' , 'تم نشر المقالة بنجاح');

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
        $artical = Artical::findOrFail($id);
        return view('dashboard.articals.edit' , compact('artical'));
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
        $rules = Artical::validateRules();
        $request->validate($rules);
        $artical = Artical::findOrFail($id);
        $old_image_path = $artical->image_url;
        $data = $request->except('image');
        $data['user_id'] = Auth::user()->id;
        $file = $request->file('image');
        if($file) {
            $path = $file->store('articals' , 'public'); 
            $data['image_url'] = $path;
        }
        $artical->update($data);
        if($old_image_path && $file){
            Storage::disk('public')->delete($old_image_path);
        } 
        return redirect()->route('dashboard.articals.index')
               ->with('artical_updated' , 'تم تحديث  المقالة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $artical_id = $request->artical_id;
        $artical = Artical::findOrFail($artical_id);
        $artical->delete();
        if($artical->image_url){
            Storage::disk('public')->delete($artical->image_url);
        }
        return redirect()->route('dashboard.articals.index')
                ->with('artical_deleted' , 'تم حذف المقالة');
    }
}
