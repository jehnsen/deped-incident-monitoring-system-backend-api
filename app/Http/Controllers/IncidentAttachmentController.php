<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncidentAttachment\StoreIncidentAttachmentRequest;
use App\Http\Requests\IncidentAttachment\UpdateIncidentAttachmentRequest;
use App\Http\Resources\IncidentAttachmentResource;
use App\Services\IncidentAttachmentService;
use Illuminate\Http\Request;

class IncidentAttachmentController extends Controller
{
    public function __construct(private readonly IncidentAttachmentService $service) {}

    public function index(Request $request)
    {
        $perPage = (int)$request->query('per_page', 0);
        return $perPage > 0
            ? IncidentAttachmentResource::collection($this->service->paginate($perPage))
            : IncidentAttachmentResource::collection($this->service->all());
    }

    public function show(int $id) { return new IncidentAttachmentResource($this->service->findOrFail($id)); }

    public function store(StoreIncidentAttachmentRequest $request)
    {
        $m = $this->service->store($request->validated());
        return (new IncidentAttachmentResource($m))->response()->setStatusCode(201);
    }

    public function update(UpdateIncidentAttachmentRequest $request, int $id)
    {
        $m = $this->service->update($id, $request->validated());
        return new IncidentAttachmentResource($m);
    }

    public function destroy(int $id)
    {
        $this->service->destroy($id);
        return response()->json(['message' => 'Deleted successfully']);
    }
}
