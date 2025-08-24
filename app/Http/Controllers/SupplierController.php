<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierRequest;
use App\Http\Resources\SupplierResource;
use App\Interfaces\SupplierRepositoryInterface;

class SupplierController extends Controller
{
    protected $supplierRepository;

    public function __construct(SupplierRepositoryInterface $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function index()
    {
        return SupplierResource::collection($this->supplierRepository->getAll());
    }

    public function store(StoreSupplierRequest $request)
    {
        $supplier = $this->supplierRepository->create($request->validated());
        return new SupplierResource($supplier);
    }

    public function show($id)
    {
        $supplier = $this->supplierRepository->findById($id);
        return new SupplierResource($supplier);
    }

    public function update(StoreSupplierRequest $request, $id)
    {
        $supplier = $this->supplierRepository->update($id, $request->validated());
        return new SupplierResource($supplier);
    }

    public function destroy($id)
    {
        $this->supplierRepository->delete($id);
        return response()->json(['message' => 'Supplier deleted successfully']);
    }
}
