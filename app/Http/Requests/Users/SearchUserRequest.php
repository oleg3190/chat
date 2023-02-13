<?php

namespace App\Http\Requests\Users;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'text' => 'string|max:255|regex:/^[а-яa-z0-9.@\\/\s]*$/ui',
            'city' => 'nullable|string|max:255|regex:/^[а-яa-z\\/\s]*$/ui',
            'phone' => 'integer|max:255|nullable',
            'sex' => ['required', Rule::in(User::GENDERS)]
        ];
    }
}
