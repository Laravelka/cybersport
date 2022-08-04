<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
			$table->string('avatar')->nullable();
			$table->string('avatar_full')->nullable();
            $table->string('password');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('telegram')->nullable();
            $table->string('discord')->nullable();

            $table->string('ip_address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedTinyInteger('is_admin')->default(0);
            $table->unsignedTinyInteger('is_banned')->default(0);
            $table->decimal('balance')->default(0);
            $table->decimal('balance_coins')->default(0);
            $table->unsignedInteger('pw_points')->default(0);
            $table->tinyInteger('referal_status')->default(1);
            $table->string('referal_link')->nullable();
            $table->unsignedBigInteger('referal_level_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
