<?php

namespace App\Livewire\SystemConfig\Purok;

use App\Models\Purok;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public array $barangays = [];
    public  $barangay_id;
    public  $purok;


    public function mount($barangays)
    {
        $this->barangays = $barangays;
    }

    public function render()
    {

        return view('livewire.system-config.purok.create');
    }

    public function addPurok()
    {
        // $this->authorize('create purok');
        $validated =  $this->validate([
            'purok' => ['required', 'string', 'max:255'],
            'barangay_id' => ['required', 'string', 'max:255',  Rule::in(Arr::pluck($this->barangays, 'id'))],
        ]);

        Purok::create($validated);

        $this->dispatch('refresh_purok');
        $this->dispatch('showToast', ['type' => "success", 'message' => "Purok Information Added successfully!", 'title' => "Success"]);
        $this->closeModal();
    }
}
