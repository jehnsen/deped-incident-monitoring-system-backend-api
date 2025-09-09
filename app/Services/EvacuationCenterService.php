<?php

namespace App\Services;

use App\Interfaces\EvacuationCenterRepositoryInterface;
use App\Models\EvacuationCenter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class EvacuationCenterService
{
    public function __construct(private readonly EvacuationCenterRepositoryInterface $repo) {}

    public function all(): Collection { return $this->repo->all(); }
    public function paginate(int $perPage = 15): LengthAwarePaginator { return $this->repo->paginate($perPage); }

    public function findOrFail(int $id): EvacuationCenter {
        $m = $this->repo->find($id);
        abort_if(!$m, 404, 'EvacuationCenter not found.');
        return $m;
    }

    public function store(array $data): EvacuationCenter { return $this->repo->create($data); }
    public function update(int $id, array $data): EvacuationCenter {
        $m = $this->findOrFail($id);
        return $this->repo->update($m, $data);
    }
    public function destroy(int $id): void {
        $m = $this->findOrFail($id);
        $this->repo->delete($m);
    }
}
