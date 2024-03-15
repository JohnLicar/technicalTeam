<?php

namespace App\Enums;

enum ApprovalStatus: string
{
    case APPROVED = 'Approved';
    case PENDING = 'Pending';
    case DENIED = 'Denied';
}
