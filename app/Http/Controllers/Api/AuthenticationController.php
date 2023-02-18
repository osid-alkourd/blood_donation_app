<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Throwable;
class AuthenticationController extends Controller
{


  public function register(RegisterRequest $request){
      $user = User::create([
         'name' => $request->name , 
         'email' => $request->email,
         'password' => Hash::make($request->password),
         'is_admin' => false , 
      ]);
    
           $token = $user->createToken($request->device_name);
           return Response::json([
                 'token' => $token->plainTextToken,
                 'user' => $user,
           ] , 201);
        //     }catch(Throwable $e){
        //         return response()->json([
        //             'status' => false,
        //             'message' => $e->getMessage()
        //         ], 500);
        //     }

    }




  public function login(Request $request){
          $validate = Validator::make($request->all(),[
               'email' => 'required|email',
               'password' => 'required' , 
               'device_name' => 'required',   
             ]);

            if($validate->fails()){
                return response()->json(
             [
               'errors' => $validate->errors()
             ], 401);
          }

          $user = User::where('email' , '=' , $request->email)->first();
          if($user && Hash::check($request->password , $user->password)){
              $token = $user->createToken($request->device_name);
              return Response::json([
                  'token' => $token->plainTextToken,
                  'user' => $user,
              ],201);
          }

          return Response::json([
              'message' => 'Invald credentials',
          ], 401); 
     }
  




  public function logout(){
      $user = Auth::guard('sanctum')->user();
      $user->currentAccessToken()->delete();
      return [
        'message' => 'token deleted , you are logout'
      ];
   }

   
}