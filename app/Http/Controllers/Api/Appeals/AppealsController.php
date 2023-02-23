<?php

namespace App\Http\Controllers\Api\Appeals;

use App\Http\Controllers\Controller;
use App\Models\Appeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class AppealsController extends Controller
{

    public  function __construct()
    {
          $this->middleware('auth:sanctum');
    }
    

    public function index()
    {
        $user_id = Auth::guard('sanctum')->user()->id;
        $appeals = Appeal::where('user_id' , $user_id)->paginate(15  , ['name' , 
        'description' , 'phone_number' , 'blood_type']);
        return Response::json($appeals);

    }

    


    public function store(Request $request)
    {
        $rule = Appeal::storeRules();
        $request->validate($rule);
        $data = $request->all();
        $data['user_id'] = Auth::guard('sanctum')->user()->id; 
        $appeal = Appeal::create($data);
        return Response::json($appeal , 201);
    }

    

    public function show($id)
    {
        $user_id = Auth::guard('sanctum')->user()->id;
        $appeal = Appeal::where('id' , $id)->where('user_id' , $user_id)->first();
        return Response::json($appeal);
    }

   

    public function update(Request $request, $id)
    {
        $rule = Appeal::updateRules();
        $request->validate($rule);
        $user_id = Auth::guard('sanctum')->user()->id;
        $appeal = Appeal::where('id' , $id)->where('user_id' , $user_id)->first();
        if($appeal){
            $appeal->update($request->all());
            return Response::json($appeal , 201);
            }

        return [
            '403 errros' , 
        ];
    }

    


    public function destroy($id)
    {
        $user_id = Auth::guard('sanctum')->user()->id;
        $appeal = Appeal::where('id' , $id)->where('user_id' , $user_id)->first();
        $appeal->forceDelete();
        return [
            'message' => 'your offer are deleted' 
        ];
    }
}
