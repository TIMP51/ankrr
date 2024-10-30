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
        Schema::create('animations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->date('release_year');
            $table->string('image')->nullable();
            $table->foreignId('type_id')
                ->references('id')->on('types');
            $table->foreignId('category_id')
                ->references('id')->on('categories');
            $table->foreignId('studio_id')
                ->references('id')->on('studios');
            $table->foreignId('user_id')->nullable()
                ->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animations');
    }
};
