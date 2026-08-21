<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CandidateProfile extends Model
{
    protected $fillable = [
        'user_id',
        'headline',
        'summary',
        'current_title',
        'years_of_experience',
        'location',
        'preferred_locations',
        'remote_preference',
        'linkedin_url',
        'github_url',
        'portfolio_url',
    ];

    protected $casts = [
        'years_of_experience' => 'decimal:1',
        'preferred_locations' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function resumes(): HasMany
    {
        return $this->hasMany(Resume::class);
    }
}
