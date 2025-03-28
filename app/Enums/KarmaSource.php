<?php

declare(strict_types=1);

namespace App\Enums;

enum KarmaSource: string
{
    case Event = 'event';
    case Job = 'job';
    case System = 'system';
}
