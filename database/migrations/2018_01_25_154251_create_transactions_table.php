<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_id')->unsigned();
            $table->string('bank')->nullable();
            $table->string('sender_name')->nullable();
            $table->decimal('ammount',10,2)->nullable();
            $table->string('receipt')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('booking_id')
                  ->references('id')->on('bookings')
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
        Schema::dropIfExists('transactions');
    }
}
