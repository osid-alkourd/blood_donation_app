<?php

namespace App\Http\Controllers\Api\Authentication;

use App\Http\Controllers\Controller;
use App\Models\EmailVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;

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
            ]);
        }

        return Response::json([
            'message' => 'Invalid Code'
        ]);
    }
}
