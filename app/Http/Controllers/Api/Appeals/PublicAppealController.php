<?php

namespace App\Http\Controllers\Api\Appeals;

use App\Http\Controllers\Controller;
use App\Models\Appeal;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Response;

class PublicAppealController extends Controller
{

    public function index()
    {
        $appeals = Appeal::orderByDesc('updated_at')->paginate(15 , ['id' ,  'user_id'  ,  'name' , 
        'description' , 'phone_number' , 'blood_type' , 'location']);
        return Response::json($appeals , 200);

    }

    public function SearchByBloodType(Request $request)
    {
       
       if(in_array($request->blood_type , ['A' , 'B' , 'O' , 'AB' , ])){
        $request->merge([
            'blood_type' => $request->blood_type.'+' 
         ]);
       } 
        $request->validate([
            'blood_type' => ['required' , Rule::in(['A+', 'A-',  'B+', 'B-', 'O+', 'O-',  'AB+', 'AB-'])] , 
        ]);
        
       $blood_type = $request->input('blood_type');
       $appeals = Appeal::where('blood_type' , $blood_type)->paginate(15 , [ 'id' , 'user_id' , 'name' , 
       'description' , 'phone_number' , 'blood_type']);
       return  Response::json($appeals);
    }

    public function SearchByLocation(Request $request)
    {
        $request->validate([
            'location' => ['required' , 'string' , 'min:3' , 'max:30'] , 
        ]);

        $location = $request->query('location');
        $appeals = Appeal::where('location' , $location)->orderByDesc('updated_at')->paginate(15 , [
             'id' , 'user_id' ,'name' , 
        'description' , 'phone_number' , 'blood_type']);
        return  Response::json($appeals);

    }    

}
