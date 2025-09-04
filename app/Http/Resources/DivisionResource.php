<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DivisionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id'     => $this->id,
            'code'   => $this->code,
            'name'   => $this->name,
            'region' => new RegionResource($this->whenLoaded('region')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
