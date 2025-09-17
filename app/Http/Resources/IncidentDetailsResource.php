<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IncidentDetailsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'type' => [
                'id' => $this->incident_type_id,
                'name' => $this->whenLoaded('incidentType', fn() => $this->incidentType?->name),
                'code' => $this->whenLoaded('incidentType', fn() => $this->incidentType?->code),
            ],
            'severity' => $this->severity,

            'reported' => [
                'by' => $this->whenLoaded('reporter', fn() => [
                    'id' => $this->reporter?->id,
                    'name' => $this->reporter?->full_name ?? $this->reporter?->name,
                ]),
                'at' => optional($this->reported_at)->toIso8601String(),
            ],

            'location' => [
                'school' => $this->whenLoaded('school', fn() => [
                    'id' => $this->school?->id,
                    'name' => $this->school?->name,
                ]),
                'address' => $this->address,
                'coordinates' => [
                    'lat' => $this->latitude,
                    'lng' => $this->longitude,
                ],
            ],

            'summary' => $this->summary,

            'impact' => [
                'students_affected' => $this->students_affected,
                'teachers_affected' => $this->teachers_affected,
                'staff_affected' => $this->staff_affected,
                'infrastructure_damage_level' => $this->infrastructure_damage_level,
                'estimated_cost' => $this->estimated_cost,
            ],

            'workflow' => [
                'status' => $this->status,
                'review_decision' => $this->review_decision,
                'review_comments' => $this->review_comments,
                'reviewed_by' => $this->whenLoaded('reviewer', fn() => [
                    'id' => $this->reviewer?->id,
                    'name' => $this->reviewer?->full_name ?? $this->reviewer?->name,
                ]),
                'reviewed_at' => optional($this->reviewed_at)->toIso8601String(),
            ],

            'counts' => [
                'attachments' => $this->attachments_count,
            ],

            'attachments' => $this->whenLoaded('attachments', fn() =>
                $this->attachments->map(fn($a) => [
                    'id' => $a->id,
                    'name' => $a->original_name,
                    'type' => $a->file_type,
                    'path' => $a->file_path,
                    'uploaded_at' => optional($a->created_at)->toIso8601String()
                ])
            ),

            'issuances' => $this->whenLoaded('issuances', fn() =>
                $this->issuances->map(fn($i) => [
                    'id' => $i->id,
                    'code' => $i->code,
                    'title' => $i->title,
                    'category' => $i->category ?? null,
                    'issued_at' => optional($i->issued_at ?? null)?->toIso8601String(),
                    'tags' => method_exists($i,'tags') ? $i->tags->pluck('name') : [],
                ])
            ),

            'timeline' => $this->whenLoaded('timelines', fn() =>
                $this->timelines->map(fn($t) => [
                    'id' => $t->id,
                    'event' => $t->event,
                    'timestamp' => optional($t->timestamp)->toIso8601String(),
                    'by' => $t->performer?->full_name ?? $t->performer?->name,
                ])
            ),

            'status_history' => $this->whenLoaded('statusHistories', fn() =>
                $this->statusHistories->map(fn($h) => [
                    'id' => $h->id,
                    'from' => $h->from_status,
                    'to' => $h->to_status,
                    'notes' => $h->notes,
                    'changed_by_user_id' => $h->changed_by_user_id,
                    'changed_at' => optional($h->changed_at)->toIso8601String(),
                ])
            ),

            'created_at' => optional($this->created_at)->toIso8601String(),
            'updated_at' => optional($this->updated_at)->toIso8601String(),
        ];
    }
}
