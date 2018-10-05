<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MaterialUpdateRequest extends FormRequest
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
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'material_type' => 'required',
            'video_url' => 'mimes:flv,mp4|max:12000',
            'course_url' => 'mimes:doc,docx,pdf',
            'price' => 'required|numeric',
            //'payment_type' => 'required',
        ];
    }
}
