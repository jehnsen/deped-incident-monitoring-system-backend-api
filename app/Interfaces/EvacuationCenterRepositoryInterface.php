<?php

namespace App\Interfaces;

use App\Models\EvacuationCenter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface EvacuationCenterRepositoryInterface
{
    public function all(): Collection;
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): ?EvacuationCenter;
    public function create(array $data): EvacuationCenter;
    public function update(EvacuationCenter $model, array $data): EvacuationCenter;
    public function delete(EvacuationCenter $model): void;
}
