<?php

namespace App\Repositories;

use App\Models\Program;
use App\Models\ProgramMilestone;
use App\Interfaces\ProgramRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProgramRepository implements ProgramRepositoryInterface
{
   public function all(): Collection
   {
      return Program::with(['hazards', 'tags', 'milestones'])->latest()->get();
   }

   public function paginate(int $perPage = 15): LengthAwarePaginator
   {
      return Program::with(['hazards', 'tags', 'milestones'])->latest()->paginate($perPage);
   }

   public function find(int $id): ?Program
   {
      return Program::with(['hazards', 'tags', 'milestones'])->find($id);
   }

   public function create(array $data): Program
   {
      return DB::transaction(function () use ($data) {
         $hazardIds = $data['hazard_ids'] ?? [];
         $tagIds = $data['tag_ids'] ?? [];
         $milestones = $data['milestones'] ?? [];
         unset($data['hazard_ids'], $data['tag_ids'], $data['milestones']);

         $program = Program::create($data);

         if ($hazardIds)
            $program->hazards()->sync($hazardIds);
         if ($tagIds)
            $program->tags()->sync($tagIds);

         foreach ($milestones as $m) {
            ProgramMilestone::create(array_merge($m, ['program_id' => $program->id]));
         }

         return $program->load(['hazards', 'tags', 'milestones']);
      });
   }

   public function update(Program $program, array $data): Program
   {
      return DB::transaction(function () use ($program, $data) {
         $hazardIds = $data['hazard_ids'] ?? null;
         $tagIds = $data['tag_ids'] ?? null;
         $milestones = $data['milestones'] ?? null;
         unset($data['hazard_ids'], $data['tag_ids'], $data['milestones']);

         $program->update($data);

         if (is_array($hazardIds))
            $program->hazards()->sync($hazardIds);
         if (is_array($tagIds))
            $program->tags()->sync($tagIds);

         // If milestones provided, upsert (simple approach: add new ones)
         if (is_array($milestones)) {
            foreach ($milestones as $m) {
               // allow optional id to update existing; otherwise create
               if (!empty($m['id']) && ($pm = ProgramMilestone::find($m['id']))) {
                  $pm->update(collect($m)->only(['title', 'milestone_date', 'description'])->toArray());
               } else {
                  ProgramMilestone::create(array_merge($m, ['program_id' => $program->id]));
               }
            }
         }

         return $program->load(['hazards', 'tags', 'milestones']);
      });
   }

   public function delete(Program $program): void
   {
      $program->delete();
   }
}
