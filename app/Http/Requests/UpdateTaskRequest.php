<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Always return true, indicating there are no specific authorization requirements
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
            // The 'title' field is not always required but must be valid when provided
            'title' => 'sometimes|required|max:255',
            // The 'is_done' field is also not always required but must be a boolean when provided
            'is_done' => 'sometimes|boolean',
        ];
    }
}
