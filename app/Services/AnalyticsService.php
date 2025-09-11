<?php

namespace App\Services;

use App\Interfaces\AnalyticsRepositoryInterface;

class AnalyticsService
{
   private $repo;
   public function __construct(private readonly AnalyticsRepositoryInterface $_repo)
   {
      $this->repo = $_repo;
   }

    public function getDashboardSummary(array $filters): array
    {
        return $this->repo->getDashboardSummary($filters);
    }

   public function getMonthlyIncidentTrends(int $months = 6): array
   {
      return $this->repo->getMonthlyIncidentTrends($months);
   }

   public function getIncidentsByHazardType(int $year, ?int $regionId = null): array
   {
      return $this->repo->getIncidentsByHazardType($year, $regionId);
   }

   public function getDivisionCards(array $filters): array
   {
      return $this->repo->getDivisionCards($filters);
   }

   public function getSchoolCards(array $filters): array
   {
      return $this->repo->getSchoolCards($filters);
   }

   public function getIssuances(array $filters): array
   {
      return $this->repo->getIssuances($filters);
   }

   public function getPrograms(array $filters): array
   {
      return $this->repo->getPrograms($filters);
   }
}
