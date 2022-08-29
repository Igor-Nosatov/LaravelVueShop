<?php

namespace App\Http\Requests\Review;

use Illuminate\Foundation\Http\FormRequest;

class ReviewCreateRequest extends FormRequest
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
            'review_headline' => [
                'required',
                'string',
                'min:5',
                'max:255'
            ],
            'nickname' => [
                'required',
                'string',
                'min:5',
                'max:255'
            ],
            'comment' => [
                'required',
                'string',
                'min:5',
                'max:1200'
            ],
            'overall_fit' => [
                'required',
                'string'
            ],
            'rating' => [
                'required',
                'integer'
            ],
            'image' => [
                'required',
                'mimes:jpeg,png,jpg,gif',
                'size:1024'
            ],
            'location' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
                'min:3',
                'max:100',
                'unique:App\Models\Shop\GiftCard,email'
            ],
            'policy_agree' => [
                'required',
                'boolean',
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
