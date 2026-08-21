<?php

namespace App\Http\Controllers\JobManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobManagement\StoreResumeRequest;
use App\Interfaces\JobManagement\JobManagementServiceInterface;
use Inertia\Inertia;

class JobManagementController extends Controller
{
    public function __construct(private readonly JobManagementServiceInterface $jobManagementService) {}

    public function addResumeView()
    {
        return Inertia::render('job-management/resume/addResume');
    }

    public function storeResume(StoreResumeRequest $request)
    {
        return $this->jobManagementService->storeResume($request);
    }
}
