<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActivityLog\StoreActivityLogRequest;
use App\Http\Requests\ActivityLog\UpdateActivityLogRequest;
use App\Http\Resources\ActivityLogResource;
use App\Services\ActivityLogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function __construct(private readonly ActivityLogService $service) {}

    /** GET /api/activity-logs?per_page=15&subject_type=App\Models\Incident&subject_id=30&action=approved */
    public function index(Request $request)
    {
        $perPage = (int) $request->query('per_page', 15);
        $filters = $request->only([
            'subject_type','subject_id','action','actor_user_id','date_from','date_to','search'
        ]);

        $paginator = $this->service->paginate($perPage, $filters);
        return ActivityLogResource::collection($paginator);
    }

    /** POST /api/activity-logs */
    public function store(StoreActivityLogRequest $request): JsonResponse
    {
        $log = $this->service->create($request->validated(), $request);
        return (new ActivityLogResource($log))->response()->setStatusCode(201);
    }

    /** GET /api/activity-logs/{id} */
    public function show(int $id): ActivityLogResource
    {
        return new ActivityLogResource($this->service->findOrFail($id)->load('actor'));
    }

    /** PUT /api/activity-logs/{id} */
    public function update(UpdateActivityLogRequest $request, int $id): ActivityLogResource
    {
        $log = $this->service->update($id, $request->validated());
        return new ActivityLogResource($log);
    }

    /** DELETE /api/activity-logs/{id} */
    public function destroy(int $id): JsonResponse
    {
        $this->service->delete($id);
        return response()->json(['message' => 'Deleted']);
    }
}
