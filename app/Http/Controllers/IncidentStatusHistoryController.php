<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncidentStatusHistory\StoreIncidentStatusHistoryRequest;
use App\Http\Requests\IncidentStatusHistory\UpdateIncidentStatusHistoryRequest;
use App\Http\Resources\IncidentStatusHistoryResource;
use App\Services\IncidentStatusHistoryService;
use Illuminate\Http\Request;

class IncidentStatusHistoryController extends Controller
{
    public function __construct(private readonly IncidentStatusHistoryService $service) {}

    public function index(Request $request)
    {
        $perPage = (int)$request->query('per_page', 0);
        return $perPage > 0
            ? IncidentStatusHistoryResource::collection($this->service->paginate($perPage))
            : IncidentStatusHistoryResource::collection($this->service->all());
    }

    public function show(int $id) { return new IncidentStatusHistoryResource($this->service->findOrFail($id)); }

    public function store(StoreIncidentStatusHistoryRequest $request)
    {
        $m = $this->service->store($request->validated());
        return (new IncidentStatusHistoryResource($m))->response()->setStatusCode(201);
    }

    public function update(UpdateIncidentStatusHistoryRequest $request, int $id)
    {
        $m = $this->service->update($id, $request->validated());
        return new IncidentStatusHistoryResource($m);
    }

    public function destroy(int $id)
    {
        $this->service->destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
