<?php

namespace App\Models\Constants;

class Gender
{
    const MALE = 'm';
    const FEMALE = 'f';

    const LABELS = [
        self::MALE => 'male',
        self::FEMALE => 'female',
    ];
}