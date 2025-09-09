<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HazardAssessmentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'assessment_title'=>$this->assessment_title,
            'hazard'=> new HazardResource($this->whenLoaded('hazard') ?? $this->hazard),
            'location'=>$this->location,
            'risk_level'=>$this->risk_level,
            'description'=>$this->description,
            'methodology'=>$this->methodology,
            'key_findings'=>$this->key_findings,
            'recommendations'=>$this->recommendations,
            'number_of_schools'=>$this->number_of_schools,
            'estimated_impact'=>$this->estimated_impact,
            'status'=>$this->status,
            'submitted_by'=>$this->submitted_by,
            'validated_by'=>$this->validated_by,
            'created_at'=>$this->created_at,
        ];
    }
}
