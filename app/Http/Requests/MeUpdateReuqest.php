<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeUpdateReuqest extends FormRequest
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
            'nickname'     => 'required|min:2|max:20',
            'old_password' => 'required',
            'password'     => 'required|confirmed'
        ];
    }

    public function attributes()
    {
        return [
            'nickname'     => '昵称',
            'old_password' => '旧密码',
            'password'     => '新密码',
        ];
    }
}
