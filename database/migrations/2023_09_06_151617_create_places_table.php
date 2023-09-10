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
        Schema::create('places', function (Blueprint $table) {
            
            $table->id();
            $table->string('name', 150);            
            $table->string('photo_theme', 150);
            $table->decimal('latitude', 7,5)->nullable();
            $table->decimal('length', 7,5)->nullable();
            $table->string('address', 250);
            $table->string('description', 250);
            $table->string('puntuation', 25);
            $table->integer('control');           
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('theme_id');            
           
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('theme_id')->references('id')->on('themes');      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
