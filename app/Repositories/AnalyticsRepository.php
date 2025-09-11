<?php

namespace App\Repositories;

use App\Models\Incident;
use App\Models\School;
use App\Models\Division; // or SchoolsDivision model name
use App\Models\Issuance;
use App\Models\Program;
use App\Utils\Helpers;
use Illuminate\Support\Facades\DB;
use App\Interfaces\AnalyticsRepositoryInterface;

class AnalyticsRepository implements AnalyticsRepositoryInterface
{
   public function getDashboardSummary(array $filters): array
   {
      [$currFrom, $currTo, $prevFrom, $prevTo, $windowDays] = Helpers::resolveWindows($filters);

      // Use reported_at/occurred_at if present, else created_at
      $dateExpr = DB::raw('COALESCE(incidents.reported_at, incidents.occurred_at, incidents.created_at)');

      // ---- STATUS COUNTS (overall, NOT time-boxed) ----
      // If you want to time-box these too, set ?status_windowed=1 and we’ll apply the window.
      $statusWindowed = (bool) ($filters['status_windowed'] ?? false);

      $statusBase = Helpers::baseIncidentQuery($filters);
      if ($statusWindowed) {
         $statusBase->whereBetween($dateExpr, [$currFrom, $currTo]);
      }

      $map = Helpers::statusMap(); // map UI keys -> DB values

      // Build one SELECT with SUM(CASE ...) per status
      $selects = ['COUNT(*) as total'];
      foreach ($map as $alias => $dbValue) {
         // MySQL is case-insensitive by default (utf8mb4_*), so direct compare is fine
         $selects[] = "SUM(CASE WHEN incidents.status = '" . addslashes($dbValue) . "' THEN 1 ELSE 0 END) as {$alias}_cnt";
      }

      $statusRow = $statusBase->selectRaw(implode(', ', $selects))->first();

      // ---- LAST N DAYS (time-boxed) ----
      $baseCurr = Helpers::baseIncidentQuery($filters)->whereBetween($dateExpr, [$currFrom, $currTo]);
      $basePrev = Helpers::baseIncidentQuery($filters)->whereBetween($dateExpr, [$prevFrom, $prevTo]);

      $currAll = (clone $baseCurr)->count();
      $prevAll = (clone $basePrev)->count();

      // Assemble cards
      $cards = [
         'open' => [
            'count' => (int) ($statusRow->open_cnt ?? 0),
            'delta_count' => 0,
            'delta_pct' => 0.0,
         ],
         'resolved' => [
            'count' => (int) ($statusRow->resolved_cnt ?? 0),
            'delta_count' => 0,
            'delta_pct' => 0.0,
         ],
         'in_progress' => [
            'count' => (int) ($statusRow->in_progress_cnt ?? 0),
            'delta_count' => 0,
            'delta_pct' => 0.0,
         ],
         'closed' => [
            'count' => (int) ($statusRow->closed_cnt ?? 0),
            'delta_count' => 0,
            'delta_pct' => 0.0,
         ],
         'disapproved' => [
            'count' => (int) ($statusRow->disapproved_cnt ?? 0),
            'delta_count' => 0,
            'delta_pct' => 0.0,
         ],
         'last_days' => [
            'label_days' => $windowDays,
            'count' => $currAll,
            'delta_count' => $currAll - $prevAll,
            'delta_pct' => $prevAll > 0 ? round((($currAll - $prevAll) / $prevAll) * 100, 2) : 0.0,
         ],
      ];

      return [
         'window' => [
            'current' => [$currFrom->toDateTimeString(), $currTo->toDateTimeString()],
            'previous' => [$prevFrom->toDateTimeString(), $prevTo->toDateTimeString()],
            'days' => $windowDays,
         ],
         'cards' => $cards,
      ];
   }

   public function getMonthlyIncidentTrends(int $months): array
   {
      return Incident::selectRaw("
                DATE_FORMAT(created_at, '%b') as month,
                COUNT(*) as reported,
                SUM(CASE WHEN status = 'resolved' THEN 1 ELSE 0 END) as resolved
            ")
         ->where('created_at', '>=', now()->subMonths($months))
         ->groupBy(DB::raw("DATE_FORMAT(created_at, '%b')"))
         ->orderBy(DB::raw("MIN(created_at)"))
         ->get()
         ->toArray();
   }

   public function getIncidentsByHazardType(int $year, ?int $regionId = null): array
   {
      $query = Incident::query()
         ->join('incident_types', 'incidents.type_id', '=', 'incident_types.id')
         ->selectRaw("incident_types.name as type_name, incidents.type_id, COUNT(*) as total")
         ->whereYear('incidents.created_at', $year);

      if ($regionId) {
         $query->where('incidents.region_id', $regionId);
      }

      $rows = $query->groupBy('incidents.type_id', 'incident_types.name')->get();

      $total = $rows->sum('total');

      return $rows->map(function ($row) use ($total) {
         return [
            'type_id' => $row->type_id,
            'hazard_type' => $row->type_name,   // human-readable name
            'count' => $row->total,
            'percentage' => $total > 0 ? round(($row->total / $total) * 100, 2) : 0,
         ];
      })->toArray();
   }

   /** ---------------- Division cards ---------------- */
   public function getDivisionCards(array $filters): array
   {
      $regionId = $filters['region_id'] ?? null;
      $divisionIds = $filters['division_ids'] ?? [];
      $dateFrom = $filters['date_from'] ?? null;
      $dateTo = $filters['date_to'] ?? null;
      $topHazards = max(1, (int) ($filters['top_hazards'] ?? 3));

      // time windows (current + previous month window for delta)
      $currFrom = $dateFrom ? now()->parse($dateFrom)->startOfDay() : now()->startOfMonth();
      $currTo = $dateTo ? now()->parse($dateTo)->endOfDay() : now()->endOfMonth();
      $prevFrom = (clone $currFrom)->subMonth()->startOfMonth();
      $prevTo = (clone $currTo)->subMonth()->endOfMonth();

      // use reported_at/occurred_at/created_at
      $dateExpr = DB::raw('COALESCE(incidents.reported_at, incidents.occurred_at, incidents.created_at)');

      // status buckets
      $resolvedStatuses = ["approved", "resolved", "closed"];
      $pendingStatuses = ["open", "pending", "pending_review", "in_progress"];

      $resolvedIn = "'" . implode("','", array_map('addslashes', $resolvedStatuses)) . "'";
      $pendingIn = "'" . implode("','", array_map('addslashes', $pendingStatuses)) . "'";

      // pull the list of divisions to summarize
      $divisions = \App\Models\Division::query()
         ->when($regionId, fn($q) => $q->where('region_id', $regionId))
         ->when(!empty($divisionIds), fn($q) => $q->whereIn('id', $divisionIds))
         ->select(['id', 'name'])
         ->get();

      $cards = [];

      foreach ($divisions as $div) {

         // schools + students (rename student_count if your column differs)
         $schoolsAgg = \App\Models\School::query()
            ->where('division_id', $div->id)
            ->selectRaw('COUNT(*) as schools, COALESCE(SUM(student_count),0) as students')
            ->first();

         // current window totals (by correct date field)
         $curr = \App\Models\Incident::query()
            ->whereBetween($dateExpr, [$currFrom, $currTo])
            ->whereHas('school', fn($q) => $q->where('division_id', $div->id))
            ->selectRaw("
                COUNT(*) as total,
                SUM(CASE WHEN incidents.status IN ($resolvedIn) THEN 1 ELSE 0 END) as resolved,
                SUM(CASE WHEN incidents.status IN ($pendingIn)  THEN 1 ELSE 0 END) as pending
            ")
            ->first();

         // previous window total for delta
         $prevTotal = \App\Models\Incident::query()
            ->whereBetween($dateExpr, [$prevFrom, $prevTo])
            ->whereHas('school', fn($q) => $q->where('division_id', $div->id))
            ->count();

         $deltaPct = $prevTotal > 0 ? round((($curr->total - $prevTotal) / $prevTotal) * 100, 2) : 0.0;

         // top hazards within current window
         $hazards = \App\Models\Incident::query()
            ->join('incident_types', 'incidents.type_id', '=', 'incident_types.id')
            ->whereBetween($dateExpr, [$currFrom, $currTo])
            ->whereHas('school', fn($q) => $q->where('division_id', $div->id))
            ->groupBy('incidents.type_id', 'incident_types.name')
            ->selectRaw('incidents.type_id, incident_types.name as type_name, COUNT(*) as total')
            ->orderByDesc('total')
            ->limit($topHazards)
            ->get()
            ->map(fn($r) => ['type_id' => (int) $r->type_id, 'name' => $r->type_name, 'count' => (int) $r->total])
            ->values()
            ->all();

         $total = (int) ($curr->total ?? 0);
         $resolved = (int) ($curr->resolved ?? 0);
         $pending = (int) ($curr->pending ?? 0);
         $resRate = $total > 0 ? round(($resolved / $total) * 100, 2) : 0.0;

         $cards[] = [
            'division_id' => (int) $div->id,
            'division_name' => $div->name,
            'schools' => (int) ($schoolsAgg->schools ?? 0),
            'students' => (int) ($schoolsAgg->students ?? 0),
            'totals' => ['total' => $total, 'resolved' => $resolved, 'pending' => $pending],
            'trend_delta_pct' => $deltaPct,
            'common_hazards' => $hazards,
            'resolution_rate' => $resRate,
         ];
      }

      return [
         'data' => $cards,
         'window' => [
            'current' => [$currFrom->toDateString(), $currTo->toDateString()],
            'previous' => [$prevFrom->toDateString(), $prevTo->toDateString()],
         ],
      ];

   }

    /** ---------------- School cards (paginated) ---------------- */
   public function getSchoolCards(array $filters): array
   {
      $divisionId = $filters['division_id'] ?? null;
      $q = $filters['q'] ?? null;
      $risk = $filters['risk'] ?? null;
      $perPage = max(1, (int) ($filters['per_page'] ?? 10));
      $page = max(1, (int) ($filters['page'] ?? 1));
      $dateFrom = $filters['date_from'] ?? null;
      $dateTo = $filters['date_to'] ?? null;

      // Window (default: current month)
      $currFrom = $dateFrom ? now()->parse($dateFrom)->startOfDay() : now()->startOfMonth();
      $currTo = $dateTo ? now()->parse($dateTo)->endOfDay() : now()->endOfMonth();

      // Use reported_at/occurred_at when present
      $dateExpr = DB::raw('COALESCE(incidents.reported_at, incidents.occurred_at, incidents.created_at)');

      // Status buckets (adjust if your DB uses different values)
      $resolvedStatuses = ["approved", "resolved", "closed"];
      $pendingStatuses = ["open", "pending", "pending_review", "in_progress"];
      $resolvedIn = "'" . implode("','", array_map('addslashes', $resolvedStatuses)) . "'";
      $pendingIn = "'" . implode("','", array_map('addslashes', $pendingStatuses)) . "'";

      // Base school list (filters + paging)
      $schoolQuery = School::query()
         ->when($divisionId, fn($qq) => $qq->where('division_id', $divisionId))
         ->when($q, fn($qq) => $qq->where(function ($x) use ($q) {
            $x->where('name', 'like', "%$q%")
               ->orWhere('school_id_code', 'like', "%$q%");
         }))
         ->when($risk, fn($qq) => $qq->where('risk_status', $risk))
         ->orderBy('name');

      $totalSchools = (clone $schoolQuery)->count();

      $schools = $schoolQuery
         ->forPage($page, $perPage)
         ->get(['id', 'name', 'division_id', 'student_count', 'risk_status', 'school_id_code']);

      if ($schools->isEmpty()) {
         return [
            'data' => [],
            'pagination' => [
               'page' => $page,
               'per_page' => $perPage,
               'total' => 0,
               'pages' => 0,
            ],
            'window' => [$currFrom->toDateString(), $currTo->toDateString()],
         ];
      }

      $schoolIds = $schools->pluck('id')->all();

      // -------- Aggregations (batched) --------

      // Totals/resolved/pending per school (within window)
      $totals = Incident::query()
         ->whereIn('school_id', $schoolIds)
         ->whereBetween($dateExpr, [$currFrom, $currTo])
         ->groupBy('school_id')
         ->selectRaw("
            school_id,
            COUNT(*) as total,
            SUM(CASE WHEN incidents.status IN ($resolvedIn) THEN 1 ELSE 0 END) as resolved,
            SUM(CASE WHEN incidents.status IN ($pendingIn)  THEN 1 ELSE 0 END) as pending
        ")
         ->get()
         ->keyBy('school_id');

      // Hazards per school (within window) → we’ll take top 3 per school
      $hazardsRaw = Incident::query()
         ->join('incident_types', 'incidents.type_id', '=', 'incident_types.id')
         ->whereIn('incidents.school_id', $schoolIds)
         ->whereBetween($dateExpr, [$currFrom, $currTo])
         ->groupBy('incidents.school_id', 'incidents.type_id', 'incident_types.name')
         ->selectRaw('incidents.school_id, incidents.type_id, incident_types.name as type_name, COUNT(*) as total')
         ->orderBy('incidents.school_id')
         ->orderByDesc('total')
         ->get();

      $hazardsBySchool = [];
      foreach ($hazardsRaw as $row) {
         $sid = (int) $row->school_id;
         $hazardsBySchool[$sid] = $hazardsBySchool[$sid] ?? [];
         $hazardsBySchool[$sid][] = [
            'type_id' => (int) $row->type_id,
            'name' => $row->type_name,
            'count' => (int) $row->total,
         ];
      }
      // Top 3 per school
      foreach ($hazardsBySchool as $sid => $list) {
         $hazardsBySchool[$sid] = array_slice($list, 0, 3);
      }

      // Last incident date (overall last, not windowed — matches your UI)
      $lastIncident = Incident::query()
         ->whereIn('school_id', $schoolIds)
         ->groupBy('school_id')
         ->selectRaw("school_id, MAX(COALESCE(occurred_at, reported_at, created_at)) as last_at")
         ->get()
         ->keyBy('school_id');

      // -------- Compose payload --------
      $items = [];
      foreach ($schools as $s) {
         $agg = $totals->get($s->id);
         $total = (int) ($agg->total ?? 0);
         $resolved = (int) ($agg->resolved ?? 0);
         $pending = (int) ($agg->pending ?? 0);
         $rate = $total > 0 ? round(($resolved / $total) * 100, 2) : 0.0;

         $items[] = [
            'school_id' => (int) $s->id,
            'school_code' => $s->school_id,
            'school_name' => $s->name,
            'division_id' => (int) $s->division_id,
            'students' => (int) ($s->student_count ?? 0),
            'risk_status' => $s->risk_status,
            'totals' => [
               'total' => $total,
               'resolved' => $resolved,
               'pending' => $pending,
            ],
            'resolution_rate' => $rate,
            'recent_hazards' => $hazardsBySchool[(int) $s->id] ?? [],
            'last_incident_at' => optional($lastIncident->get($s->id))->last_at,
         ];
      }

      return [
         'data' => $items,
         'pagination' => [
            'page' => $page,
            'per_page' => $perPage,
            'total' => $totalSchools,
            'pages' => (int) ceil($totalSchools / $perPage),
         ],
         'window' => [$currFrom->toDateString(), $currTo->toDateString()],
      ];
   }

    /** ---------------- Issuances list ---------------- */
    public function getIssuances(array $filters): array
    {
        $q = $filters['q'] ?? null;
        $type = $filters['type'] ?? null;
        $year = $filters['year'] ?? null;
        $scope = $filters['scope'] ?? null;
        $hazardTypeId = $filters['hazard_type_id'] ?? null;
        $perPage = max(1, (int) ($filters['per_page'] ?? 10));
        $page = max(1, (int) ($filters['page'] ?? 1));

        $query = Issuance::query()
            ->when($q, fn($qq) => $qq->where(function($x) use ($q) {
                $x->where('title','like',"%$q%")
                  ->orWhere('ref_no','like',"%$q%");
            }))
            ->when($type, fn($qq) => $qq->where('type', $type))
            ->when($year, fn($qq) => $qq->where('year', $year))
            ->when($scope, fn($qq) => $qq->where('scope', $scope))
            // If you have a pivot like issuance_hazards with type_id referencing incident_types:
            ->when($hazardTypeId, function($qq) use ($hazardTypeId) {
                $qq->whereExists(function($sub) use ($hazardTypeId) {
                    $sub->select(DB::raw(1))
                        ->from('issuance_hazards')
                        ->whereColumn('issuance_hazards.issuance_id','issuances.id')
                        ->where('issuance_hazards.type_id', $hazardTypeId);
                });
            });

        $total = (clone $query)->count();

        $rows = $query->orderByDesc('effective_at')
            ->forPage($page, $perPage)
            ->get(['id','ref_no','title','type','year','scope','effective_at']);

        return [
            'data' => $rows,
            'pagination' => [
                'page' => $page, 'per_page' => $perPage, 'total' => $total,
                'pages' => (int) ceil($total / $perPage),
            ],
            'filters' => compact('q','type','year','scope','hazardTypeId'),
        ];
    }

    /** ---------------- Programs list ---------------- */
    public function getPrograms(array $filters): array
    {
        $q = $filters['q'] ?? null;
        $divisionId = $filters['division_id'] ?? null;
        $status = $filters['status'] ?? null;
        $program_type = $filters['program_type'] ?? null;
        $perPage = max(1, (int) ($filters['per_page'] ?? 10));
        $page = max(1, (int) ($filters['page'] ?? 1));

        $query = Program::query()
            ->when($q, fn($qq) => $qq->where('title','like',"%$q%"))
            ->when($divisionId, fn($qq) => $qq->where('division_id',$divisionId))
            ->when($status, fn($qq) => $qq->where('status',$status))
            ->when($program_type, fn($qq) => $qq->where('program_type',$program_type));

        $total = (clone $query)->count();

        $rows = $query->orderByDesc('start_date')
            ->forPage($page, $perPage)
            ->get([
                'id','title','division_id','status','program_type',
                'start_date','end_date','budget_php','beneficiaries_count'
            ]);

        return [
            'data' => $rows,
            'pagination' => [
                'page' => $page, 'per_page' => $perPage, 'total' => $total,
                'pages' => (int) ceil($total / $perPage),
            ],
            'filters' => compact('q','divisionId','status','program_type'),
        ];
    }

}
