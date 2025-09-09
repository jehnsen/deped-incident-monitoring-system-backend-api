<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;
use App\Http\Resources\TagResource;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
   public function __construct(private readonly TagService $service)
   {
   }

   public function index(Request $r)
   {
      $per = (int) $r->query('per_page', 0);
      return $per ? TagResource::collection($this->service->paginate($per))
         : TagResource::collection($this->service->all());
   }

   public function show(int $id)
   {
      return new TagResource($this->service->find($id));
   }
   public function store(StoreTagRequest $req)
   {
      return new TagResource($this->service->store($req->validated()));
   }
   public function update(UpdateTagRequest $req, int $id)
   {
      return new TagResource($this->service->update($id, $req->validated()));
   }
   public function destroy(int $id)
   {
      $this->service->delete($id);
      return response()->json(['message' => 'Deleted']);
   }
}
