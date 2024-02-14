<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
        // Specify validation rules for the 'title' field of the task
        return [
            // The 'title' field is required and must not exceed 255 characters in length
            'title' => 'required|max:255',
            'description' =>'sometimes|max:255',
            'deadline' =>'sometimes|date',
        ];
    }
}
