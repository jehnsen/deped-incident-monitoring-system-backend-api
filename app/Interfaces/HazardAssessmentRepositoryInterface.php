<?php

namespace App\Interfaces;

use App\Models\HazardAssessment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface HazardAssessmentRepositoryInterface {
    public function all(): Collection;
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): ?HazardAssessment;
    public function create(array $data): HazardAssessment;
    public function update(HazardAssessment $assessment, array $data): HazardAssessment;
    public function delete(HazardAssessment $assessment): void;
}