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
        Schema::create('karma_logs', function (Blueprint $table) {
            $table->ulid('id')->primary(); // Ensure this is defined as a ULID
            $table->foreignUlid('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('karma_points'); // Ensure this is defined as an integer
            $table->string('action'); // Add action field (e.g., "earned", "spent")
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karma_logs');
    }
};
