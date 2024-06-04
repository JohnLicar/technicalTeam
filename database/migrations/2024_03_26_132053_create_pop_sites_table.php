<?php

use App\Models\Applicant;
use App\Models\HousingProject;
use App\Models\ResettlementSite;
use App\Models\SocialPrepDay;
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
        Schema::create('pop_sites', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SocialPrepDay::class)->constrained();
            $table->foreignIdFor(Applicant::class)->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignIdFor(HousingProject::class);
            $table->string('block');
            $table->string('lot');
            $table->string('phase')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pop_sites');
    }
};
