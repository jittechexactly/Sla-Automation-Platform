<?php

namespace App\Services\UserManagement;

use App\Interfaces\UserManagement\UserManagementRepositoryInterface;
use App\Interfaces\UserManagement\UserManagementServiceInterface;

class UserManagementService implements UserManagementServiceInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct(private readonly UserManagementRepositoryInterface $userManagementrepository) {}
}
