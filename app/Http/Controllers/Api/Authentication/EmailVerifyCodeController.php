<?php

namespace App\Http\Controllers\Api\Authentication;

use App\Http\Controllers\Controller;
use App\Models\EmailVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
class EmailVerifyCodeController extends Controller
{
    public function checkCode(Request $request) {
        $request->validate([
            'code' => ['required' , 'max:7' , 'min:7']
        ]);
        $user = Auth::guard('sanctum')->user();
        $code = $request->query('code');
        $verification_instance = EmailVerify::where('user_id' , $user->id)->where('code' , $code)->first();
        if($verification_instance) {
            User::findOrFail($user->id)->update([
              'email_verified_at' => Carbon::now()
            ]);
            $verification_instance->delete();
            return Response::json([
                'message' => 'Success Verification'
            ] , 200);
        }

        return Response::json([
            'message' => 'Invalid Code'
        ] , 401);
    }

    // send email verification code
    public function sendEmailVerificationCode(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
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
        'message' => 'check your email'
      ] , 201);
    }
}
