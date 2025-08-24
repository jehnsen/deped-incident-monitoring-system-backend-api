<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Incident\StoreIncidentTypeRequest;
use App\Http\Requests\Incident\UpdateIncidentTypeRequest;
use App\Http\Resources\IncidentTypeResource;
use App\Models\IncidentType;

class IncidentTypeController extends Controller
{
    public function index() { return IncidentTypeResource::collection(IncidentType::query()->paginate()); }
    public function store(StoreIncidentTypeRequest $r) { return (new IncidentTypeResource(IncidentType::create($r->validated())))->response()->setStatusCode(201); }
    public function show(IncidentType $incidentType) { return new IncidentTypeResource($incidentType); }
    public function update(UpdateIncidentTypeRequest $r, IncidentType $incidentType) { $incidentType->update($r->validated()); return new IncidentTypeResource($incidentType); }
    public function destroy(IncidentType $incidentType) { $incidentType->delete(); return response()->json(['message'=>'Deleted']); }
}
