<?php

namespace App\Actions;

use App\Models\Applicant;

class SocialPrepAttachmentsAction
{
    public function execute($files = [], Applicant $applicant)
    {
        foreach ($files as  $file) {
            $requirement = $applicant->id . '-' . time() . '-' . $file->getClientOriginalName();
            $file->storeAs('public/attachment/socialPrep/', $requirement);
            $requirements[] = ['file' => $requirement];
        }
        $applicant->socialPrepAttachment()->createMany($requirements);
    }
}
