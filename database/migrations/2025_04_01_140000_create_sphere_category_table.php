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
        Schema::create('sphere_category', function (Blueprint $table) {
            $table->foreignUlid('sphere_id')->constrained('spheres')->onDelete('cascade');
            $table->foreignUlid('category_id')->constrained('categories')->onDelete('cascade');
            $table->primary(['sphere_id', 'category_id']); // Composite primary key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sphere_category');
    }
};
