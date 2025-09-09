<?php

namespace App\Interfaces;

use App\Models\IncidentAttachment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface IncidentAttachmentRepositoryInterface
{
    public function all(): Collection;
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): ?IncidentAttachment;
    public function create(array $data): IncidentAttachment;
    public function update(IncidentAttachment $model, array $data): IncidentAttachment;
    public function delete(IncidentAttachment $model): void;
}
