<?php

namespace App\Repositories;

use App\Models\IssuanceAttachment;
use App\Interfaces\IssuanceAttachmentRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class IssuanceAttachmentRepository implements IssuanceAttachmentRepositoryInterface
{
   public function all(): Collection
   {
      return IssuanceAttachment::latest()->get();
   }

   public function paginate(int $perPage = 15): LengthAwarePaginator
   {
      return IssuanceAttachment::latest()->paginate($perPage);
   }

   public function find(int $id): ?IssuanceAttachment
   {
      return IssuanceAttachment::find($id);
   }

   public function create(array $data): IssuanceAttachment
   {
      return IssuanceAttachment::create($data);
   }

   public function update(IssuanceAttachment $attachment, array $data): IssuanceAttachment
   {
      $attachment->update($data);
      return $attachment;
   }

   public function delete(IssuanceAttachment $attachment): void
   {
      $attachment->delete();
   }
}
