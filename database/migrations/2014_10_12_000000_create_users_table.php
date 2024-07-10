<?php

use App\Models\Address;
    use Duplex\Enums\Role;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_surname');
            $table->string('second_surname')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();;
            $table->integer('phone')->nullable();
            $table->boolean('legal');
            $table->boolean('adult');
            $table->boolean('ads')->nullable();
            $table->rememberToken();
            $table->string('role')->default(Role::User->value);
            $table->timestamps();

            //$table->foreignIdFor(Address::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
