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
        Schema::create('withdraws', function (Blueprint $table) {
             $table->id();
            $table->foreignId('instructor_id')->constrained('users');
            $table->foreignId('payout_gateway_id')->constrained('payout_gateways');
            $table->double('amount');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('transaction_id')->nullable();
            $table->text('account_information');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdraws');
    }
};
