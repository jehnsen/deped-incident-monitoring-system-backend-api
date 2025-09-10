<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
{
    return [
        'id'               => $this->id,
        'equipment_name'   => $this->equipment_name,
        'equipment_type'   => $this->equipment_type,
        'category'         => $this->category,
        'unit'             => $this->unit,
        'quantity'         => $this->quantity,
        'condition'        => $this->condition,
        'school_id'        => $this->school_id,
        'location'         => $this->location,
        'serial_number'    => $this->serial_number,
        'purchase_date'    => $this->purchase_date?->toDateString(),
        'warranty_period'  => $this->warranty_period,
        'purchase_cost'    => $this->purchase_cost,
        'supplier'         => $this->supplier,
        'description'      => $this->description,
        'is_qrf_funded'    => $this->is_qrf_funded,
        'total_cost'       => $this->total_cost, // optional accessor
        'attachments'      => InventoryAttachmentResource::collection($this->whenLoaded('attachments') ?? $this->attachments),
        'created_at'       => $this->created_at,
    ];
}

}
