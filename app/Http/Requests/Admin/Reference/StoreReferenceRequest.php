<?php

namespace App\Http\Requests\Admin\Reference;

use Illuminate\Foundation\Http\FormRequest;

class StoreReferenceRequest extends FormRequest
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
            'title' => 'required|unique:references',
            'url' => 'required|unique:references',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'title.unique' => 'Tiêu đề đã tồn tại',
            'url.required' => 'Vui lòng nhập đường dẫn',
            'url.unique' => 'Đường dẫn đã tồn tại',
        ];
    }
}
