<?php

namespace App\Livewire\SystemConfig\Purok;

use App\Models\Purok;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Update extends ModalComponent
{
    public array $barangays = [];
    public ?Purok $purok;
    public $barangay_id;
    public $purok_name;


    public function mount($barangays)
    {
        $this->barangays = $barangays;
        $this->barangay_id = $this->purok->barangay_id;
        $this->purok_name = $this->purok->purok;
    }

    public function render()
    {
        return view('livewire.system-config.purok.update');
    }

    public function updatePurok()
    {
        // $this->authorize('create purok');
        $this->validate([
            'purok_name' => ['required', 'string', 'max:255'],
            'barangay_id' => ['required', 'max:255',  Rule::in(Arr::pluck($this->barangays, 'id'))],
        ]);

        $this->purok->update([
            'barangay_id' => $this->barangay_id,
            'purok' => $this->purok_name,
        ]);

        $this->dispatch('refresh_purok');
        $this->dispatch('showToast', ['type' => "info", 'message' => "Purok Information Updated successfully!", 'title' => "Success"]);
        $this->closeModal();
    }
}
