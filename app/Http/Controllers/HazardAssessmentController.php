<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\HazardAssessment\StoreHazardAssessmentRequest;
use App\Http\Requests\HazardAssessment\UpdateHazardAssessmentRequest;
use App\Http\Resources\HazardAssessmentResource;
use App\Services\HazardAssessmentService;
use Illuminate\Http\Request;

class HazardAssessmentController extends Controller
{
   public function __construct(private readonly HazardAssessmentService $service)
   {
   }

   public function index(Request $r)
   {
      $per = (int) $r->query('per_page', 0);
      $data = $per ? $this->service->paginate($per) : $this->service->all();
      $data->load('hazard');
      return HazardAssessmentResource::collection($data);
   }

   public function show(int $id)
   {
      return new HazardAssessmentResource($this->service->find($id)->load('hazard'));
   }
   public function store(StoreHazardAssessmentRequest $req)
   {
      return new HazardAssessmentResource($this->service->store($req->validated())->load('hazard'));
   }
   public function update(StoreHazardAssessmentRequest $req, int $id)
   {
      return new HazardAssessmentResource($this->service->update($id, $req->validated())->load('hazard'));
   }
   public function destroy(int $id)
   {
      $this->service->delete($id);
      return response()->json(['message' => 'Deleted']);
   }
}
