<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assistance extends Model
{
    protected $table = 'assistance'; // keep as-is (singular)

    protected $fillable = [
        'incident_id',
        'assistance_type',
        'description',              // new
        'quantity',
        'unit',
        'amount',                   // new
        'delivered_at',             // legacy; accept date_provided -> normalize in service
        'delivered_by',             // legacy; sync with provider_agency if provided
        'provider_agency',          // new
        'received_by_resident_id',  // new
        'approved_by_user_id',      // new
        'status',                   // new
        'remarks',
    ];

    protected $casts = [
        'delivered_at' => 'datetime',
        'amount'       => 'decimal:2',
        'quantity'     => 'decimal:2', // matches your current DB type (DECIMAL(12,2))
    ];

    public function incident(): BelongsTo
    {
        return $this->belongsTo(Incident::class);
    }

    public function receiver() //: BelongsTo
    {
        return null; //$this->belongsTo(Resident::class, 'received_by_resident_id');
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by_user_id');
    }
}
