<?php

namespace App\Livewire\SocialPrep;

use App\Enums\Recommendation;
use App\Models\Applicant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

use Livewire\Attributes\{
    Computed,
    On,
};

class Index extends Component
{

    use AuthorizesRequests, WithPagination;

    public string $search = "";
    public array $selectedApplicant = [];

    #[On('refresh-social-prep-index')]
    public function render()
    {
        $this->authorize('view POP');

        $applicants =  Applicant::with('spouse', 'barangay', 'housingOccupancies', 'validator')
            ->withCount('pop')
            ->where('recommendation', Recommendation::FOR_POP->value)
            ->whereLike(['name', 'remarks', 'spouse.spouse_name'], $this->search)
            ->latest()
            ->paginate(10);

        return view('livewire.social-prep.index', compact('applicants'));
    }
}
