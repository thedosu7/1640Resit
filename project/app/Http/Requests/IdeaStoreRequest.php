<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdeaStoreRequest extends FormRequest
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
            'idea-title' => 'required|string|unique:ideas|max:255',
            'idea-content' => 'required|string',
            'idea-category' => 'required|string',
            'choosen-file' => '',
            'is-agree' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'idea-title.required' => 'The title is required',
            'idea-content.required' => 'The content is required',
            'idea-category.required' => 'The category is required',
            'is-agree.required' => 'You must agree with all terms and conditions before submitting',
        ];        
    }
}
