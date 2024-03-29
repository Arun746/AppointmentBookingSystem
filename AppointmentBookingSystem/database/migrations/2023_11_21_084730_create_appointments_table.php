<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('schedule_id')->constrained('schedules')->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade');
            $table->foreignId('patient_id')->constrained('patients');
            $table->string('remarks')->nullable();
            $table->integer('status')->nullable(); // 0 for pending , 1 for approved ,2 for removed
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
