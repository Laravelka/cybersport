<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|max:255',
            'email' => 'nullable|unique:users|email|max:255',
            'phone' => 'nullable|unique:users|max:255',
            'password' => 'nullable|max:255',
            'first_name' => 'nullable|max:255',
            'last_name' => 'nullable|max:255',
            'telegram' => 'nullable|max:255',
            'discord' => 'nullable|max:255',
            // 'avatar' => 'nullable|image',
        ];
    }
}
