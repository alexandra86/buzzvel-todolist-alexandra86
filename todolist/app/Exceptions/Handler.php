<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        
    }
    public function render($request, Throwable $error){
        if($error instanceof ValidationException){
            return response()->json([
                'errors' => $error->validator->errors()
            ], 422);
        }


        if($error instanceof AppError){
            return response()->json([
                'errors' => $error->getMessage()
            ], $error->getCode());
        }

        return response()->json([
            'message' => 'Internal server error.'
        ], 500);
    }
}
