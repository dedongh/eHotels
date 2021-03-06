<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('arrival');
            $table->string('checkout');
            $table->integer('days_spent')->default(1);
            $table->integer('no_of_adults')->default(1);
            $table->integer('no_of_children')->default(0);
            $table->string('room_number');
            $table->bigInteger('room_id')->unsigned();
            $table->foreign('room_id')->references('id')
                ->on('rooms')->onDelete('Cascade');
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
        Schema::dropIfExists('reservations');
    }
}
