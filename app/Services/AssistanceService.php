<?php

namespace App\Services;

use App\Models\Assistance;
use App\Interfaces\AssistanceRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AssistanceService
{
    public function __construct(
        private readonly AssistanceRepositoryInterface $repo
    ) {}

    public function all(): Collection { return $this->repo->all(); }

    public function paginate(int $perPage = 15): LengthAwarePaginator {
        return $this->repo->paginate($perPage);
    }

    public function findOrFail(int $id): Assistance {
        $model = $this->repo->find($id);
        abort_if(!$model, 404, 'Assistance not found.');
        return $model;
    }

    public function store(array $data): Assistance {
        return $this->repo->create($data);
    }

    public function update(int $id, array $data): Assistance {
        $model = $this->findOrFail($id);
        return $this->repo->update($model, $data);
    }

    public function destroy(int $id): void {
        $model = $this->findOrFail($id);
        $this->repo->delete($model);
    }
}
