<?php

namespace App\Services;

use App\Models\Issuance;
use App\Interfaces\IssuanceRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class IssuanceService
{
    public function __construct(private readonly IssuanceRepositoryInterface $repo) {}
    public function all(): Collection { return $this->repo->all(); }
    public function paginate(int $perPage = 15): LengthAwarePaginator { return $this->repo->paginate($perPage); }
    public function find(int $id): ?Issuance { return $this->repo->find($id); }
    public function store(array $data): Issuance { return $this->repo->create($data); }
    public function update(int $id, array $data): Issuance { $i = $this->find($id); return $this->repo->update($i, $data); }
    public function delete(int $id): void { $i = $this->find($id); $this->repo->delete($i); }
}
