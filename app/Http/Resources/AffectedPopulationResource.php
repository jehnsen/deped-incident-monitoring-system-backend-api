<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AffectedPopulationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id'=>$this->id,'students_affected'=>$this->students_affected,
            'teachers_affected'=>$this->teachers_affected,'staff_affected'=>$this->staff_affected,
            'injured'=>$this->injured,'missing'=>$this->missing,'deceased'=>$this->deceased,'evacuees'=>$this->evacuees
        ];
    }
}
