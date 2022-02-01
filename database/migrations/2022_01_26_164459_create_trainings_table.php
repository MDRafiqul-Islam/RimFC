<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('player_id');
            $table->string('status')->default('good');
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
        Schema::dropIfExists('trainings');
    }
}
