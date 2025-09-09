<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IncidentStatusHistoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                 => $this->id,
            'incident_id'        => $this->incident_id,
            'from_status'        => $this->from_status,
            'to_status'          => $this->to_status,
            'notes'              => $this->notes,
            'changed_by_user_id' => $this->changed_by_user_id,
            'changed_at'         => $this->changed_at?->toDateTimeString(),
            'created_at'         => $this->created_at?->toDateTimeString(),
            'updated_at'         => $this->updated_at?->toDateTimeString(),
        ];
    }
}
