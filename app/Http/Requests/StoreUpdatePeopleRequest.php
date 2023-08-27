<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePeopleRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min: 2|max: 40',
            'height' => 'required|numeric|min: 1|max: 300',
            'mass' => 'required|numeric|min: 1|max: 300',
            'hair_color' => 'required|min: 1|max: 20',
            'eye_color' => 'required|min: 1|max: 20',
            'skin_color' => 'required|min: 1|max: 20',
            'birth_year' => 'required|min: 1|max: 10',
            'gender' => 'required',
            'homeworld' => 'required',
            'films' => 'required',
            'species' => '',
            'starships' => '',
            'vehicles' => '',
            'images'=> '',
        ];
    }
}
