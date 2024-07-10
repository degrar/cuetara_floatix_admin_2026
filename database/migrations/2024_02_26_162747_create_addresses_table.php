<?php

    use App\Models\Province;
    use App\Models\User;
    use App\Models\Via;
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
        public function up()
        {
            Schema::create('addresses', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(User::class);
                $table->foreignIdFor(Province::class);
                $table->foreignIdFor(Via::class)->nullable();
                $table->foreignIdFor(\App\Models\Game::class)->nullable();
                $table->string('address')->nullable();
                $table->string('number')->nullable();
                $table->string('stair')->nullable();
                $table->string('floor')->nullable();
                $table->string('door')->nullable();
                $table->string('postal_code')->nullable();
                $table->string('city')->nullable();
                $table->string('phone')->nullable();
                $table->string('type')->default('game');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('addresses');
        }
    };
