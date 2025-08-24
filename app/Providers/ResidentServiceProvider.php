<?php

namespace App\Providers;

use App\Interfaces\ResidentRepositoryInterface;
use App\Repositories\ResidentRepository;
use Illuminate\Support\ServiceProvider;

class ResidentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ResidentRepositoryInterface::class,ResidentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
