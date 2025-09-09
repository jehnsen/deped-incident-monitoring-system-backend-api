<?php

namespace App\Repositories;

use App\Models\Hazard;
use App\Interfaces\HazardRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class HazardRepository implements HazardRepositoryInterface
{
    public function all(): Collection { return Hazard::query()->orderBy('name')->get(); }
    public function paginate(int $perPage = 15): LengthAwarePaginator { return Hazard::paginate($perPage); }
    public function find(int $id): ?Hazard { return Hazard::find($id); }
    public function create(array $data): Hazard { return Hazard::create($data); }
    public function update(Hazard $hazard, array $data): Hazard { $hazard->update($data); return $hazard; }
    public function delete(Hazard $hazard): void { $hazard->delete(); }
}
