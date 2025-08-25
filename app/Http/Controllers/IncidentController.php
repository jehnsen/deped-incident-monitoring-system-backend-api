<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Incident\StoreIncidentRequest;
use App\Http\Requests\Incident\UpdateIncidentRequest;
use App\Http\Resources\IncidentResource;
use App\Services\IncidentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function __construct(private readonly IncidentService $service)
    {
        // $this->middleware('auth:api'); // uncomment if endpoints require auth
    }

    /**
     * GET /api/incidents
     * Optional: ?per_page=15 to paginate
     */
    public function index(Request $request)
    {
        $perPage = (int) $request->query('per_page', 0);

        if ($perPage > 0) {
            $paginator = $this->service->paginate($perPage); // see "Add paginate()" below
            return IncidentResource::collection($paginator);
        }

        return IncidentResource::collection($this->service->all());
    }

    /**
     * POST /api/incidents
     */
    public function store(StoreIncidentRequest $request): JsonResponse
    {
        $incident = $this->service->create($request->validated());

        return (new IncidentResource($incident))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * GET /api/incidents/{id}
     */
    public function show(int|string $id): IncidentResource
    {
        return new IncidentResource($this->service->get($id));
    }

    /**
     * PUT/PATCH /api/incidents/{id}
     */
    public function update(UpdateIncidentRequest $request, int|string $id): IncidentResource
    {
        $incident = $this->service->update($id, $request->validated());
        return new IncidentResource($incident);
    }

    /**
     * DELETE /api/incidents/{id}
     */
    public function destroy(int|string $id): JsonResponse
    {
        $this->service->delete($id);
        return response()->json(null, 204);
    }
}
