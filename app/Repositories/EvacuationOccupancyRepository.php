<?php

namespace App\Repositories;

use App\Interfaces\EvacuationOccupancyRepositoryInterface;
use App\Models\EvacuationOccupancy;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class EvacuationOccupancyRepository implements EvacuationOccupancyRepositoryInterface
{
    public function all(): Collection
    {
        return EvacuationOccupancy::query()->latest('id')->get();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return EvacuationOccupancy::query()
            ->when(request('incident_id'), fn($q,$v) => $q->where('incident_id',$v))
            ->when(request('evacuation_center_id'), fn($q,$v) => $q->where('evacuation_center_id',$v))
            ->when(request('reported_from'), fn($q,$v) => $q->where('reported_at','>=',$v))
            ->when(request('reported_to'), fn($q,$v) => $q->where('reported_at','<=',$v))
            ->latest('reported_at')
            ->paginate($perPage);
    }

    public function find(int $id): ?EvacuationOccupancy
    {
        return EvacuationOccupancy::find($id);
    }

    public function create(array $data): EvacuationOccupancy
    {
        return EvacuationOccupancy::create($data);
    }

    public function update(EvacuationOccupancy $model, array $data): EvacuationOccupancy
    {
        $model->update($data);
        return $model;
    }

    public function delete(EvacuationOccupancy $model): void
    {
        $model->delete();
    }
}
