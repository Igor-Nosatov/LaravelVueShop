<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class CartCreateRequest extends FormRequest
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
            'quantity'=> [
                'required',
                'integer'
            ],
            'promo_code'=> [
                'required',
                'string',
                'min:5',
                'max:255'
            ],
            'shipped_days'=> [
                'required',
                'integer',
                'min:5',
                'max:20'
            ],
            'user_id' => [
                'exists:App\Models\User,id'
            ],
            'shoes_id' => [
                'exists:App\Models\Shop\Shoes,id'
            ]
        ];
    }
}
