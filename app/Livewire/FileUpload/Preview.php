<?php

namespace App\Livewire\FileUpload;

use App\Models\Applicant;
use Livewire\Component;
use Livewire\WithFileUploads;

class Preview extends Component
{

    use WithFileUploads;

    public $applicant;
    public $attachmentId;


    public function mount(Applicant $applicant)
    {
        $this->applicant = $applicant->load('validationAttachment');
        // dd($this->applicant);
    }

    public function render()
    {
        return view('livewire.file-upload.preview');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function removeAttachmentImage()
    {
        $this->applicant->validationAttachment()->where('id', $this->attachmentId)->delete();

        $this->dispatch('close-modal');

        $this->dispatch('add-record', ['type' => "success", 'message' => "Applicant attachment removed successfully!", 'title' => "Success"]);
    }


    public function setAttachmentId($attachmentId)
    {
        $this->attachmentId = $attachmentId;
    }
}
