<?php

namespace App\Repositories;

use App\Interfaces\SchoolRepositoryInterface;
use App\Models\School;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class SchoolRepository implements SchoolRepositoryInterface
{
    public function __construct(private readonly School $model) {}

    public function getAll(): Collection
    {
        return $this->model->orderBy('name')->get();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->orderBy('name')->paginate($perPage);
    }

    public function findById(int|string $id): School
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data): School
    {
        return $this->model->create($data);
    }

    public function update(int|string $id, array $data): School
    {
        $record = $this->model->findOrFail($id);
        $record->update($data);
        return $record;
    }

    public function delete(int|string $id): bool
    {
        $record = $this->model->findOrFail($id);
        return (bool) $record->delete();
    }
}
