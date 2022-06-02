<?php

namespace App\Http\Requests\Admin\Post;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => ['required',Rule::unique('posts','title')->ignore($this->id)],
            'tag_id' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề bài viết',
            'title.unique' => 'Tiêu đề bài viết đã tồn tại',
            'tag_id.required' => 'Vui lòng chọn thẻ tag',
            'category_id.required' => 'Vui lòng chọn danh mục',
            'content.required' => 'Vui lòng nhập nội dung',
        ];
    }
}
