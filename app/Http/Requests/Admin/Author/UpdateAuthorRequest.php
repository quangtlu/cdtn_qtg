<?php

namespace App\Http\Requests\Admin\Author;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorRequest extends FormRequest
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
            'name' => 'required|max:255',
            'phone' => ['bail', 'required', 'regex:/(0)[0-9]{9}/', 'max:10', Rule::unique('authors','phone')->ignore($this->id)],
            'email' => ['bail', 'required', 'email:rfc,dns', Rule::unique('authors','email')->ignore($this->id)],
            'dob' => 'before:today|nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên tác giả',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'phone.regex' => 'vui lòng nhập đúng số điện thoại',
            'phone.max' => 'Số điện thoại tối đa 10 số',
            'email.required' => 'Vui lòng email',
            'email.email' => 'Vui lòng nhập đúng email',
            'email.unique' => 'Email đã tồn tại',
            'dob.before' => 'Ngày sinh không được là ngày trong tương lai',
        ];
    }
}
