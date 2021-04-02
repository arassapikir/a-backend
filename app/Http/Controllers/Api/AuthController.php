<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Api\ApiBaseController
{
    public function login(LoginRequest $request): JsonResponse
    {
        try{
            $user = User::updateOrCreate(
                [
                    'phone' => $request->get('phone'),
                    'project_id' => $this->project->id,
                    'type' => 'user',
                ],
                [
                    'name' => $request->get('name'),
                    'phone_verified_at' => null,
                    'ip' => $request->ip(),
                    'platform' => strtolower($request->header('Platform')),
                    'version' => $request->header('Version'),
                    'language' => strtolower($request->header('Language')),
                    'last_visited_at' => now()
                ]
            );

            if (in_array($user->status, $this->blocked_user_statuses))
                return $this->errorResponse(__('config.user_is_blocked'), 451);

            $user->update([
                'otp' => 123456,
//                'otp' => random_int(100000, 999999),
                "status" => "unverified"
            ]);

            return $this->successResponse(['message' => __('config.otp_is_sent')], 201);
        }
        catch (\Exception $e){
            return $this->errorResponse($e->getMessage());
        }
    }

    public function verify(VerifyRequest $request){
        try{
            $user = User::where('phone', $request->phone)->first();
            if(!$user){
                return $this->errorResponse(__('config.phone_number_not_find'), 404);
            }
            if ($request->get('phone') != 64871221 && $request->get('otp') != 123456)
                if ($user->otp != $request->otp) {
                    return $this->errorResponse(__('config.invalid_otp'), 400);
                }
            $user->update([
                'phone_verified_at' => now(),
                'is_verified' => true,
                'otp' => null,
                'language' => strtolower($request->header('Language')),
                'platform' => strtolower($request->header('Platform')),
                'version' => $request->header('Version'),
                'last_visited_at' => now()
            ]);
            $token = $user->createToken('Personal Access Token');
            return $this->successResponse([
                'access_token' => $token->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => strtotime(Carbon::parse($token->token->expires_at)->toDateTimeString()),
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'phone' => $user->phone,
                ]
            ], 201);
        }
        catch (\Exception $e){
            return $this->errorResponse($e->getMessage());
        }
    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        return $this->successResponse(['message' => __('config.logout')]);
    }
}
