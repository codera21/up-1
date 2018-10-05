<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MaterialSubGroupSaveRequest extends FormRequest
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
            'group_id' => 'required',
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'price' => 'required|numeric',
            //'payment_type' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return type
     */
    /*public function messages()
    {
       return [

           'mode.required' => 'Please select data mode type',

       ];
    }*/
}
