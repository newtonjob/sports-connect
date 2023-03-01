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
        Schema::create('sport_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('sport_id')->constrained();
            $table->timestamps();

            $table->unique(['user_id', 'sport_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sport_user');
    }
};
