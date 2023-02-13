<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;

class CreateChatRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'integer|nullable',
            'chat_id' => 'integer|nullable',
            'text' => 'required|string|max:65535',
        ];
    }
}
