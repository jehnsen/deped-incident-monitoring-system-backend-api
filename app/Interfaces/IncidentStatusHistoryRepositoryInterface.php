<?php

namespace App\Interfaces;

use App\Models\IncidentStatusHistory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface IncidentStatusHistoryRepositoryInterface
{
    public function all(): Collection;
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): ?IncidentStatusHistory;
    public function create(array $data): IncidentStatusHistory;
    public function update(IncidentStatusHistory $model, array $data): IncidentStatusHistory;
    public function delete(IncidentStatusHistory $model): void;
}
