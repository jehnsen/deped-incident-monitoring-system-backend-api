<?php

namespace App\Interfaces;

use App\Models\Hazard;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface HazardRepositoryInterface {
    public function all(): Collection;
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): ?Hazard;
    public function create(array $data): Hazard;
    public function update(Hazard $hazard, array $data): Hazard;
    public function delete(Hazard $hazard): void;
}
