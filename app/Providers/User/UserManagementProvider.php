<?php

namespace App\Providers\User;

use App\Interfaces\UserManagement\UserManagementRepositoryInterface;
use App\Interfaces\UserManagement\UserManagementServiceInterface;
use App\Repositories\UserManagement\UserManagementRepository;
use App\Services\UserManagement\UserManagementService;
use Illuminate\Support\ServiceProvider;

class UserManagementProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserManagementServiceInterface::class, UserManagementService::class);
        $this->app->bind(UserManagementRepositoryInterface::class, UserManagementRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
