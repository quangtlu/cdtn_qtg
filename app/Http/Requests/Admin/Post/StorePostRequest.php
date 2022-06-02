<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|unique:posts',
            'tag_id' =>'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tên bài viết',
            'title.unique' => 'Tên bài viết đã tồn tại',
            'tag_id.required' => 'Vui lòng chọn thẻ tag',
            'content.required' => 'Vui lòng nhập miêu tả',
        ];
    }
}
