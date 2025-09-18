<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivityLogResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'          => $this->id,
            'action'      => $this->action,
            'description' => $this->description,
            'subject'     => [
                'type' => $this->subject_type,
                'id'   => $this->subject_id,
            ],
            'actor' => $this->whenLoaded('actor', fn() => [
                'id'   => $this->actor?->id,
                'name' => $this->actor?->full_name ?? $this->actor?->name,
            ]),
            'meta'        => $this->meta ?? (object)[],
            'ip_address'  => $this->ip_address,
            'user_agent'  => $this->user_agent,
            'created_at'  => optional($this->created_at)->toIso8601String(),
            'updated_at'  => optional($this->updated_at)->toIso8601String(),
        ];
    }
}
