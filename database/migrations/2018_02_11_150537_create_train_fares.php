<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainFares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('train_fares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('train_id')->unsigned();
            $table->decimal('eco_seat', 10, 2);
            $table->decimal('bus_seat', 10, 2);
            $table->decimal('exec_seat', 10, 2);
            $table->decimal('unique_code', 10,2);
            $table->timestamps();

            $table->foreign('train_id')
                  ->references('id')->on('trains')
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
        Schema::dropIfExists('train_fares');
    }
}
