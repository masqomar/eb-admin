<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradeDetailRequest extends FormRequest
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
			'value_category_id' => 'nullable|exists:App\Models\ValueCategory,id',
			'grade_id' => 'required|exists:App\Models\Grade,id',
			'total_correct' => 'required|numeric',
			'total_wrong' => 'required|numeric',
			'grade' => 'required|numeric',
        ];
    }
}
