<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EvacuationCenterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'school_id' => $this->school_id,
            'name'      => $this->name,
            'address'   => $this->address,
            'capacity'  => $this->capacity,
            'latitude'  => $this->latitude,
            'longitude' => $this->longitude,
            'created_at'=> $this->created_at?->toDateTimeString(),
            'updated_at'=> $this->updated_at?->toDateTimeString(),
        ];
    }
}
