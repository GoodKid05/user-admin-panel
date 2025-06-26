<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'full_name' => 'sometimes|required|string|max:255|regex:/^[\p{L}\s]+$/u',
            'date_of_birth' => 'sometimes|required|date',
            'phone' => 'sometimes|required|string',
            'email' => 'sometimes|required|string|unique:users,email,' . $this->route('id'),
            'login' => 'sometimes|required|string|unique:users,login,' . $this->route('id'),
            'password' => 'sometimes|nullable|string|min:6'
        ];
    }

    public function failedValidation(Validator $validator) 
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Ошибка валидации',
            'errors' => $validator->errors()
        ], 422));
    }

    public function messages() 
    {
        return [
            'full_name.regex' => 'Full name must contain only letters and spaces',
        ];
    }
}
