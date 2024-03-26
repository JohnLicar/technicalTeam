<?php

namespace App\Livewire\SocialPrep;

use App\Enums\Recommendation;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use App\Models\Applicant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use AuthorizesRequests, WithPagination;

    public string $search = "";
    public array $selectedApplicant = [];

    #[Computed()]
    public function applicants()
    {
        return Applicant::with('spouse', 'barangay', 'housingOccupancies', 'validator')
            ->where('recommendation', Recommendation::FOR_POP->value)
            ->whereLike(['name', 'remarks', 'spouse.spouse_name'], $this->search)
            // ->when(
            //     $this->barangay_id,
            //     fn (EloquentBuilder $query, string $barangay) =>
            //     $query->where('barangay_id', $barangay)
            // )
            // ->when(
            //     $this->purok_id,
            //     fn (EloquentBuilder $query, string $purok) =>
            //     $query->where('purok_id', $purok)
            // )

            // ->when(
            //     $this->civil_status,
            //     fn (EloquentBuilder $query, string $civil_status) =>
            //     $query->where('civil_status', $civil_status)
            // )

            // ->when(
            //     $this->gender,
            //     fn (EloquentBuilder $query, string $gender) =>
            //     $query->where('gender', $gender)
            // )
            // ->when(
            //     $this->classification,
            //     fn (EloquentBuilder $query, array $classification) =>
            //     $query->whereRelation(
            //         'housingOccupancies',
            //         fn (EloquentBuilder $query) =>
            //         $query->whereIn('housing_occupancy_id', $classification)
            //     )
            // )
            // ->when(
            //     $this->structure,
            //     fn (EloquentBuilder $query, string $structure) =>
            //     $query->where('structure', $structure)
            // )
            // ->when(
            //     $this->date_of_validation,
            //     fn (EloquentBuilder $query, string $date_of_validation) =>
            //     $query->where('date_of_validation', $date_of_validation)
            // )
            // ->when(
            //     $this->validated_by,
            //     fn (EloquentBuilder $query, string $validated_by) =>
            //     $query->where('validated_by', $validated_by)
            // )
            // ->when(
            //     $this->site,
            //     fn (EloquentBuilder $query, string $site) =>
            //     $query->whereRelation('resettlement', 'resettlement_site_id', $site)
            // )
            // ->when(
            //     $this->phase,
            //     fn (EloquentBuilder $query, string $phase) =>
            //     $query->whereRelation('resettlement', 'phase', $phase)
            // )
            // ->when(
            //     $this->block,
            //     fn (EloquentBuilder $query, string $block) =>
            //     $query->whereRelation('resettlement', 'block', $block)
            // )
            // ->when(
            //     $this->lot,
            //     fn (EloquentBuilder $query, string $lot) =>
            //     $query->whereRelation('resettlement', 'lot', $lot)
            // )
            ->latest()
            ->paginate(10);
    }
    public function render()
    {
        $this->authorize('view POP');
        return view('livewire.social-prep.index');
    }

    public function confirmSocialPrep()
    {
        dd($this->selectedApplicant);
    }
}
