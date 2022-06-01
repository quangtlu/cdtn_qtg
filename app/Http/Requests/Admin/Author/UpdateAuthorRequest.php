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
            'name' => 'required',
            'dob' => 'bail|before:today',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên tác giả',
            'dob.before' => 'Ngày sinh không được là ngày trong tương lai',
        ];
    }
}
