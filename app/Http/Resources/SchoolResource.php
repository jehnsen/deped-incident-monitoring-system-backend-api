<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SchoolResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id'=>$this->id,'school_id_code'=>$this->school_id_code,
            'name'=>$this->name,'address'=>$this->address,
            'contact_email'=>$this->contact_email,'contact_phone'=>$this->contact_phone,
            'enrollment'=>$this->enrollment,'risk_status'=>$this->risk_status?->value,
            'coords'=>['lat'=>$this->latitude,'lng'=>$this->longitude],
            'division'=> new DivisionResource($this->whenLoaded('division'))
        ];
    }
}
