<?php

namespace App\Http\Requests\Admin\Room;

use Illuminate\Foundation\Http\FormRequest;

class StoreChatroomRequest extends FormRequest
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
            'name' => 'required|unique:chatrooms',
            'user_id' => 'required',
            'post_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui nhập tên phòng tư vấn',
            'name.unique' => 'Tên phòng tư vấn đã tồn tại',
            'user_id' => 'Vui lòng chọn thành viên',
            'post_id' => 'Vui lòng chọn bài viết',
        ];
    }
}
