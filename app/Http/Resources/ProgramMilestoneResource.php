<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgramMilestoneResource extends JsonResource
{
   public function toArray($request)
   {
      return [
         'id' => $this->id,
         'title' => $this->title,
         'milestone_date' => $this->milestone_date?->toDateString(),
         'description' => $this->description,
      ];
   }
}
