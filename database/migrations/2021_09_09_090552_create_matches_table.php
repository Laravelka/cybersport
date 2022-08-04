<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->unsignedBigInteger('first_team_id');
            $table->unsignedBigInteger('second_team_id');
            $table->string('broadcast_url')->nullable();
            $table->unsignedBigInteger('chat_id')->nullable();
            $table->decimal('bet_rate');
            $table->decimal('bank')->nullable();
            $table->decimal('commission')->nullable();
            $table->unsignedInteger('gamers_count')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('winner_id')->nullable();
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
        Schema::dropIfExists('matches');
    }
}
