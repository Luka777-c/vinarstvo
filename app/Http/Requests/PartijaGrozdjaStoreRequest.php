<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartijaGrozdjaStoreRequest extends FormRequest
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
            'sorta' => ['required', 'string', 'max:100'],
            'kolicina' => ['required', 'integer'],
            'status' => ['required', 'in:prijem,u_obradi,zavrseno'],
            'datum' => ['required', 'date'],
            'napomena' => ['nullable', 'string'],
        ];
    }
}
