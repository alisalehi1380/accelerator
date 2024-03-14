<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum Action: string
{
    use HasEnumValues;
    case DELETED = 'deleted';
    case UPDATED = 'updated';
    case CREATED = 'created';

}
