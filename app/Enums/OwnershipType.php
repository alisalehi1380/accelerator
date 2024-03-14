<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum OwnershipType: string
{
    use HasEnumValues;
    case RENTAL = 'استیجاری';
    case POSSESSION = 'تمکل';
}
