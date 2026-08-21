<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobMatch extends Model
{
    protected $fillable = [
        'job_id',
        'candidate_profile_id',
        'score',
        'decision',
        'reason',
        'matched_skills',
        'missing_skills',
        'matched_experience',
    ];

    protected $casts = [
        'score' => 'decimal:2',
        'matched_skills' => 'array',
        'missing_skills' => 'array',
        'matched_experience' => 'array',
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    public function candidateProfile(): BelongsTo
    {
        return $this->belongsTo(CandidateProfile::class);
    }
}