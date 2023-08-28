<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskAuthorizationService {
    public function checkAuthorization(Task $task): void{
        if ($task->assignee_id !== Auth::id()) {
            throw new AppError("You don't have permission to change this task!", 403);
        }

    }
}