<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|unique:products',
            'pub_date' => 'before:today',
            'regis_date' => 'before:today',
            'author_id' => 'required',
            'owner_id' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên tác phẩm',
            'name.unique' => 'Tên tác phẩm đã tồn tại',
            'pub_date.before' => 'Ngày xuất bản tác phẩm không được là ngày trong tương lai',
            'regis_date.before' => 'Ngày đăng kí bản quyền tác phẩm không được là ngày trong tương lai',
            'author_id.required' => 'Vui lòng chọn tác giả',
            'owner_id.required' => 'Vui lòng chọn chủ sở hữu',
            'description.required' => 'Vui lòng nhập miêu tả',
        ];
    }
}
