<?php

namespace App\Interfaces\JobManagement;

use App\Http\Requests\JobManagement\StoreResumeRequest;
interface JobManagementServiceInterface
{
    public function storeResume(StoreResumeRequest $request);
}
