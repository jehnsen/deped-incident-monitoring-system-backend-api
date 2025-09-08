<?php

namespace App\Repositories;

use App\Models\Assistance;
use App\Interfaces\AssistanceRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AssistanceRepository implements AssistanceRepositoryInterface
{
    public function all(): Collection
    {
        return Assistance::query()->latest('id')->get();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Assistance::query()
            ->when(request('incident_id'), fn($q, $v) => $q->where('incident_id', $v))
            ->when(request('status'), fn($q, $v) => $q->where('status', $v))
            ->when(request('assistance_type'), fn($q, $v) => $q->where('assistance_type', $v))
            ->latest('id')
            ->paginate($perPage);
    }

    public function find(int $id): ?Assistance
    {
        return Assistance::find($id);
    }

    public function create(array $data): Assistance
    {
        return Assistance::create($data);
    }

    public function update(Assistance $model, array $data): Assistance
    {
        $model->update($data);
        return $model;
    }

    public function delete(Assistance $model): void
    {
        $model->delete();
    }
}
