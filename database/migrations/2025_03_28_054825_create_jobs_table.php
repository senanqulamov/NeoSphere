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
        Schema::create('jobs', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('payment')->default(0);
            $table->enum('type', ['hourly', 'daily', 'monthly', 'task-based'])->default('task-based');
            $table->foreignUlid('sphere_id')->nullable()->constrained('spheres')->onDelete('cascade'); // Link to spheres
            $table->foreignUlid('user_id')->constrained('users')->onDelete('cascade'); // Link to job poster
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
