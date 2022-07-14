<?php

namespace App\Http\Requests\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
            'name' => ['required', Rule::unique('roles', 'name')->ignore($this->id)],
            'permissionNames' => 'required',
        ];
    }

    public  function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên vai trò',
            'name.unique' => 'Tên vai trò đã tồn tại',
            'permissionNames.required' => 'Vui lòng gán quyền',
        ];
    }
}
