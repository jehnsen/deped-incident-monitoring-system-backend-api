<?php

namespace App\Services;

use App\Models\HazardAssessment;
use App\Interfaces\HazardAssessmentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class HazardAssessmentService
{
    public function __construct(private readonly HazardAssessmentRepositoryInterface $repo) {}
    public function all(): Collection { return $this->repo->all(); }
    public function paginate(int $perPage = 15): LengthAwarePaginator { return $this->repo->paginate($perPage); }
    public function find(int $id): ?HazardAssessment { return $this->repo->find($id); }
    public function store(array $data): HazardAssessment { return $this->repo->create($data); }
    public function update(int $id, array $data): HazardAssessment { $a = $this->find($id); return $this->repo->update($a, $data); }
    public function delete(int $id): void { $a = $this->find($id); $this->repo->delete($a); }
}
