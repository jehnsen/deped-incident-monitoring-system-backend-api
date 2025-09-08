<?php

namespace App\Interfaces;

use App\Models\Assistance;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface AssistanceRepositoryInterface
{
    public function all(): Collection;
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): ?Assistance;
    public function create(array $data): Assistance;
    public function update(Assistance $model, array $data): Assistance;
    public function delete(Assistance $model): void;
}
