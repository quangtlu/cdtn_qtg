<?php

namespace App\Http\Requests\Admin\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'phone' => ['bail', 'required', 'regex:/(0)[0-9]{9}/', 'max:10', Rule::unique('users','phone')->ignore($this->id)],
            'email' => ['bail', 'required', Rule::unique('users','email')->ignore($this->id)],
            'dob' => 'bail|before:today|nullable',
            'password' => 'nullable|min:8',
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
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại',
            'dob.before' => 'Ngày sinh không được là ngày trong tương lai',
            'password.min' => 'Mật khẩu tối thiểu 8 kí tự',
        ];
    }
}
