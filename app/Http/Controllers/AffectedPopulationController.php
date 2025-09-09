<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AffectedPopulation\StoreAffectedPopulationRequest;
use App\Http\Requests\AffectedPopulation\UpdateAffectedPopulationRequest;
use App\Http\Resources\AffectedPopulationResource;
use App\Services\AffectedPopulationService;
use Illuminate\Http\Request;

class AffectedPopulationController extends Controller
{
    public function __construct(private readonly AffectedPopulationService $service) {}

    public function index(Request $request)
    {
        $perPage = (int)$request->query('per_page', 0);
        return $perPage > 0
            ? AffectedPopulationResource::collection($this->service->paginate($perPage))
            : AffectedPopulationResource::collection($this->service->all());
    }

    public function show(int $id)
    {
        return new AffectedPopulationResource($this->service->findOrFail($id));
    }

    public function store(StoreAffectedPopulationRequest $request)
    {
        $m = $this->service->store($request->validated());
        return (new AffectedPopulationResource($m))->response()->setStatusCode(201);
    }

    public function update(UpdateAffectedPopulationRequest $request, int $id)
    {
        $m = $this->service->update($id, $request->validated());
        return new AffectedPopulationResource($m);
    }

    public function destroy(int $id)
    {
        $this->service->destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
