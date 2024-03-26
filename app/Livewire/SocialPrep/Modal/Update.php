<?php

namespace App\Livewire\SocialPrep\Modal;

use App\Models\Applicant;
use LivewireUI\Modal\ModalComponent;

class Update extends ModalComponent
{

    public ?Applicant $applicant;

    //Validation rules.
    protected $rules = [
        'applicant.name' => 'nullable|min:1|max:100',
    ];

    public function render()
    {
        return view('livewire.social-prep.modal.update');
    }
}
