<?php

use App\Models\Applicant;
use App\Models\HousingOccupancy;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicant_housing_occupancy', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Applicant::class);
            $table->foreignIdFor(HousingOccupancy::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_housing_occupancy');
    }
};
