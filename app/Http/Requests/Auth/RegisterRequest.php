<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $regexpWord = 'regex:/^\\/?[a-zа-я\s]*$/ui';

        return [
            'firstname' => 'required|string|max:255|'.$regexpWord,
            'lastname' => 'required|string|max:255|'.$regexpWord,
            'phone' => 'required|string|max:255|regex:/^\\+7[1-9][0-9]{9}$/',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|max:255|min:8',
            'c_password' => 'required|same:password',
        ];
    }
}
