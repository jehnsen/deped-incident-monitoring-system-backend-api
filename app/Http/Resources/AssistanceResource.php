<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssistanceResource extends JsonResource
{
   public function toArray($request)
   {
      return [
         'id' => $this->id,
         'incident_id' => $this->incident_id,
         'assistance_type' => $this->assistance_type,
         'description' => $this->description,
         'quantity' => (float) $this->quantity,
         'unit' => $this->unit,
         'amount' => (float) $this->amount,
         'date_provided' => $this->delivered_at?->toDateString(),  // new name
         'delivered_at' => $this->delivered_at?->toDateTimeString(), // legacy full
         'provider_agency' => $this->provider_agency,
         'delivered_by' => $this->delivered_by,
         'received_by_resident_id' => $this->received_by_resident_id,
         'approved_by_user_id' => $this->approved_by_user_id,
         'status' => $this->status,
         'remarks' => $this->remarks,
         'created_at' => $this->created_at?->toDateTimeString(),
         'updated_at' => $this->updated_at?->toDateTimeString(),
      ];
   }
}
