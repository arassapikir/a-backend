<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        try{
            User::findOrFail(Auth::id())->update([
                'name' => $request->get('name')
            ]);
            return $this->successResponse([]);
        }
        catch(\Exception $e){
            return $this->errorResponse($e->getMessage());
        }
    }

    public function password(Request $request): JsonResponse
    {
        $request->validate([
            'password_old' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);
        try{
            if (Hash::check($request->get('password_old'), Auth::user()->password)){
                User::findOrFail(Auth::id())->update(['password' => Hash::make($request->get('password'))]);
                return $this->successResponse([]);
            }
            return $this->errorResponse("Häzirki paroly nädogry girizdiňiz.", 400);
        }
        catch(\Exception $e){
            return $this->errorResponse($e->getMessage());
        }
    }
}
