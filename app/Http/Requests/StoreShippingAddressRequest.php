<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreShippingAddressRequest extends FormRequest
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
            'user_id'=>  [
                'required',
                Rule::exists('users', 'id'),
            ],
            'latitude' => 'required|between:-90,90',
            'longitude' => 'required|between:-180,180',
            'address' => 'required|string|max:255|regex:/^[^\s]+$/',
            'city' => 'required|string|max:255|regex:/^[^\s]+$/',
            'phone_number' => 'required|numeric|digits:10|regex:/^[^\s]+$/',
            'country' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'exists' => 'The selected :attribute is invalid.',
            'user_id.required' => 'User assignment required',
            'latitude.required' => 'The latitude field is required.',
            'longitude.required' => 'The longitude field is required.',
            'phone_number.required' => 'The phone number field is required.',
            'phone_number.regex' => 'The field cannot contain spaces.',
            'address.required' => 'The address field is required.',
            'city.required' => 'The city field is required.',
            'country.required' => 'The country field is required.',
            'city.regex' => 'The field cannot contain spaces.',
            'country.regex' => 'The field cannot contain spaces.',
            'address.regex' => 'The field cannot contain spaces.',

        ];
    }
}
