<?php

namespace App\Http\Requests\SignUp;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                'min:3',
                'max:255'
            ],
            'user_id' => [
                'exists:App\Models\User,id'
            ],
        ];
    }
}
