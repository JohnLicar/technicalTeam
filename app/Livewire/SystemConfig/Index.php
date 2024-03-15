<?php

namespace App\Livewire\SystemConfig;

use App\Models\Barangay;
use App\Models\Purok;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    #[Computed()]
    public function barangays()
    {
        return Barangay::select(['id', 'barangay'])->get();
    }

    #[Computed()]
    public function puroks()
    {
        return Purok::with('barangay')->paginate(10);
    }

    #[On('refresh_purok')]
    public function render()
    {
        return view('livewire.system-config.index');
    }
}
