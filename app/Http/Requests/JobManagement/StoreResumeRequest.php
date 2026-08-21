<?php

namespace App\Http\Requests\JobManagement;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreResumeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file' => ['required', 'max:2048', 'mimes:pdf']
        ];
    }

    public function messages(): array
    {
        return [
            'file.required' => 'Please upload your resume.',
            'file.file' => 'The uploaded file is invalid.',
            'file.max' => 'The resume must not exceed 2MB.',
            'file.mimes' => 'The resume must be a PDF file.',
        ];
    }
}
