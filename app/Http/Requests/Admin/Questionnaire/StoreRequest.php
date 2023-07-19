<?php

namespace App\Http\Requests\Admin\Questionnaire;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'answers' => 'required|array|size:4',
            'answers.*.title' => 'required',
            'answers.*.is_correct' => 'nullable',
        ];
    }
}
