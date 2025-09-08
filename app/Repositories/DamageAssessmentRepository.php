<?php

namespace App\Repositories;

use App\Models\DamageAssessment;
use App\Interfaces\DamageAssessmentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class DamageAssessmentRepository implements DamageAssessmentRepositoryInterface
{
    public function all(): Collection
    {
        return DamageAssessment::query()->latest('id')->get();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return DamageAssessment::query()
            ->when(request('incident_id'), fn($q, $v) => $q->where('incident_id', $v))
            ->when(request('status'), fn($q, $v) => $q->where('status', $v))
            ->latest('id')
            ->paginate($perPage);
    }

    public function find(int $id): ?DamageAssessment
    {
        return DamageAssessment::find($id);
    }

    public function create(array $data): DamageAssessment
    {
        return DamageAssessment::create($data);
    }

    public function update(DamageAssessment $model, array $data): DamageAssessment
    {
        $model->update($data);
        return $model;
    }

    public function delete(DamageAssessment $model): void
    {
        $model->delete();
    }
}
