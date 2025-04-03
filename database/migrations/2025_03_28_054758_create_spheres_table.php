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
        Schema::create('spheres', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('type', ['public', 'private'])->default('public'); // Add type column
            $table->boolean('is_private')->default(false); // Add privacy flag
            $table->foreignUlid('core_hub_id')->nullable()->constrained('core_hubs')->onDelete('cascade'); // Link to core hubs
            $table->foreignUlid('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Add owner reference
            $table->string('icon')->nullable(); // Add icon field
            $table->boolean('is_active')->default(true); // Add active status
            $table->fullText(['name', 'description']); // Add full-text index for search
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spheres');
    }
};
