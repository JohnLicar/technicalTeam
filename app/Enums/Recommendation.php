<?php

namespace App\Enums;

enum Recommendation: string
{
    case FOR_POP = 'For POP';
    case FOR_VERIFICATION = 'For Verification';
    case ADMIN_DEMOLITION = 'Admin Demolition';
    case FOR_LHB = 'For LHB';
    case NOT_QUALIFIED = 'Not Qualified';
    case FOR_REVALIDATION = 'For Revalidation';
    case FOR_HOUSE_DEMOLITION = 'For House Demolition';
    case AWARDEE = 'Awardee';
}
