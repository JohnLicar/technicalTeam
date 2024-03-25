<?php

namespace App\Livewire\Validation;

use App\Models\{
    Applicant,
    Barangay,
    HousingOccupancy,
    HousingProject,
    Purok,
    User
};
use Livewire\Attributes\{
    Computed,
    On,
    Url
};
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component

{
    use WithPagination, AuthorizesRequests;

    #[Url]
    public string $search = "";

    public string $withResettlementCount = "";


    public string $barangay_id = "";
    public string $purok_id = "";
    public string $civil_status = "";
    public string $gender = "";

    public array $classification = [];
    public string $structure = "";
    public string $date_of_validation = "";
    public string $validated_by = "";

    public string $site = '';
    public string $phase = '';
    public string $block = '';
    public string $lot = '';

    public $phases = 6;
    public $blocks = 60;
    public $lots = 108;

    #[Computed()]
    public function barangays()
    {
        return Barangay::with('puroks')->get(['id', 'barangay']);
    }

    #[Computed()]
    public function puroks()
    {
        return Purok::where('barangay_id', $this->barangay_id)->get(['id', 'purok']);
    }

    #[Computed()]
    public function housingProjects()
    {
        return HousingProject::get();
    }

    #[Computed()]
    public function housingOccupancies()
    {
        return HousingOccupancy::get(['id', 'description']);
    }

    #[Computed()]
    public function validators()
    {
        return User::get();
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

    #[On('refresh_validation')]
    public function render()
    {
        $this->authorize("view applicant");

        $applicants = Applicant::with('spouse', 'barangay', 'housingOccupancies', 'validator')
            ->whereLike(['name', 'remarks', 'spouse.spouse_name'], $this->search)
            ->when(
                $this->barangay_id,
                fn (EloquentBuilder $query, string $barangay) =>
                $query->where('barangay_id', $barangay)
            )
            ->when(
                $this->purok_id,
                fn (EloquentBuilder $query, string $purok) =>
                $query->where('purok_id', $purok)
            )

            ->when(
                $this->civil_status,
                fn (EloquentBuilder $query, string $civil_status) =>
                $query->where('civil_status', $civil_status)
            )

            ->when(
                $this->gender,
                fn (EloquentBuilder $query, string $gender) =>
                $query->where('gender', $gender)
            )
            ->when(
                $this->classification,
                fn (EloquentBuilder $query, array $classification) =>
                $query->whereRelation(
                    'housingOccupancies',
                    fn (EloquentBuilder $query) =>
                    $query->whereIn('housing_occupancy_id', $classification)
                )
            )
            ->when(
                $this->structure,
                fn (EloquentBuilder $query, string $structure) =>
                $query->where('structure', $structure)
            )
            ->when(
                $this->date_of_validation,
                fn (EloquentBuilder $query, string $date_of_validation) =>
                $query->where('date_of_validation', $date_of_validation)
            )
            ->when(
                $this->validated_by,
                fn (EloquentBuilder $query, string $validated_by) =>
                $query->where('validated_by', $validated_by)
            )
            ->when(
                $this->site,
                fn (EloquentBuilder $query, string $site) =>
                $query->whereRelation('resettlement', 'resettlement_site_id', $site)
            )
            ->when(
                $this->phase,
                fn (EloquentBuilder $query, string $phase) =>
                $query->whereRelation('resettlement', 'phase', $phase)
            )
            ->when(
                $this->block,
                fn (EloquentBuilder $query, string $block) =>
                $query->whereRelation('resettlement', 'block', $block)
            )
            ->when(
                $this->lot,
                fn (EloquentBuilder $query, string $lot) =>
                $query->whereRelation('resettlement', 'lot', $lot)
            )
            ->latest()
            ->paginate(10);

        return view('livewire.validation.index', compact('applicants'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetProperties()
    {
        return $this->reset([
            "barangay_id",
            "purok_id",
            "civil_status",
            "gender",
            "classification",
            "structure",
            "date_of_validation",
            "validated_by",
            "site",
            "phase",
            "block",
            "lot",
        ]);
    }
}
