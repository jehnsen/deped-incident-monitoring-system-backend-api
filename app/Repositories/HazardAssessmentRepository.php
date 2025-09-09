<?php

namespace App\Repositories;

use App\Models\HazardAssessment;
use App\Interfaces\HazardAssessmentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class HazardAssessmentRepository implements HazardAssessmentRepositoryInterface
{
    public function all(): Collection { return HazardAssessment::latest()->get(); }
    public function paginate(int $perPage = 15): LengthAwarePaginator { return HazardAssessment::latest()->paginate($perPage); }
    public function find(int $id): ?HazardAssessment { return HazardAssessment::find($id); }
    public function create(array $data): HazardAssessment { return HazardAssessment::create($data); }
    public function update(HazardAssessment $a, array $d): HazardAssessment { $a->update($d); return $a; }
    public function delete(HazardAssessment $a): void { $a->delete(); }
}
