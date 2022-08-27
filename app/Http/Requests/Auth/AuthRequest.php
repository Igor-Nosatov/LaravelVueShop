<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => [
                'required',
                'string',
                'min:5',
                'max:255'
            ],

            'email' => [
                'required',
                'string',
                'min:5',
                'max:255'
            ],
            'password' => [
                'required',
                'string',
                'min:10',
                'max:255'
            ],
        ];
    }
}
