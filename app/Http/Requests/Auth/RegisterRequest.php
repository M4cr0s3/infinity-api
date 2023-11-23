<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'email' => 'required|email:rfc,dns|unique:users',
            'name' => 'min:2|max:30',
            'surname' => 'min:3|max:40',
            'password' => 'required|min:8',
            'password_confirmation' => 'same:password'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException((response()->json([
            'success' => 'false',
            'message' => 'Ошибка валидации.',
            'errors' => $validator->errors(),
        ])));
    }
}
