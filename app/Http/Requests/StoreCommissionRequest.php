<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommissionRequest extends FormRequest
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
            'amount' => 'required|numeric',
			'tenant_id' => 'required|exists:App\Models\Tenant,id',
			'commission_proof' => 'required|image|max:2048',
			'note' => 'nullable|string|max:255',
        ];
    }
}
