<?php

namespace App\Services;

use App\Interfaces\AffectedPopulationRepositoryInterface;
use App\Models\AffectedPopulation;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AffectedPopulationService
{
    public function __construct(private readonly AffectedPopulationRepositoryInterface $repo) {}

    public function all(): Collection { return $this->repo->all(); }
    public function paginate(int $perPage = 15): LengthAwarePaginator { return $this->repo->paginate($perPage); }

    public function findOrFail(int $id): AffectedPopulation {
        $m = $this->repo->find($id);
        abort_if(!$m, 404, 'AffectedPopulation not found.');
        return $m;
    }

    public function store(array $data): AffectedPopulation { return $this->repo->create($data); }

    public function update(int $id, array $data): AffectedPopulation {
        $m = $this->findOrFail($id);
        return $this->repo->update($m, $data);
    }

    public function destroy(int $id): void {
        $m = $this->findOrFail($id);
        $this->repo->delete($m);
    }
}
