<?php

namespace App\Livewire\Validation\Modal;

use App\Models\Applicant;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{


    public ?Applicant $applicant;

    public function render()
    {
        return view('livewire.validation.modal.delete');
    }

    public function confirmed()
    {
        $this->applicant->delete();
        $this->dispatch('refresh_validation');
        $this->dispatch('showToast', ['type' => "warning", 'message' => "Applicant Information Delete successfully!", 'title' => "Deleted Successfully"]);
        $this->closeModal();
    }
}
