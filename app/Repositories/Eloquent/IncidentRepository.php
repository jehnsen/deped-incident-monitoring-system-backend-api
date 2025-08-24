<?php

namespace App\Repositories\Eloquent;

use App\Models\Incident;
use App\Repositories\Contracts\IncidentRepositoryInterface;

class IncidentRepository implements IncidentRepositoryInterface
{
    public function __construct(private readonly Incident $model) {}

    public function paginate(int $perPage = 15, array $with = [])
    {
        return $this->model->with($with)->paginate($perPage);
    }

    public function find(int|string $id, array $with = [])
    {
        return $this->model->with($with)->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /** Relations your service uses */
    public function withAllRelations(): array
    {
        return ['reporter', 'school', 'division', 'attachments']; // adjust to your app
    }
}
