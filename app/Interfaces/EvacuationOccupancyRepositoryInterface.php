<?php

namespace App\Interfaces;

use App\Models\EvacuationOccupancy;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface EvacuationOccupancyRepositoryInterface
{
    public function all(): Collection;
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): ?EvacuationOccupancy;
    public function create(array $data): EvacuationOccupancy;
    public function update(EvacuationOccupancy $model, array $data): EvacuationOccupancy;
    public function delete(EvacuationOccupancy $model): void;
}
