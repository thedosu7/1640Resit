<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeRequest extends FormRequest
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
            'old-password' => 'required|min:6|max:50',
            'new-password' => 'required|min:6|max:50',
            'new-password-confirm' => 'required|same:new_password'
        ];
    }

    public function messages()
    {
        return [
            'old-password.required' => 'The old password is required',
            'old-password.min' => 'The length of the old password is not smaller that 6',
            'old-password.max' => 'The length of the old password is not bigger that 50',
            'new-password.required' => 'The new password is required',
            'new-password.min' => 'The length of the new password is not smaller that 6',
            'new-password.max' => 'The length of the new password is not bigger that 50',
            'new-password-confirm.required' => 'The new password is required to confirm',
            'new-password-cofirm.same' => 'The confirm password and new password are not the same',
        ];        
    }
}
