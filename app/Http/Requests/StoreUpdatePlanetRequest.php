<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlanetRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:2|max:40',
            'rotation_period' => 'required|numeric',
            'orbital_period' => 'required|numeric',
            'diameter' => 'required|numeric',
            'climate' => 'required|min:1|max:20',
            'gravity' => 'required|min:1|max:20',
            'terrain' => 'required|min:1|max:20',
            'surface_water' => 'required|numeric',
            'population' => 'required|numeric',
            'films' => 'required'
        ];
    }
}
