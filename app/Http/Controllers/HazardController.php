<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hazard\StoreHazardRequest;
use App\Http\Requests\Hazard\UpdateHazardRequest;
use App\Http\Resources\HazardResource;
use App\Services\HazardService;
use Illuminate\Http\Request;

class HazardController extends Controller
{
   public function __construct(private readonly HazardService $service)
   {
   }

   public function index(Request $r)
   {
      $per = (int) $r->query('per_page', 0);
      return $per ? HazardResource::collection($this->service->paginate($per))
         : HazardResource::collection($this->service->all());
   }

   public function show(int $id)
   {
      return new HazardResource($this->service->find($id));
   }
   public function store(StoreHazardRequest $req)
   {
      return new HazardResource($this->service->store($req->validated()));
   }
   public function update(UpdateHazardRequest $req, int $id)
   {
      return new HazardResource($this->service->update($id, $req->validated()));
   }
   public function destroy(int $id)
   {
      $this->service->delete($id);
      return response()->json(['message' => 'Deleted']);
   }
}
