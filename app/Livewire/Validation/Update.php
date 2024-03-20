<?php

namespace App\Livewire\Validation;

use App\Actions\UploadAttachmentsAction;
use App\Enums\CivilStatus;
use App\Enums\Gender;
use App\Enums\Recommendation;
use App\Models\Applicant;
use App\Models\Barangay;
use App\Models\HousingOccupancy;
use App\Models\HousingProject;
use App\Models\Purok;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads, AuthorizesRequests;

    public  $applicant;

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
    public $validator;

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
    public $newAttachments = [];

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
        return User::get();
    }

    #[Computed()]
    public function housingProjects()
    {
        return HousingProject::get();
    }
    public function rules()
    {
        return [
            'barangay_id' => 'required',
            'purok_id' => 'nullable',

            'name' => 'required|min:5',
            'birthday' => 'nullable',
            'civil_status' => 'required',
            'gender' => 'required',

            'structure' => 'required',

            'date_of_validation' => 'required',

            'recommendation' => 'required',

            'remarks' => 'nullable',

            'spouse_name' => 'nullable|min:5',
            'spouse_birthday' => 'nullable',
            'spouse_civil_status' => 'required_with:spouse_name',
            'spouse_gender' => 'required_with:spouse_name',

            'classification' => 'required',

            'resettlement' => 'required|boolean',

            'site' => 'required_if:resettlement,1',
            'phase' => 'nullable',
            'block' => 'required_if:resettlement,1',
            'lot' => 'required_if:resettlement,1',
        ];
    }

    public function mount(Applicant $applicant)
    {

        $this->applicant = $applicant->load('spouse', 'barangay', 'resettlement', 'resettlement.site', 'housingOccupancies', 'validator', 'validationAttachment');

        $this->barangay_id = $applicant->barangay_id;
        $this->purok_id = $applicant->purok_id;
        $this->name = $applicant->name;
        $this->birthday = $applicant->birthday;
        $this->civil_status = $applicant->civil_status;
        $this->gender = $applicant->gender;
        $this->structure = $applicant->structure;
        $this->date_of_validation = $applicant->date_of_validation;
        $this->recommendation = $applicant->recommendation;
        $this->remarks = $applicant->remarks;
        $this->spouse_name = $applicant->spouse?->spouse_name;
        $this->spouse_birthday = $applicant->spouse?->spouse_birthday;
        $this->spouse_civil_status = $applicant->spouse?->spouse_civil_status;
        $this->spouse_gender = $applicant->spouse?->spouse_gender;
        $this->classification = $applicant->housingOccupancies?->pluck('id')->toArray();
        $this->resettlement = $applicant->resettlements;
        $this->site = $applicant->resettlement?->site->id;
        $this->phase = $applicant->resettlement?->phase;
        $this->block = $applicant->resettlement?->block;
        $this->lot = $applicant->resettlement?->lot;
        $this->validator = $applicant->validator?->id;
    }

    public function render()
    {
        $this->authorize('edit applicant');
        return view('livewire.validation.update');
    }

    public function updateRecord(UploadAttachmentsAction $uploadAttachment)
    {
        $this->validate();

        DB::transaction(function () use ($uploadAttachment) {
            $this->applicant->update([
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
            ]);

            if ($this->spouse_name) {
                $this->applicant->spouse()->update([
                    'spouse_name' => $this->spouse_name,
                    'spouse_birthday' => $this->spouse_birthday,
                    'spouse_civil_status' => $this->spouse_civil_status,
                    'spouse_gender' => $this->spouse_gender,
                ]);
            }

            if ($this->resettlement == true) {
                $this->applicant->resettlement()->updateOrCreate(
                    ['applicant_id' => $this->applicant->id],
                    [
                        'resettlement_site_id' => $this->site,
                        'block' => $this->block,
                        'lot' => $this->lot,
                        'phase' => $this->phase,
                    ]
                );
            }

            $this->applicant->housingOccupancies()->sync($this->classification);

            if ($this->newAttachments) {
                $uploadAttachment->execute($this->newAttachments, $this->applicant);
            }

            $this->dispatch('showToast', ['type' => "success", 'message' => "Applicant Information Added successfully!", 'title' => "Success"]);
        });
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function removeAttachmentImage($value)
    {
        unset($this->newAttachments[$value]);
    }
}
