<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EvacuationCenter\StoreEvacuationCenterRequest;
use App\Http\Requests\EvacuationCenter\UpdateEvacuationCenterRequest;
use App\Http\Resources\EvacuationCenterResource;
use App\Services\EvacuationCenterService;
use Illuminate\Http\Request;

class EvacuationCenterController extends Controller
{
    public function __construct(private readonly EvacuationCenterService $service) {}

    public function index(Request $request)
    {
        $perPage = (int)$request->query('per_page', 0);
        return $perPage > 0
            ? EvacuationCenterResource::collection($this->service->paginate($perPage))
            : EvacuationCenterResource::collection($this->service->all());
    }

    public function show(int $id)
    {
        return new EvacuationCenterResource($this->service->findOrFail($id));
    }

    public function store(StoreEvacuationCenterRequest $request)
    {
        $m = $this->service->store($request->validated());
        return (new EvacuationCenterResource($m))->response()->setStatusCode(201);
    }

    public function update(UpdateEvacuationCenterRequest $request, int $id)
    {
        $m = $this->service->update($id, $request->validated());
        return new EvacuationCenterResource($m);
    }

    public function destroy(int $id)
    {
        $this->service->destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
