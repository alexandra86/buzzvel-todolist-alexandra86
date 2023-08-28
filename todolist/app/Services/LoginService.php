<?php

namespace App\Services;

use App\Exceptions\AppError;
use Illuminate\Support\Facades\Log;

class LoginService {
    public function execute(array $data){
        Log::debug('Service Login');


        if(!$token = auth()->attempt($data)){
            throw new AppError('Incorrect email or password!', 401);
        }
        return $this->responseToken($token);
    }

    private function responseToken($token){
        return response()->json([
            'token' => $token,
            'user' => auth()->user()
        ]);
    }
}