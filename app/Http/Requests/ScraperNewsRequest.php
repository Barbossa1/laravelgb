<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScraperNewsRequest extends FormRequest
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
            'news_title' => 'required|min:2|max:100',
            'news_date' => 'required|min:2|max:100',
            'news_link' => 'required|min:10|max:500',
            'news_image' => 'sometimes'
        ];
    }
}
