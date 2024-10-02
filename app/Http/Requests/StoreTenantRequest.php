<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTenantRequest extends FormRequest
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
            'subdomain' => 'required|string|max:255',
			'account_bank' => 'required|string|max:255',
			'account_number' => 'required|string|max:255',
			'account_name' => 'required|string|max:255',
			'address' => 'required|string|max:255',
			'snk' => 'required|numeric',
			'subdomain_link' => 'required|string|max:255',
			'user_id' => 'required|string|max:255',
			'phone_number' => 'required|string|max:255',
        ];
    }
}
