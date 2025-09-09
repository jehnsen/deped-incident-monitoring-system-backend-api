<?php

namespace App\Repositories;

use App\Interfaces\AffectedPopulationRepositoryInterface;
use App\Models\AffectedPopulation;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AffectedPopulationRepository implements AffectedPopulationRepositoryInterface
{
    public function all(): Collection
    {
        return AffectedPopulation::latest('id')->get();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return AffectedPopulation::query()
            ->when(request('incident_id'), fn($q,$v) => $q->where('incident_id',$v))
            ->latest('id')
            ->paginate($perPage);
    }

    public function find(int $id): ?AffectedPopulation
    {
        return AffectedPopulation::find($id);
    }

    public function create(array $data): AffectedPopulation
    {
        return AffectedPopulation::create($data);
    }

    public function update(AffectedPopulation $model, array $data): AffectedPopulation
    {
        $model->update($data);
        return $model;
    }

    public function delete(AffectedPopulation $model): void
    {
        $model->delete();
    }
}
