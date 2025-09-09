<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\IssuanceAttachment\StoreIssuanceAttachmentRequest;
use App\Http\Requests\IssuanceAttachment\UpdateIssuanceAttachmentRequest;
use App\Http\Resources\IssuanceAttachmentResource;
use App\Services\IssuanceAttachmentService;
use Illuminate\Http\Request;

class IssuanceAttachmentController extends Controller
{
   public function __construct(private readonly IssuanceAttachmentService $service)
   {
   }

   public function index(Request $r)
   {
      $per = (int) $r->query('per_page', 0);
      return $per ? IssuanceAttachmentResource::collection($this->service->paginate($per))
         : IssuanceAttachmentResource::collection($this->service->all());
   }

   public function show(int $id)
   {
      return new IssuanceAttachmentResource($this->service->find($id));
   }
   public function store(StoreIssuanceAttachmentRequest $req)
   {
      return new IssuanceAttachmentResource($this->service->store($req->validated()));
   }
   public function update(UpdateIssuanceAttachmentRequest $req, int $id)
   {
      return new IssuanceAttachmentResource($this->service->update($id, $req->validated()));
   }
   public function destroy(int $id)
   {
      $this->service->delete($id);
      return response()->json(['message' => 'Deleted']);
   }
}

