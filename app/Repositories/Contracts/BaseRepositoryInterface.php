<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function query();
    public function all(array $with = []): iterable;
    public function paginate(int $perPage = 15, array $with = []): LengthAwarePaginator;
    public function find(int|string $id, array $with = []): ?Model;
    public function create(array $data): Model;
    public function update(int|string $id, array $data): Model;
    public function delete(int|string $id): bool;
}
