<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class PostStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
	{
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['content' => "string", 'img' => "string"])] public function rules(): array
	{
        return [
            // 'title' => 'required|max:255',
            'content' => 'required',
            'img' => 'nullable|image'
        ];
    }
}
