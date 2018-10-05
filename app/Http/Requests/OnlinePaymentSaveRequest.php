<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OnlinePaymentSaveRequest extends FormRequest
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
            'sub_group_id' => 'required',
            'paid_for' => 'required',
            'material_id' => 'required_if:payment_for,MATERIAL',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return type
     */

    public function messages()
    {
       return [
           
           'group_id.required' => 'Please select group',
           'sub_group_id.required' => 'Please select level',
           'material_id.required' => 'Please select video/course',
           
       ];
    }
    
}
