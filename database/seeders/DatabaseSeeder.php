<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\FilmsSeeder;
use Database\Seeders\PeopleSeeder;
use Database\Seeders\PlanetsSeeder;
use Database\Seeders\SpeciesSeeder;
use Database\Seeders\StarshipsSeeder;
use Database\Seeders\VehiclesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            VehiclesSeeder::class,
            StarshipsSeeder::class,
            SpeciesSeeder::class,
            FilmsSeeder::class,
            PlanetsSeeder::class,
            PeopleSeeder::class
        ]);
    }
}
