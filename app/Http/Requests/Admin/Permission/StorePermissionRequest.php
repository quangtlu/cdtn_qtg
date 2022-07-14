<?php

namespace App\Http\Requests\Admin\Permission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePermissionRequest extends FormRequest
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
            'module' => 'required',
            'action' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'module.required' => 'Vui lòng chọn moudle',
            'action.required' => 'Vui lòng chọn action',
        ];
    }
}
