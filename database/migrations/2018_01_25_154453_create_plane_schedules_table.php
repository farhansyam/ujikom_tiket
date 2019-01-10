<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaneSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plane_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('airport_id')->unsigned();
            $table->integer('plane_id')->unsigned();
            $table->string('from');
            $table->string('destination');
            $table->string('from_code');
            $table->string('destination_code');
            $table->integer('eco_seat');
            $table->integer('bus_seat');
            $table->integer('first_seat');
            $table->dateTime('boarding_time');
            $table->integer('duration');
            $table->string('gate');
            $table->timestamps();

            $table->foreign('plane_id')
                  ->references('id')->on('planes')
                  ->onDelete('cascade');
            $table->foreign('airport_id')
                  ->references('id')->on('airports')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('plane_schedules');
    }
}
