<?php

namespace App\Enums;

enum RolesEnum: string
{
    case ADMIN = 'admin';
    case MANAGER = 'manager';

    /**
     * Get role label
     *
     * @throws \Exception
     */
    public function getLabel(): string
    {
        return match ($this) {
            RolesEnum::ADMIN => 'Admin',
            RolesEnum::MANAGER => 'Manager',
            default => throw new \Exception('To be implemented'),
        };
    }
}
