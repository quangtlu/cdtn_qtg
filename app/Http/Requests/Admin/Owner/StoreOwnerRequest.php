<?php

namespace App\Http\Requests\Admin\Owner;

use Illuminate\Foundation\Http\FormRequest;

class StoreOwnerRequest extends FormRequest
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
            'name' => 'required|unique:owners',
            'phone' => 'bail|required|unique:owners|regex:/(0)[0-9]{9}/|max:10',
            'email' => 'bail|required|unique:owners|email:rfc,dns',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên chủ sở hữu',
            'name.unique' => 'Vui lòng nhập tên chủ sở hữu đã tồn tại',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'phone.regex' => 'vui lòng nhập đúng số điện thoại',
            'phone.max' => 'Số điện thoại tối đa 10 số',
            'email.required' => 'Vui lòng email',
            'email.email' => 'Vui lòng nhập đúng email',
            'email.unique' => 'Email đã tồn tại',
        ];
    }
}
