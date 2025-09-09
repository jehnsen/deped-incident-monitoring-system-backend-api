<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IssuanceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'type'=>$this->type,
            'level'=>$this->level,
            'series_year'=>$this->series_year,
            'reference_number'=>$this->reference_number,
            'title'=>$this->title,
            'effective_date'=>$this->effective_date?->toDateString(),
            'valid_until'=>$this->valid_until?->toDateString(),
            'summary'=>$this->summary,
            'tags'=>$this->whenLoaded('tags', fn()=> $this->tags->map->only(['id','name'])),
            'hazards'=>$this->whenLoaded('hazards', fn()=> $this->hazards->map->only(['id','code','name'])),
            'attachments'=>IssuanceAttachmentResource::collection($this->whenLoaded('attachments') ?? $this->attachments),
            'created_at'=>$this->created_at,
        ];
    }
}
