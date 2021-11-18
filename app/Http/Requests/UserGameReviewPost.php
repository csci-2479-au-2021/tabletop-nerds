<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserGameReviewPost extends FormRequest
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
        return [
            'game_id' => 'bail|required|integer',
            'game_rating' => 'bail|required|numeric',
            'text_review' => 'bail|required|string|max:255',
        ];
    }
}
