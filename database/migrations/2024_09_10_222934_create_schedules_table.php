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
        Schema::create('lesson_durations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('duration_minutes');
            $table->timestamps();
        });
        Schema::create('lesson_formats', function (Blueprint $table){
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('number_pairs');
            $table->date('date_start');
            $table->integer('day_of_week');
            $table->time('time_start');
            $table->time('time_end');
            $table->foreignIdFor(\App\Models\StudentGroup::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Lesson::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Teacher::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(\App\Models\LessonDuration::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(\App\Models\LessonFormat::class)->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('lesson_durations');
        Schema::dropIfExists('lesson_formats');
    }
};
