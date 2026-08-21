<?php

namespace App\Services\JobManagement;

use App\Http\Requests\JobManagement\StoreResumeRequest;
use App\Interfaces\JobManagement\JobManagementServiceInterface;
use App\Repositories\JobManagement\ResumeManagementRepository;
use Throwable;

class JobManagementService implements JobManagementServiceInterface
{
    public function __construct(private readonly ResumeManagementRepository $resumeRepository) {}

    public function storeResume(StoreResumeRequest $request)
    {
        try {
            //code...
        } catch (Throwable $th) {
            //throw $th;
        }
    }
}
