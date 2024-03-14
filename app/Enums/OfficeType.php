<?php

namespace App\Enums;

use App\Traits\HasEnumValues;

enum OfficeType: string
{
    use HasEnumValues;
    case CENTRAL_OFFICE = 'دفتر مرکزی';
    case OFFICE = 'دفتر';
    case REPRESENTATION = 'نمیندگی';
    case WORKSHOP = 'کارگاه';
    case FACTORY = 'کارخانه';

}
