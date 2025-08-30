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
        Schema::create('latest_courses', function (Blueprint $table) {
          $table->id();
            $table->foreignId('category_one')->nullable();
            $table->foreignId('category_two')->nullable();
            $table->foreignId('category_three')->nullable();
            $table->foreignId('category_four')->nullable();
            $table->foreignId('category_five')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('latest_courses');
    }
};
