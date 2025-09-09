<?php

namespace App\Services;

use App\Interfaces\EvacuationOccupancyRepositoryInterface;
use App\Models\EvacuationOccupancy;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class EvacuationOccupancyService
{
    public function __construct(private readonly EvacuationOccupancyRepositoryInterface $repo) {}

    public function all(): Collection { return $this->repo->all(); }
    public function paginate(int $perPage = 15): LengthAwarePaginator { return $this->repo->paginate($perPage); }

    public function findOrFail(int $id): EvacuationOccupancy {
        $m = $this->repo->find($id);
        abort_if(!$m, 404, 'EvacuationOccupancy not found.');
        return $m;
    }

    public function store(array $data): EvacuationOccupancy { return $this->repo->create($data); }
    public function update(int $id, array $data): EvacuationOccupancy {
        $m = $this->findOrFail($id);
        return $this->repo->update($m, $data);
    }
    public function destroy(int $id): void {
        $m = $this->findOrFail($id);
        $this->repo->delete($m);
    }
}
