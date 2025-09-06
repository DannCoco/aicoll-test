<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nit' => 'sometimes|string|max:20|unique:companies,nit,' . $this->route('id'),
            'name' => 'sometimes|string|min:2|max:100',
            'address' => 'sometimes|string|min:2|max:255',
            'phone' => 'sometimes|string|min:7|max:15|regex:/^[0-9+\-()\s]+$/',
            'state' => ['sometimes', 'in:ACTIVE,INACTIVE'],
        ];
    }
}
