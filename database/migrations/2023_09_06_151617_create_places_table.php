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
            $table->decimal('latitude', 100,2)->nullable();
            $table->decimal('length', 100.2)->nullable();
            $table->string('address', 250);
            $table->string('description', 250);
            $table->string('puntuation', 25);
            $table->decimal('control', 2);
            $table->unsignedBigInteger('user_id', 200);
            $table->unsignedBigInteger('theme_id', 200);
            $table->timestamps();            
           
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade')->onUpdate('cascade');      
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
