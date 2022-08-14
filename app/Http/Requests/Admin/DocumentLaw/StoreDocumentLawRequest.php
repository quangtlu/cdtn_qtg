<?php

namespace App\Http\Requests\Admin\DocumentLaw;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentLawRequest extends FormRequest
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
            'title' => 'required',
            'url' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng tên văn bản pháp luật',
            'url.required' => 'Vui lòng chọn file đính kèm',
        ];
    }
}
