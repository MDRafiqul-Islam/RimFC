<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_trainings', function (Blueprint $table) {
            $table->id();
            $table->integer('player_id');
            $table->string('player_name');
            $table->string('player_position');
            $table->double('dribbling')->default(0);
            $table->double('shooting')->default(0);
            $table->double('crossing')->default(0);
            $table->double('turning')->default(0);
            $table->double('tackling')->default(0);
            $table->double('heading')->default(0);
            $table->double('passing')->default(0);
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
        Schema::dropIfExists('player_trainings');
    }
}
