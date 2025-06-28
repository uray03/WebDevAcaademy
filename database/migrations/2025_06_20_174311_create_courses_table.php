<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('thumbnail')->nullable();
            $table->uuid('category_id')->nullable();
            $table->uuid('difficulty_level_id')->nullable();
            $table->timestamps();
        
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('difficulty_level_id')->references('id')->on('difficulty_levels')->onDelete('set null');
        
            $table->engine = 'InnoDB';
        });
             
    }    
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
