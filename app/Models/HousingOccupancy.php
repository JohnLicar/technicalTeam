<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousingOccupancy extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function applicants()
    {
        return $this->belongsToMany(Applicant::class);
    }
}
