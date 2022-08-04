<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FriendUpdateRequest extends FormRequest
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
            'subscriber_id' => 'required',
            'is_friend' => 'nullable',
            'is_subscriber' => 'required_if:is_friend,null'
        ];
    }
}
