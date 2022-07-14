<?php

namespace App\Http\Requests\Admin\Category;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => ['required',Rule::unique('categories','name')->ignore($this->id)],
            'parent_id' => 'required',
            'type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'parent_id.required' => 'Vui lòng chọn danh mục cha',
            'type.required' => 'Vui lòng chọn loại danh mục',
        ];
    }
}
