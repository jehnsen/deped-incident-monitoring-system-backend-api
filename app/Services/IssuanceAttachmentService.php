<?php

namespace App\Services;

use App\Models\IssuanceAttachment;
use App\Interfaces\IssuanceAttachmentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class IssuanceAttachmentService
{
    public function __construct(private readonly IssuanceAttachmentRepositoryInterface $repo) {}

    public function all(): Collection { return $this->repo->all(); }
    public function paginate(int $perPage = 15): LengthAwarePaginator { return $this->repo->paginate($perPage); }
    public function find(int $id): ?IssuanceAttachment { return $this->repo->find($id); }
    public function store(array $data): IssuanceAttachment { return $this->repo->create($data); }
    public function update(int $id, array $data): IssuanceAttachment {
        $att = $this->find($id); return $this->repo->update($att, $data);
    }
    public function delete(int $id): void {
        $att = $this->find($id); $this->repo->delete($att);
    }
}
