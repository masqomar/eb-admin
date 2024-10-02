<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
            'type' => 'nullable|numeric',
			'direction' => 'nullable|string|max:255',
			'audio_input' => 'nullable|numeric',
			'audio' => 'nullable|string|max:255',
			'audio_played' => 'nullable|numeric',
			'audio_played_limit' => 'nullable|numeric',
			'audio_answer_time' => 'nullable|numeric',
			'audio_played_finish' => 'nullable|numeric',
			'value_category_id' => 'nullable|exists:App\Models\ValueCategory,id',
			'question_title_id' => 'required|exists:App\Models\QuestionTitle,id',
			'answer' => 'nullable|numeric',
			'discussion' => 'nullable|string|max:255',
			'section' => 'nullable|numeric',
        ];
    }
}
