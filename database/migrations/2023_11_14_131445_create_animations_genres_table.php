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
        Schema::create('animations_genres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animation_id');
            $table->unsignedBigInteger('genre_id');

            $table->index('animation_id','animations_genres_animation_idx');
            $table->index('genre_id','animations_genres_genre_idx');

            $table->foreign('animation_id','animations_genres_animation_fk')
                ->on('animations')->references('id')->cascadeOnDelete();
            $table->foreign('genre_id','animations_genres_genre_fk')
                ->on('genres')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animations_genres');
    }
};
