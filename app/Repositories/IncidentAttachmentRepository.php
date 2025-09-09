<?php

namespace App\Repositories;

use App\Models\IncidentAttachment;
use App\Interfaces\IncidentAttachmentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class IncidentAttachmentRepository implements IncidentAttachmentRepositoryInterface
{
    public function all(): Collection
    {
        return IncidentAttachment::latest('id')->get();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return IncidentAttachment::query()
            ->when(request('incident_id'), fn($q, $v) => $q->where('incident_id', $v))
            ->latest('id')
            ->paginate($perPage);
    }

    public function find(int $id): ?IncidentAttachment
    {
        return IncidentAttachment::find($id);
    }

    public function create(array $data): IncidentAttachment
    {
        return IncidentAttachment::create($data);
    }

    public function update(IncidentAttachment $model, array $data): IncidentAttachment
    {
        $model->update($data);
        return $model;
    }

    public function delete(IncidentAttachment $model): void
    {
        $model->delete();
    }
}
