<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Issuance\StoreIssuanceRequest;
use App\Http\Requests\Issuance\UpdateIssuanceRequest;
use App\Http\Resources\IssuanceResource;
use App\Services\IssuanceService;
use Illuminate\Http\Request;

class IssuanceController extends Controller
{
   public function __construct(private readonly IssuanceService $service)
   {
   }

   public function index(Request $r)
   {
      $per = (int) $r->query('per_page', 0);
      $data = $per ? $this->service->paginate($per) : $this->service->all();
      return IssuanceResource::collection($data);
   }

   public function show(int $id)
   {
      return new IssuanceResource($this->service->find($id));
   }
   public function store(StoreIssuanceRequest $req)
   {
      return new IssuanceResource($this->service->store($req->validated()));
   }
   public function update(StoreIssuanceRequest $req, int $id)
   {
      return new IssuanceResource($this->service->update($id, $req->validated()));
   }
   public function destroy(int $id)
   {
      $this->service->delete($id);
      return response()->json(['message' => 'Deleted']);
   }
}

