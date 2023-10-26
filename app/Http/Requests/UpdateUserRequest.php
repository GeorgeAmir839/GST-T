<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'first_name' => 'string|max:255|regex:/^[^\s]+$/',
            'last_name' => 'string|max:255|regex:/^[^\s]+$/',
            'phone_number' => 'numeric|digits:10|unique:users|regex:/^[^\s]+$/',
            'email' => ['email', 'max:255', Rule::unique('users')],
            'password' => 'string|min:8|regex:/^[^\s]+$/',
            'confirmed_password' => 'same:password',
            'birth_date' => 'date|regex:/^\d{4}-\d{2}-\d{2}$/',
        ];
    }
    public function messages()
    {
        return [
            'first_name.regex' => 'The field cannot contain spaces.',
            'last_name.regex' => 'The field cannot contain spaces.',
            'phone_number.regex' => 'The field cannot contain spaces.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.regex' => 'The field cannot contain spaces.',
            'birth_date.regex' => 'The :attribute must be in the yyyy-mm-dd format.',

        ];
    }
}
