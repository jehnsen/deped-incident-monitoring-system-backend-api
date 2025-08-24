<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IncidentAttachmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return ['id'=>$this->id,'file_path'=>$this->file_path,'file_type'=>$this->file_type,'original_name'=>$this->original_name];
    }
}
