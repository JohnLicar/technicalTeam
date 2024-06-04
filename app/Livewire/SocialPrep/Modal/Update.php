<?php

namespace App\Livewire\SocialPrep\Modal;

use App\Actions\SocialPrepAttachmentsAction;
use App\Actions\UploadAttachmentsAction;
use App\Livewire\SocialPrep\Index;
use App\Models\Applicant;
use App\Models\HousingProject;
use App\Models\SocialPrepAttachment;
use App\Models\SocialPrepDay;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class Update extends ModalComponent
{

    use WithFileUploads;

    public $applicant;

    public string $housing_project_id = "";
    public string $phase = "";
    public string $block = "";
    public string $lot = "";

    // public $classification = [];

    public $attachments = [];

    public string $social_prep_day_id = '';

    public $phases = 6;
    public $blocks = 60;
    public $lots = 108;

    public function rules()
    {
        return [
            'social_prep_day_id' => 'required|exists:social_prep_days,id',
            'housing_project_id' => 'required|exists:housing_projects,id',
            'phase' => 'nullable',
            'block' => 'required',
            'lot' => 'required',
        ];
    }

    #[Computed()]
    public function housingProjects()
    {
        return HousingProject::get();
    }

    #[Computed()]
    public function socialPrepDates()
    {
        return SocialPrepDay::latest()->get();
    }


    public function mount(Applicant $applicant)
    {
        $this->applicant = $applicant->load('pop', 'socialPrepAttachment');
        $this->social_prep_day_id = $applicant->pop->social_prep_day_id ?? '';
        $this->housing_project_id = $applicant->pop?->housing_project_id ?? '';
        $this->phase = $applicant->pop?->phase ?? '';
        $this->block = $applicant->pop?->block ?? '';
        $this->lot = $applicant->pop?->lot ?? '';
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

    public function addSocPrep(SocialPrepAttachmentsAction $uploadAttachmentsAction)
    {
        $this->validate();
        try {
            DB::beginTransaction($uploadAttachmentsAction);

            $this->applicant->pop()->updateOrCreate(['applicant_id' => $this->applicant->id], [
                'social_prep_day_id' => $this->social_prep_day_id,
                'housing_project_id' => $this->housing_project_id,
                'phase' => $this->phase,
                'block' => $this->block,
                'lot' => $this->lot,
            ]);

            if ($this->attachments) {
                $uploadAttachmentsAction->execute($this->attachments, $this->applicant);
            }

            DB::commit();
            $this->closeModalWithEvents([
                Index::class => 'refresh-social-prep-index',
            ]);

            $this->dispatch('showToast', ['type' => "success", 'message' => "Applicant Information Added successfully!", 'title' => "Success"]);
        } catch (\Exception $e) {

            DB::rollback();
            throw new Exception($e);
        }
    }

    public function removeAttachment(SocialPrepAttachment $socialPrepAttachment)
    {
        try {
            DB::beginTransaction();
            $this->applicant->socialPrepAttachment()->where('id', $socialPrepAttachment->id)->delete();
            Storage::disk('public')->delete('attachment/socialPrep/' . $socialPrepAttachment->file);
            DB::commit();
            $this->closeModalWithEvents([
                Index::class => 'refresh-social-prep-index',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e);
        }
    }

    public function render()
    {
        return view('livewire.social-prep.modal.update');
    }
}
