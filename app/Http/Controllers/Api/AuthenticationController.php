<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\EmailVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
//use App\Mail\EmailVerificationCode;
use Illuminate\Support\Facades\Mail;

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
          

        $code = Str::random(7); 
        $verification = EmailVerify::create([
          'user_id' => $user->id , 
          'code' => $code , 
        ]);
        
        Mail::send('email.emailVerificationEmail', ['code' => $code], function($message) use($user){
          $message->to($user->email);
          $message->subject('Email Verification Mail');
          $message->from('osmokha@gmial.com' , 'Blood Bank');
      });

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
             ], 422);
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
  




  public function logout()
  {
      $user = Auth::guard('sanctum')->user();
      $user->currentAccessToken()->delete();
     
      return Response::json([
        'message' => 'token deleted , you are logout'
      ] , 200);
   }

   
}