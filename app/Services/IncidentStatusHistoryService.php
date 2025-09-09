<?php

namespace App\Services;

use App\Models\IncidentStatusHistory;
use App\Interfaces\IncidentStatusHistoryRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class IncidentStatusHistoryService
{
    public function __construct(private readonly IncidentStatusHistoryRepositoryInterface $repo) {}

    public function all(): Collection { return $this->repo->all(); }
    public function paginate(int $perPage = 15): LengthAwarePaginator { return $this->repo->paginate($perPage); }

    public function findOrFail(int $id): IncidentStatusHistory {
        $m = $this->repo->find($id);
        abort_if(!$m, 404, 'IncidentStatusHistory not found.');
        return $m;
    }

    public function store(array $data): IncidentStatusHistory { return $this->repo->create($data); }
    public function update(int $id, array $data): IncidentStatusHistory {
        $m = $this->findOrFail($id);
        return $this->repo->update($m, $data);
    }
    public function destroy(int $id): void {
        $m = $this->findOrFail($id);
        $this->repo->delete($m);
    }
}
