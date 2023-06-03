<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateStarshipRequest extends FormRequest
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
            'model' => 'required|min:2|max:255',
            'manufacturer' => 'required|min:2|max:255',
            'cost_in_credits' => 'required|numeric|min:1|max:999999999',
            'length' => 'required|numeric|min:1|max:9999',
            'max_atmosphering_speed' => 'required|numeric|min:1|max:9999',
            'crew' => 'required|numeric|min:1|max:99999',
            'passengers' => 'required|numeric|min:1|max:99999',
            'cargo_capacity' => 'required|numeric|min:1|max:9999999',
            'consumables' => 'required|min:2|max:255',
            'hyperdrive_rating' => 'required|numeric|min:0|max:9.9',
            'MGLT' => 'required|numeric|min:1|max:9999',
            'starship_class' => 'required|min:2|max:255',
        ];
    }
}
