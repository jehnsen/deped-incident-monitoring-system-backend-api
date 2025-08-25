<?php

namespace App\Services;

use App\Models\Incident;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\IncidentRepositoryInterface;

class IncidentService
{
    public function __construct(private readonly IncidentRepositoryInterface $repo) {}

    public function all(): Collection
    {
        return $this->repo->getAll();
        // return $this->repo->getAllWithRelations();
    }

    public function paginate(int $perPage)
    {
        return $this->repo->paginate($perPage);
    }

    public function get(int|string $id): Incident
    {
        return $this->repo->findById($id);
    }

    public function create(array $data): Incident
    {
        return $this->repo->create($data);
    }

    public function update(int|string $id, array $data): Incident
    {
        return $this->repo->update($id, $data);
    }

    public function delete(int|string $id): bool
    {
        return $this->repo->delete($id);
    }
}
