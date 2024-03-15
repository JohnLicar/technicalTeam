<?php

namespace App\Enums;

enum CivilStatus: string
{
    case SINGLE = 'Single';
    case LIVEIN = 'Live-in';
    case MARRIED = 'Married';
    case WIDOWED = 'Widowed';
    case DIVORCED = 'Divorced';
}
