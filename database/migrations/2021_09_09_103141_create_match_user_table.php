<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('team_id');
            $table->decimal('sum');
            $table->tinyInteger('is_win')->default(0);
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
        Schema::dropIfExists('match_user');
    }
}
