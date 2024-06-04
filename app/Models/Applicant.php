<?php

namespace App\Models;

use App\Enums\CivilStatus;
use App\Enums\Gender;
use App\Enums\Recommendation;
use App\Enums\StatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */

    protected $guarded = [];

    protected $dates = ['birthday'];

    protected function casts(): array
    {
        return [
            'civil_status' => CivilStatus::class,
            'gender' => Gender::class,
            'birthday' => 'date:Y-m-d',
        ];
    }

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()
            ->whereLike(['name', 'remarks',], $search);
    }

    public function spouse()
    {
        return $this->hasOne(Spouse::class);
    }

    public function validator()
    {
        return $this->belongsTo(User::class, 'validated_by', 'id');
    }

    public function encoder()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }

    public function purok()
    {
        return $this->belongsTo(Purok::class);
    }

    public function housingOccupancies()
    {
        return $this->belongsToMany(HousingOccupancy::class, 'applicant_housing_occupancy', 'applicant_id', 'housing_occupancy_id');
    }

    public function validationAttachment()
    {
        return $this->hasMany(ValidationAttachment::class, 'applicant_id', 'id');
    }

    public function socialPrepAttachment()
    {
        return $this->hasMany(SocialPrepAttachment::class, 'applicant_id', 'id');
    }

    public function resettlement()
    {
        return $this->hasOne(ResettlementSite::class);
    }

    public function popSite()
    {
        return $this->hasOne(ResettlementSite::class);
    }

    public function pop()
    {
        return $this->hasOne(PopSite::class);
    }

    public function scopeWithResettlement($query)
    {
        return $query->where('resettlements', 1);
    }

    public function scopeForPop($query)
    {
        return $query->where('recommendation', Recommendation::FOR_POP->value);
    }

    public function scopeForVerification($query)
    {
        return $query->where('recommendation', Recommendation::FOR_VERIFICATION->value);
    }

    public function scopeForAdminDemolition($query)
    {
        return $query->where('recommendation', Recommendation::ADMIN_DEMOLITION->value);
    }

    public function scopeForLHB($query)
    {
        return $query->where('recommendation', Recommendation::FOR_LHB->value);
    }

    public function scopeNotQualified($query)
    {
        return $query->where('recommendation', Recommendation::NOT_QUALIFIED->value);
    }

    public function scopeReValidation($query)
    {
        return $query->where('recommendation', Recommendation::FOR_REVALIDATION->value);
    }
}
