<?php

use App\Models\{Game, User};
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
        Schema::create('mmggs', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_moment');
            $table->dateTime('date_assigned')->nullable();
            $table->boolean('assigned')->default(0);
            $table->timestamps();
            $table->foreignIdFor(Game::class)->nullable();
            $table->foreignIdFor(User::class)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mmggs');
    }
};
