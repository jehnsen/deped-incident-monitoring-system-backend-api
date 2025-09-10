<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inventory extends Model
{
   protected $fillable = [
      // Basic
      'equipment_name',
      'equipment_type',
      'category',
      'unit',
      'quantity',
      'condition',
      // Location
      'school_id',
      'location',
      // Technical
      'serial_number',
      'purchase_date',
      'warranty_period',
      'purchase_cost',
      'supplier',
      // Additional
      'description',
      'is_qrf_funded',

      // (legacy fields retained if you kept them)
      'min_stock_level',
      'acquisition_date',
      'acquired_from',
      'unit_cost',
      'notes',
      'status'
   ];

   protected $casts = [
      'purchase_date' => 'date',
      'acquisition_date' => 'date',
      'purchase_cost' => 'decimal:2',
      'unit_cost' => 'decimal:2',
      'is_qrf_funded' => 'boolean',
   ];

   public function school(): BelongsTo
   {
      return $this->belongsTo(School::class);
   }

   public function attachments(): HasMany
   {
      return $this->hasMany(InventoryAttachment::class);
   }

   // Optional helper if you still track unit_cost:
   public function getTotalCostAttribute(): string
   {
      $unit = $this->purchase_cost ?? $this->unit_cost ?? 0;
      return (string) ($unit * (int) ($this->quantity ?? 0));
   }
}

