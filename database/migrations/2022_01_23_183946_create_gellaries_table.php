<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGellariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gellaries', function (Blueprint $table) {
            $table->id();
            $table->integer('player_id')->nullable();
            $table->integer('result_id')->nullable();
            $table->integer('training_id')->nullable();
            $table->integer('achivement_id')->nullable();
            $table->integer('category_id');
            $table->date('date');
            $table->string('photo');
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
        Schema::dropIfExists('gellaries');
    }
}
