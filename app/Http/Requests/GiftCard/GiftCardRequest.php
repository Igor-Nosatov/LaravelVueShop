<?php

namespace App\Http\Requests\GiftCard;

use Illuminate\Foundation\Http\FormRequest;

class GiftCardRequest extends FormRequest
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
                'max:100',
                'string'
            ],
             'email' => [
                'required',
                'email',
                'max:100',
                'unique:App\Models\Shop\GiftCard,email'
            ],
            'recipient_name' => [
                'required',
                'max:100',
                'string'
            ],
            'recipient_email' => [
                'required',
                'email',
                'max:100',
                'unique:App\Models\Shop\GiftCard,email'
            ],
           'message' => [
                'max:100',
                'string'
            ],
            'amount' => [
                'required',
                'integer'
            ],
              'user_id' => [
                'exists:App\Models\User,id'
                ]
        ];
    }
}
