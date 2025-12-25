<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FermentacijaUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'partija_grozdja_id' => ['required', 'integer', 'exists:PartijaGrozdjas,id'],
            'datum' => ['required', 'date'],
            'temperatura' => ['required', 'numeric', 'between:-999.99,999.99'],
            'secer' => ['required', 'numeric', 'between:-999.99,999.99'],
            'faza' => ['required', 'string'],
            'napomena' => ['nullable', 'string'],
        ];
    }
}
