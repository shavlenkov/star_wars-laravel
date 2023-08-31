<?php

namespace App\Services;

use App\Models\Specie;

class SpecieService
{
    public function paginate(int $a) {
        return Specie::simplePaginate($a);
    }

    public function find(int $id) {
        return Specie::find($id);
    }

    public function create(array $data) {
        $species = Specie::create([
            'name' => $data['name'],
            'classification' => $data['classification'],
            'average_height' => $data['average_height'],
            'skin_colors' => $data['skin_colors'],
            'hair_colors' => $data['hair_colors'],
            'eye_colors' => $data['eye_colors'],
            'average_lifespan' => $data['average_lifespan'],
            'language' => $data['language']
        ]);
    }

    public function edit(int $id, array $data) {
        $specie = $this->find($id);

        $specie->name = $data['name'];
        $specie->classification = $data['classification'];
        $specie->average_height = $data['average_height'];
        $specie->skin_colors = $data['skin_colors'];
        $specie->hair_colors = $data['hair_colors'];
        $specie->eye_colors = $data['eye_colors'];
        $specie->average_lifespan = $data['average_lifespan'];
        $specie->language = $data['language'];

        $specie->save();
    }

    public function delete(int $id) {
        $specie = $this->find($id);

        $specie->delete();
    }


}
