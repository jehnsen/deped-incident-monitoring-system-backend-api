<?php

namespace App\Repositories;

use App\Models\IncidentStatusHistory;
use App\Interfaces\IncidentStatusHistoryRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class IncidentStatusHistoryRepository implements IncidentStatusHistoryRepositoryInterface
{
    public function all(): Collection
    {
        return IncidentStatusHistory::latest('id')->get();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return IncidentStatusHistory::query()
            ->when(request('incident_id'), fn($q, $v) => $q->where('incident_id', $v))
            ->latest('id')
            ->paginate($perPage);
    }

    public function find(int $id): ?IncidentStatusHistory
    {
        return IncidentStatusHistory::find($id);
    }

    public function create(array $data): IncidentStatusHistory
    {
        return IncidentStatusHistory::create($data);
    }

    public function update(IncidentStatusHistory $model, array $data): IncidentStatusHistory
    {
        $model->update($data);
        return $model;
    }

    public function delete(IncidentStatusHistory $model): void
    {
        $model->delete();
    }
}
