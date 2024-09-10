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
        Schema::create('lesson_formats', function (Blueprint $table){
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->foreignIdFor(\App\Models\LessonFormat::class)->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
        Schema::create('teachers_lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Teacher::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Lesson::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
        Schema::dropIfExists('lesson_formats');
        Schema::dropIfExists('teachers_lessons');
    }
};
