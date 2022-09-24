<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           'first_name' => [
                'required',
                'string',
                'min:1',
                'max:255'
            ],
            'last_name' => [
                'required',
                'string',
                'min:1',
                'max:255'
            ],
          'email' => [
                'required',
                'email',
                'min:3',
                'max:255'
            ],
            'password' => [
                'required', Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ]
        ];
    }
}
