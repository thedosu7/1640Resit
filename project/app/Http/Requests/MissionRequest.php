<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MissionRequest extends FormRequest
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
            'name' => 'required|string|unique:missions|max:255',
            'description' => 'required|string|max:255',
            'end_day' => 'required',
            'category' => 'required',
            'department' => 'required',
            'semester' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name mission is required',
            'name.unique' => 'The name mission is already',
            'description.required' => 'The mission description is required',
            'end_day.required' => 'The deadline is required',
            'category.required' => 'Please choose the category',
            'department.required' => 'Please choose the department',
            'semester.required' => 'Please choose the semester',
        ];        
    }


}
