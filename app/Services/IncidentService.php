<?php

namespace App\Services;

use App\Repositories\Contracts\IncidentRepositoryInterface;
class IncidentService extends BaseService
{
    public $incidentRepository;

    public function __construct(protected IncidentRepositoryInterface $_incidentRepository)
    {
        parent::__construct($_incidentRepository);
        $this->incidentRepository = $_incidentRepository;
    }

    public function listWithRelations(int $perPage = 15)
    {
        return $this->incidentRepository->paginate($perPage, $this->incidentRepository->withAllRelations());
    }

    public function getWithRelations(int|string $id)
    {
        return $this->incidentRepository->find($id, $this->incidentRepository->withAllRelations());
    }
}
