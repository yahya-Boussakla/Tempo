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
        Schema::create('lesson_timetables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->constrained()->onDelete('cascade');
            $table->foreignId('timetable_id')->constrained()->onDelete('cascade');
            $table->foreignId('tutor_id')->constrained()->onDelete('cascade');
            $table->foreignId('module_id')->constrained()->onDelete('cascade');
            $table->foreignId('salle_id')->constrained()->onDelete('cascade');
            $table->time('time_start');
            $table->time('time_end');
            $table->enum('week_day', [
                'Monday', 'Tuesday', 'Wednesday', 'Thursday', 
                'Friday', 'Saturday', 'Sunday'
            ]);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_timetables');
    }
};
