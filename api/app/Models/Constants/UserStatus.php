<?php

namespace App\Models\Constants;

class UserStatus
{
    const NEW = 1;
    const ACTIVE = 2;
    const BLOCKED = 3;

    const LABELS = [
        self::NEW => 'new',
        self::ACTIVE => 'active',
        self::BLOCKED => 'blocked',
    ];
}