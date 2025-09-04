<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Division\StoreDivisionRequest;
use App\Http\Requests\Division\UpdateDivisionRequest;
use App\Http\Resources\DivisionResource;
use App\Services\DivisionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function __construct(private readonly DivisionService $service) {}

    public function index(Request $request)
    {
        $perPage = (int) $request->query('per_page', 15);
        $data = $this->service->list($perPage);
        return DivisionResource::collection($data);
    }

    public function store(StoreDivisionRequest $request): JsonResponse
    {
        $div = $this->service->create($request->validated());
        // reload with relation to include region in response
        $div->load('region');
        return (new DivisionResource($div))->response()->setStatusCode(201);
    }

    public function show(int $division): DivisionResource
    {
        $div = $this->service->getWithRelations($division);
        abort_unless($div, 404);
        return new DivisionResource($div);
    }

    public function update(UpdateDivisionRequest $request, int $division): DivisionResource
    {
        $div = $this->service->update($division, $request->validated());
        $div->load('region');
        return new DivisionResource($div);
    }

    public function destroy(int $division): JsonResponse
    {
        abort_unless($this->service->delete($division), 404);
        return response()->json(['message' => 'Deleted']);
    }
}
