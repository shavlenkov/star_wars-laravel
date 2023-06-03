<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFilmRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:2|max:255',
            'episode_id' => 'required|numeric|min:1|max:999',
            'opening_crawl' => 'required',
            'director' => 'required|min:2|max:255',
            'producer' => 'required|min:2|max:255',
            'release_date' => 'required|date',
            'species' => '',
            'starships' => '',
            'vehicles' => '',
        ];
    }
}
