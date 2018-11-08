<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentProfileSaveRequest extends FormRequest
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
            'payment_type' => 'required',
            'card_no' => 'required_if:payment_type,CARD',
            'card_exp_date' => 'required_if:payment_type,CARD',
            /*'bank_name' => 'required_if:payment_type,BANK',*/
            'bank_routing_no' => 'required_if:payment_type,BANK',
            'bank_account_no' => 'required_if:payment_type,BANK',
            'bank_account_type' => 'required_if:payment_type,BANK',
            'name' => 'required|name|max:47',
            'address' => 'required|address|max:47',
            'city' => 'required|city|max:50',
            //'state' => 'required|max:2',
            'state' => 'required',
            //'zip' => 'required|zip|min:5|max:5',
            'zip' => 'zip|min:5|max:5',
            'phone' => 'required|phone|min:10|max:10',
        ];
    }
}
