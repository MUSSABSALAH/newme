<?php

declare(strict_types=1);

namespace App\Modules\Identity\Enums;

enum OtpPurpose: string
{
    case Register = 'register';
    case Login = 'login';
}
