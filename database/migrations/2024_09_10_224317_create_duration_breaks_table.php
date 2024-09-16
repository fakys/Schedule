<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('group_breaks', function (Blueprint $table){
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });
        Schema::create('duration_breaks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('number_breaks')->unique();
            $table->integer('duration_minutes')->nullable();
            $table->foreignIdFor(\App\Models\GroupBreak::class)->nullable()->constrained()->nullOnDelete();
            $table->time('time_start');
            $table->time('time_end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('duration_breaks');
        Schema::dropIfExists('group_breaks');
    }
};
