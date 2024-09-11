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
        Schema::create('specialities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('number');
            $table->timestamps();
        });
        Schema::create('student_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('full_name');
            $table->foreignIdFor(\App\Models\Speciality::class)->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_groups');
        Schema::dropIfExists('specialities');
    }
};
