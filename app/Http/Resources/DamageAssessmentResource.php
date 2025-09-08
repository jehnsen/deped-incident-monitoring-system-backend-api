<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DamageAssessmentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                      => $this->id,
            'incident_id'             => $this->incident_id,

            // classroom-level (legacy)
            'classrooms_damaged_minor'=> $this->classrooms_damaged_minor,
            'classrooms_damaged_major'=> $this->classrooms_damaged_major,
            'estimated_cost'          => (float)$this->estimated_cost,

            // rich totals
            'affected_households'     => $this->affected_households,
            'totally_damaged'         => $this->totally_damaged,
            'partially_damaged'       => $this->partially_damaged,
            'injuries'                => $this->injuries,
            'deaths'                  => $this->deaths,
            'missing'                 => $this->missing,
            'displaced_families'      => $this->displaced_families,

            // financial (new)
            'estimated_loss_amount'   => (float)$this->estimated_loss_amount,

            // status/meta
            'status'                  => $this->status,
            'assessed_by_user_id'     => $this->assessed_by_user_id,
            'assessed_at'             => $this->assessed_at?->toDateTimeString(),

            'notes'                   => $this->notes,
            'created_at'              => $this->created_at?->toDateTimeString(),
            'updated_at'              => $this->updated_at?->toDateTimeString(),
        ];
    }
}
