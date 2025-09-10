<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{
   public function toArray($request)
   {
      return [
         'id'           => $this->id,
         'code'         => $this->code,
         'title'        => $this->title,
         'description'  => $this->description,
         'program_type' => $this->program_type,
         'priority_level' => $this->priority_level,
         'division_id'  => $this->division_id,
         'division'     => $this->division, // if you use text fallback
         'start_date'   => $this->start_date?->toDateString(),
         'end_date'     => $this->end_date?->toDateString(),
         'budget_php'   => $this->budget_php,
         'funding_source' => $this->funding_source,
         'is_qrf_funded' => $this->is_qrf_funded,
         'program_coordinator' => $this->program_coordinator,
         'expected_participants' => $this->expected_participants,
         'objectives'   => $this->objectives ?? [],
         'status'       => $this->status,
         'hazards'      => $this->whenLoaded('hazards', fn() => $this->hazards->map->only(['id', 'code', 'name'])),
         'tags'         => $this->whenLoaded('tags', fn() => $this->tags->map->only(['id', 'name'])),
         'milestones'   => ProgramMilestoneResource::collection($this->whenLoaded('milestones') ?? $this->milestones),
         'created_at'   => $this->created_at
      ];
   }

}