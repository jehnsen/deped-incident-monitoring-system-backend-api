<?php

namespace App\Interfaces;

use App\Models\Inventory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface InventoryRepositoryInterface
{
   public function all(): Collection;
   public function paginate(int $perPage = 15): LengthAwarePaginator;
   public function find(int $id): ?Inventory;
   public function create(array $data): Inventory;
   public function update(Inventory $inventory, array $data): Inventory;
   public function delete(Inventory $inventory): void;
}
