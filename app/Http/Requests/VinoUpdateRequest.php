<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VinoUpdateRequest extends FormRequest
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
            'naziv' => ['required', 'string'],
            'tip' => ['required', 'string'],
            'kolicina' => ['required', 'integer'],
            'datum_proizvodnje' => ['required', 'date'],
            'partija_grozdja_id' => ['required', 'integer', 'exists:PartijaGrozdjas,id'],
            'bure_id' => ['required', 'integer', 'exists:burad,id'],
        ];
    }
}
