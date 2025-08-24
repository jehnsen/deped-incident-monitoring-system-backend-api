<?php

namespace App\Providers;

use App\Repositories\Contracts\IncidentRepositoryInterface;
use App\Repositories\Eloquent\IncidentRepository;
use Illuminate\Support\ServiceProvider;

class IncidentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
         $this->app->bind(IncidentRepositoryInterface::class, IncidentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
