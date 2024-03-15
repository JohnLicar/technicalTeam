<?php

use App\Models\Applicant;
use App\Models\ResettlementSite;
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
        Schema::create('resettlement_sites', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Applicant::class)->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignIdFor(ResettlementSite::class);
            $table->string('block');
            $table->string('lot');
            $table->string('phase')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resettlement_sites');
    }
};
