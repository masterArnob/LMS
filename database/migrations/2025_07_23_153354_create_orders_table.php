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
        Schema::create('orders', function (Blueprint $table) {
 $table->id();
            $table->string('invoice_id');
            $table->foreignId('buyer_id')->constrained('users');
            $table->enum('status', ['pending', 'approved'])->default('pending');
            $table->double('total_amount');
            $table->double('paid_amount');
            $table->string('currency');
            $table->boolean('has_coupon')->default(false);
            $table->string('coupon_code')->nullable();
            $table->double('coupon_amount')->nullable();
            $table->string('transaction_id');
            $table->string('payment_method');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
