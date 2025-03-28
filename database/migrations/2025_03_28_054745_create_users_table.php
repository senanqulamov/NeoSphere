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
            $table->timestamps();
            $table->softDeletes();
        });

        // Add CHECK constraint
        DB::statement('ALTER TABLE users ADD CONSTRAINT karma_quants_range CHECK (karma_quants <= 500)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
