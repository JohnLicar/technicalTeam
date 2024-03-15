<?php

namespace App\Exports;

use App\Models\Applicant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ApplicantExport implements FromView
{

    public function view(): View
    {
        return view(
            'exports.invoices'
        );
    }
}
