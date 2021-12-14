<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGameRequest extends FormRequest
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
            'title' => 'bail|required|string|max:255',
            'publisher' => 'bail|required|integer',
            'category.*' => 'bail|required|integer',
            'release_year' =>  'bail|required|integer',
            'description' => 'bail|required|string|max:255',
        ];
    }
}
