<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchUpdateRequest extends FormRequest
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
            'title' => 'nullable|max:255',
            'slug' => 'nullable|max:255',
            'first_team_id' => 'nullable|numeric',
            'second_team_id' => 'nullable|numeric',
            'broadcast_url' => 'nullable|max:255',
            'chat_id' => 'nullable|numeric',
            'bet_rate' => 'nullable|numeric',
            'bank' => 'nullable|numeric',
            'commission' => 'nullable|numeric',
            'gamers_count' => 'nullable|numeric',
            'start_time' => 'nullable|date',
            'status' => 'nullable|max:255',
            'winner_id' => 'nullable|numeric'
        ];
    }
}
