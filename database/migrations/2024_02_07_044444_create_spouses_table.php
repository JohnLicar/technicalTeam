<?php

use App\Models\Applicant;
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
        Schema::create('spouses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Applicant::class)->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('spouse_name');
            $table->date('spouse_birthday')->nullable();
            $table->string('spouse_civil_status');
            $table->string('spouse_gender');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spouses');
    }
};
