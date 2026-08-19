<?php

namespace App\Enums\User;

enum UserEnum: string
{
    case USER = 'user';
    case ADMIN = 'admin';
    case EMPLOYEE = 'employee';
}
