<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobSource extends Model
{
    protected $fillable = [
        'name',
        'type',
        'base_url',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }
}
