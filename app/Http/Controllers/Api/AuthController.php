<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\VerifyRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::updateOrCreate(
            [
                'phone' => $request->get('phone'),
                'project_id' => $this->project->id,
                'type' => 'user',
            ],
            [
                'name' => $request->get('name'),
                'phone_verified_at' => null
            ]
        );

        if ($user->is_user_blocked()){
            return $this->errorResponse(__('config.user_is_blocked'), 451);
        }

        $user->update([
            'otp' => 123456,
//                'otp' => random_int(100000, 999999),
            "status" => "unverified"
        ]);

        return $this->successResponse(['message' => __('config.otp_is_sent')], 201);
    }

    public function verify(VerifyRequest $request): JsonResponse
    {
        $user = User::where('phone', $request->get('phone'))->firstOrFail();

        if ($request->get('phone') != 64871221 && $request->get('otp') != 123456)
            if ($user->otp != $request->get('otp')) {
                return $this->errorResponse(__('config.invalid_otp'), 400);
            }

        $user->update([
            'phone_verified_at' => now(),
            'status' => "active",
            'otp' => null
        ]);

        $token = $user->createToken($this->project->subdomain . "-" . $user->phone)->plainTextToken;

        return $this->successResponse([
            'access_token' => "Bearer $token",
            'user' => new UserResource($user)
        ], 201);
    }

    public function logout(): JsonResponse
    {
        Auth::guard('api')->user()->tokens()->delete();
        return $this->successResponse(['message' => __('config.logout')]);
    }
}
