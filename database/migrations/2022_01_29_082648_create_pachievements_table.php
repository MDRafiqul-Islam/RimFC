<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePachievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pachievements', function (Blueprint $table) {
            $table->id();
            $table->integer('player_id');
            $table->integer('ballon_d_or')->default(0);
            $table->integer('fifa_best')->default(0);
            $table->integer('ball')->default(0);
            $table->integer('boot')->default(0);
            $table->integer('globes')->default(0);
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
        Schema::dropIfExists('pachievements');
    }
}
