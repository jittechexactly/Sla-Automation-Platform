<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'company_name',
        'person_name',
        'job_title',
        'email',
        'phone',
        'linkedin_url',
        'website_url',
        'source',
        'confidence',
        'verified_at',
    ];

    protected $casts = [
        'confidence' => 'decimal:2',
        'verified_at' => 'datetime',
    ];
}
