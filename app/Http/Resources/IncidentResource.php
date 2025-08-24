<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IncidentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'ref_no'      => $this->ref_no,
            'title'       => $this->title,
            'description' => $this->description,
            'status'      => $this->status?->value,
            'severity'    => $this->severity?->value,
            'occurred_at' => $this->occurred_at,
            'reported_at' => $this->reported_at,
            'coords'      => ['lat' => $this->latitude, 'lng' => $this->longitude],
            'type'        => new IncidentTypeResource($this->whenLoaded('type')),
            'school'      => new SchoolResource($this->whenLoaded('school')),
            'reporter'    => $this->whenLoaded('reporter', fn() => [
                                'id' => $this->reporter->id,
                                'name' => $this->reporter->name,
                                'email' => $this->reporter->email,
                             ]),
            'attachments' => IncidentAttachmentResource::collection($this->whenLoaded('attachments')),
            'statuses'    => StatusHistoryResource::collection($this->whenLoaded('statuses')),
            'affected'    => AffectedPopulationResource::collection($this->whenLoaded('affected')),
            'damages'     => DamageAssessmentResource::collection($this->whenLoaded('damages')),
            'assistance'  => AssistanceResource::collection($this->whenLoaded('assistance')),
            'occupancies' => EvacuationOccupancyResource::collection($this->whenLoaded('occupancies')),
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
        ];
    }
}
