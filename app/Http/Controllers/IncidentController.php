<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Incident\StoreIncidentRequest;
use App\Http\Requests\Incident\UpdateIncidentRequest;
use App\Http\Resources\IncidentResource;
use App\Services\IncidentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function __construct(private readonly IncidentService $service) {}

    public function index(Request $request)
    {
        $perPage = (int) $request->get('per_page', 15);
        $data = $this->service->listWithRelations($perPage);
        return IncidentResource::collection($data);
    }

    public function store(StoreIncidentRequest $request): JsonResponse
    {
        $incident = $this->service->create($request->validated());
        return (new IncidentResource($incident->load($this->service->repo->withAllRelations())))
            ->response()->setStatusCode(201);
    }

    public function show(int $id): IncidentResource
    {
        $incident = $this->service->getWithRelations($id);
        abort_unless($incident, 404);
        return new IncidentResource($incident);
    }

    public function update(UpdateIncidentRequest $request, int $id): IncidentResource
    {
        $incident = $this->service->update($id, $request->validated());
        return new IncidentResource($incident->load($this->service->repo->withAllRelations()));
    }

    public function destroy(int $id): JsonResponse
    {
        abort_unless($this->service->delete($id), 404);
        return response()->json(['message' => 'Deleted']);
    }
}
