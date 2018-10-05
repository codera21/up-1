<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            //'email' => 'required|email|max:100|unique:users,email,'.Auth::user()->id,
            'first_name' => 'required|max:47',
            'last_name' => 'required|max:47',
            'address1' => 'required|max:47',
            'city' => 'required|max:50',
            //'state' => 'required|min:2|max:2',
            'state' => 'required',
            //'zip' => 'required|min:5|max:5',
            'zip' => 'min:5|max:5',
            'phone' => 'required|digits:10|min:10|max:10',
        ];
                    
    }
}