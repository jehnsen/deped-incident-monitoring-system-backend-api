<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryAttachment extends Model
{
   protected $fillable = ['inventory_id', 'file_path', 'file_type', 'original_name'];
   public function inventory(): BelongsTo
   {
      return $this->belongsTo(Inventory::class);
   }
}