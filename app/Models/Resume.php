<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resume extends Model
{
    protected $fillable = [
        'candidate_profile_id',
        'original_filename',
        'file_path',
        'file_type',
        'raw_text',
        'parsed_data',
        'is_active',
    ];

    protected $casts = [
        'parsed_data' => 'array',
        'is_active' => 'boolean',
    ];

    public function candidateProfile(): BelongsTo
    {
        return $this->belongsTo(CandidateProfile::class);
    }
}