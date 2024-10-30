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
        Schema::create('animations_countries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animation_id');
            $table->unsignedBigInteger('country_id');

            $table->index('animation_id','animations_countries_animation_idx');
            $table->index('country_id','animations_countries_country_idx');

            $table->foreign('animation_id','animations_countries_animation_fk')
                ->on('animations')->references('id')->cascadeOnDelete();
            $table->foreign('country_id','animations_countries_country_fk')
                ->on('countries')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animations_countries');
    }
};
