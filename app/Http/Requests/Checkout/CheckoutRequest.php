<?php

namespace App\Http\Requests\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
                'min:5',
                'max:255'
            ],
            'last_name' => [
                'required',
                'string',
                'min:5',
                'max:255'
            ],
            'street' => [
                'required',
                'string',
                'min:5',
                'max:1200'
            ],
            'state' => [
                'string',
                'min:5',
                'max:200'
            ],
            'zip_code' => [
                'string',
                'min:5',
                'max:200'
            ],
            'phone' => [
                'string',
                'min:5',
                'max:200'
            ],
            'email' => [
                'required',
                'email',
                'min:3',
                'max:100',
                'unique:App\Models\Shop\GiftCard,email'
            ],
            'cart_id' => [
                'exists:App\Models\Shop\Cart,id'
            ]
        ];
    }
}
