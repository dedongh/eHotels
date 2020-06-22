<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone');
            $table->string('country')->default('Ghana');
            $table->string('address')->nullable();;
            $table->string('car_number')->nullable();
            $table->string('arrival');
            $table->string('checkout');
            $table->integer('days_spent')->default(1);
            $table->integer('no_of_adults')->default(1);
            $table->integer('no_of_children')->default(0);
            $table->string('room_number');
            $table->decimal('rate_per_night',8,2);
            $table->decimal('additional_charges',8,2)->default(0);
            $table->decimal('total',8,2)->default(0);
            $table->decimal('amount_paid',8,2)->default(0);
            $table->decimal('Balance',8,2)->default(0);
            $table->string('notes')->nullable();
            $table->bigInteger('room_id')->unsigned();
            $table->foreign('room_id')->references('id')
                ->on('rooms')->onDelete('Cascade');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('bookings');
    }
}
