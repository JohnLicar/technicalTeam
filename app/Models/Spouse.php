<?php

namespace App\Models;

use App\Enums\Gender;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spouse extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */

    protected $guarded = [];

    protected $dates = ['spouse_birthday'];

    protected function casts(): array
    {
        return [
            'gender' => Gender::class,
            'spouse_birthday' => 'date:Y-m-d',
        ];
    }
}
