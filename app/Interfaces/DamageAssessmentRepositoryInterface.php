<?php

namespace App\Interfaces;

use App\Models\DamageAssessment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface DamageAssessmentRepositoryInterface
{
    public function all(): Collection;
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): ?DamageAssessment;
    public function create(array $data): DamageAssessment;
    public function update(DamageAssessment $model, array $data): DamageAssessment;
    public function delete(DamageAssessment $model): void;
}
