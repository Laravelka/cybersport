<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferalLevelUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referal_level_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('referal_level_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('payment')->default(0);
            $table->tinyInteger('is_paid')->default(0);
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
        Schema::dropIfExists('referal_level_user');
    }
}
