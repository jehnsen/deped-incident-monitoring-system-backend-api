<?php

namespace App\Interfaces;

use App\Models\ActivityLog;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ActivityLogRepositoryInterface
{
    public function all(): Collection;
    public function paginate(int $perPage, array $filters = []): LengthAwarePaginator;
    public function find(int $id): ?ActivityLog;
    public function create(array $data): ActivityLog;
    public function update(ActivityLog $log, array $data): ActivityLog;
    public function delete(ActivityLog $log): void;
}
