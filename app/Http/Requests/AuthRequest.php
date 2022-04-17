<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()){
            case 'POST':
                if(Route::currentRouteName() === "login")
                    return [
                        'username' => ['required', 'string', 'exists:users'],
                        'password' => ['required', 'string', 'min:8']
                    ];

                if(Route::currentRouteName() === "register")
                    return [
                        'first_name' => ['bail', 'required', 'string', 'min:8', 'max:25'],
                        'last_name' => ['bail', 'required', 'string', 'min:8', 'max:25'],
                        'username' => ['bail', 'required', 'string', 'unique:users', 'min:8', 'max:25'],
                        'email' => ['bail', 'required', 'email', 'unique:users'],
                        'password' => ['bail', 'string', 'confirmed', 'min:8', 'max:25'],
                        'mobile' => ['bail', 'string', 'required', 'unique:users', 'digits:11'],
                    ];

            case 'GET':
                if(Route::currentRouteName() === "login")
                    return [
                        'username' => ['required', 'string', 'exists:users'],
                        'password' => ['required', 'string', 'min:8']
                    ];
        }
    }
}
