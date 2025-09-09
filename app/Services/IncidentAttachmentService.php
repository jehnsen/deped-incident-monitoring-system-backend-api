<?php

namespace App\Services;

use App\Models\IncidentAttachment;
use App\Interfaces\IncidentAttachmentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class IncidentAttachmentService
{
    public function __construct(private readonly IncidentAttachmentRepositoryInterface $repo) {}

    public function all(): Collection { return $this->repo->all(); }
    public function paginate(int $perPage = 15): LengthAwarePaginator { return $this->repo->paginate($perPage); }

    public function findOrFail(int $id): IncidentAttachment {
        $m = $this->repo->find($id);
        abort_if(!$m, 404, 'IncidentAttachment not found.');
        return $m;
    }

    public function store(array $data): IncidentAttachment { return $this->repo->create($data); }
    public function update(int $id, array $data): IncidentAttachment {
        $m = $this->findOrFail($id);
        return $this->repo->update($m, $data);
    }
    public function destroy(int $id): void {
        $m = $this->findOrFail($id);
        $this->repo->delete($m);
    }
}
