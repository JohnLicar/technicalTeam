<?php

namespace App\Livewire\Validation;

use App\Actions\UploadAttachmentsAction;
use App\Models\Applicant;
use App\Models\Barangay;
use App\Models\HousingOccupancy;
use App\Models\HousingProject;
use App\Models\Purok;
use App\Models\ResettlementSite;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;


class Create extends Component
{
    use WithFileUploads, LivewireAlert, AuthorizesRequests;

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

    public $phases = 6;
    public $blocks = 60;
    public $lots = 108;

    public $remarks;

    public $attachments = [];


    #[Computed()]
    public function barangays()
    {
        return Barangay::with('puroks')->get(['id', 'barangay']);
    }

    #[Computed()]
    public function puroks()
    {
        return Purok::where('barangay_id', $this->barangay_id)->get(['id', 'purok']);
    }

    #[Computed()]
    public function housingOccupancies()
    {
        return HousingOccupancy::get(['id', 'description']);
    }

    #[Computed()]
    public function validators()
    {
        return User::role('validator')->get();
    }

    #[Computed()]
    public function housingProjects()
    {
        return HousingProject::get();
    }

    public function render()
    {
        $this->authorize("create applicant");

        return view('livewire.validation.create');
    }

    #[On('confirmed')]
    public function confirmed(UploadAttachmentsAction $uploadAttachmentsAction)
    {
        $this->saveApplicant($uploadAttachmentsAction);
    }

    public function addNewRecord(UploadAttachmentsAction $uploadAttachmentsAction)
    {
        $this->authorize("create applicant");

        $validated =  $this->validate([
            'barangay_id' => 'required',
            'purok_id' => 'nullable',

            'name' => 'required|min:5',
            'birthday' => 'nullable|date',
            'civil_status' => 'required',
            'gender' => 'required',

            'structure' => 'required',

            'date_of_validation' => 'required',

            'recommendation' => 'required',

            'remarks' => 'nullable',

            'spouse_name' => 'nullable|min:5',
            'spouse_birthday' => 'nullable|date',
            'spouse_civil_status' => 'required_with:spouse_name',
            'spouse_gender' => 'required_with:spouse_name',

            'classification' => 'required',

            'resettlement' => 'required|boolean',

            'site' => 'required_if:resettlement,1',
            'phase' => 'nullable',
            'block' => 'required_if:resettlement,1',
            'lot' => 'required_if:resettlement,1',
        ]);

        $ifWithResettlementSite = $this->checkResettlement($this->site, $this->block, $this->lot, $this->phase);

        if (!empty($ifWithResettlementSite)) {
            return $this->alert('question', 'This unit is already awarded to another applicant', [
                'showConfirmButton' => true,
                'showCancelButton' => true,
                'confirmButtonText' => 'Save Applicant',
                'position' => 'center',
                'timer' => null,
                'timerProgressBar' => true,
                'onConfirmed' => 'confirmed'
            ]);
        }

        $this->saveApplicant($uploadAttachmentsAction);
    }

    private function saveApplicant($uploadAttachmentsAction)
    {
        try {
            DB::beginTransaction($uploadAttachmentsAction);
            // return DB::transaction(function () use ($uploadAttachmentsAction) {
            $applicant = Applicant::create([
                'barangay_id' => $this->barangay_id,
                'purok_id' =>  $this->purok_id,
                'name' => $this->name,
                'birthday' => $this->birthday,
                'civil_status' => $this->civil_status,
                'gender' => $this->gender,
                'structure' => $this->structure,
                'date_of_validation' => $this->date_of_validation,
                'recommendation' => $this->recommendation,
                'remarks' => $this->remarks,
                'resettlements' => $this->resettlement,
                'validated_by' => $this->validated_by,
            ]);

            if ($this->spouse_name) {
                $applicant->spouse()->create([
                    'spouse_name' => $this->spouse_name,
                    'spouse_birthday' => $this->spouse_birthday,
                    'spouse_civil_status' => $this->spouse_civil_status,
                    'spouse_gender' => $this->gender,
                ]);
            }

            if ($this->resettlement == "1") {
                $applicant->resettlement()->create([
                    'resettlement_site_id' => $this->site,
                    'block' => $this->block,
                    'lot' => $this->lot,
                    'phase' => $this->phase,
                ]);
            }

            $applicant->housingOccupancies()->attach($this->classification);

            if ($this->attachments) {
                $uploadAttachmentsAction->execute($this->attachments, $applicant);
            }
            DB::commit();
            $this->resetProperties();
            $this->dispatch('showToast', ['type' => "success", 'message' => "Applicant Information Added successfully!", 'title' => "Success"]);
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e);
        }
    }

    public function checkResettlement($site, $block, $lot, $phase = null)
    {
        return ResettlementSite::with('site')
            ->where('resettlement_site_id', $site)
            ->where('block', $block)
            ->where('lot', $lot)
            ->where('phase', $phase)
            ->get()->toArray();
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function removeAttachmentImage($value)
    {
        unset($this->attachments[$value]);
    }

    protected function resetProperties()
    {
        return $this->reset([
            'barangay_id',
            'purok_id',
            'name',
            'birthday',
            'civil_status',
            'gender',
            'structure',
            'date_of_validation',
            'recommendation',
            'remarks',
            'spouse_name',
            'spouse_birthday',
            'spouse_civil_status',
            'spouse_gender',
            'classification',
            'resettlement',
            'site',
            'phase',
            'block',
            'lot',
            'attachments',
            'validated_by'
        ]);
    }
}
