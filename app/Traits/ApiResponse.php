<?php


namespace App\Traits;


trait ApiResponse
{

    /*
     * Only validation response will have messages item.
     * Messages will contain input validation errors.
     * Also, it will be already translated to user's current language
     *
     * Datatype of message is an array.
     *
     * Example:
     * messages = [
     *      "inputName1": "Validation error message 1",
     *      "inputName2": "Validation error message 2",
     *      "inputName3": "Validation error message 3",
     * ]
     */


    public $responseCodes = [
        200 => 'Data',
        201 => 'Created',
        202 => 'Updated',
        204 => 'Deleted',

        400 => 'Invalid parameter or content',
        403 => 'Not authorized',
        404 => 'Not found',
        422 => 'Validation error',
        500 => 'Server error'
    ];

    public function successResponse(array $data, $code = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json(['success' => true] + $data, $code);
    }

    public function errorResponse($message, $code = 500, $errors = null): \Illuminate\Http\JsonResponse
    {
        if ($code == 422){
            return response()->json(['success' => false, 'code' => $code, 'message' => $message, 'errors' => $errors], $code);
        }
        return response()->json(['success' => false, 'code' => $code, 'message' => $message], $code);
    }
}
