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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['admin', 'instructor', 'student']);
            $table->string('image')->default('uploads/default-files/avatar.png');
            $table->string('name');
            $table->string('contact')->nullable();
            $table->string('headline')->nullable();
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->text('bio')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('document')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('facebook')->nullable();
            $table->string('x')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('website')->nullable();
            $table->string('github')->nullable();
            $table->enum('approve_status', ['pending', 'approved', 'rejected', 'banned'])->default('pending');
            $table->enum('login_as', ['admin', 'student', 'instructor'])->nullable();
            $table->double('wallet')->default(0);
            $table->enum('status', ['active', 'inactive', 'banned'])->default('active');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
