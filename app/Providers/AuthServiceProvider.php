<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\People;
use App\Models\Planet;
use App\Models\Film;
use App\Models\Specie;
use App\Models\Starship;
use App\Models\Vehicle;

use App\Policies\PeoplePolicy;
use App\Policies\PlanetPolicy;
use App\Policies\FilmPolicy;
use App\Policies\SpeciePolicy;
use App\Policies\StarshipPolicy;
use App\Policies\VehiclePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        People::class => PeoplePolicy::class,
        Planet::class => PlanetPolicy::class,
        Film::class => FilmPolicy::class,
        Specie::class => SpeciePolicy::class,
        Starship::class => StarshipPolicy::class,
        Vehicle::class => VehiclePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
