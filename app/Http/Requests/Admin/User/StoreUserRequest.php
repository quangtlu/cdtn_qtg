<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'bail|required|unique:users|regex:/(0)[0-9]{9}/|max:10',
            'email' => 'bail|required|unique:users',
            'dob' => 'bail|before:today|nullable',
            'gender' => 'required',
            'password' => [
                'bail',
                'required',
                'min:8',
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên người dùng',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'phone.regex' => 'vui lòng nhập đúng số điện thoại',
            'phone.max' => 'Số điện thoại tối đa 10 số',
            'email.required' => 'Vui lòng email',
            'email.unique' => 'Email đã tồn tại',
            'dob.before' => 'Ngày sinh không được là ngày trong tương lai',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu 8 kí tự',
            'gender.required' => 'Vui lòng chọn giới tính',
        ];
    }
}
