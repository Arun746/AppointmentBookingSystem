<?php

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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('license_no');
            $table->string('email');
            $table->string('contact');
            $table->string('address');
            $table->string('gender');
            $table->date('dob');
            $table->string('specialization');
            $table->string('image')->nullable(); // Store image file path
            $table->timestamps();
        
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
