<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    protected $table = 'all_jobs';

    protected $fillable = [
        'job_source_id',
        'external_id',
        'title',
        'company_name',
        'description',
        'location',
        'remote_type',
        'employment_type',
        'salary_min',
        'salary_max',
        'currency',
        'job_url',
        'posted_at',
        'discovered_at',
        'status',
    ];

    protected $casts = [
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',
        'posted_at' => 'datetime',
        'discovered_at' => 'datetime',
    ];

    public function jobSource(): BelongsTo
    {
        return $this->belongsTo(JobSource::class);
    }

    public function matches(): HasMany
    {
        return $this->hasMany(JobMatch::class);
    }
}
