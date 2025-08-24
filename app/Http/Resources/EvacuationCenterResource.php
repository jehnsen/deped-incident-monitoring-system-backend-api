<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EvacuationCenterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id'=>$this->id,'name'=>$this->name,'address'=>$this->address,'capacity'=>$this->capacity,
            'coords'=>['lat'=>$this->latitude,'lng'=>$this->longitude],
            'school'=> new SchoolResource($this->whenLoaded('school'))
        ];
    }
}
