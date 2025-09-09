<?php

namespace App\Repositories;

use App\Models\Issuance;
use App\Models\IssuanceAttachment;
use App\Interfaces\IssuanceRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class IssuanceRepository implements IssuanceRepositoryInterface
{
    public function all(): Collection
    {
        return Issuance::with(['tags','hazards','attachments'])->latest()->get();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Issuance::with(['tags','hazards','attachments'])->latest()->paginate($perPage);
    }

    public function find(int $id): ?Issuance
    {
        return Issuance::with(['tags','hazards','attachments'])->find($id);
    }

    public function create(array $data): Issuance
    {
        return DB::transaction(function () use ($data) {
            $tags = $data['tag_ids'] ?? [];
            $hazards = $data['hazard_ids'] ?? [];
            $attachments = $data['attachments'] ?? []; // [{file_path, file_type, original_name}]

            unset($data['tag_ids'],$data['hazard_ids'],$data['attachments']);

            $issuance = Issuance::create($data);
            if ($tags) $issuance->tags()->sync($tags);
            if ($hazards) $issuance->hazards()->sync($hazards);

            foreach ($attachments as $att) {
                IssuanceAttachment::create(array_merge($att, ['issuance_id' => $issuance->id]));
            }
            return $issuance->load(['tags','hazards','attachments']);
        });
    }

    public function update(Issuance $issuance, array $data): Issuance
    {
        return DB::transaction(function () use ($issuance, $data) {
            $tagIds = $data['tag_ids'] ?? null;
            $hazardIds = $data['hazard_ids'] ?? null;
            $newAttachments = $data['attachments'] ?? null;

            unset($data['tag_ids'], $data['hazard_ids'], $data['attachments']);

            $issuance->update($data);

            if (is_array($tagIds))    $issuance->tags()->sync($tagIds);
            if (is_array($hazardIds)) $issuance->hazards()->sync($hazardIds);
            if (is_array($newAttachments)) {
                foreach ($newAttachments as $att) {
                    IssuanceAttachment::create(array_merge($att, ['issuance_id' => $issuance->id]));
                }
            }
            return $issuance->load(['tags','hazards','attachments']);
        });
    }

    public function delete(Issuance $issuance): void
    {
        $issuance->delete();
    }
}
