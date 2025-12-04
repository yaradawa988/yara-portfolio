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
        Schema::create('contacts', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('user_id')->nullable(); 
           $table->string('name');
           $table->string('email');
           $table->text('message');
           $table->text('reply')->nullable();  
           $table->enum('status', ['pending', 'replied'])->default('pending'); 
           $table->boolean('is_read')->default(false); 
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
