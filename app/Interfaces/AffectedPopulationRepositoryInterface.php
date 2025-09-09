<?php

namespace App\Interfaces;

use App\Models\AffectedPopulation;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface AffectedPopulationRepositoryInterface
{
    public function all(): Collection;
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): ?AffectedPopulation;
    public function create(array $data): AffectedPopulation;
    public function update(AffectedPopulation $model, array $data): AffectedPopulation;
    public function delete(AffectedPopulation $model): void;
}
