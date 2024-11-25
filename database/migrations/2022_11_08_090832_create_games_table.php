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
            $table->string('store');
            $table->string('other_store')->nullable();
            $table->integer('product');
            $table->dateTime('buydate');
            $table->string('amount');
            $table->string('iban', 24)->nullable();
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
//        $table->dateTime('date_validated')->nullable();
//        $table->boolean('date_confirmed')->nullable();
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
