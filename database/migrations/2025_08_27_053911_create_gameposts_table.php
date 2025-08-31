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
        Schema::create('gameposts', function (Blueprint $table) {
            $table->id();
            $table->string('game_title')->nullable();
            $table->longText('game_content')->nullable();
            $table->string('game_image')->nullable();
            $table->string('game_url')->nullable();
            $table->string('game_banner')->default('inactive');
            $table->string('game_platform')->nullable();
            $table->string('game_status')->default('active');
            $table->dateTime('game_publish_at')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gameposts');
    }
};
