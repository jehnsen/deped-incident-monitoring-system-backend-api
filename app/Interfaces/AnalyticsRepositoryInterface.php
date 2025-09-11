<?php

namespace App\Interfaces;

interface AnalyticsRepositoryInterface
{
   public function getDashboardSummary(array $filters): array;
   public function getMonthlyIncidentTrends(int $months): array;

   public function getIncidentsByHazardType(int $year, ?int $regionId = null): array;
   /** Division office cards */
    public function getDivisionCards(array $filters): array;

    /** School cards (paginated) */
    public function getSchoolCards(array $filters): array;

    /** Issuances list (paginated + counters) */
    public function getIssuances(array $filters): array;

    /** Programs list (paginated + counters) */
    public function getPrograms(array $filters): array;
}
