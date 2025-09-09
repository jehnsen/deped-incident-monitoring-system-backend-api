<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HazardAssessment extends Model
{
    protected $fillable = [
        'assessment_title','hazard_id','location','risk_level','description',
        'methodology','key_findings','recommendations','number_of_schools',
        'estimated_impact','status','submitted_by','validated_by'
    ];

    public function hazard(): BelongsTo { return $this->belongsTo(Hazard::class); }
    public function submitter(): BelongsTo { return $this->belongsTo(User::class, 'submitted_by'); }
    public function validator(): BelongsTo { return $this->belongsTo(User::class, 'validated_by'); }
}

