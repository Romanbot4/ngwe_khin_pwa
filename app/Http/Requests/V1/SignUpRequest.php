<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            "name" => "required|max:40|min:3",
            "email" => "required|email|min:5|unique:users,email",
            "image" => "image|mimes:png,jpg",
            "password" => "required|min:8",
            "confirm_password" => "required|min:8"
        ];
    }
}
