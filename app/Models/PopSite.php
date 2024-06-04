<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopSite extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function propDate()
    {
        return $this->belongsTo(SocialPrepDay::class, 'social_prep_day_id', 'id');
    }

    public function popSite()
    {
        return $this->belongsTo(HousingProject::class, 'housing_project_id', 'id');
    }
}
