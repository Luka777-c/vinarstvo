<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BureUpdateRequest extends FormRequest
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
            'broj_bureta' => ['required', 'string', 'unique:bures,broj_bureta'],
            'kapacitet' => ['required', 'integer'],
            'tip_drveta' => ['required', 'string'],
            'status' => ['required', 'in:prazno,puno,ciscenje'],
            'napomena' => ['nullable', 'string'],
        ];
    }
}
