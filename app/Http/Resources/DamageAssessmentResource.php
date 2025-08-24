<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DamageAssessmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id'=>$this->id,'classrooms_damaged_minor'=>$this->classrooms_damaged_minor,
            'classrooms_damaged_major'=>$this->classrooms_damaged_major,'estimated_cost'=>$this->estimated_cost,'notes'=>$this->notes,
        ];
    }
}
