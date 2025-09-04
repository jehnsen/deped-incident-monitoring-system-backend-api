<?php

namespace App\Services;

use App\Models\IncidentType;
use App\Interfaces\IncidentTypeRepositoryInterface;

class IncidentTypeService
{
    public function __construct(private IncidentTypeRepositoryInterface $repo)
    {
    }

    public function withRelations(): array
    {
        return $this->repo->withRelations();
    }

    public function paginateWithRelations(int $perPage = 15)
    {
        return $this->repo->paginateWithRelations($perPage);
    }

    public function allWithRelations()
    {
        return $this->repo->allWithRelations();
    }

    public function findWithRelations(int|string $id)
    {
        return $this->repo->findWithRelations($id);
    }

    public function getAllIncidentTypes()
    {
        return $this->repo->allWithRelations();
    }

    public function getIncidentTypeById(int|string $id)
    {
        return $this->repo->findWithRelations($id);
    }

    public function create(array $data)
    {
        return $this->repo->create($data);
    }

    public function update(int|string $id, array $data)
    {
        return $this->repo->update($id, $data);
    }

    public function delete(int|string $id)
    {
        return $this->repo->delete($id);
    }
}
