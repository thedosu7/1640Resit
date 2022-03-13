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
            'idea-title.string' => 'The title is not in correct format',
            'idea-title.unique' => 'The title must be unique',
            'idea-title.max' => 'The length of the title is not bigger than 255',
            'idea-content.required' => 'The content is required',
            'idea-content.string' => 'The content is not in correct format',
            'idea-category.required' => 'The category is required',
            'idea-category.string' => 'The category is not in correct format',
            'is-agree.required' => 'You must agree with all terms and conditions before submitting',
        ];        
    }
}
