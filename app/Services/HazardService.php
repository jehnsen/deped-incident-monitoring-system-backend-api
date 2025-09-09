<?php

namespace App\Services;

use App\Models\Hazard;
use App\Interfaces\HazardRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class HazardService
{
    public function __construct(private readonly HazardRepositoryInterface $repo) {}
    public function all(): Collection { return $this->repo->all(); }
    public function paginate(int $perPage = 15): LengthAwarePaginator { return $this->repo->paginate($perPage); }
    public function find(int $id): ?Hazard { return $this->repo->find($id); }
    public function store(array $data): Hazard { return $this->repo->create($data); }
    public function update(int $id, array $data): Hazard { $h = $this->find($id); return $this->repo->update($h, $data); }
    public function delete(int $id): void { $h = $this->find($id); $this->repo->delete($h); }
}
