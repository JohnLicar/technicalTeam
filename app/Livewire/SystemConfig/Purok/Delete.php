<?php

namespace App\Livewire\SystemConfig\Purok;

use App\Models\Purok;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{

    public ?Purok $purok;

    public function render()
    {
        return view('livewire.system-config.purok.delete');
    }

    public function confirmed()
    {
        $this->purok->delete();
        $this->dispatch('refresh_purok');
        $this->dispatch('showToast', ['type' => "info", 'message' => "Purok Information Updated successfully!", 'title' => "Success"]);
        $this->closeModal();
    }
}
