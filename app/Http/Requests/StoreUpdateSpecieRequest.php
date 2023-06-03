<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSpecieRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:2|max:255',
            'classification' => 'required|min:2|max:255',
            'average_height' => 'required|numeric|min:1|max:999',
            'skin_colors' => 'required|min:2|max:255',
            'hair_colors' => 'required|min:2|max:255',
            'eye_colors' => 'required|min:2|max:255',
            'average_lifespan' => 'required|numeric|min:1|max:999',
            'language' => 'required|min:2|max:255',
        ];
    }
}
