// app/Services/IncidentService.php
<?php

namespace App\Services;

use App\Repositories\Contracts\IncidentRepositoryInterface;

class IncidentService extends BaseService
{
    public function __construct(protected IncidentRepositoryInterface $repo)
    {
        parent::__construct($repo);
    }

    public function listWithRelations(int $perPage = 15)
    {
        return $this->repo->paginate($perPage, $this->repo->withAllRelations());
    }

    public function getWithRelations(int|string $id)
    {
        return $this->repo->find($id, $this->repo->withAllRelations());
    }
}
