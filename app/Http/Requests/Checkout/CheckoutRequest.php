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
                'max:255'
            ],
            'last_name' => [
                'required',
                'string',
                'max:255'
            ],
            'street' => [
                'required',
                'string',
                'max:1200'
            ],
            'state' => [
                'string',
                'max:200'
            ],
            'zip_code' => [
                'string',
                'max:200'
            ],
            'phone' => [
                'string',
                'max:200'
            ],
            'email' => [
                'required',
                'email',
                'max:100',
                'unique:App\Models\Shop\GiftCard,email'
            ],
            'cart_id' => [
                'exists:App\Models\Shop\Cart,id'
            ],
            'user_id' => [
                'required',
                'exists:App\Models\User,id'
            ],
        ];
    }
}
