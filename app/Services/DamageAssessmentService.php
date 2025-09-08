<?php

namespace App\Services;

use App\Models\DamageAssessment;
use App\Interfaces\DamageAssessmentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class DamageAssessmentService
{
    public function __construct(private readonly DamageAssessmentRepositoryInterface $repo) {}

    public function all(): Collection { return $this->repo->all(); }
    public function paginate(int $perPage = 15): LengthAwarePaginator { return $this->repo->paginate($perPage); }

    public function findOrFail(int $id): DamageAssessment {
        $m = $this->repo->find($id);
        abort_if(!$m, 404, 'DamageAssessment not found.');
        return $m;
    }

    public function store(array $data): DamageAssessment {
        $data = $this->normalizeAmounts($data);
        return $this->repo->create($data);
    }

    public function update(int $id, array $data): DamageAssessment {
        $model = $this->findOrFail($id);
        $data  = $this->normalizeAmounts($data, $model);
        return $this->repo->update($model, $data);
    }

    /**
     * Accept either `estimated_loss_amount` or legacy `estimated_cost` and keep them in sync.
     */
    private function normalizeAmounts(array $data, ?DamageAssessment $existing = null): array
    {
        $loss = array_key_exists('estimated_loss_amount', $data) ? $data['estimated_loss_amount'] : null;
        $cost = array_key_exists('estimated_cost', $data)        ? $data['estimated_cost']        : null;

        if ($loss !== null && $cost === null) {
            $data['estimated_cost'] = $loss; // write-through to legacy column
        } elseif ($loss === null && $cost !== null) {
            $data['estimated_loss_amount'] = $cost; // write-through to new column
        } elseif ($loss === null && $cost === null && $existing) {
            // keep existing values if neither provided
            $data['estimated_loss_amount'] = $existing->estimated_loss_amount;
            $data['estimated_cost']        = $existing->estimated_cost;
        }

        return $data;
    }

    public function destroy(int $id): void {
        $m = $this->findOrFail($id);
        $this->repo->delete($m);
    }
}
