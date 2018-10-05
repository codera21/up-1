<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MaterialSaveRequest extends FormRequest
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
            //'sub_group_id' => 'required',  // in current flow the material sub group is not needed
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'material_type' => 'required',
            'video_url' => 'mimes:flv,mp4|max:5000000',
            'course_url' => 'required_if:material_type,COURSE|mimes:doc,docx,pdf',
            'price' => 'required|numeric',
            //'payment_type' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return type
     */
    
}
