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
        Schema::create('hero_sections', function (Blueprint $table) {
 $table->id();
            $table->string('label')->nullable();
            $table->string('title');
            $table->string('subtitle');
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->string('video_button_text')->nullable();
            $table->string('video_button_url')->nullable();
            $table->string('banner_item_title')->nullable();
            $table->string('banner_item_subtitle')->nullable();
            $table->string('image')->nullable();
            $table->string('round_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
