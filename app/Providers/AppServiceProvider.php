<?php

namespace App\Providers;

use App\Interfaces\AffectedPopulationRepositoryInterface;
use App\Interfaces\AnalyticsRepositoryInterface;
use App\Interfaces\AssistanceRepositoryInterface;
use App\Interfaces\DamageAssessmentRepositoryInterface;
use App\Interfaces\EvacuationCenterRepositoryInterface;
use App\Interfaces\EvacuationOccupancyRepositoryInterface;
use App\Interfaces\HazardAssessmentRepositoryInterface;
use App\Interfaces\HazardRepositoryInterface;
use App\Interfaces\IncidentAttachmentRepositoryInterface;
use App\Interfaces\IncidentStatusHistoryRepositoryInterface;
use App\Interfaces\InventoryRepositoryInterface;
use App\Interfaces\IssuanceAttachmentRepositoryInterface;
use App\Interfaces\IssuanceRepositoryInterface;
use App\Interfaces\ProgramRepositoryInterface;
use App\Interfaces\TagRepositoryInterface;
use App\Interfaces\ActivityLogRepositoryInterface;

use App\Repositories\ActivityLogRepository;
use App\Repositories\AffectedPopulationRepository;
use App\Repositories\AnalyticsRepository;
use App\Repositories\AssistanceRepository;
use App\Repositories\DamageAssessmentRepository;
use App\Repositories\EvacuationCenterRepository;
use App\Repositories\EvacuationOccupancyRepository;
use App\Repositories\HazardAssessmentRepository;
use App\Repositories\HazardRepository;
use App\Repositories\IncidentAttachmentRepository;
use App\Repositories\IncidentStatusHistoryRepository;
use App\Repositories\InventoryRepository;
use App\Repositories\IssuanceAttachmentRepository;
use App\Repositories\IssuanceRepository;
use App\Repositories\ProgramRepository;
use App\Repositories\TagRepository;
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
        $this->app->bind(IncidentAttachmentRepositoryInterface::class, IncidentAttachmentRepository::class);
        $this->app->bind(IncidentStatusHistoryRepositoryInterface::class, IncidentStatusHistoryRepository::class);
        $this->app->bind(EvacuationCenterRepositoryInterface::class, EvacuationCenterRepository::class);
        $this->app->bind(EvacuationOccupancyRepositoryInterface::class, EvacuationOccupancyRepository::class);
        $this->app->bind(AffectedPopulationRepositoryInterface::class, AffectedPopulationRepository::class);
        $this->app->bind(HazardRepositoryInterface::class, HazardRepository::class);
        $this->app->bind(HazardAssessmentRepositoryInterface::class, HazardAssessmentRepository::class);
        $this->app->bind(IssuanceRepositoryInterface::class, IssuanceRepository::class);
        $this->app->bind(IssuanceAttachmentRepositoryInterface::class, IssuanceAttachmentRepository::class);
        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);
        $this->app->bind(InventoryRepositoryInterface::class, InventoryRepository::class);
        $this->app->bind(ProgramRepositoryInterface::class, ProgramRepository::class);
        $this->app->bind(AnalyticsRepositoryInterface::class, AnalyticsRepository::class);
        $this->app->bind(ActivityLogRepositoryInterface::class, ActivityLogRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
