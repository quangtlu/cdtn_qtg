<?php

namespace App\Http\Requests\Admin\Owner;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOwnerRequest extends FormRequest
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
            'name' => ['required', Rule::unique('owners','name')->ignore($this->id)],
            'phone' => ['bail', 'required', 'regex:/(0)[0-9]{9}/', 'max:10', Rule::unique('owners','phone')->ignore($this->id)],
            'email' => ['bail', 'required', 'email:rfc,dns', Rule::unique('owners','email')->ignore($this->id)],
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
            'email.email' => 'Vui lòng nhập đúng email',
            'email.unique' => 'Email đã tồn tại',
            'dob.date_format' => 'Vui lòng nhập đúng định dạng Ngày-tháng-năm',
            'dob.before' => 'Ngày sinh không được là ngày trong tương lai',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự',
        ];
    }
}
