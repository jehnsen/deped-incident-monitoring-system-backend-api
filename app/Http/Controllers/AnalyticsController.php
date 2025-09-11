<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\AnalyticsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    private $service;
    public function __construct(private AnalyticsService $_service) {
        $this->service = $_service;
    }

    /**
     * GET /api/analytics/dashboard/summary
     *
     * Query params:
     * - region_id?: int          (filter by region; via school->division->region_id)
     * - division_id?: int        (filter by division_id of school's division)
     * - school_id?: int          (filter by school_id)
     * - window_days?: int        (default 7) rolling window for current/previous periods
     * - date_from?: Y-m-d        (optional explicit range; if provided, date_to is required)
     * - date_to?: Y-m-d
     */
    public function dashboardSummary(Request $request): JsonResponse
    {
        $filters = [
            'region_id'   => $request->query('region_id'),
            'division_id' => $request->query('division_id'),
            'school_id'   => $request->query('school_id'),
            'window_days' => (int) $request->query('window_days', 7),
            'date_from'   => $request->query('date_from'),
            'date_to'     => $request->query('date_to'),
        ];

        return response()->json($this->service->getDashboardSummary($filters));
    }

    /**
     * GET /api/analytics/incidents/monthly-trends
     * Params: months (default: 6)
     */
    public function getMonthlyTrends(Request $request): JsonResponse
    {
        $months = (int) $request->query('months', 6);
        $data = $this->service->getMonthlyIncidentTrends($months);

        return response()->json($data);
    }

    /**
     * GET /api/analytics/incidents/by-hazard-type
     * Params: year (optional), region_id (optional)
     */
    public function getIncidentsByHazardType(Request $request): JsonResponse
    {
        $year = $request->query('year', now()->year);
        $regionId = $request->query('region_id', null);

        $data = $this->service->getIncidentsByHazardType($year, $regionId);

        return response()->json($data);
    }

    /**
     * GET /api/analytics/divisions/cards
     * Query params:
     *  - region_id?: int
     *  - division_ids[]?: int[]
     *  - date_from?: Y-m-d
     *  - date_to?: Y-m-d
     *  - top_hazards?: int (default 3)
     */
    public function getDivisionCards(Request $request): JsonResponse
    {
        $payload = [
            'region_id'   => $request->query('region_id'),
            'division_ids'=> (array) $request->query('division_ids', []),
            'date_from'   => $request->query('date_from'),
            'date_to'     => $request->query('date_to'),
            'top_hazards' => (int) $request->query('top_hazards', 3),
        ];

        return response()->json(
            $this->service->getDivisionCards($payload)
        );
    }

    /**
     * GET /api/analytics/schools/cards
     * Query params:
     *  - division_id?: int
     *  - q?: string (school name/id search)
     *  - risk?: high|medium|low
     *  - per_page?: int (default 10)
     *  - page?: int
     *  - date_from?: Y-m-d
     *  - date_to?: Y-m-d
     */
    public function getSchoolCards(Request $request): JsonResponse
    {
        $payload = [
            'division_id' => $request->query('division_id'),
            'q'           => $request->query('q'),
            'risk'        => $request->query('risk'),
            'per_page'    => (int) $request->query('per_page', 10),
            'page'        => (int) $request->query('page', 1),
            'date_from'   => $request->query('date_from'),
            'date_to'     => $request->query('date_to'),
        ];

        return response()->json(
            $this->service->getSchoolCards($payload)
        );
    }

    /**
     * GET /api/analytics/issuances
     * Query params:
     *  - q?: string
     *  - type?: string   (e.g., DO|DM|RM|Advisory)
     *  - year?: int
     *  - scope?: string  (region/division/national)
     *  - hazard_type_id?: int (filters by linked hazard/type if your schema supports it)
     *  - per_page?: int (default 10)
     *  - page?: int
     */
    public function getIssuances(Request $request): JsonResponse
    {
        $payload = [
            'q'              => $request->query('q'),
            'type'           => $request->query('type'),
            'year'           => $request->query('year'),
            'scope'          => $request->query('scope'),
            'hazard_type_id' => $request->query('hazard_type_id'),
            'per_page'       => (int) $request->query('per_page', 10),
            'page'           => (int) $request->query('page', 1),
        ];

        return response()->json(
            $this->service->getIssuances($payload)
        );
    }

    /**
     * GET /api/analytics/programs
     * Query params:
     *  - q?: string
     *  - division_id?: int
     *  - status?: string  (Active|In Progress|Completed)
     *  - type?: string    (Training|Infrastructure|Etc.)
     *  - per_page?: int (default 10)
     *  - page?: int
     */
    public function getPrograms(Request $request): JsonResponse
    {
        $payload = [
            'q'           => $request->query('q'),
            'division_id' => $request->query('division_id'),
            'status'      => $request->query('status'),
            'type'        => $request->query('type'),
            'per_page'    => (int) $request->query('per_page', 10),
            'page'        => (int) $request->query('page', 1),
        ];

        return response()->json(
            $this->service->getPrograms($payload)
        );
    }

}
