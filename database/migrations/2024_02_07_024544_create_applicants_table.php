<?php

use App\Models\Barangay;
use App\Models\User;
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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Barangay::class)->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('name');
            $table->date('birthday')->nullable();
            $table->string('civil_status');
            $table->string('gender');
            $table->string('structure');
            $table->string('recommendation');
            $table->text('remarks');
            $table->foreignIdFor(User::class)->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('validated_by')->constrained(
                table: 'users',
                indexName: 'validated_by'
            );
            // $table->unsignedBigInteger('validated_by');

            // $table->foreign('validated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
