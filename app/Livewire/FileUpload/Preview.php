<?php

namespace App\Livewire\FileUpload;

use App\Models\Applicant;
use App\Models\ValidationAttachment;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Preview extends Component
{

    use WithFileUploads;

    public Applicant $applicant;
    public $attachment;

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
        try {
            DB::beginTransaction();
            $this->applicant->validationAttachment()->where('id', $this->attachment->id)->delete();
            Storage::disk('public')->delete('attachment/validation/' . $this->attachment->file);
            $this->dispatch('close-modal');
            $this->dispatch('add-record', ['type' => "success", 'message' => "Applicant attachment removed successfully!", 'title' => "Success"]);;
            $this->js('window.location.reload()');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e);
        }
    }


    public function setAttachmentId(ValidationAttachment $attachment)
    {
        $this->attachment = $attachment;
    }
}
