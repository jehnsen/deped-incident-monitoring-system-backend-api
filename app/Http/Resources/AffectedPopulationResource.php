<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AffectedPopulationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'incident_id'       => $this->incident_id,
            'students_affected' => $this->students_affected,
            'teachers_affected' => $this->teachers_affected,
            'staff_affected'    => $this->staff_affected,
            'injured'           => $this->injured,
            'missing'           => $this->missing,
            'deceased'          => $this->deceased,
            'evacuees'          => $this->evacuees,
            'created_at'        => $this->created_at?->toDateTimeString(),
            'updated_at'        => $this->updated_at?->toDateTimeString(),
        ];
    }
}
