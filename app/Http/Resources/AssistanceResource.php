<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AssistanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id'=>$this->id,'assistance_type'=>$this->assistance_type,'quantity'=>$this->quantity,'unit'=>$this->unit,
            'delivered_at'=>$this->delivered_at,'delivered_by'=>$this->delivered_by,'remarks'=>$this->remarks
        ];
    }
}
