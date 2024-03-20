<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'breed' => ['nullable', 'string', 'max:255'],
            'age' => ['nullable', 'int'],
            'description' => ['nullable', 'string', 'max:2047'],
            'picture' => ['nullable', 'image'],
        ];
    }
}
