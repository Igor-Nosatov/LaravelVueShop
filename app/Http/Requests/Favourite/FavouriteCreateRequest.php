<?php

namespace App\Http\Requests\Favourite;

use Illuminate\Foundation\Http\FormRequest;

class FavouriteCreateRequest extends FormRequest
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
            'quantity' => [
                'required',
                'integer'
            ],
            'shoes_id' => [
                'exists:App\Models\Shop\Shoes,id'
            ],
            'user_id' => [
                'exists:App\Models\User,id'
            ],
        ];
    }
}
