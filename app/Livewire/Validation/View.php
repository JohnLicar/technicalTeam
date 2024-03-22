<?php

namespace App\Livewire\Validation;

use App\Models\Applicant;
use App\Models\HousingOccupancy;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

class View extends Component
{

    public ?Applicant $applicant;

    public $barangay_id;
    public $purok_id;

    public $name;
    public $birthday;
    public $civil_status;
    public $gender;

    public $spouse_name;
    public $spouse_birthday;
    public $spouse_civil_status;
    public $spouse_gender;

    public $classification = [];
    public $structure;

    public $date_of_validation;
    public $validated_by;

    public $recommendation;

    public $resettlement;

    public $site;
    public $phase;
    public $block;
    public $lot;

    public $remarks;

    public $attachments;

    #[Computed()]
    public function housingOccupancies()
    {
        return HousingOccupancy::get(['id', 'description']);
    }

    public function mount()
    {

        $this->applicant->load('spouse', 'validator', 'encoder', 'barangay', 'purok', 'housingOccupancies', 'validationAttachment', 'resettlement');
        // dd($this->applicant);
        $this->barangay_id = $this->applicant->barangay?->barangay;
        $this->purok_id = $this->applicant->purok?->purok;

        $this->name = $this->applicant->name;
        $this->birthday = $this->applicant->birthday;
        $this->civil_status = $this->applicant->civil_status;
        $this->gender = $this->applicant->gender;

        $this->spouse_name = $this->applicant->spouse?->spouse_name;
        $this->spouse_birthday = $this->applicant->spouse?->spouse_birthday;
        $this->spouse_civil_status = $this->applicant->spouse?->spouse_civil_status;
        $this->spouse_gender = $this->applicant->spouse?->spouse_gender;

        $this->classification = $this->applicant->housingOccupancies->pluck('id');
        $this->structure = $this->applicant->structure;

        $this->date_of_validation = $this->applicant->date_of_validation;
        $this->validated_by = $this->applicant->validator->name;

        $this->recommendation = $this->applicant->recommendation;

        $this->resettlement = $this->applicant->resettlements;

        $this->site = $this->applicant->resettlement?->site->project;
        $this->phase = $this->applicant->resettlement?->phase;
        $this->block = $this->applicant->resettlement?->block;
        $this->lot = $this->applicant->resettlement?->lot;

        $this->remarks = $this->applicant->remarks;
        $this->attachments = $this->applicant->validationAttachment;
    }

    public function render()
    {
        // dd($this->resettlement);
        return view('livewire.validation.view');
    }
}
