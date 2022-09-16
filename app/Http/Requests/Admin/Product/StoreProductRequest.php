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
            'description' => 'required',
            'regis_date' => 'required',
            'pub_date' => 'required',
            'owner_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên tác phẩm',
            'name.unique' => 'Tên tác phẩm đã tồn tại',
            'description.required' => 'Vui lòng nhập miêu tả',
            'regis_date.required' => 'Vui lòng nhập ngày đăng ký bản quyền',
            'pub_date.required' => 'Vui lòng nhập xuất bản',
            'owner_id.required' => 'Vui lòng chọn chủ sở hữu',
        ];
    }
}
