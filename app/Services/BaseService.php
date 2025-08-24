<?php

namespace App\Services;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

abstract class BaseService
{
    public function __construct(protected BaseRepositoryInterface $repo) {}

    public function list(array $with = [], int $perPage = 0): iterable|LengthAwarePaginator
    {
        return $perPage > 0 ? $this->repo->paginate($perPage, $with) : $this->repo->all($with);
    }

    public function get(int|string $id, array $with = []): ?Model { return $this->repo->find($id, $with); }
    public function create(array $data): Model { return $this->repo->create($data); }
    public function update(int|string $id, array $data): Model { return $this->repo->update($id, $data); }
    public function delete(int|string $id): bool { return $this->repo->delete($id); }
}
