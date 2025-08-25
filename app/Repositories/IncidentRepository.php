<?php

namespace App\Repositories;

use App\Models\Incident;
use Illuminate\Database\Eloquent\Collection;
use App\Interfaces\IncidentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class IncidentRepository implements IncidentRepositoryInterface
{
    public function __construct(private readonly Incident $model) {}

    public function getAll(): Collection
    {
        return $this->model->orderByDesc('created_at')->get();
    }

    public function withAllRelations(): array
    {
        return ['type', 'school', 'reporter', 'attachments', 'statuses', 'affected', 'damages', 'assistance', 'occupancies'];
    }

    public function getAllWithRelations(): Collection
    {
        return $this->model
            ->with($this->withAllRelations())
            ->orderByDesc('created_at')
            ->get();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->orderByDesc('created_at')->paginate($perPage);
    }

    public function findById(int|string $id): Incident
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data): Incident
    {
        return $this->model->create($data);
    }

    public function update(int|string $id, array $data): Incident
    {
        $record = $this->model->findOrFail($id);
        $record->update($data);
        return $record;
    }

    public function delete(int|string $id): bool
    {
        $record = $this->model->findOrFail($id);
        return (bool) $record->delete();
    }
}
