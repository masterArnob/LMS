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
        Schema::create('top_bar_sections', function (Blueprint $table) {
   $table->id();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('offer_name')->nullable();
            $table->string('offer_short_description')->nullable();
            $table->string('offer_button_text')->nullable();
            $table->string('offer_button_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('top_bar_sections');
    }
};
