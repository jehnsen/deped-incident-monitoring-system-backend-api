<?php

namespace App\Interfaces;

use App\Models\Incident;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IncidentRepositoryInterface
{
    public function getAll(): Collection;

    public function getAllWithRelations(): Collection;

    public function paginate(int $perPage = 15): LengthAwarePaginator;

    public function findById(int|string $id): Incident;

    public function create(array $data): Incident;

    public function update(int|string $id, array $data): Incident;

    public function delete(int|string $id): bool;
}
