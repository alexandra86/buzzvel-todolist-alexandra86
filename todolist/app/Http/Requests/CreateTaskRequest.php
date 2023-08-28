<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{

    public function authorize(): bool{
        return true;
    }

    public function rules(): array {
        return [
            'title'=> ['required', 'string', 'min:3'],
            'description' => ['nullable', 'string'],
            'its_finished' => ['nullable', 'boolean'],
            'user_id' => ['nullable','exists: users,id'],

            
        ];
    }

    public function messages(): array{
        return [
            'title.required'=> 'Task title is required!',
            'title.string'=> 'Task title must be a string!',
            'title.min'=> 'The task title must contain at least 3 characters!',
            'description.string'=> 'Task description must be a string!',
            'its_finished.boolean'=> 'Task is_finished must be a boolean!',
        ];
    }
}