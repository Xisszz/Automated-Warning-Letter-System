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
        Schema::create('kehadirans', function (Blueprint $table) {
            $table->id();  // Primary key for attendance
            $table->foreignId('id_murid')->constrained('murids')->onDelete('cascade');  // Foreign key referencing the murids table
            $table->date('date');  // Date of the attendance
            $table->enum('status', ['present', 'absent', 'late']);  // Attendance status
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehadirans');
    }
};
