<?php

namespace App\Repositories\JobManagement;

use App\Interfaces\JobManagement\ResumeManagementRepositoryInterface;
use App\Models\Resume;

class ResumeManagementRepository implements ResumeManagementRepositoryInterface
{
    public function __construct(private readonly Resume $model) {}

    public function create(array $data): Resume
    {
        return $this->model->create($data);
    }
}
