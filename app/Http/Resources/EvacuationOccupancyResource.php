<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EvacuationOccupancyResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                   => $this->id,
            'incident_id'          => $this->incident_id,
            'evacuation_center_id' => $this->evacuation_center_id,
            'households'           => $this->households,
            'individuals'          => $this->individuals,
            'reported_at'          => $this->reported_at?->toDateTimeString(),
            'created_at'           => $this->created_at?->toDateTimeString(),
            'updated_at'           => $this->updated_at?->toDateTimeString(),
        ];
    }
}
