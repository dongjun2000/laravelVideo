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
     * 添加验证规则
     */
    public function addValidator()
    {
        // 验证用户密码
        \Validator::extend('check_password', function($attribute, $value, $parameters, $validator) {
            return \Hash::check($value, \Auth::guard('admin')->user()->password);
        });
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->addValidator();

        return [
            'nickname'     => 'required|min:2|max:20',
            'old_password' => 'required|check_password',
            'password'     => 'required|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'old_password.check_password' => '原密码错误！',
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
