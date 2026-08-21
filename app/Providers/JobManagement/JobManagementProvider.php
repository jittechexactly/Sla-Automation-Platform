<?php

namespace App\Providers\JobManagement;

use App\Interfaces\JobManagement\JobManagementServiceInterface;
use App\Interfaces\JobManagement\ResumeManagementRepositoryInterface;
use App\Repositories\JobManagement\ResumeManagementRepository;
use App\Services\JobManagement\JobManagementService;
use Illuminate\Support\ServiceProvider;

class JobManagementProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(JobManagementServiceInterface::class, JobManagementService::class);
        $this->app->bind(ResumeManagementRepositoryInterface::class, ResumeManagementRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
