<?php

namespace App\Livewire;

use App\Charts\DailyValidated;
use App\Charts\EncodedPerDay;
use App\Models\Applicant;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Dashboard extends Component
{
    public string $withResettlementCount = "";

    #[Computed()]
    public function applicants()
    {
        return Applicant::with('spouse', 'barangay', 'housingOccupancies', 'validator')
            ->latest()->take(10)->get();
    }

    #[Computed()]
    public function dashboardCounts()
    {
        return DB::table('applicants')
            ->select(DB::raw('COUNT(*) AS applicantCount,
            COUNT(CASE WHEN `recommendation` = "For POP" THEN 0 END) AS popCount,
            COUNT(CASE WHEN `recommendation` = "For Verification" THEN 0 END) AS verificationCount,
            COUNT(CASE WHEN `recommendation` = "Admin Demolition" THEN 0 END) AS adminDemoCount,
            COUNT(CASE WHEN `recommendation` = "For LHB" THEN 0 END) AS forLHBCount,
            COUNT(CASE WHEN `recommendation` = "Not Qualified" THEN 0 END) AS notQualifiedCount,
            COUNT(CASE WHEN `recommendation` = "For Revalidation" THEN 0 END) AS reValidationCount'))
            ->get();
    }

    public function mount()
    {
        $this->withResettlementCount = Applicant::withResettlement()->count();
    }

    public function render(DailyValidated $dailyValidated, EncodedPerDay $encodedPerDay)
    {
        return view(
            'livewire.dashboard',
            [
                'dailyValidated' => $dailyValidated->build(),
                'encodedPerDay' => $encodedPerDay->build()
            ]
        );
    }
}
