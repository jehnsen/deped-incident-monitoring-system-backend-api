<?php

namespace App\Providers;

use App\Interfaces\SchoolRepositoryInterface;
use App\Repositories\SchoolRepository;
use Illuminate\Support\ServiceProvider;

class SchoolServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SchoolRepositoryInterface::class, SchoolRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
