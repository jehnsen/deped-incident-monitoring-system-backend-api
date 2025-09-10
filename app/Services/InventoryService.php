<?php

namespace App\Services;

use App\Models\Inventory;
use App\Interfaces\InventoryRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class InventoryService
{
   public function __construct(private readonly InventoryRepositoryInterface $repo)
   {
   }
   public function all(): Collection
   {
      return $this->repo->all();
   }
   public function paginate(int $perPage = 15): LengthAwarePaginator
   {
      return $this->repo->paginate($perPage);
   }
   public function find(int $id): ?Inventory
   {
      return $this->repo->find($id);
   }
   public function store(array $data): Inventory
   {
      return $this->repo->create($data);
   }
   public function update(int $id, array $data): Inventory
   {
      $m = $this->find($id);
      return $this->repo->update($m, $data);
   }
   public function delete(int $id): void
   {
      $m = $this->find($id);
      $this->repo->delete($m);
   }
}
