<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'nit' => 'required|string|max:20|unique:companies,nit',
            'name' => 'required|string|min:2|max:100',
            'address' => 'required|string|min:2|max:255',
            'phone' => 'required|string|min:7|max:15|regex:/^[0-9+\-()\s]+$/',
            'state' => ['sometimes', 'in:ACTIVE,INACTIVE'],
        ];
    }

    public function messages(): array
    {
        return [
            'nit.required' => 'The NIT field is required.',
            'nit.string' => 'The NIT must be a string.',
            'nit.max' => 'The NIT may not be greater than 20 characters.',
            'nit.unique' => 'The NIT has already been taken.',

            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.min' => 'The name must be at least 2 characters.',
            'name.max' => 'The name may not be greater than 100 characters.',

            'address.required' => 'The address field is required.',
            'address.string' => 'The address must be a string.',
            'address.min' => 'The address must be at least 2 characters.',
            'address.max' => 'The address may not be greater than 255 characters.',

            'phone.required' => 'The phone field is required.',
            'phone.string' => 'The phone must be a string.',
            'phone.min' => 'The phone must be at least 7 characters.',
            'phone.max' => 'The phone may not be greater than 15 characters.',
            'phone.regex' => 'The phone format is invalid. Only numbers, spaces, parentheses, hyphens, and plus signs are allowed.',

            'state.in' => 'The state must be either ACTIVE or INACTIVE.',
        ];
    }
}
