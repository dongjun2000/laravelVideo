<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonStoreRequest extends FormRequest
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
            'title'     => 'required|min:2|max:50',
            'intro'     => 'required|min:2|max:200',
            'preview'   => 'nullable|image',
            'iscommend' => 'nullable|in:0,1',
            'ishot'     => 'nullable|in:0,1',
            'click'     => 'nullable|integer',
            'videos'    => 'nullable|json'
        ];
    }

    public function attributes()
    {
        return [
            'intro' => '课程简介'
        ];
    }
}
