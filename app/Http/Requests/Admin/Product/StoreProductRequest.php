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
            'owner_id' => 'required',
            'author_id' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên người dùng',
            'name.unique' => 'Tên tác phẩm đã tồn tại',
            'pub_date.before' => 'Ngày xuất bản tác phẩm không được là ngày trong tương lai',
            'regis_date.before' => 'Ngày đăng kí bản quyền bản tác phẩm không được là ngày trong tương lai',
            'owner_id.required' => 'Vui lòng chọn chủ sở hữu',
            'author_id.required' => 'Vui lòng chọn tác giả',
            'description.required' => 'Vui lòng nhập miêu tả',
        ];
    }
}
