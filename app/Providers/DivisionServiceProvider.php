<?php

namespace App\Providers;

use App\Interfaces\DivisionRepositoryInterface;
use App\Repositories\DivisionRepository;
use Illuminate\Support\ServiceProvider;

class DivisionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       $this->app->bind(DivisionRepositoryInterface::class, DivisionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
