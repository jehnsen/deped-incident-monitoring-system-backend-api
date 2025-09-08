<?php

namespace App\Providers;

use App\Interfaces\AssistanceRepositoryInterface;
use App\Interfaces\DamageAssessmentRepositoryInterface;
use App\Repositories\AssistanceRepository;
use App\Repositories\DamageAssessmentRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DamageAssessmentRepositoryInterface::class, DamageAssessmentRepository::class);
        $this->app->bind(AssistanceRepositoryInterface::class, AssistanceRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
