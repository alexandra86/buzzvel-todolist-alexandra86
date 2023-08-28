<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    
    public function authorize(): bool{
        return true;
    }

    public function rules(): array {
        return [
            'name'=> ['required', 'string', 'min:3'],
            'email'=>['required', 'email'],
            'password'=>['required', 'min:6'],
        ];
    }

    public function messages(): array{
        return [
            'name.required'=> 'The name is required!',
            'name.string'=> 'The name must be a string!',
            'name.min'=> 'The name must contain at least 3 characters!',
            'email.required'=> 'Email is required!',
            'email.email'=>'Email must be a valid address!',
            'password.required'=> 'Password is required!',
            'password.min'=>'Password must contain at least 6 characters!',
        ];
    }
}
