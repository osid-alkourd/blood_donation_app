<?php

namespace App\Http\Controllers\Api\Setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;
class UserSettingController extends Controller
{
    public $user ;
    public $id;
    public function __construct(){
          $this->user = Auth::guard('sanctum')->user();
          //$this->id = $this->user->id;
    }

    public function getUserData()
    {
    
        $email = $this->user->email;
        $name =  $this->user->name;
        $user_id = $this->user->id;
        $number_of_appeals = DB::table('appeals')->where('user_id' , $user_id)->count();
        $number_of_donors = DB::table('donation_offers')->count();
        return Response::json([
            'email' => $email , 
            'name' => $name , 
            'user_id' => $user_id ,
            'number_of_appeal' => $number_of_appeals , 
            'number_of_donors' => $number_of_donors , 
        ] , 200);
    }

    public function resetCurrentPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:6' , 
            'password' => 'required|confirmed|min:6' , 
        ]);
        $old_password = $request->old_password;
        $password = $request->password;
        if(Hash::check($old_password, $this->user->password)){
           $auth_user = User::where('id' , $this->user->id)->first();
           $auth_user->update([
              'password' => Hash::make($password)
           ]);
           return Response::json($auth_user , 201);
        }
        return Response::json([
            'invalid credential'
        ], 401);
    }
}
