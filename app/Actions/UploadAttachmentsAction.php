<?php

namespace App\Actions;

use App\Models\Applicant;

class UploadAttachmentsAction
{

    public function execute($files = [], Applicant $applicant)
    {

        foreach ($files as  $file) {
            $requirement = $applicant->id . '-' . time() . '-' . $file->getClientOriginalName();
            $file->storeAs('public/images/attachments/', $requirement);
            $requirements[] = ['file' => $requirement];
        }
        $applicant->validationAttachment()->createMany($requirements);
    }
}
