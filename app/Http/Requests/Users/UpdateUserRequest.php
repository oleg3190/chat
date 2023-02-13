<?php

namespace App\Http\Requests\Users;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property User $user
 */
class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'firstname' => 'string|max:255',
            'lastname' => 'string|max:255',
            'lastname' => 'string|max:255',
            'password' => 'string|max:255|min:5',
            'phone' => 'string|max:11|unique:users,id,',
            'email' => 'required|string|email|max:255|unique:users,id,',
        ];
    }
}
