<?php

namespace App\Http\Requests\User\Quiz;

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
            'user_questionnaire' => 'required|array',
            'user_questionnaire.*.questionnaire_id' => 'required|exists:questionnaires,id',
            'user_questionnaire.*.answer_id' => 'required|exists:answers,id',
        ];
    }
}
