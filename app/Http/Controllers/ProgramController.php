<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use App\Http\Requests\Program\StoreProgramRequest;
use App\Http\Requests\Program\StoreProgramRequest\StoreProgramRequest;
use App\Http\Resources\ProgramResource;
use App\Services\ProgramService;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
   public function __construct(private readonly ProgramService $service)
   {
   }

   public function index(Request $r)
   {
      $per = (int) $r->query('per_page', 0);
      $data = $per ? $this->service->paginate($per) : $this->service->all();
      return ProgramResource::collection($data);
   }

   public function show(int $id)
   {
      return new ProgramResource($this->service->find($id));
   }
   public function store(StoreProgramRequest $req)
   {
      return new ProgramResource($this->service->store($req->validated()));
   }
   public function update(StoreProgramRequest $req, int $id)
   {
      return new ProgramResource($this->service->update($id, $req->validated()));
   }
   public function destroy(int $id)
   {
      $this->service->delete($id);
      return response()->json(['message' => 'Deleted']);
   }
}
