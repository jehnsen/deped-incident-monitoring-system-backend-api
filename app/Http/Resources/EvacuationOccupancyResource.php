<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EvacuationOccupancyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id'=>$this->id,'households'=>$this->households,'individuals'=>$this->individuals,'reported_at'=>$this->reported_at,
            'center'=> new EvacuationCenterResource($this->whenLoaded('center'))
        ];
    }
}
