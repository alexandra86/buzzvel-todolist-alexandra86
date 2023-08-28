<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserAuthorizationService {
    public function checkAuthorization(User $user): void{
        if ($user->id !== Auth::id()) {
            throw new AppError('You do not have permission to change!', 403);
        }

    }
}