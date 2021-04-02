<?php

namespace App\Exceptions;

use App\Traits\ApiResponse;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponse;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function ( Exception $exception, $request) {
            if ($request->headers->has('X-Custom-Token')){

                if ($exception instanceof AuthenticationException) {
                    return $this->errorResponse("Unauthenticated", 401);
                }

                if ($exception instanceof MethodNotAllowedHttpException) {
                    return $this->errorResponse('Invalid method.', 405);
                }

                if ($exception instanceof NotFoundHttpException) {
                    return $this->errorResponse('404', 404);
                }

                if ($exception instanceof ModelNotFoundException) {
                    $modelName = strtolower(class_basename($exception->getModel()));
                    return $this->errorResponse("$modelName not found.", 404);
                }

                if ($exception instanceof ValidationException) {
                    return $this->errorResponse(__('auth.failed'), 422, $exception->errors());
                }

                if ($exception instanceof QueryException) {
                    $errorCode = $exception->errorInfo[1];
                    if ($errorCode == 1451) {
                        return $this->errorResponse('Cannot remove this resource permanently. It is related with any other resource', 400);
                    }
                }
            }
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
