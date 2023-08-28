<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\User;

class CreateUserService {
    public function execute(array $data){
        $userFound = User::firstWhere('email', $data['email']);

        if(!is_null($userFound)){
            throw new AppError('E-mail already registered!', 409);
        }

        return User::create($data);
    }
}