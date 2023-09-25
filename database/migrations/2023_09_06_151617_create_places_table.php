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
            $table->decimal('latitude', 7,5)->nullable()->default(1.00);
            $table->decimal('length', 7,5)->nullable()->default(1.00);
            $table->string('address', 250);
            $table->string('description', 250);
            $table->interger('puntuation', 25);
            $table->integer('control'); 
            $table->string('location', 250);
            $table->string('image', 250)->nullable()->default('images/default.jpg');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('theme_id');            
           
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');      
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
