<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EvacuationOccupancy\StoreEvacuationOccupancyRequest;
use App\Http\Requests\EvacuationOccupancy\UpdateEvacuationOccupancyRequest;
use App\Http\Resources\EvacuationOccupancyResource;
use App\Services\EvacuationOccupancyService;
use Illuminate\Http\Request;

class EvacuationOccupancyController extends Controller
{
    public function __construct(private readonly EvacuationOccupancyService $service) {}

    public function index(Request $request)
    {
        $perPage = (int)$request->query('per_page', 0);
        return $perPage > 0
            ? EvacuationOccupancyResource::collection($this->service->paginate($perPage))
            : EvacuationOccupancyResource::collection($this->service->all());
    }

    public function show(int $id)
    {
        return new EvacuationOccupancyResource($this->service->findOrFail($id));
    }

    public function store(StoreEvacuationOccupancyRequest $request)
    {
        $m = $this->service->store($request->validated());
        return (new EvacuationOccupancyResource($m))->response()->setStatusCode(201);
    }

    public function update(UpdateEvacuationOccupancyRequest $request, int $id)
    {
        $m = $this->service->update($id, $request->validated());
        return new EvacuationOccupancyResource($m);
    }

    public function destroy(int $id)
    {
        $this->service->destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
