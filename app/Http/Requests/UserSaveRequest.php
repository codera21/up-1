<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSaveRequest extends FormRequest
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
            'email' => 'required|email|max:64|unique:users',
            'first_name' => 'required|name|max:47',
            'last_name' => 'required|name|max:47',
            'address1' => 'required|address|max:47',
            'country' => 'required|address|max:47',
            'state' => 'required',
            'phone' => 'required|digits:10|min:10|max:10',
            'password' => 'required|min:6|max:20',
            'password_confirmation' => 'required|min:6|max:20',
        ];
    }
}
