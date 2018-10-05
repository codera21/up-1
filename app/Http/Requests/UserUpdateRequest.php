<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        //$user_id = $this->route()->getParameter('id');
        /*return [
            'first_name' => 'required|name|max:50',
            'last_name' => 'required|name|max:50',
            //'email' => 'required|email|max:100|unique:users,email,' . $user_id,
            
            'address1' => 'required|address|max:255',
            'address2' => 'address|max:255',
            'phone' => 'required|digits:10',
            
            'city' => 'required|city|max:50',
            'state' => 'required',
            'zip' => 'required|zip|max:5',
            
        ];*/

        return [];
    }
}
