<?php

namespace App\Interfaces;

use App\Models\School;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface SchoolRepositoryInterface
{
    /** @return Collection<int,School> */
    public function getAll(): Collection;

    public function paginate(int $perPage = 15): LengthAwarePaginator;

    public function findById(int|string $id): School;

    public function create(array $data): School;

    public function update(int|string $id, array $data): School;

    public function delete(int|string $id): bool;
}
