<?php

namespace App\Livewire\SocialPrep\Modal;

use App\Actions\UploadAttendanceAction;
use App\Models\SocialPrepDay;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class UploadFile extends ModalComponent
{
    use WithFileUploads;

    public $attachments;

    public SocialPrepDay $socialPrepDay;

    public function render()
    {
        return view('livewire.social-prep.modal.upload-file');
    }

    public function addAttendance()
    {

        if ($this->attachments) {
            $requirement =  $this->socialPrepDay->prep_day . '-' . $this->attachments->getClientOriginalName();
            $this->attachments->storeAs('public/attachment/attendance/', $requirement);

            $this->socialPrepDay->update([
                'attachment' => $requirement
            ]);
        }

        $this->reset('attachments');
        $this->closeModalWithEvents([
            PrepDay::class => 'social-prep-date-created',
        ]);
        $this->dispatch('showToast', ['type' => "success", 'message' => "Social Prep date attendance uploaded successfully", 'title' => "Success"]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function removeAttachment()
    {
        $this->reset('attachments');
    }
}
