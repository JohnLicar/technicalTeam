<?php

namespace App\Livewire\Validation;

use App\Models\Applicant;
use App\Models\HousingOccupancy;
use App\Models\User;
use Carbon\Carbon;
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
    public $fourteen;

    public $spouse_name;
    public $spouse_birthday;
    public $spouse_civil_status;
    public $spouse_gender;
    public $spouse_fourteen;

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


    public  $attendance;
    public  $prep_day;
    public  $housing_project_id;
    public  $popPhase;
    public  $popBlock;
    public  $popLot;
    public $socialPrepAttachment = [];

    #[Computed()]
    public function housingOccupancies()
    {
        return HousingOccupancy::get(['id', 'description']);
    }

    public function mount()
    {

        $this->applicant->load('spouse', 'validator', 'encoder', 'barangay', 'purok', 'housingOccupancies', 'validationAttachment', 'resettlement', 'socialPrepAttachment', 'pop');

        $this->barangay_id = $this->applicant->barangay?->barangay;
        $this->purok_id = $this->applicant->purok?->purok;

        $this->name = $this->applicant->name;
        $this->birthday = $this->applicant->birthday;
        $this->civil_status = $this->applicant->civil_status;
        $this->gender = $this->applicant->gender;
        $this->fourteen = $this->applicant->fourteen ? 'Yes' : 'No';

        $this->spouse_name = $this->applicant->spouse?->spouse_name;
        $this->spouse_birthday = $this->applicant->spouse?->spouse_birthday;
        $this->spouse_civil_status = $this->applicant->spouse?->spouse_civil_status;
        $this->spouse_gender = $this->applicant->spouse?->spouse_gender;
        $this->spouse_fourteen = $this->applicant->spouse?->spouse_fourteen ? 'Yes' : 'No';

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
        $this->socialPrepAttachment = $this->applicant->socialPrepAttachment;

        $this->attendance = $this->applicant->pop?->propDate?->attachment ?? '';
        $this->prep_day = $this->applicant->pop?->propDate?->prep_day ?? '';
        $this->housing_project_id = $this->applicant->pop?->popSite->project ?? '';
        $this->popPhase = $this->applicant->pop?->phase ?? '';
        $this->popBlock = $this->applicant->pop?->block ?? '';
        $this->popLot = $this->applicant->pop?->lot ?? '';
    }

    public function render()
    {
        // dd($this->resettlement);
        return view('livewire.validation.view');
    }
}
