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
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->string('license_no');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('email');
            $table->string('password');
            $table->string('contact');
            $table->string('address');
            $table->enum('gender', ['male', 'female', 'others']);
            $table->string('dob');
            $table->string('engdob');
            $table->string('specialization');
            $table->integer('role')->nullable();
            $table->boolean('status');
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
