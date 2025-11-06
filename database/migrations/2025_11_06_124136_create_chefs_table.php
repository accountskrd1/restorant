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
        Schema::create('chefs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position'); // Head Chef, Sous Chef, etc.
            $table->text('bio')->nullable();
            $table->text('specialty')->nullable(); // Cooking specialty
            $table->integer('experience_years')->default(0);
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0); // For sorting
            $table->json('social_links')->nullable(); // Store social media links
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chefs');
    }
};