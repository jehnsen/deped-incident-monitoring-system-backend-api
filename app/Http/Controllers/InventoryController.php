<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Inventory\StoreInventoryRequest;
use App\Http\Requests\Inventory\UpdateInventoryRequest;
use App\Http\Resources\InventoryResource;
use App\Services\InventoryService;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function __construct(private readonly InventoryService $service)
    {
    }

    public function index(Request $r)
    {
        $per = (int) $r->query('per_page', 0);
        return $per ? InventoryResource::collection($this->service->paginate($per))
            : InventoryResource::collection($this->service->all());
    }

    public function show(int $id)
    {
        return new InventoryResource($this->service->find($id));
    }
    public function store(StoreInventoryRequest $req)
    {
        return new InventoryResource($this->service->store($req->validated()));
    }
    public function update(UpdateInventoryRequest $req, int $id)
    {
        return new InventoryResource($this->service->update($id, $req->validated()));
    }
    public function destroy(int $id)
    {
        $this->service->delete($id);
        return response()->json(['message' => 'Deleted']);
    }
}

