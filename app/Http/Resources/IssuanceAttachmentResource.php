<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IssuanceAttachmentResource extends JsonResource
{
   public function toArray($request)
   {
      return [
         'id' => $this->id,
         'issuance_id' => $this->issuance_id,
         'file_path' => $this->file_path,
         'file_type' => $this->file_type,
         'original_name' => $this->original_name,
      ];
   }
}
