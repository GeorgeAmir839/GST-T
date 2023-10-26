<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name' => 'required|string|max:255|regex:/^[^\s]+$/',
            'last_name' => 'required|string|max:255|regex:/^[^\s]+$/',
            'phone_number' =>'required|numeric|digits:10|unique:users|regex:/^[^\s]+$/',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|regex:/^[^\s]+$/',
            'confirmed_password' => 'required|same:password',
            'birth_date' => 'required|date|regex:/^\d{4}-\d{2}-\d{2}$/',
        ];
    }
    public function messages()
{
    return [
        'first_name.required' => 'The first name field is required.',
        'first_name.regex' => 'The field cannot contain spaces.',
        'last_name.required' => 'The last name field is required.',
        'last_name.regex' => 'The field cannot contain spaces.',
        'phone_number.required' => 'The phone number field is required.',
        'phone_number.regex' => 'The field cannot contain spaces.',
        'email.required' => 'The email field is required.',
        'password.required' => 'The password field is required.',
        'password.min' => 'The password must be at least 8 characters.',
        'password.regex' => 'The field cannot contain spaces.',
        'birth_date.regex' => 'The :attribute must be in the yyyy-mm-dd format.',

    ];
}
}
