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
        //
        Schema::create('animations_liked', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animation_id');
            $table->unsignedBigInteger('user_id');

            $table->index('animation_id','animations_users_animation_idx');
            $table->index('user_id','animations_users_user_idx');

            $table->foreign('animation_id','animations_users_animation_fk')
                ->on('animations')->references('id')->cascadeOnDelete();
            $table->foreign('user_id','animations_users_user_fk')
                ->on('users')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
