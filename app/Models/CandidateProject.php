<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CandidateProject extends Model
{
    protected $fillable = [
        'candidate_profile_id',
        'name',
        'description',
        'technologies',
        'url',
    ];

    protected $casts = [
        'technologies' => 'array',
    ];

    public function candidateProfile(): BelongsTo
    {
        return $this->belongsTo(CandidateProfile::class);
    }
}
