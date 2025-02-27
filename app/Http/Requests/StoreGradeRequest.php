<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradeRequest extends FormRequest
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
            'category_id' => 'required|exists:App\Models\Category,id',
			'exam_id' => 'required|exists:App\Models\Exam,id',
			'user_id' => 'required|exists:App\Models\User,id',
			'duration' => 'required|numeric',
			'number' => 'required|numeric',
			'section' => 'required|numeric',
			'total_section' => 'required|numeric',
			'start_time' => 'nullable',
			'end_time' => 'nullable',
			'total_correct' => 'required|numeric',
			'grade_old' => 'nullable|numeric',
			'grade' => 'nullable|numeric',
			'answers' => 'nullable|string|max:255',
			'is_finished' => 'nullable|numeric',
			'total_tolerance' => 'nullable|numeric',
			'is_blocked' => 'nullable|numeric',
        ];
    }
}
