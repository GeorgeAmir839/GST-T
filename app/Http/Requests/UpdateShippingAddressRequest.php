<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShippingAddressRequest extends FormRequest
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
            'latitude' => 'between:-90,90',
            'longitude' => 'between:-180,180',
            'phone_number' => 'required|numeric|digits:10|regex:/^[^\s]+$/',

        ];
    }
    public function messages()
    {
        return [
            'latitude.regex' => 'The field cannot contain spaces.',
            'longitude.regex' => 'The field cannot contain spaces.',

        ];
    }
}