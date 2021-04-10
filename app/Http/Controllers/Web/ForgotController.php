<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgotController extends Controller
{
    public function forgot(){
        return view('auth.forgot');
    }

    public function forgot_send_otp(Request $request){
        $request->validate([
            "phone" => "required|numeric|between:61000000,65999999"
        ]);
        $user = User::where("phone", $request->get("phone"))->first();
        if (!$user){
            return response()->json([
                "status" => false,
                "message" => "Nädogry telefon belgi girizdiňiz."
            ]);
        }
//        $otp = rand(100000, 999999);
        $otp = 123456;
        $user->update(["otp" => $otp]);
        return response()->json([
            "status" => true
        ]);
    }

    public function forgot_store(Request $request){
        $request->validate([
            "phone" => "required|numeric|between:61000000,65999999",
            "otp" => "required|numeric"
        ]);
        $user = User::where("phone", $request->get("phone"))
            ->where("otp", $request->get("otp"))
            ->first();
        if (!$user){
            return response()->json([
                "status" => false,
                "message" => "Nädogry belgi girizdiňiz."
            ]);
        }
        $user->update(["fcm_token" => Str::random(60)]);
        return response()->json([
            "status" => true,
            "token" => $user->fcm_token
        ]);
    }

    public function password(Request $request){
        $request->validate([
            "password" => "required|min:8|confirmed",
            "token" => "required|string"
        ]);
        $user = User::where("fcm_token", $request->get("token"))->first();
        if (!$user){
            return redirect()->back()->withErrors(["error", "Näsazlyk ýüze çykdy (Kod: 001)."]);
        }
        $user->update(["password" => Hash::make($request->get("password"))]);
        return redirect("/login")->with("success", "Parolyňyz üstünlikli üýtgedildi.");
    }
}
