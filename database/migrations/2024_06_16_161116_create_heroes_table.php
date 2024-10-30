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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actor_id')->nullable();
            $table->unsignedBigInteger('animation_id');
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->text('description');
            $table->foreign('actor_id')->references('id')->on('actors')->onDelete('SET NULL');
            $table->foreign('animation_id')->references('id')->on('animations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
