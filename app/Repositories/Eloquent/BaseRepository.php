<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(protected Model $model) {}

    public function query() { return $this->model->newQuery(); }

    public function all(array $with = []): iterable
    {
        return $this->query()->with($with)->get();
    }

    public function paginate(int $perPage = 15, array $with = []): LengthAwarePaginator
    {
        return $this->query()->with($with)->paginate($perPage);
    }

    public function find(int|string $id, array $with = []): ?Model
    {
        return $this->query()->with($with)->find($id);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(int|string $id, array $data): Model
    {
        $item = $this->find($id);
        $item->update($data);
        return $item->fresh();
    }

    public function delete(int|string $id): bool
    {
        $item = $this->find($id);
        return (bool) $item?->delete();
    }
}
