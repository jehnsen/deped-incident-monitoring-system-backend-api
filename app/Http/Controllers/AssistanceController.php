<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Assistance\StoreAssistanceRequest;
use App\Http\Requests\Assistance\UpdateAssistanceRequest;
use App\Http\Resources\AssistanceResource;
use App\Services\AssistanceService;
use Illuminate\Http\Request;

class AssistanceController extends Controller
{
    public function __construct(private readonly AssistanceService $service) {}

    public function index(Request $request)
    {
        $perPage = (int) $request->query('per_page', 0);
        if ($perPage > 0) {
            return AssistanceResource::collection($this->service->paginate($perPage));
        }
        return AssistanceResource::collection($this->service->all());
    }

    public function show(int $id)
    {
        return new AssistanceResource($this->service->findOrFail($id));
    }

    public function store(StoreAssistanceRequest $request)
    {
        $model = $this->service->store($request->validated());
        return (new AssistanceResource($model))->response()->setStatusCode(201);
    }

    public function update(UpdateAssistanceRequest $request, int $id)
    {
        $model = $this->service->update($id, $request->validated());
        return new AssistanceResource($model);
    }

    public function destroy(int $id)
    {
        $this->service->destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
