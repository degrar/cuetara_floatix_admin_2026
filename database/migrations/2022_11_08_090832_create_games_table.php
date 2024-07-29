<?php

use App\Models\User;
use Duplex\Enums\Game as GameType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(User::class);
            $table->string('token');
            $table->integer('option'); //code = 1 / Ticket = 2
            $table->string('code')->nullable();
            $table->string('amount')->nullable();
            $table->dateTime('buydate')->nullable();
            $table->integer('state', unsigned: true)->default(\Duplex\Enums\GameState::Loser->value);
            $table->string('decline_reason')->nullable();
            $table->timestamp('validated_at', 0)->nullable();
            $table->timestamp('confirmed_at', 0)->nullable();

            if (config('duplex.promo.type') === GameType::Mmgg) {
                $this->createMmggBlueprint($table);
            } else {
                $this->createCommentBlueprint($table);
            }
        });
    }

    /**
     * @param Blueprint $table
     * @return void
     */
    function createMmggBlueprint(Blueprint $table): void
    {
//        $table->boolean('is_mmgg');
//        $table->dateTime('date_mmgg')->nullable();
//        $table->boolean('is_valid')->nullable();
//        $table->dateTime('date_valid')->nullable();
//        $table->boolean('is_winner')->nullable();
//        $table->boolean('date_winner')->nullable();
    }

    /**
     * @param Blueprint $table
     * @return void
     */
    function createCommentBlueprint(Blueprint $table): void
    {
        $table->string('comment');
        $table->boolean('is_favourite')->default(false);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
