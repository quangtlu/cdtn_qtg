<?php

namespace App\Http\Requests\Admin\Faq;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFaqRequest extends FormRequest
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
            'question' => ['required', Rule::unique('faqs', 'question')],
            'answer' => ['required', Rule::unique('faqs', 'answer')],
        ];
    }

    public function messages()
    {
        return [
            'question.unique' => 'Câu hỏi đã tồn tại',
            'answer.unique' => 'Câu trả lời đã tồn tại',
            'question.required' => 'Vui lòng nhập câu hỏi',
            'answer.required' => 'Vui lòng nhập câu trả lời'
        ];
    }
}
