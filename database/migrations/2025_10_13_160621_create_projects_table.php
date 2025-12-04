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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
    $table->string('title');
    $table->string('slug')->unique();
    $table->text('description')->nullable();
    $table->string('short_description')->nullable();
    $table->json('tech_stack')->nullable(); 
    $table->string('cover_image')->nullable();
    $table->string('live_url')->nullable();
    $table->string('github_url')->nullable();
    $table->string('role')->nullable();
    $table->boolean('featured')->default(false);
    $table->date('started_at')->nullable();
    $table->date('ended_at')->nullable();
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
