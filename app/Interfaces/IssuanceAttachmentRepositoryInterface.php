<?php

namespace App\Interfaces;

use App\Models\IssuanceAttachment;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface IssuanceAttachmentRepositoryInterface
{
   public function all(): Collection;
   public function paginate(int $perPage = 15): LengthAwarePaginator;
   public function find(int $id): ?IssuanceAttachment;
   public function create(array $data): IssuanceAttachment;
   public function update(IssuanceAttachment $attachment, array $data): IssuanceAttachment;
   public function delete(IssuanceAttachment $attachment): void;
}
