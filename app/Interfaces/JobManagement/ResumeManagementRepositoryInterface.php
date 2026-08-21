<?php

namespace App\Interfaces\JobManagement;

use App\Models\Resume;

interface ResumeManagementRepositoryInterface
{
    public function create(array $data): Resume;
}
