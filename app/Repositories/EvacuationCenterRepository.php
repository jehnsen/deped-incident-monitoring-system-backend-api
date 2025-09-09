<?php

namespace App\Repositories;

use App\Interfaces\EvacuationCenterRepositoryInterface;
use App\Models\EvacuationCenter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class EvacuationCenterRepository implements EvacuationCenterRepositoryInterface
{
    public function all(): Collection
    {
        return EvacuationCenter::query()->latest('id')->get();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return EvacuationCenter::query()
            ->when(request('school_id'), fn($q,$v) => $q->where('school_id',$v))
            ->when(request('name'), fn($q,$v) => $q->where('name','like',"%{$v}%"))
            ->when(request('min_capacity'), fn($q,$v) => $q->where('capacity','>=',$v))
            ->latest('id')
            ->paginate($perPage);
    }

    public function find(int $id): ?EvacuationCenter
    {
        return EvacuationCenter::find($id);
    }

    public function create(array $data): EvacuationCenter
    {
        return EvacuationCenter::create($data);
    }

    public function update(EvacuationCenter $model, array $data): EvacuationCenter
    {
        $model->update($data);
        return $model;
    }

    public function delete(EvacuationCenter $model): void
    {
        $model->delete();
    }
}
