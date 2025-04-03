<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('title')->nullable();
            $table->unsignedInteger('karma_points')->default(0);
            $table->unsignedSmallInteger('karma_quants')->default(0);
            $table->string('profile_picture')->nullable(); // Add profile picture field
            $table->string('bio', 500)->nullable(); // Add bio field with a max length of 500
            $table->boolean('is_verified')->default(false); // Add verification status
            $table->boolean('is_admin')->default(false); // Add admin status
            $table->timestamps();
            $table->softDeletes();
        });

        // Add CHECK constraint for karma_quants
        DB::statement('ALTER TABLE users ADD CONSTRAINT karma_quants_range CHECK (karma_quants BETWEEN 0 AND 500)');

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignUlid('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Update to use ULID
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
