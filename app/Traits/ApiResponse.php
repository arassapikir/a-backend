<?php


namespace App\Traits;


use Illuminate\Http\JsonResponse;

trait ApiResponse
{

    /**
     *   Success codes
     *   200 => 'Data',
     *   201 => 'Created',
     *   202 => 'Updated',
     *   204 => 'Deleted',
     *
     *   Client errors codes
     *   400 => 'Invalid parameter or content',
     *   403 => 'No access',
     *   403 => 'No access',
     *   404 => 'Not found',
     *   406 => 'Version failed',
     *   409 => 'Invalid header',
     *   422 => 'Validation error',
     *   451 => 'User is blocked',
     *
     *   Server errors codes
     *   500 => 'Server error'
     */

    public array $responseCodes = [

    ];

    public function successResponse(array $data, $code = 200): JsonResponse
    {
        return response()->json(['success' => true] + $data, $code);
    }

    public function errorResponse($message, $code = 500, $errors = null): JsonResponse
    {
        if ($code == 422){
            return response()->json(['success' => false, 'code' => $code, 'message' => $message, 'errors' => $errors], $code);
        }
        return response()->json(['success' => false, 'code' => $code, 'message' => $message], $code);
    }
}
