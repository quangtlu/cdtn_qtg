<?php

namespace App\Http\Requests\Admin\Product;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => ['required',Rule::unique('products','name')->ignore($this->id)],
            'pub_date' => 'before:today',
            'author_id' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên tác phẩm',
            'name.unique' => 'Tên tác phẩm đã tồn tại',
            'pub_date.before' => 'Ngày xuất bản tác phẩm không được là ngày trong tương lai',
            'author_id.required' => 'Vui lòng chọn tác giả',
            'description.required' => 'Vui lòng nhập miêu tả',
        ];
    }
}
