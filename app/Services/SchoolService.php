<?php

namespace App\Services;

use App\Interfaces\SchoolRepositoryInterface;
use App\Models\School;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class SchoolService
{
    public function __construct(private readonly SchoolRepositoryInterface $repo) {}

    /** @return Collection<int,School> */
    public function all(): Collection
    {
        return $this->repo->getAll();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->repo->paginate($perPage);
    }

    public function get(int|string $id): School
    {
        return $this->repo->findById($id);
    }

    public function create(array $data): School
    {
        return $this->repo->create($data);
    }

    public function update(int|string $id, array $data): School
    {
        return $this->repo->update($id, $data);
    }

    public function delete(int|string $id): bool
    {
        return $this->repo->delete($id);
    }
}
