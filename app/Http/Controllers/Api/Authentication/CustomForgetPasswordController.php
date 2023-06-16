<?php

namespace App\Http\Controllers\Api\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomForgetPassword;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
class CustomForgetPasswordController extends Controller
{
    public function sendForgetPasswordCode(Request $request)
    {
        $request->validate([
            'email' => ['required' , 'email' , 'exists:users,email']
        ]);
        $email = $request->email;
        $code = rand(10000, 99999); 
        CustomForgetPassword::create([
          'email' => $request->email , 
          'code' => $code
        ]);

        Mail::send('CustomPasswordForget.PasswordForgetCode', ['code' => $code], function($message) use($request){
        $message->to($request->email);
        $message->subject('Password Forget Code');
        $message->from('osmokha@gmial.com' , 'Blood Bank');
          });

          return Response::json([
            'email' => $email,
          ] , 201);

    }

    public function CheckForgetPasswordCode(Request $request) 
    {
        $request->validate([
            'email' => ['required' , 'email' , 'exists:users,email'] , 
            'code' => ['required' , 'max:5' , 'min:5']
        ]);
        $email = $request->email;
        $code = $request->code;

        $forget_password_instance = CustomForgetPassword::where('email' , $email )->where('code' , $code)->first();
        if($forget_password_instance ) {
          $forget_password_instance->delete();
          return Response::json([
                'email' => $email
          ], 200);
        }

        return Response::json([
          'message' => 'invalid check forget password code'
        ] , 401);


    }

    public function ResetForgetedPassword(Request $request)
    {
      $request->validate([
        'email' => ['required' , 'email' , 'exists:users,email'] , 
        'password' => ['required' , 'min:6' , 'confirmed']
    ]);

    $email = $request->email;
    $password = $request->password;

    $user = User::where('email' , $email)->first();
    if($user){
        $user->update([
          'password' => Hash::make($password)
        ]);
        return Response::json([
          'message' => 'success reset your password' 
        ], 201);
    }
    return Response::json([
      'message' => 'the user not found'
    ] , 404);
    
    }
    


}
