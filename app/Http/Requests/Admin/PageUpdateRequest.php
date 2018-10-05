<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

// Request & Response
use Illuminate\Http\Request;
use App\Http\Requests;

class PageUpdateRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $page_id = $this->route('id');
        $language = $request->language;
        return [
            'status' => 'required',
            'sort_order' => 'numeric',
            'layout' => 'required',
            'title' => 'required|name|max:255',
            //'slug' => 'required|slug|unique:pages,slug,'. $page_id,
            'slug' => 'required|slug|unique:pages,slug,'.$page_id.',id,language,'.$language,
            'content' => 'required',
        ];
    }

    /**
     * Get the validation custom error messages.
     *
     * @return array
     */
    public function messages()
    {

        $messages = [
            'title.name' => 'Title should only contain letters and numbers',
            'slug.slug' => 'Slug should only contain letters, numbers and forward slash',
            ];

        return $messages;
    }
}
