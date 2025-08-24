<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatusHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id'=>$this->id,'from_status'=>$this->from_status,'to_status'=>$this->to_status,
            'notes'=>$this->notes,'changed_by_user_id'=>$this->changed_by_user_id,'changed_at'=>$this->changed_at
        ];
    }
}
